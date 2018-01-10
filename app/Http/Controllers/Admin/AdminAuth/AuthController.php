<?php

namespace Alumni\Http\Controllers\Admin\AdminAuth;

//use App\Admin;
//use App\User;
//use App\Role;
//use Validator;
use Alumni\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

//    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'alumni';
    protected $username = 'username';
    protected $redirectAfterLogout = '/admin/login';
    protected $guard = 'admin';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fName' => 'required',
            'mName' => 'required',
            'lName' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'email' => 'required|email|unique:personal_information',
            'password' => 'required|min:5|confirmed',
            'username' => 'required|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
//        $personal_information = new PersonalInformation($data);
//        $personal_information->save();
//
//        $user = new Admin();
//        $user->username = $data['username'];
//        $user->password = bcrypt($data['password']);
//        $user->pid  = $personal_information->pid;
//        $user->role_id  = 1;
//        $user->save();
//
//        Session::flash('add', 'Successfully Registered.');
//        return $admin;
    }

    public function showLoginForm()
    {
//        if (view()->exists('auth.authenticate')) {
//            return view('auth.authenticate');
//        }

        return view('admin.auth.login');
    }
    public function showRegistrationForm()
    {
        // return view('admin.auth.register');
        return redirect('/admin');
    } 
}
