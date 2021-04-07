<?php


namespace App\Services\Business;


use App\Models\User;
use App\Services\Data\SecurityDAO;
use App\Services\Utility\MyLogger2;
use Illuminate\Support\Facades\Log;

class SercurityService
{
    public function login(User $user){
        $logger = new MyLogger2();
        try {
            $logger->info("Entering Security Service (Business) Layer");
            $service = new SecurityDAO();
            Log::info("Exiting Security Service (Business) Layer");
            return $service->findByUser($user);
        }catch (\Exception $e){
            $logger->info("Exception SecurityService::login()" . $e->getMessage());
        }
    }

}
