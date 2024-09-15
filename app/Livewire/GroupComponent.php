<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class GroupComponent extends Component
{
    public $group;

    public function render()
    {
        dump(User::first());
        return view('livewire.groups.group');
    }
}
