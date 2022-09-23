<?php

namespace App\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
    #[Id, Column, GeneratedValue]
    public  int $id;

    //o inverseBy é opcional para o relacionamento mas ajuda o Doctrine em alguns cenários.
    #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
    private  Student $student;

    public function __construct(

        #[Column]
        public  string $numberPhone,

    ) {
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }
}
