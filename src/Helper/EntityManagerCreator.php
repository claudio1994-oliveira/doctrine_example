<?php

namespace App\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__ . "/.."],
            true
        );

        $config->setMiddlewares([
            new Middleware(new ConsoleLogger(new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG)))
        ]);

        $conn = [
            'driver' => 'pdo_sqlite',
            'path' =>  __DIR__ . '/../../db.sqlite',
        ];

        return EntityManager::create($conn, $config);
    }
}
