<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastrucure\Persistence\ConnectionFactory;

require_once 'vendor/autoload.php';

$pdo = ConnectionFactory::createConnection();
$statement = $pdo->query('SELECT * FROM students');
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];
//var_dump($statement->fetchColumn(1)); Apresenta só uma coluna, no caso apenas o nome
//exit();
foreach ($studentDataList as $studentData){
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);


