<?php


namespace App\Services\Data;


use App\Models\User;
use App\Services\Utility\MyLogger2;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SecurityDAO
{
    public function findByUser(User $user)
    {
        $logger = new MyLogger2();
        $logger->info("Entering Security DAO (Data) Layer");
        $u = $user->getUsername();
        $p = $user->getPassword();
        $logger->info("Login Parameters from Security DAO are: username " . $u . ' password: ' . $p);
        try {
            if (DB::select("select * from CST_256_ACTIVITY_2.USERS where USERNAME = ? and PASSWORD = ?", [$u, $p])) {
                $logger->info("Entering Security DAO (data) Layer Success");
                return true;
            } else {
                $logger->info("Entering Security DAO (data) Layer Fail");
                return false;
            }
        } catch (\PDOException $e) {
            $logger->error("Exception SecurityDAO::findByUser()" . $e->getMessage());
        }
    }
}
