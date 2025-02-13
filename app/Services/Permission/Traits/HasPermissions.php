<?php

namespace App\Services\Permission\Traits;

use App\Models\Permission;

trait HasPermissions
{

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,);
    }

    public function givePermissionsTo(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        if($permissions->isEmpty()) return $this;
        $this->permissions()->syncWithoutDetaching($permissions);
        return $this;
    }

    public function withDrawPermission(...$permissions)
    {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermission(...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->sync($permissions);
        return $this;

    }

    public function hasPermission(Permission $permission)
    {
        $this->hasPermissionTroughRole($permission);
//        return $this->hasPermissionTroughRole($permission) || $this->permissions->contains($permission);
    }

    public function hasPermissions(string $permission)
    {
        $this->permissions->contains('name',$permission);
    }



    protected function hasPermissionTroughRole(Permission $permission)
    {
        foreach ($permission->roles() as $role){
            if($this->roles()->contains($role)){
                return true;
            }
        }
        return false;
    }

    protected function getAllPermissions(array $permissions)
    {
        $permissions_flat = array_merge(...$permissions);
        return Permission::whereIn('name', $permissions_flat)->get();
    }

}
