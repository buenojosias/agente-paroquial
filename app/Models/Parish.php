<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Parish extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'parish_user')->withPivot('role');
    }

    // public function groups()
    // {
    //     return $this->hasMany(Group::class);
    // }
}
