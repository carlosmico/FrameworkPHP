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

    public function updatePost($postOld){
        try{
            $post = $this -> getPostById($postOld->id);

            $post -> title = $postOld -> title;
            $post -> description = $postOld -> description;

            $this -> doctrineManager -> em -> persist($post);
            $this -> doctrineManager -> em -> flush();

            return $post;
        }catch(Exception $e){
            $this -> logManager -> error($e -> toString());
            var_dump($e);
        }
    }

    public function deletePostById(int $id){
        try{
            $post = $this -> getPostById($id);

            if(!$post){
                $this -> logManager -> info("No existe el post a eliminar con id " . $id);
            }

            $this -> doctrineManager -> em -> remove($post);

            return $this -> doctrineManager -> em -> flush();
        }catch(Exception $e){
            $this -> logManager -> error($e -> toString());
        }
    }

    public function getCountAllPosts($id):int{
        return count($this -> getPostsByUser($id));
    }

    public function getPosts():Array{
        $repository = $this->doctrineManager->em->getRepository(Post::class);
        return $repository -> findAll();
    }

    public function getPostsByUser($id):Array{
        $repository = $this->doctrineManager->em->getRepository(Post::class);
        return $repository -> findByCreator($id);
    }

    public function getLast5PostsByUser($id):Array{
        $repository = $this->doctrineManager->em->getRepository(Post::class);

        return $repository -> findByCreator([$id], ["id"=> 'DESC'], 5);
    }

    public function getPostById($id){
        $repository = $this->doctrineManager->em->getRepository(Post::class);
        return $repository -> find($id);
    }
}