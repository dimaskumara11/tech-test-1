<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct()
    {
        $this->userService = new UserService;
        $this->middleware('auth:api');
    }

    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required|string',
            'email' => 'required|string',
            'password' => 'required',
        ]);

        return response()->json($this->userService->create($request), 201);
    }

    public function update(Request $request, $id)
    {
        $User = User::find($id);
        if (empty($User)) {
            return response()->json(["error" => "User not found."], 422);
        }
        return response()->json($this->userService->update($request, $User), 200);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(["id" => $id], 200);
    }
}
