<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use src\EntityManager\EntityManagerFactory;
include 'vendor/autoload.php';

global $container;
$container = require 'config/container.php';

$factory = new EntityManagerFactory();
$entityManager = $factory($container);
return ConsoleRunner::createHelperSet($entityManager);