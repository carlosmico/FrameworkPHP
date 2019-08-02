<?php 
namespace App\controllers\auth;

use App\controllers\Controller;
use App\db\entities\User;
use App\services\UserService;

class RegisterController extends Controller{
    /**
     * @Inject
     * @var UserService
     */
    private $userService;

    private $error;

    public function index(){
        $this -> viewManager -> renderTemplate('register.twig.html');
    }

    public function register(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $this -> userService -> findUserByEmail($email);

        //Si result existe no podemos registrar el nuevo usuario
        if($result){
            $this -> error = "Ya existe un usuario con este email";
            $this -> viewManager -> renderTemplate("register.twig.html", ["error" => $this -> error]);
        }else{
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = sha1($password);
            
            $result = $this -> userService -> createUser($user);

            if($result){
                $this -> redirectTo('login');
            }else{
                $this -> error = "Error en la creación de usuario";
                $this -> viewManager -> renderTemplate("register.twig.html", ["error" => $this -> error]);
            }
        }
    }
}