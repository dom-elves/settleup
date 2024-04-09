<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Debt;

class DebtComponent extends Component
{
    public $debt;

    public function render()
    { 
          
        return view('livewire.debts.debt-component');
    }
}
