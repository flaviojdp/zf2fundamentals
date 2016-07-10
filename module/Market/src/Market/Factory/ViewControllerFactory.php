<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\ViewController;

/**
 * Description of IndexControllerFactory
 *
 * @author allê
 */
class ViewControllerFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $controllerManager) 
    {
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        
        $categories = $sm->get('categories');
        
        $viewConroller = new ViewController();
        $viewConroller->setListingsTable( $sm->get('listings-table') );
        
        return $viewConroller;
    }
    
}
