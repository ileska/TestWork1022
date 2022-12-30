<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Permission;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;

Class RBACService {
    private $roleRepository;
    private $permissionRepository;

    /**
     * Constructor
     */
    public function __construct(RoleRepository $roleRepository, Permission $permissionRepository){
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Store a new role.
     *
     * @param  array $params
     * @return App\Models\Role
     */
    public function createRoleFromRequest(array $params)
    {
        return $this->roleRepository->create($params);
    }

    /**
     * Add permission to role, by role id.
     *
     * @param  App\Http\Requests\AddPermissionToRoleRequest  $request
     * @return App\Models\Role
     */
    public function addPermissionToRole(AddPermissionToRoleRequest  $request) {
        return $this->permissionRepository->addPermissionToRole();
    }
}
