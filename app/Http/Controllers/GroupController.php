<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Debt;

class GroupController extends Controller
{
    public function index(Request $request, string $group_name)
    {      
        $group = Group::where('name', $group_name)->first();

        return view('groups.group', ['group' => $group, 'debts' => $group->debts]);
    }
}
