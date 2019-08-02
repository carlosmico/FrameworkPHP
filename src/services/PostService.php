<?php

namespace App\services;

use App\db\entities\Post;

class PostService extends Service{

    public function createPost($post):Post{
        try{
            $this -> doctrineManager -> em -> persist($post);
            $this -> doctrineManager -> em -> flush();
            return $post;
        }catch(Exception $e){
            $this -> logManager -> error($e -> toString());
        }
    }

    public function deletePostById(int $id):int{
        try{
            $post = $this->doctrineManager->em->getRepository(Post::class)->findById($id);

            if(!$post){
                $this -> logManager -> infor("No existe el post a eliminar con id " . $id);
                return 0;
            }

            $this -> doctrineManager -> em -> remove($post);

            return $this -> doctrineManager -> em -> flush();
        }catch(Exception $e){
            $this -> logManager -> error($e -> toString());
        }
    }

    public function getPosts():Array{
        $repository = $this->doctrineManager->em->getRepository(Post::class);
        return $repository -> findAll();
    }

    public function getPostsByUser($id):Array{
        $repository = $this->doctrineManager->em->getRepository(Post::class);
        return $repository -> findByCreator($id);
    }
}