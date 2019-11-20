<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\Role;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Contracts\Authentication;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Modules\User\Events\UserHasActivatedAccount;
use Cartalyst\Sentinel\Laravel\Facades\Activation;

class AuthController extends Controller
{
    public function loginView(){
        return view("user::admin.auth.login");
    }
    /**
     * Login a user.
     *
     * @param \Modules\User\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $loggedIn = Sentinel::authenticate([
            'email' => $request->email,
            'password' => $request->password,
        ], (bool) $request->get('remember_me', false));

        if (! $loggedIn) {
            return redirect()->back()->withInput()
                ->withError('invalid Credentials');
                // ->withError(trans('user::messages.users.invalid_credentials'));
        }

        return redirect()->intended($this->redirectTo());
    }

    /**
     * Where to redirect users after login..
     *
     * @return string
     */
    protected function logout()
    {
        Sentinel::logout();
        return redirect()->route('admin.login');
    }

    /**
     * Where to redirect users after login..
     *
     * @return string
     */
    protected function redirectTo()
    {
        return route('admin.dashboard');
    }
}