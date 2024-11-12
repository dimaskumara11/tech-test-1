<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct()
    {
        $this->userService = new UserService;
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $title = "Create User";
        return view('users.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users,user_email',
            'password' => 'required|min:6',
            'status' => 'required',
        ]);

        if ($request->password != $request->confirm_password) {
            return redirect()->back()->withErrors([
                "The Password Not Match."
            ])->withInput();
        }

        $this->userService->create($request);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $title = "Edit User";
        $data = User::find($id);
        if (empty($data)) {
            return redirect()->back()->withErrors([
                "User Not Found."
            ]);
        }
        return view('users.edit', compact('data', 'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email|unique:users,user_email,' . $id . ',user_id',
            'status' => 'required',
        ]);

        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->withErrors([
                "User Not Found."
            ]);
        }
        $this->userService->update($request, $user);

        if ($request->filled('user_password')) {
            $user->update([
                'user_password' => $request->user_password,
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return redirect()->back()->withErrors([
                "User Not Found."
            ]);
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
