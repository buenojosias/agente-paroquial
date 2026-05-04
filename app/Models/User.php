<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Carbon $email_verified_at
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'roles'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'roles' => 'array',
        ];
    }

        // Retorna array (sempre) — facilita uso nas views
    public function getRolesArray(): array
    {
        return $this->roles ?? [];
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, $this->getRolesArray(), true);
    }

    /** aceita string ou array */
    public function hasAnyRole(array|string $roles): bool
    {
        $roles = (array) $roles;
        return count(array_intersect($roles, $this->getRolesArray())) > 0;
    }

    // public function communities(): BelongsToMany
    // {
    //     return $this->belongsToMany(Community::class)
    //         ->withPivot('is_leader');
    // }

    // public function groups(): BelongsToMany
    // {
    //     return $this->belongsToMany(Group::class)
    //         ->withPivot('is_leader');
    // }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function children(): HasMany
    {
        return $this->hasMany(User::class, 'created_by');
    }
}
