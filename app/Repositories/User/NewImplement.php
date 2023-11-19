<?php

namespace App\Repositories\User;

use App\Models\User;

class NewImplement implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }


    public function getByEmail(string $email)
    {
        return $this->model->where('email' , $email)->first();
    }

    public function getByName(string $name)
    {
        return $this->model->where('email' , $name)->first();
    }
}