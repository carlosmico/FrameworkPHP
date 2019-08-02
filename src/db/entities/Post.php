<?php

namespace App\db\entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 */
class Post extends Entity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @ORM\Column(type = "string")
     */
    public $title;
    
    /**
     * @ORM\Column(type = "string")
     */
    public $description;
    
    /**
     * @ORM\Column(type="integer")
     */
    public $creator;

    /**
     * @ORM\Column(type = "string")
     */
    public $created_at;

    /**
     * @ORM\Column(type = "string")
     */
    public $updated_at;

    public function __construct(){
        $this->created_at = date('Y-m-d H:i:s');
    }
}
