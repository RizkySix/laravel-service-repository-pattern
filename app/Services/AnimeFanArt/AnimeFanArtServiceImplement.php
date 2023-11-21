<?php

namespace App\Services\AnimeFanArt;

use App\Mail\WebhookNotif;
use App\Models\AnimeFanArt;
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


    /**
     * Service Logic
     */
    public function getAllDataWithCategories(): Collection|Exception
    {
        try {
            $result = $this->repository->getAllDataWithCategories();

            return $result;
        } catch (Exception $e ) {
            Log::debug($e->getMessage());
            return $e->getMessage();
        }
    }


    /**
     * Service logic
     */
    public function storeFanArt(array $data)
    {
        try {
          
            foreach ($data['preview_image'] as $key => $value) {
                $path = $value['image']->store('Images/FanArt');
                $data['preview_image'][$key]['path'] = $path;
                unset($data['preview_image'][$key]['image']);
            }
          
           $categories = [
            'categories' => $data['categories']
           ];
           unset($data['categories']);
          
           $result = $this->repository->storeFanArt($data , $categories);

           return $result;
        } catch (Exception $e ) {
            Log::debug($e->getMessage());
            return $e->getMessage();
        }
    }


    /**
     * Service logic
     */
    public function updateCategories(AnimeFanArt $anime, array $newCategories)
    {
        try {
            
            $filteredCategories = [];
           
            foreach($newCategories['categories'] as $category)
            {
                $filteredCategories[$category['category_id']] = ['created_by' => $category['created_by']];
             
            }

            $result = $this->repository->updateCategories($anime , $filteredCategories);
            return $result;
         } catch (Exception $e ) {
             Log::debug($e->getMessage());
             return $e->getMessage();
         }
    }



     /**
     * Service logic
     */
    public function deleteFanArt(AnimeFanArt $anime)
    {
        try {
            
          $result = $this->repository->deleteFanArt($anime);

          return $result;
         } catch (Exception $e ) {
             Log::debug($e->getMessage());
             return $e->getMessage();
         }
    }
}