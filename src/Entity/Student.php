<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    #[Id, Column, GeneratedValue]
    public  int $id;


    #[OneToMany(targetEntity: Phone::class, mappedBy: "student", cascade: ['persist', 'remove'])]
    public  Collection $phones;

    public function __construct(

        #[Column]
        public  string $name,

    ) {
        $this->phones = new ArrayCollection();
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function phones(): Collection
    {
        return $this->phones;
    }
}
