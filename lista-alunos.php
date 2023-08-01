<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->query('SELECT * FROM students');
//var_dump($statement->fetchColumn(1)); Apresenta só uma coluna, no caso apenas o nome
//exit();

    while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)){
        $student = new Student(
            $studentData['id'],
            $studentData['name'],
            new DateTimeImmutable($studentData['birth_date'])
        );

        echo $student->age() . PHP_EOL;

    }
    exit();
