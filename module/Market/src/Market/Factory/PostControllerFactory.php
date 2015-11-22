<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Controller\PostController;

/**
 * Description of PostControllerFactory
 *
 * @author allê
 */
class PostControllerFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $controllerManager) 
    {
        $allServices = $controllerManager->getServiceLocator();
        $sm = $allServices->get('ServiceManager');
        
        $categories = $sm->get('categories');
        
        $postConroller = new PostController();
        $postConroller->setCategories($categories);
        $postConroller->setPostForm( $sm->get("market-post-form") );
        
        return $postConroller;
    }
    
}
