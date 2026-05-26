<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    // public function groups()
    // {
    //     return $this->hasMany(Group::class);
    // }
}
