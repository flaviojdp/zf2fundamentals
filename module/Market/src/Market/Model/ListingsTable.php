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
    
    public function getListingById( $id ){
        return $this->select( array( 'listings_id' => $id) )->current();
    }
    
    public function getMostRecentListing(){
        
        $select = new \Zend\Db\Sql\Select();
        $select->from('listings');
        $expression = new \Zend\Db\Sql\Expression("MAX( listings_id )");
        $subSelect = new \Zend\Db\Sql\Select();
        $subSelect
                ->from('listings')
                ->columns( array( $expression ) );
        $where = new \Zend\Db\Sql\Where();
        $where
                ->in(listings_id, $subSelect);
        
        $select->where( $where );
        
        $objeto = $this->selectWith($select)->current();
        return $objeto;
    }
    
    public function addPost( $data ){
        
        list( $ciry, $country) = explode(',', $data['cityCode']);
        $data['city'] = trim($ciry);
        $data['country'] = trim($country);
        
        $date = new \DateTime();
        
        if( $data['expireDays'] ){
            if( $data['expireDays'] == 30 ){
                $date->add( new \DateInterval("P1M"));
            }
            else{
                $date->add(new \DateInterval("P".$data['expireDays']."D"));
            }
        }
        
        $data['date_expires'] = $date->format("Y-m-d H:i:s");
        unset($data['cityCode'], $data['expireDays'],
                $data['captcha'], $data['submit']);
        //var_dump( $data );
        //exit('x');
        $this->insert($data);
    }
}
