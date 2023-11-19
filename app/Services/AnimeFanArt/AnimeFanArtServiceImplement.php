<?php

namespace App\Services\AnimeFanArt;

use App\Mail\WebhookNotif;
use App\Repositories\AnimeFanArt\AnimeFanArtRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\User\UserServiceImplement;
use App\Services\User\UserServiceInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AnimeFanArtServiceImplement implements AnimeFanArtServiceInterface
{
    protected $repository;
    protected $userRepo;

    public function __construct(AnimeFanArtRepositoryInterface $repository, UserRepositoryInterface $userRepo)
    {
        $this->repository = $repository;
        $this->userRepo = $userRepo;
    }

    /**
     * Service logic
     */
    public function getAllData(): Collection|Exception
    {
       try {
        Log::alert('Bussines Logic here');
        return $this->repository->getAllData();
       } catch (Exception $e ) {
          Log::debug($e->getMessage());
          return $e->getMessage();
       }
    }


    /**
     * Service logic
     */
    public function searchDataByName(string $name): Collection|Exception
    {
        try {
           $receiver = $this->userRepo->getByEmail('kijima.asuka@example.com');

           $result = $this->repository->searchDataByName($name);
           $result['receiver'] = $receiver->name;

           return $result;
            
        } catch (Exception $e ) {
            Log::debug($e->getMessage());
            return $e->getMessage();
        }
    }
}