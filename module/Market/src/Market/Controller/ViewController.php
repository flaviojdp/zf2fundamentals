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
 * Description of ViewController
 *
 * @author allê
 */
class ViewController extends AbstractActionController {
    //put your code here
    
    public function indexAction() {
        
        return new ViewModel(array(
            'category' => 'CATEGORY POSTINGS'
        ));
    }
}
