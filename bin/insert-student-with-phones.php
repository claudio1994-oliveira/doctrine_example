<?php

use App\Entity\Phone;
use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

//$student = new Student('Cláudio Oliveira');
$student = new Student("João Telefone");
$phone1 = new Phone('(85) 99966-8899');
$phone2 = new Phone('(85) 99566-8892');
$phone3 = new Phone('(85) 98566-8469');


$student->addPhone(new Phone('(85) 99966-8899'));
$student->addPhone(new Phone('(85) 99566-8892'));
$student->addPhone(new Phone('(85) 99566-8892'));

$entityManager->persist($student);
$entityManager->flush();
