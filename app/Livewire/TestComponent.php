<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class TestComponent extends Component
{
    public function render()
    {
        $users = User::all();
       
        return view('livewire.test-component', ['users' => $users]);
    }
}
