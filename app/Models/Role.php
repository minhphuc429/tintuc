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

    public function hasAccess(array $permissions)
    {
        foreach($permissions as $permission){
            if($this->hasPermission($permission)){
                return true;
            }
        }
        return false;
    }
    protected function hasPermission(string $permission)
    {
        $permissions= json_decode($this->permissions,true);
        return $permissions[$permission]??false;
    }
}
