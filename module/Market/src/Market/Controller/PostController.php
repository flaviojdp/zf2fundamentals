<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Description of PostController
 *
 * @author allê
 */
class PostController extends AbstractActionController {
    //put your code here
    public $categories;
    
    public function setCategories( $categories )
    {
        $this->categories = $categories;
    }
    
    public function indexAction() {
        
        return new ViewModel(array(
            'categories' => $this->categories
        ));
    }
}
