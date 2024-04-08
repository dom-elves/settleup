<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Group;
use App\Models\User;

class Debt extends Model
{
    use HasFactory;

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function users(): BelongsToMany
    {
        $users = $this->BelongsToMany(User::class);
        $users->setQuery(User::whereIn('id', json_decode($this->user_ids))->getQuery());
        
        return $users;
    }

    // todo: add paid_by, involved_users, etc
}
