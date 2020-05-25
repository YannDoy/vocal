<?php

use FaaPz\PDO\Database;
use function DI\{create, get, env};

return [
	Database::class => create()
		->constructor(env("DB_DNS", "sqlite:app/db.sqlite"))
];