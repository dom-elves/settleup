<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {  
        $user = Auth::user();
        $groups = Group::whereJsonContains('user_ids', $user->id)->get();

        // add "not logged in/no permission/something or other"

        return view('dashboard', ['groups' => $groups]);
    }
}
