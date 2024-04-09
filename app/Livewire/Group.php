<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;

class UserGroup extends Component
{
    public $group;

    // public function mount()
    // {
    //     $this->user = Auth::user();
    // }

    public function render()
    {
        return view('livewire.groups.group');
    }
}