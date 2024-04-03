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

        // add "not logged in/no permission/something or other"
        // temp so i don't have to keep clicking back
        if (!$user) {
            return view('welcome');
        }

        $groups = Group::whereJsonContains('user_ids', $user->id)->get();

        return view('dashboard', ['groups' => $groups]);
    }
}
