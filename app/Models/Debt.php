<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Group;

class Debt extends Model
{
    use HasFactory;

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    // todo: add paid_by, involved_users, etc
}
