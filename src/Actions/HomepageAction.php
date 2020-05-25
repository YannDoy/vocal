<?php

namespace App\Actions;

use FaaPz\PDO\Database;
use Slim\Psr7\{Request,Response};

class HomepageAction extends AbstractAction
{
	public function __invoke(Request $request, Response $response)
	{
		$db = $this->get('db');
		$view = $this->get('view');

		$results = $db
			->select()
			->from("word")
			->execute()
			->fetchAll();

		$view->render($response, "homepage.php", compact("results"));
		return $response;
	}
}