<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {  
        $user = Auth::user();
        $group_users = GroupUser::where('user_id', $user->id)->get();
        $groups = Group::whereIn('id', $group_users->pluck('group_id')->toArray())->get();
        
        // todo: add "not logged in/no permission/something or other"
        // temp so i don't have to keep clicking back
        if (!$user) {
            return view('welcome');
        }

        
        return view('dashboard', ['groups' => $groups]);
    }
}
