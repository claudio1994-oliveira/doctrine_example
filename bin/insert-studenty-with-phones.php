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

$entityManager->persist($phone1);
$entityManager->persist($phone2);
$entityManager->persist($phone3);

$student->addPhone($phone1);
$student->addPhone($phone2);
$student->addPhone($phone3);

$entityManager->persist($student);
$entityManager->flush();
