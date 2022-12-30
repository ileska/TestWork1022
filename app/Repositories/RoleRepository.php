<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RoleRepository implements RoleRepositoryInterface 
{
    /**
     * Store a new role.
     *
     * @param  array $roleDetails
     * @return App\Models\Role
     */
    public function createRole(array $roleDetails) 
    {
        $validator = Validator::make($roleDetails, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        }

        return Role::create($validator->validated());
    }

    /**
     * Find role by id
     * @param int $id
     * @return App\Models\Roles
     */
    public function findById(int $id){
        return Role::find($id);
    }
}
