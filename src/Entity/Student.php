<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
    #[Id, Column, GeneratedValue]
    public  int $id;


    #[OneToMany(targetEntity: Phone::class, mappedBy: "student", cascade: ['persist', 'remove'])]
    public  Collection $phones;

    #[ManyToMany(targetEntity: Course::class, inversedBy: "students", cascade: ['persist', 'remove'])]
    public  Collection $courses;

    public function __construct(

        #[Column]
        public  string $name,

    ) {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
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
    public function courses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if ($this->courses->contains($course)) {
            return;
        }
        $this->courses->add($course);
        $course->addStudent($this);
    }
}
