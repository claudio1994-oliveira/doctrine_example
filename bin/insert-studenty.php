<?php

use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student('Cláudio Oliveira');


$entityManager->persist($student);
$entityManager->flush();
