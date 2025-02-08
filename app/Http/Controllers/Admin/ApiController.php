<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Resources\UserInfoResource;
use App\Http\Resources\UserContactResource;
use App\Http\Resources\UserEducationResource;
use App\Http\Resources\UserExperienceResource;
use App\Http\Resources\UserProfileResource;
use App\Http\Resources\UserSkillResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User; 
use App\Models\UserProfile;
use App\Models\File; 
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    private $userService;

    // Inject UserService into the controller
    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function store(Request $request): JsonResponse
    {
        $id = $request->input('id');
        $section = $request->input('section');
    
        $request->validate(['user_id' => 'required']);
    
        switch ($section) {
            case 'information':
                $user = $id ? $this->userService->updateUserInfo($id, $request->all()) : $this->userService->createUserInfo($request->all());
                return response()->json(new UserInfoResource($user), $id ? 200 : 201);
    
            case 'contact':
                $user = $id ? $this->userService->updateUserContact($id, $request->all()) : $this->userService->createUserContact($request->all());
                return response()->json(new UserContactResource($user), $id ? 200 : 201);
    
            case 'profile':
                $user = $id ? $this->userService->updateUserProfile($id, $request->all()) : $this->userService->createUserProfile($request->all());
                return response()->json(new UserProfileResource($user), $id ? 200 : 201);
    
            case 'education':
                $user = $this->userService->createOrUpdateUserEducation($request->input('user_id'), $request->all());
                return response()->json(new UserEducationResource($user));
    
            case 'experience':
                $user = $this->userService->createOrUpdateUserExperience($request->input('user_id'), $request->all());
                return response()->json(new UserExperienceResource($user));
    
            case 'skills':
                $user = $id ? $this->userService->updateUserSkills($id, $request->all()) : $this->userService->createUserSkills($request->all());
                return response()->json(new UserSkillResource($user), $id ? 200 : 201);
    
            default:
                return response()->json($request->all());
        }
    }


    public function update(Request $request, int $userId): JsonResponse
    {

        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
        ]);
        $user = $this->userService->updateUserInfo($userId, $request->all());

        return response()->json(new UserInfoResource($user));
    }

    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required'
        ]);
    
        $userId = $request->input('user_id');
        $path = '';
    
        $user = $userId == Auth::id() ? Auth::user() : User::find($userId);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }
    

        $imagePath = $request->file('profile_image')->store('profiles', 'public');
        $user->profile_image_path = "/storage/" . $imagePath;
        $user->save();
    
        $path = $user->profile_image_path;
    

        $upload = UserProfile::firstOrNew(['user_id' => $userId]);
        $upload->imagepath = $path;
        $upload->description = $upload->description ?? 'n/a';
        $upload->save();
    
        return response()->json([
            'success' => true,
            'imageUrl' => asset($user->profile_image_path)
        ]);
    }


    public function uploadMulti(Request $request)
    {
        $uploadedFiles = [];
        
    
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('profiles', $fileName, 'public'); 
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    
                // Path for thumbnail (adjust as needed)
                $thumbnailPath = '/storage/profiles/' . $fileName;
    
                // Save file information to the database
                $fileId = File::create([
                    'user_id' => Auth::id(),
                    'name' => $fileName,
                    'size' => $file->getSize(),
                    'url' => "/storage/{$filePath}",
                ])->id;
    
                // Prepare the response data with file information
                $uploadedFiles[] = [
                    'id' =>  $fileId,
                    'name' => $fileName,
                    'size' => $file->getSize(),
                    'url' => "/storage/{$filePath}",
                    'thumbnailUrl' => $thumbnailPath, 
                    'deleteUrl' => route('admin.file.delete', ['filename' => $fileName]),  // Adjusted to use delete route
                    'deleteType' => 'DELETE',
                    'fileExtension' => $fileExtension,
                ];
            }
        }
    
        return response()->json([
            'success' => true,
            'files' => $uploadedFiles
        ]);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $role_type = $request->input('role_type');
        $status = $request->input('status');

        $update = File::find($id);
        if ($update) {
            $update->type = $role_type;
            $update->status = $status;
            $update->save();

            return redirect()->route('admin.files')->with('success', 'File update successfully');
        }

        return redirect()->route('admin.files')->with('success', 'Error');
    }

    public function deleteFile($filename)
    {
        // Find the file record in the database
        $file = File::where('name', $filename)->first();

        if ($file) {
            // Delete the file from storage (adjust path if needed)
            if (Storage::disk('public')->exists('profiles/' . $file->name)) {
                Storage::disk('public')->delete('profiles/' . $file->name);
            }

            // Optionally, delete the thumbnail file (if you have thumbnails)
            if (Storage::disk('public')->exists('thumbnails/' . $file->name)) {
                Storage::disk('public')->delete('thumbnails/' . $file->name);
            }

            // Delete the file record from the database
            $file->delete();

            // Return a success response
            return redirect()->route('admin.files')->with('success', 'File deleted successfully');
        }
        return redirect()->route('admin.files')->with('success', 'File not found');


    }

    public function send_email(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',
            'recipient_email' => 'required|email|max:255',
        ]);

        // Call the service to create send email and related records
        $email = $this->userService->createSendEmail($request->all());

        if ($email) {
            return response()->json(['success' => true, 'data' => $email], 201);
        }

        return response()->json(['success' => false, 'message' => 'Email creation failed'], 500);
    }
    
    // public function uploadMulti(Request $request)
    // {
    //     $uploadedFiles = [];

    //     if ($request->hasFile('files')) {
    //         foreach ($request->file('files') as $file) {
    //             if ($file->isValid()) {
    //                 $fileName = uniqid() . '_' . $file->getClientOriginalName();
    //                 $filePath = $file->storeAs('profiles', $fileName, 'public');
    //                 $fileSize = $file->getSize();
    
    //                 $uploadedFiles[] = [
    //                     'name' => $fileName,
    //                     'size' => $fileSize,
    //                     'url' => "/storage/{$filePath}",
                        // 'thumbnailUrl' => "/storage/thumbnails/{$filePath}", // Adjust as needed
                        // 'deleteUrl' => route('admin.users', ['filename' => $fileName]),
                        // 'deleteType' => 'DELETE'
    //                 ];
    //             }
    //         }
    //     }
    
    //     return response()->json(['files' => $uploadedFiles]);
    // }

    
        

    // public function uploadProfileImage(Request $request)
    // {
    //     $request->validate([
    //         'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);
        

    //     $user = Auth::user();
    //     $imagePath = $request->file('profile_image')->store('profiles', 'public');

    //     $user->profile_image_path = "/storage/" . $imagePath;
    //     $user->save();

        // return response()->json([
        //     'success' => true,
        //     'imageUrl' => asset($user->profile_image_path)
        // ]);
    // }
}
