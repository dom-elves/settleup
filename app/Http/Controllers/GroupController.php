<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Auth::user()->groups();
        dd($groups->get());
        return view('groups.groups', ['groups' => $groups]);
    }

    // public function old(Request $request, string $group_name)
    // {      
    //     $group = Group::where('name', $group_name)->first();
        
    //     return view('group.group', ['group' => $group, 'debts' => $group->debts]);
    // }
}
