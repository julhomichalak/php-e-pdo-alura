<?php

namespace Alura\Pdo\Infrastrucure\Persistence;

use PDO;
class ConnectionFactory
{
    public static function createConnection(): \PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite';
        return new PDO('sqlite:' . $databasePath);
    }

}