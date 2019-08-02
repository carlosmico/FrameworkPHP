<?php

namespace App\services;

use App\db\entities\User;

class UserService extends Service{

    public function createUser($user){
        try{
            $this -> doctrineManager -> em -> persist($user);
            $this -> doctrineManager -> em -> flush();

            return $user;
        }catch(Error $e){
            $this -> logManager -> error($e.toString());
        }
    }

    public function findUserByEmail(String $email){
        try{
            $repository = $this -> doctrineManager -> em -> getRepository(User::class);        

            $user = $repository -> findByEmail($email);

            return $user[0];
        }catch(Exception $e){
            $this -> logManager -> error($e.toString());
        }

        return null;
    }
}