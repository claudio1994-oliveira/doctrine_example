<?php

use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {

    echo "ID: $student->id\nNome: $student->name\n\n";
    echo "telefones:\n";

    foreach ($student->phones() as $phone) {
        echo $phone->numberPhone . PHP_EOL;
    }

    echo PHP_EOL;
}
