<?php
namespace Market\Form;

trait CityCodeTrait
{
	protected $cityCodes;
	
        public function getCityCodes() {
            return $this->cityCodes;
        }

        public function setCityCodes($cityCodes) {
            $this->cityCodes = $cityCodes;
            return $this;
        }	
}