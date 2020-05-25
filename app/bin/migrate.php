<?php

use DI\ContainerBuilder;
use FaaPz\PDO\Database;

/**
 * Migrate db
 *
 * @author Yann Doy
 * @package Vocal
 * @copyright Yann Doy 2020
 */
error_reporting(E_ALL);
chdir(dirname(dirname(__DIR__)));

// Load composer autoloader
require 'vendor/autoload.php';

// Container
$di = (new ContainerBuilder)
	->addDefinitions('app/config/app.php')
	->build();

// Database
$db = $di->get(Database::class);
$db->exec(file_get_contents('app/schema/schema.sql'));
//$db->exec(file_get_contents('app/schema/seed.sql'));