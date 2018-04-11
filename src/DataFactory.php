<?php declare(strict_types=1);

namespace h4kuna\Ares;

class DataFactory implements IDataFactory
{

	public function create(array $data): Data
	{
		return new Data($data);
	}

}
