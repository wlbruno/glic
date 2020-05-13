<?php

namespace App\Models\Traits;

trait UserACLTrait
{
	 public function permissions(): array
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        $permissions = [];
        foreach ($permissionsRole as $permission) {
            if (in_array($permission, $permissionsPlan))
                array_push($permissions, $permission);
        }

        return $permissions;
    }

	public function permissionsPlan(): array
	{
		$solicitante = $this->Solicitante()->first();
		$plan = $this->plan()->first();

		$permissions = [];
		foreach ($plan->profiles as $profile) {
			foreach ($profile->permissions as $permission) {
				array_push($permissions, $permission->name);
			}
		}

		return $permissions;
	}

 	public function permissionsRole(): array
    {
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                array_push($permissions, $permission->name);
            }
        }

        return $permissions;
    }
	public function hasPermission(string $permissioName): bool
	{
		return in_array($permissioName, $this->permissions());
	}

	public function isAdmin(): bool
	{
		return in_array($this->email, config('acl.admins'));
	}

	public function isSolicitante(): bool
	{
		return !in_array($this->email, config('acl.admins'));
	}
}