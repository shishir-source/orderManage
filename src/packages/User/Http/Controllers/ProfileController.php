<?php

namespace Modules\User\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\User\Entities\User;
use Modules\User\Entities\UserDetails;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Controllers\Controller;

class ProfileController extends Controller
{
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('user::admin.profile.index',[
            'users' => User::getUsers(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
        return view('user::admin.profile.edit',[
            'user_details' => UserDetails::getByUserId($id),
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
        $user = User::find($id);
        $userDetails = UserDetails::where('user_id',$id)->first();
        $request = $request->all();
        $request['user_id'] = auth_user()->id;
        if($user){
            $user->first_name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->update();
            if($userDetails) {
                $userDetails->user_id = $id;
                $userDetails->date_of_birth = $request['date_of_birth'];
                $userDetails->gender = $request['gender'];
                $userDetails->phone = $request['phone'];
                $userDetails->address = $request['address'];
                $usr = $userDetails->update();
            }else{
                $userDetails = new UserDetails();
                $userDetails->user_id = $id;
                $userDetails->date_of_birth = $request['date_of_birth'];
                $userDetails->gender = $request['gender'];
                $userDetails->phone = $request['phone'];
                $userDetails->address = $request['address'];
                $usr = $userDetails->save();
            }
        }else{
            $usr = UserDetails::create($request);
        }
        return redirect()->back()->withSuccess("SuccessfullY update profile.")->with('user_details',$usr);
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