<?php

use DI\ContainerBuilder;
use FaaPz\PDO\Database;
use Slim\Factory\AppFactory;
use App\Actions\HomepageAction;
use function DI\{create,get};

/**
 * Vocal
 *
 * @author Yann Doy
 * @package Vocal
 * @copyright Yann Doy 2020
 */
error_reporting(E_ALL);
chdir(dirname(__DIR__));

// Load composer autoloader
require 'vendor/autoload.php';

// Container
$di = (new ContainerBuilder)
	->addDefinitions('app/config/app.php')
	->build();

// Slim
AppFactory::setContainer($di);
$app = AppFactory::create();

require 'app/config/routes.php';

// Runtime
$app->run();