<?php

use FaaPz\PDO\Database;
use Slim\Views\PhpRenderer;
use function DI\{create, get, env};

return [
	'view' => create(PhpRenderer::class)
		->constructor("app/views/")
		->method("setLayout", "default.php"),

	'db' => create(Database::class)
		->constructor(env("DB_DNS", "sqlite:app/db.sqlite"))
];