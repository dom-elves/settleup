<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Debt;

class DebtController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $debts = Debt::whereJsonContains('involved_users', $user->id)
            ->orWhere('created_by_user_id', $user->id)
            ->get();

        return view('debts.debts', ['debts' => $debts]);
    }
}
