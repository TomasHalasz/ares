<?php declare(strict_types=1);

namespace h4kuna\Ares;

use DateTime;
use DateTimeZone;

/**
 * @author Milan Matějček
 */
class DataProvider
{

	/** @var IDataFactory */
	private $dataFactory;

	/** @var array */
	private $data = [];


	public function __construct(IDataFactory $dataFactory)
	{
		$this->dataFactory = $dataFactory;
	}


	public function getData(): Data
	{
		if (is_array($this->data)) {
			$this->setFileNumberAndCourt();
			$this->data = $this->dataFactory->create($this->data);
		}
		return $this->data;
	}


	public function prepareData()
	{
		$this->data = [];
		return $this;
	}


	public function setActive($active)
	{
		dump($active);
		$this->data['active'] = is_bool($active) ? $active : (((string) $active) == 'Aktivní'); // ==
		return $this;
	}


	public function setCity(string $city)
	{
		$this->data['city'] = self::toNull($city);
		return $this;
	}


	public function setCompany(string $company)
	{
		$this->data['company'] = self::toNull($company);
		return $this;
	}


	public function setCourt(string $court)
	{
		$this->data['court'] = self::toNull($court);
		return $this;
	}


	public function setCreated(string $date)
	{
		$this->data['created'] = new DateTime((string) $date, new DateTimeZone('Europe/Prague'));
		return $this;
	}


	public function setFileNumber(string $fileNumber)
	{
		$this->data['file_number'] = self::toNull($fileNumber);
		return $this;
	}


	public function setIN(string $in)
	{
		$this->data['in'] = self::toNull($in);
		return $this;
	}


	public function setIsPerson(string $s)
	{
		$this->data['is_person'] = $s <= '108';
		return $this;
	}


	private function setFileNumberAndCourt()
	{
		$this->data['court_all'] = NULL;
		if ($this->data['file_number'] && $this->data['court']) {
			$this->data['court_all'] = $this->data['file_number'] . ', ' . $this->data['court'];
		}
	}


	public function setCityDistrict($district)
	{
		$this->data['city_district'] = self::toNull($district);
		return $this;
	}


	public function setCityPost($district)
	{
		$this->data['city_post'] = self::toNull($district);
		return $this;
	}


	public function setStreet($street)
	{
		$this->data['street'] = self::toNull($street);
		return $this;
	}


	public function setHouseNumber($cd, $co)
	{
		$this->data['house_number'] = self::toNull(trim($cd . '/' . $co, '/'));
		return $this;
	}


	public function setTIN($s)
	{
		$tin = strval($s);
		$this->data['tin'] = self::toNull($tin);
		$this->data['vat_payer'] = (bool) $tin;
		return $this;
	}


	public function setZip($zip)
	{
		$this->data['zip'] = self::toNull($zip);
		return $this;
	}


	private static function toNull(string $v): ?string
	{
		$string = trim($v);
		if ($string === '') {
			return NULL;
		}
		return $string;
	}

}
