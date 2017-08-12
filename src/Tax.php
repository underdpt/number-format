<?php

namespace h4kuna\Number;

class Tax
{
	/** @var Percent */
	private $vat;

	public function __construct($vat)
	{
		if (!$vat instanceof Percent) {
			$vat = new Percent($vat);
		}
		$this->vat = $vat;
	}

	/** @return int|float */
	public function getVat()
	{
		return $this->vat->getPercent();
	}

	/**
	 * @param int|float $number
	 * @return float
	 */
	public function addVat($number)
	{
		return $this->vat->add($number);
	}

	/**
	 * @param int|float $number
	 * @return float
	 */
	public function removeVat($number)
	{
		return $number / $this->vat->getRatio();
	}

	/**
	 * @param int|float $number
	 * @return float
	 */
	public function diff($number)
	{
		return $number - $this->removeVat($number);
	}

	public function __toString()
	{
		return (string) $this->vat;
	}

}
