<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;

class AddDebtComponent extends Component
{
    // from FE
    public $users;
    public $group;

    // from form
    public $name;
    public $amount;
    public $involved_users = [];

    // goes to DebtComponent
    public function save()
    {
        $this->validate();
        
        $data = [
            'group_id' => $this->group->id,
            'name' => $this->name,
            'amount' => $this->amount,
            'involved_users' => json_encode($this->involved_users),
            'created_by_user_id' => Auth::user()->id,
        ];

        $this->dispatch('addDebtEvent', data: $data);
    }

    public function rules()
    {
        return [
            // add group_id for when debts can be made via a group/homescreen 
            'name' => 'required',
            'amount' => 'required|numeric',
            'involved_users' => 'required', // add validation for min 2+items in array
        ];
    }

    public function render()
    {
        return view('livewire.debts.add-debt-component');
    }
}
