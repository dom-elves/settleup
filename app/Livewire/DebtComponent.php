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

    public $message = '';

    protected $listeners = [
        'deleteDebtEvent' => 'delete',
        'addDebtEvent' => 'save'
    ];

    public function save($data)
    {
        $this->message = 'Debt added successfully';

        Debt::create([
            'group_id' => $data['group_id'],
            'name' => $data['name'],
            'amount' => $data['amount'],
            'involved_users' => $data['involved_users'],
            'created_by_user_id' => Auth::user()->id,
        ])->save();

    
        session()->flash('success', $this->message);

        return redirect(request()->header('Referer'));
       // add error handling,
       // users also need to have to 'accept' debts

       // probably easier to have the mindset that you need to check yourself off as 'paid' rather than get confusing with 
       // taking created_by_user_id out of array

       // make flash messages component-specific
    }

    public function delete($debt)
    {
        $this->message = 'Debt removed successfully';

        Debt::where('id', $debt['id'])->delete();

        // todo: add a warning
       
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.debt-component');
    }
}
