<?php

use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

// Para uma busca simples, não precisamos de um repository, como o entityManager conseguimos buscar. Basta passar a classe como parâmetro e logo após o ID
$student = $entityManager->find(Student::class, $argv[1]);
$student->name = $argv[2];
//Não precisamos do "persist" pois o Doctrine já está observando as alterações feitas pelo entityManager
$entityManager->flush();
