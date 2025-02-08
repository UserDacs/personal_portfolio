<?php 

namespace App\Services;

use App\Models\UserInfo;
use App\Models\UserContact;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserProfile;
use App\Models\UserSkills;
use App\Models\SendEmail;
use App\Models\User;
use App\Models\TempUser;
use App\Models\Channel;
use App\Models\Participant;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserService
{

    public function createSendEmail(array $data): ?SendEmail
    {
        DB::beginTransaction();

        try {
            $temp_sub = $data['subject'] ?? $data['recipient_email'];
            // Create the email record
            $email = SendEmail::create([
                'name' => $data['name'],
                'subject' => $temp_sub,
                'body' => $data['body'],
                'recipient_email' => $data['recipient_email'],
            ]);
    
            if (!$email) {
                throw new \Exception('Failed to create email');
            }
    
            // Check if TempUser exists
            $tempUser = TempUser::where('email', $data['recipient_email'])->first();
            $temp_user_id = $tempUser ? $tempUser->id : TempUser::create([
                'name' => $data['name'],
                'email' => $data['recipient_email'],
            ])->id;
    
            // Check if Channel exists
            $channel = Channel::where('name', $temp_sub)->first();
            $channel_id = $channel ? $channel->id : Channel::create([
                'name' => $temp_sub,
            ])->id;
    
            // Check if Participant exists
            $participant = Participant::where('channel_id', $channel_id)
                                      ->where('user_id', $temp_user_id)
                                      ->first();
    
            if (!$participant) {
                Participant::create([
                    'channel_id' => $channel_id,
                    'user_id' => $temp_user_id
                ]);
            }
    
            // Create a Message
            Message::create([
                'channel_id' => $channel_id,
                'sender_id' => $temp_user_id,
                'send_email_id' => $email->id
            ]);
    
            // If all operations are successful, commit the transaction
            DB::commit();
    
            return $email;
    
        } catch (\Exception $e) {
            // If any exception occurs, roll back the transaction
            DB::rollBack();
    
            // Optionally, log the error or return a custom response
            return null; // Or you can throw the exception again
        }
    }

    public function createUserInfo(array $data): UserInfo
    {
        return UserInfo::create([
            'user_id' => $data['user_id'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'role' => $data['role'],
        ]);
    }

    public function updateUserInfo(int $userId, array $data): UserInfo
    {
        $user = UserInfo::findOrFail($userId);
        $user->update([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'role' => $data['role'],
        ]);

        return $user;
    }


    public function createUserContact(array $data): UserContact
    {
        return UserContact::create([
            'user_id' => $data['user_id'],
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'emailaddress' => $data['emailaddress'],
            'link_github' => $data['link_github'],
            'link_personal_portfolio' => $data['link_personal_portfolio'],
            
        ]);
    }

    public function updateUserContact(int $userId, array $data): UserContact
    {
        $user = UserContact::findOrFail($userId);
        $user->update([
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'emailaddress' => $data['emailaddress'],
            'link_github' => $data['link_github'],
            'link_personal_portfolio' => $data['link_personal_portfolio'],
            
        ]);

        return $user;
    }

    public function createUserProfile(array $data): UserProfile
    {
        return UserProfile::create([
            'user_id' => $data['user_id'],
            'description' => $data['description'],
            'imagepath' => $data['imagepath'],            
        ]);
    }

    public function updateUserProfile(int $userId, array $data): UserProfile
    {
        $user = UserProfile::findOrFail($userId);
        $user->update([
            'description' => $data['description'],
            'imagepath' => $data['imagepath'],
        ]);

        return $user;
    }


    public function createOrUpdateUserEducation(int $userId, array $data)
    {
        $userEducations = [];

        foreach ($data['education'] as $education) {

            if ($education['id'] == '') {
                $userEducations[] = UserEducation::create([
                    'user_id' => $data['user_id'],
                    'schoolname' => $education['schoolname'],
                    'schooladdress' => $education['schooladdress'],
                    'course' => $education['course'],
                    'major' => $education['major'],
                    'year' => $education['year'],
                    'thesis' => $education['thesis'],
                ]);
            }else {
                $userEducation = UserEducation::where('user_id', $userId)
                ->where('id', $education['id']) // Match by user_id and education ID
                ->firstOrFail();

                $userEducation->update([
                    'schoolname' => $education['schoolname'],
                    'schooladdress' => $education['schooladdress'],
                    'course' => $education['course'],
                    'major' => $education['major'],
                    'year' => $education['year'],
                    'thesis' => $education['thesis'],
                ]);

                $userEducations[] = $userEducation;
            }
          
        }

        return $userEducations; 
    }


    public function createOrUpdateUserExperience(int $userId, array $data)
    {
        $userExperiences = [];

        foreach ($data['experience'] as $experience) {

            if ($experience['id'] == '') {

                $userExperiences[] = UserExperience::create([
                    'user_id' => $data['user_id'],
                    'role' => $experience['role'],
                    'companyname' => $experience['companyname'],
                    'address' => $experience['address'],
                    'description' => $experience['description'],
                    'year' => $experience['year'],
                ]);

            }else {

                $userExperience = UserExperience::where('user_id', $userId)
                                        ->where('id', $experience['id']) // Match by user_id and education ID
                                        ->firstOrFail();

                $userExperience->update([
                    'role' => $experience['role'],
                    'companyname' => $experience['companyname'],
                    'address' => $experience['address'],
                    'description' => $experience['description'],
                    'year' => $experience['year'],
                ]);

                $userExperiences[] = $userExperience;
            }
           
        }

        return $userExperiences; // Return updated education records
    }

    public function createUserSkills(array $data): UserSkills
    {
        return UserSkills::create([
            'user_id' => $data['user_id'],
            'back_end' => $data['back_end'],
            'front_end' => $data['front_end'],       
            'server_side' => $data['server_side'],
            'years_exp' => $data['years_exp'],             
        ]);
    }

    public function updateUserSkills(int $userId, array $data): UserSkills
    {
        $user = UserSkills::findOrFail($userId);
        $user->update([
            'back_end' => $data['back_end'],
            'front_end' => $data['front_end'],       
            'server_side' => $data['server_side'],
            'years_exp' => $data['years_exp'],           
        ]);

        return $user;
    }

    public function selectUserInfo(int $userId): ?UserInfo
    {
        return UserInfo::where('user_id', $userId)->first();
    }

    public function selectUserContact(int $userId): ?UserContact
    {
        return UserContact::where('user_id', $userId)->first();
    }

    public function selectUserEducation(int $userId): Collection
    {
        return UserEducation::where('user_id', $userId)->get();
    }

    public function selectUserExperience(int $userId): Collection
    {
        return UserExperience::where('user_id', $userId)->get();
    }

    public function selectUserProfile(int $userId): ?UserProfile
    {
        return UserProfile::where('user_id', $userId)->first();
    }

    public function selectUserSkills(int $userId): ?UserSkills
    {
        return UserSkills::where('user_id', $userId)->first();
    }

    public function getUserId(int $userId): ?User
    {
        return User::where('id', $userId)->first();
    }


}