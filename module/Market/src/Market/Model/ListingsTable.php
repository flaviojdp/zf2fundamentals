<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * Description of ListingsTable
 *
 * @author flavio
 */
class ListingsTable extends TableGateway{
    //put your code here
    
    public static $tableName = 'listings';
    
    public function getListingsByCategory( $category ){
        
        $select = $this->select(array('category' => $category));
        
        return $select;
        
    }
}
