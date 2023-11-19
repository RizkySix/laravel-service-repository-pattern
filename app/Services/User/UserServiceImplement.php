<?php

namespace App\Services\User;

use App\Repositories\User\UserRepositoryImplement;
use App\Repositories\User\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class UserServiceImplement implements UserServiceInterface
{
    protected $mainRepository;

    public function __construct(UserRepositoryInterface $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getByEmail(string $email)
    {
        try {
           return $this->mainRepository->getByEmail($email);
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            return [];
        }
    }


    public function getByName(string $name)
    {
        try {
            return $this->mainRepository->getByName($name);
         } catch (Exception $e) {
             Log::debug($e->getMessage());
             return [];
         }
    }
}