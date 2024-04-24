<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Debt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DebtComponent extends Component
{
    // from FE
    public $users;
    public $group;
    public $debts;

    protected $listeners = [
        'deleteDebtEvent' => 'delete',
        'addDebtEvent' => 'save'
    ];

    public function save($data)
    {
        Debt::create([
            'group_id' => $data['group_id'],
            'name' => $data['name'],
            'amount' => $data['amount'],
            'involved_users' => $data['involved_users'],
            'created_by_user_id' => Auth::user()->id,
        ])->save();

        session()->flash('message', 'Debt added successfully');

        return redirect(request()->header('Referer'));
       // add error handling, flash to session etc
       // users also need to have to 'accept' debts

       // probably easier to have the mindset that you need to check yourself off as 'paid' rather than get confusing with 
       // taking created_by_user_id out of array

       // make flash messages component-specific
    }

    public function delete($debt)
    {
        Debt::where('id', $debt['id'])->delete();

        // todo: add a warning

        session()->flash('message', 'Debt removed successfully');

        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.debt-component');
    }
}
