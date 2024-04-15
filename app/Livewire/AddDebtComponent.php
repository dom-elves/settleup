<?php

namespace App\Livewire;

use Livewire\Component;

class AddDebtComponent extends Component
{
    public $users;

    public function render()
    {
        return view('livewire.debts.add-debt-component');
    }
}
