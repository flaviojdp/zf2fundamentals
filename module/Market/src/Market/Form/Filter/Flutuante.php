<?php
namespace Market\Form\Filter;
use Zend\Filter\FilterInterface;
class Flutuante implements FilterInterface
{
	public function filter($value)
	{
		return (float) $value;
	}
}
