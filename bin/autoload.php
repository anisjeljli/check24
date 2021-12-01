<?php

$autoload = __DIR__.'/../vendor/autoload.php';

if (!file_exists($autoload)) {
    printf('You should run "composer install" in the component before running this script.');
}

require_once $autoload;
