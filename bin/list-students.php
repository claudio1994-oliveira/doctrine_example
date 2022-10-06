<?php

use App\Entity\Course;
use App\Entity\Phone;
use App\Entity\Student;
use App\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();
$dql = 'SELECT student, phone, course FROM App\\Entity\\Student student LEFT JOIN student.phones phone LEFT JOIN student.courses course';

//$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
//$studentList = $studentRepository->findAll();

$studentList = $entityManager->createQuery($dql)->getResult();
//$studentList = $entityManager->getRepository(Student::class)->findAll();

foreach ($studentList as $student) {

    echo "ID: $student->id\nNome: $student->name\n\n";
    if ($student->phones()->count() > 0) {
        echo "telefones:\n";

        echo implode(', ', $student->phones()->map(fn (Phone $phone) => $phone->numberPhone)->toArray()) . PHP_EOL;
    }


    if ($student->courses()->count() > 0) {

        echo "Cursos:\n";

        echo implode(', ', $student->courses()->map(fn (Course $course) => $course->name)->toArray());
    }

    /*  foreach ($student->phones() as $phone) {
        echo $phone->numberPhone . PHP_EOL;
    }
 */
    echo PHP_EOL . PHP_EOL;
}
