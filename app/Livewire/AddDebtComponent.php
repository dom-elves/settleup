<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
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

    public function save()
    {
        $this->validate();
        
        Debt::create([
            'group_id' => $this->group->id,
            'name' => $this->name,
            'amount' => $this->amount,
            'involved_users' => json_encode($this->involved_users),
            'created_by_user_id' => Auth::user()->id,
        ])->save();

        session()->flash('message', 'Debt added successfully');

        return redirect(request()->header('Referer'));
       // add error handling, flash to session etc
       // users also need to have to 'accept' debts

       // probably easier to have the mindset that you need to check yourself off as 'paid' rather than get confusing with 
       // taking created_by_user_id out of array
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
