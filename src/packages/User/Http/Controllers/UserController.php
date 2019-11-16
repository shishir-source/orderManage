<?php

namespace Modules\User\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('user::admin.user.index',[
            'users' => User::getUsers(),
        ]);
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function login()
    {
        return view('user::admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'email' =>  'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required|string',
            'status' => 'required',
        ]);

        $request = $request->except('_token','password_confirmation');

        $user = Sentinel::registerAndActivate($request);
        $user->type = $request['type'];
        $user->status = $request['status'];
        $user->blance = $request['blance'];
        $user->update();

        return redirect()->route('admin.user.index')->withSucces('Succesfully Create New User');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('user::admin.user.edit',[
            'user' => User::getById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'password' => 'confirmed',
            'type' => 'required|string',
            'status' => 'required',
        ]);

        $array = [];
        $user = User::findOrFail($id);

        if (Hash::check($request->get('old_password'), $user->password)) {
            $array = $request->except('_token','password_confirmation','old_password');
            $array['password'] = Hash::make($request->get('password'));
        }else{
            if($request->get('password')){
                Session::put('error',"Old Password doesn't match.");
            }
            $array = $request->except('_token','password');
        }

        $update = $user->update($array);

        if($update){
            return redirect()->route('admin.user.index')->withSuccess('Succesfully Update user');
        }

        return redirect()->route('admin.user.index')->withErrors('Failed Update user');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
