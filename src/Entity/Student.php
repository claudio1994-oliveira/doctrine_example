<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Student
{
    #[Id]
    #[Column]
    #[GeneratedValue]
    public  int $id;

    public function __construct(

        #[Column]
        public  string $name,

    ) {
    }
}
