<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastrucure\Persistence\ConnectionFactory;

require_once 'vendor/autoload.php';

$pdo = ConnectionFactory::createConnection();

$student = new Student(
    null,
    "Julho aaaaaaa",
    new DateTimeImmutable('2001-07-24'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name,:birth_date)";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
if($statement->execute()){
    echo "Aluno Incluido";
}

//var_dump($pdo->exec($sqlInsert));

