<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Controller;

/**
 *
 * @author flavio
 */
trait ListingsTableTrait {
    //put your code here
    
    protected $listingsTable;
    
    function getListingsTable() {
        return $this->listingsTable;
    }

    function setListingsTable($listingsTable) {
        $this->listingsTable = $listingsTable;
    }
    
}
