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
        
        //$category  = $this->params()->fromQuery('category');
        $category  = $this->params()->fromRoute('category');
        return new ViewModel(array(
            'category' => $category,
        ));
    }
    
    public function itemAction()
    {
        //$itemId = $_GET['itemId'];
        //$itemId = $this->params()->fromQuery('itemId');
        $itemId = $this->params()->fromRoute('itemId');
        
        if(empty($itemId))
        {
            $this->flashMessenger()->addMessage("Item not found!");
            return $this->redirect()->toUrl('/market');
        }
        
        return new ViewModel(array(
            'itemId' => $itemId
        ));
    }
}
