<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use App\Models\File;

class PersonalController extends Controller
{
    // personal-portforlio
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $id = '2';
        $user_info = $this->userService->selectUserInfo($id);
        $user_contact = $this->userService->selectUserContact($id);
        $user_education = $this->userService->selectUserEducation($id);
        $user_experience = $this->userService->selectUserExperience($id);
        $user_profile = $this->userService->selectUserProfile($id);
        $user_skill = $this->userService->selectUserSkills($id);

        $files = File::where('user_id',1)->get(); 

        return view('personal-portforlio.index',compact('user_info','user_contact','user_education','user_experience','user_profile','user_skill','id','files'));
    }
}
