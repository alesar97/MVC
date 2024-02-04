<?php
/**
 * Created by PhpStorm.
 * User: Alos
 * Date: 1/27/2024
 * Time: 3:45 AM
 */

namespace App\Models;


class User
{
    public $id;
    public $title;
    public $description;
    public $img;

   public function getId(){
       return $this->id;
   }

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImg(){
        return $this->img;
    }
}