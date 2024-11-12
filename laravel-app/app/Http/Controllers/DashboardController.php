<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userRegistered = User::count();
        $userActive = User::where("user_status", "1")->count();
        return view("dashboard.index", compact("userRegistered", "userActive"));
    }
}
