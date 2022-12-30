<?php

namespace App\Interfaces;

interface RoleRepositoryInterface 
{
    public function createRole(array $roleDetails);

    public function findById(int $id);
}