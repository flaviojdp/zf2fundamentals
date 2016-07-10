<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\IndexController;

/**
 * Description of IndexControllerFactory
 *
 * @author allê
 */
class IndexControllerFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $controllerManager) 
    {
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        
        $categories = $sm->get('categories');
        
        $indexConroller = new IndexController();
        $indexConroller->setListingsTable( $sm->get('listings-table') );
        
        return $indexConroller;
    }
    
}
