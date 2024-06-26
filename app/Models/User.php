<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Group;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function created_debts(): HasMany
    // {
    //     $created_debts = $this->hasMany(Debt::class);
    //     $created_debts->setQuery(Debt::where('created_by_user_id', $this->id)->getQuery(), 'created_by_user_id');

    //     return $created_debts;
    // }

    public function groups(): BelongsToMany
    {
        $groups = $this->belongsToMany(Group::class);
        // dd(Group::whereJsonContains('user_ids', 1)->get());
        $groups->setQuery(Group::whereJsonContains('user_ids', $this->id)->getQuery());
        
        return $groups;
    }
}
