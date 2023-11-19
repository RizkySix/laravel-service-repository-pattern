<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }


    public function findUser(string $email)
    {
        $result = $this->userService->getByEmail($email);

        return response()->json([
            'status' => 'Ok',
            'data' => $result
        ], 200);
    }
}
