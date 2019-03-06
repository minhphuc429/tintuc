<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
//    protected $attributes = ['permissions' => '{}'];
    protected $fillable = ['name', 'slug', 'permission'];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    private function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
