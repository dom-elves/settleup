<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\GroupUser;
use App\Models\Debt;

class Group extends Model
{
    use HasFactory;

    //public function users(): HasMany
    //{
  //      return $this->hasMany(User::class);
//    }

    public function group_users(): HasMany
    {
        return $this->hasMany(GroupUser::class);
    }

    public function debts(): HasMany
    {
        return $this->hasMany(Debt::class);
    }
}
