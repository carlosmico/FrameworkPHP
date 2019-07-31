<?php 
namespace App\controllers\auth;

use App\controllers\Controller;
use App\db\entities\User;

class RegisterController extends Controller{
    public function index(){
        $this -> viewManager -> renderTemplate('register.twig.html');
    }

    public function register(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if($this-> existUser()){
            echo "El usuario ya existe";
        }else{
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = sha1($password);
            
            $this -> doctrineManager -> em -> persist($user);
            $this -> doctrineManager -> em -> flush();
        }
    }

    public function existUser(){
        $repository = $this -> doctrineManager -> em -> getRepository(User::class);
        
        $user = $repository -> findByEmail($email);

        if($user){
            return true;
        }else{
            return false;
        }
    }
}