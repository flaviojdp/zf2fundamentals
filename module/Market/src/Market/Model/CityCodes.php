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
class CityCodes extends TableGateway{
    //put your code here
    
    public static $tableName = 'world_city_area_codes';
    
}
