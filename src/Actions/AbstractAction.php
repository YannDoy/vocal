<?php

namespace App\Actions;

use Psr\Container\ContainerInterface;

abstract class AbstractAction
{
	private $di;

	public function __construct(ContainerInterface $di)
	{
		$this->di = $di;
	}

	protected function get(string $id)
	{
		return $this->di->get($id);
	}
}