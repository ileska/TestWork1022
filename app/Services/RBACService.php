<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Permission;

Class RBACService {

    /**
     * Store a new role.
     *
     * @param  array $params
     * @return App\Models\Role
     */
    public function createRoleFromRequest(array $params)
    {
        return Role::create($params);
    }

    /**
     * Add permission to role, by role id.
     *
     * @param  App\Http\Requests\AddPermissionToRoleRequest  $request
     * @return App\Models\Role
     */
    public function addPermissionToRole() {
        $role = Role::find($request->role_id);
        $permission = Permission::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
        ]);
        $role->permissions()->attach($permission->id);
        return $role;
    }
}
