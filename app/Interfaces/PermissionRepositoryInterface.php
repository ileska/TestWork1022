<?php

namespace App\Interfaces;

interface RoleRepositoryInterface 
{
    public function addPermissionToRole(array $permissionDetails);
}