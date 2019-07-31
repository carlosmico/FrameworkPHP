<?php
namespace App\controllers\auth;

use App\controllers\Controller;
use App\db\entities\User;
use Kint;

class LoginController extends Controller{
    private $error;

    public function index(){
        $this -> error = null;
        $this -> viewManager -> renderTemplate("login.twig.html");
    }

    public function login(){
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $repository = $this -> doctrineManager -> em -> getRepository(User::class);        

        $user = $repository -> findByEmail($email);

        if(!$user || $user[0] -> password != $password){
            $this -> error = "Credenciales erróneas";
            $this -> viewManager -> renderTemplate("login.twig.html", ["error" => $this->error]);
        }else{
            $this -> sessionManager -> put("user", $user[0]);
            $this -> redirectTo('dashboard');
        }
    }
}