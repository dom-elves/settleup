<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Debt;

class Group extends Model
{
    use HasFactory;

    public function users(): HasMany
    {
        // there must be a better way of doing this
        $users = $this->hasMany(User::class);
        $users->setQuery(User::whereIn('id', json_decode($this->user_ids))->getQuery());

        return $users;
    }

    public function debts(): HasMany
    {
        return $this->hasMany(Debt::class);
    }
}
