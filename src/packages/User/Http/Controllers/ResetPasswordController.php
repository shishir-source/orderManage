<?php

namespace Modules\User\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class ResetPasswordController extends Controller
{
	public function index(){
		return view('user::admin.password');
	}


	public function reset(Request $request,$id){
		$this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
		]);

		$array = [];

		$user = User::findOrFail($id);

		if (Hash::check($request->get('old_password'), $user->password)) {
		    $array = $request->except('_token','password_confirmation','old_password');

		    $array['password'] = Hash::make($request->get('password'));

		    $user->update($array);

		    return redirect()->back()->withSuccess('Succesfully Update user');
		}

		return redirect()->back()->withErrors('Old Password does\'t match');
	}
}