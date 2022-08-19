<?php

use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

//$student = new Student('Cláudio Oliveira');
$student = new Student($argv[1]);


$entityManager->persist($student);
$entityManager->flush();
