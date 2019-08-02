<?php
namespace App\controllers;

use App\services\PostService;
use App\db\entities\Post;

class PostController extends ControllerAuth{

    /**
     * @Inject
     * @var PostService
     */
     private $postService;
     private $error;

    public function index(int $id = null){
        if($id==null){
            $this -> error = null;
            return $this -> viewManager -> renderTemplate('createPost.twig.html', ["user"=>$this -> user->email]);
        }

        $post = $this -> postService -> getPostById($id);
        $this -> viewManager -> renderTemplate('createPost.twig.html', ["user"=>$this -> user->email,  "post" => $post]);
    }

    public function create(){
        $post = new Post();

        $post -> title = $_POST['title'];
        $post -> description = $_POST['description'];
        $post -> title = $_POST['title'];
        $post -> creator = $this -> user -> id;

        $result = $this -> postService -> createPost($post);

        if(!$result){
            $this -> viewManager -> renderTemplate('createPost.twig.html', ["user"=>$this -> user->email, "error" => "Error al crear el post"]);
        }else{
            $this -> redirectTo("dashboard");
        }
    }

    public function edit($id){
        $post = new Post();

        $post -> id = $id;
        $post -> title = $_POST['title'];
        $post -> description = $_POST['description'];

        $this -> postService -> updatePost($post);

        $this -> redirectTo("dashboard");
    }

    public function delete(int $id){
        try{
            $this -> postService -> deletePostById($id);
            $this -> redirectTo("dashboard");
        }catch(Exception $e){
            $this -> logManager -> error($e->getMessage());
            $this -> redirectTo("dashboard");
        }
    }
}