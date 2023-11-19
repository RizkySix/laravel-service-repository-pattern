<?php

namespace App\Services\User;

/**
 * Handdle contract
 */
interface UserServiceInterface
{
    public function getByEmail(string $email);
    
}