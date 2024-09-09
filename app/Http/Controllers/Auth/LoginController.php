<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * get Username propery
     */
    public function username()
    {
        return 'username';
    }

    protected function sendFailedLoginResponse(Request $request)
    {

        $credentials = $request->only('username', 'password');
        $user = User::where('username', $credentials['username'])->first();
        $errors = [];


        if (!$user) {
            $errors['username'] = 'Username salah!';
        } else if ($user && !Hash::check($credentials['password'], $user->password)) {
            $errors['password'] = 'Password salah!';
        }

        // Jika ada kesalahan, lemparkan exception dengan pesan kesalahan  
        if (!empty($errors)) {
            throw ValidationException::withMessages($errors);
        }

    }

}
