<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\File;
use App\Services\UserService;
use App\Models\SendEmail;


use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }


    public function index()
    {
       

        return view('admin.dashboard');
    }

    public function inbox()
    {
        $data = DB::table('inbox_view')->get();

        return view('admin.inbox',compact('data'));
    }
    public function inbox_details()
    {
        return view('admin.details');
    }

    public function inbox_details_1($subject,$email)
    {
        $data = SendEmail::getBySubjectAndEmail($subject,$email);
        
        return view('admin.details',compact('data'));
    }

    public function files()
    {
        $files = File::all();  
        
        return view('admin.files', compact('files'));
    }

    public function profile()
    {
        return view('admin.profile_1');
    }

    public function profile_info($id)
    {
        $user_id = $id;
        $user_info = $this->userService->selectUserInfo($id);
        $user_contact = $this->userService->selectUserContact($id);
        $user_education = $this->userService->selectUserEducation($id);
        $user_experience = $this->userService->selectUserExperience($id);
        $user_profile = $this->userService->selectUserProfile($id);
        $user_skill = $this->userService->selectUserSkills($id);

        return view('admin.profile',compact('user_info','user_contact','user_education','user_experience','user_profile','user_skill','user_id'));
    }

    public function users()
    {
        return view('admin.user');
    }

    public function user_admin()
    {
        return view('admin.user_add');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function usersList(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);

        // Data to be returned to the frontend
        $data = $users->map(function($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'role' => $user->type,
                'status' => ucfirst($user->status),
                'created_at' => $user->created_at->format('M j, Y g:i A'),
            ];
        });

        // Custom Pagination Links
        $pagination = '';
        $currentPage = $users->currentPage();
        $totalPages = $users->lastPage();

        // Previous Button
        $pagination .= $currentPage > 1 
            ? '<li class="page-item"><a class="page-link" href="#" data-page="' . ($currentPage - 1) . '">Previous</a></li>' 
            : '<li class="page-item disabled"><a class="page-link">Previous</a></li>';

        // Page Numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            $pagination .= $i == $currentPage 
                ? '<li class="page-item active"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>' 
                : '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
        }

        // Next Button
        $pagination .= $currentPage < $totalPages 
            ? '<li class="page-item"><a class="page-link" href="#" data-page="' . ($currentPage + 1) . '">Next</a></li>' 
            : '<li class="page-item disabled"><a class="page-link">Next</a></li>';

        // Pagination Info
        $paginationInfo = "Showing " . (($users->currentPage() - 1) * $users->perPage() + 1) . " to " . ($users->currentPage() * $users->perPage()) . " of " . $users->total() . " entries";

        return response()->json([
            'data' => $data,
            'pagination' => $pagination,
            'paginationInfo' => $paginationInfo
        ]);
    }
        
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'profile' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $profilePath = null;
        if ($request->hasFile('profile')) {
            $profilePath = $request->file('profile')->store('profiles', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image_path' => '/storage/'.$profilePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => route('admin.users')
        ]);
    }
    
    public function admin_login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.users');
        }
    
        return view('admin.login');
    }
}
