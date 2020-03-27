<?php

namespace halasz\Ares;

interface IDataFactory
{

	/** @return Data */
	function create(array $data);
}
