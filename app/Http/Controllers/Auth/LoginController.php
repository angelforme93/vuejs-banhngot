<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;

use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $req){
        $email = $req->username;
        $password=$req->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $data= Auth::user();
        }
        else 
        $data='dang nhap that bai';
        return $data;
        ;
    }
    public function dangky(Request $req){
        
       
    
                $validator = Validator::make($req->all(), [
                    
                    'email' => 'unique:users,email',
                    
                ]);
            
                if ($validator->fails()) {
                    
                    return 'Email đã tồn tại';
                    
                }
                else{
                    $user = new User;
                    $user->full_name=$req->name;
                    $user->email=$req->email;
                    $user->password=bcrypt($req->password);
                    $user->phone=$req->phone;
                    $user->address=$req->address;
                    $user->save();
                    return 'Tạo Users Thành Công';
                }
            
    }
}
