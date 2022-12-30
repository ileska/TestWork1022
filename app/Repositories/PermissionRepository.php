<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Repositories\RoleRepository;

class PermissionRepository implements PermissionRepositoryInterface 
{
    private $roleRepository;

    /**
     * Constructor
     */
    public function __construct(RoleRepository $roleRepository) {
        $this->$roleRepository = $roleRepository;
    }
    /**
     * Store a new post.
     *
     * @param  array $permissionDetails
     * @return App\Models\Role
     */
    public function addPermissionToRole(array $permissionDetails) 
    {
        $validator = Validator::make($permissionDetails, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'role_id' => 'required|exists:App\Models\Role,id',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        $role = $this->roleRepository->findById($permissionDetails['role_id']);

        //TODO if permission exist, find and use it
        $permission = Permission::create([
            'name' => $permissionDetails['name'],
            'slug' => Str::slug($permissionDetails['slug'], '-'),
        ]);

        $role->permissions()->attach($permission->id);
        return $role;
    }
}
