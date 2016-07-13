<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;

/**
 * Description of PostControllerFactory
 *
 * @author allê
 */
class PostFormFactory implements FactoryInterface {
    
    public function createService(ServiceLocatorInterface $sm) 
    {
        $categories = $sm->get('categories');
        $expireDays = $sm->get('expireDays');
        $cityCodes = $sm->get('city-codes-table')->select();
        
        $form = new PostForm();
        $form->setCategories($categories);
        $form->setExpireDays($expireDays);
        $form->setCityCodes($cityCodes);
        $form->buildForm();
        $form->setInputFilter($sm->get('market-post-filter'));
        return $form;
    }
    
}
