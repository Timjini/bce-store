<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['id', 'controller', 'action'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
