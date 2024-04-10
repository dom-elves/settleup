<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Group;
use App\Models\User;

class Debt extends Model
{
    use HasFactory;

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    // think of a better naming convention for these
    public function involved_users_user_ids(): HasMany
    {
        $users = $this->HasMany(User::class);
        $users->setQuery(User::whereIn('id', json_decode($this->involved_users))->getQuery(), 'involved_users');
  
        return $users;
    }

    public function paid_by_user_ids(): HasMany
    {
        $users = $this->HasMany(User::class);
        $users->setQuery(User::whereIn('id', json_decode($this->paid_by))->getQuery(), 'paid_by');

        return $users;
    }
}
