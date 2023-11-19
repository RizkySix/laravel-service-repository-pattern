<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getByEmail(string $email);
    public function getByName(string $name);
}