<?php

namespace App\Services\Permission\Traits;

use App\Models\Role;

trait HasRoles
{

    public function roles()
    {
        return $this->belongsToMany(Role::class,);
    }

    public function giveRolesTo(...$roles)
    {
        $roles = $this->getAllRoles($roles);
        if($roles->isEmpty()) return $this;
        $this->roles()->syncWithoutDetaching($roles);
        return $this;
    }

    public function withDrawRole(...$roles)
    {
        $roles = $this->getAllRoles($roles);
        $this->roles()->detach($roles);
        return $this;
    }

    public function refreshRole(...$roles)
    {
        $roles = $this->getAllRoles($roles);
        $this->roles()->sync($roles);
        return $this;

    }

    public function hasRole(string $role)
    {
        return $this->roles->contains('name',$role);
    }

    protected function getAllRoles(array $roles)
    {
        $roles_flat = array_merge(...$roles);
        return Role::whereIn('name', $roles_flat)->get();
    }

}
