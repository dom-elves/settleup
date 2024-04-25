<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Debt;

class ViewDebtComponent extends Component
{
    // from fe
    public $debt;

    // mount
    public $paid_by = [];
    public $involved_users = [];
    
    public function mount()
    {
        $this->involved_users = $this->debt->involved_users_user_ids;
        $this->paid_by = json_decode($this->debt->paid_by);
    }

    public function render()
    { 
        
        return view('livewire.debts.view-debt-component');
    }

    // goes to DebtComponent
    public function delete($debt)
    {
        $this->dispatch('deleteDebtEvent', debt: $debt);
    }
}
