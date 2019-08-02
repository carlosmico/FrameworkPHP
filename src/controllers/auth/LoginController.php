<?php
namespace App\controllers\auth;

use App\controllers\Controller;
use App\db\entities\User;
use App\services\UserService;
use Kint;

class LoginController extends Controller{
    private $error;

    /**
     * @Inject
     * @var UserService
     */
    private $userService;

    public function index(){
        $this -> error = null;
        $this -> viewManager -> renderTemplate("login.twig.html");
    }

    public function login(){
        $email = $_POST['email'];
        $password = sha1($_POST['password']);

        $user = $this -> userService -> findUserByEmail($email);

        if(!$user || $user -> password != $password){
            $this -> error = "Credenciales erróneas";
            $this -> viewManager -> renderTemplate("login.twig.html", ["error" => $this->error]);
        }else{
            $this -> sessionManager -> put("user", $user);
            $this -> redirectTo('dashboard');
        }
    }
}