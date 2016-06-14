<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Auth;
use Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  /**
   * Where to redirect users after login / registration.
   *
   * @var string
   */
  protected $redirectTo = '/';

  /**
   * Create a new authentication controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }

  /**
   * Redirect the user to the GitHub authentication page.
   *
   * @return Response
   */
  public function redirectToProvider()
  {
    return Socialite::driver('facebook')->redirect();
  }

  /**
   * Handle a login request to the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function login(Request $request)
  {
    $this->validateLogin($request);

    // If the class is using the ThrottlesLogins trait, we can automatically throttle
    // the login attempts for this application. We'll key this by the username and
    // the IP address of the client making these requests into this application.
    $throttles = $this->isUsingThrottlesLoginsTrait();

    if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
      $this->fireLockoutEvent($request);

      return $this->sendLockoutResponse($request);
    }

    $credentials = $this->getCredentials($request);

    if (Auth::guard($this->getGuard())->attempt($credentials, TRUE)) {
      return $this->handleUserWasAuthenticated($request, $throttles);
    }

    // If the login attempt was unsuccessful we will increment the number of attempts
    // to login and redirect the user back to the login form. Of course, when this
    // user surpasses their maximum number of attempts they will get locked out.
    if ($throttles && ! $lockedOut) {
      $this->incrementLoginAttempts($request);
    }

    return $this->sendFailedLoginResponse($request);
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return Response
   */
  public function handleProviderCallback()
  {
    $socialite = Socialite::driver('facebook')->user();

    $user = User::whereEmail($socialite->getEmail())->first();

    // Create Account
    if (is_null($user)) {
      $user = new User;

      $user->email = $socialite->getEmail();
      $user->active = 1;

      $name = explode(' ', $socialite->getName());

      if (!empty($name[0])) {
        $user->first_name = $name[0];
      }
      else {
        $user->first_name = $socialite->getEmail();
      }

      if (!empty($name[1])) {
        $user->last_name = $name[1];
      }

      $user->save();
    }

    Auth::login($user, true);

    return redirect('/');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  public function validator(array $data) {
    return Validator::make($data, [
                             'first_name' => 'required|max:255',
                             'last_name' => 'required|max:255',
                             'email' => 'required|email|max:255|unique:users',
                             'password' => 'required|confirmed|min:6',
                           ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  public function create(array $data) {
    return User::create([
                          'first_name' => $data['first_name'],
                          'last_name' => $data['last_name'],
                          'email' => $data['email'],
                          'password' => bcrypt($data['password']),
                        ]);
  }

}
