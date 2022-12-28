<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\AddPermissionToRoleRequest;
use App\Http\Resources\RoleResource;
use App\Services\RBACService;
use Illuminate\Support\Str;

class RBACController extends Controller
{
    protected $rbacService;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->rbacService = new RBACService();
    }

    /**
     * Store a new role.
     *
     * @param  App\Http\Requests\StoreRoleRequest  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function createRole(StoreRoleRequest $request)
    {
        $role = $this->rbacService->createRoleFromRequest($request->all());
        return new RoleResource($role);
    }

    /**
     * Add permission to role, by role id.
     *
     * @param  App\Http\Requests\AddPermissionToRoleRequest  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function addPermissionToRole(AddPermissionToRoleRequest $request)
    {
        $role = $this->rbacService->addPermissionToRole($request);
        return new RoleResource($role);
    }
}
