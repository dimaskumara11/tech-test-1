<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function create($request): User
    {
        $User = $this->user;
        $User->user_fullname = $request->fullname;
        $User->user_email = $request->email;
        $User->user_password = Hash::make($request->password);
        $User->user_status = $request->status;
        $User->save();
        return $User;
    }

    public function update($request, $userModel): User
    {
        $User = $userModel;
        if($request->fullname){
            $User->user_fullname = $request->fullname;
        }
        if($request->email){
            $User->user_email = $request->email;
        }
        if($request->password){
            $User->user_password = Hash::make($request->password);
        }
        $User->user_status = $request->status;

        $User->save();
        return $User;
    }
}