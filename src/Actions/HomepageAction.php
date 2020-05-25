<?php

namespace App\Actions;

use FaaPz\PDO\Database;
use Slim\Psr7\{Request,Response};

class HomepageAction extends AbstractAction
{
	public function __invoke(Request $request, Response $response)
	{
		$db = $this->get(Database::class);

		$results = $this->get(Database::class)
			->select()
			->from("word")
			->execute()
			->fetchAll();

		var_dump($results);

		$response->getBody()->write("<h1>Welcome !</h1>");
		return $response;
	}
}