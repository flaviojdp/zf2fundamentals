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
    use ListingsTableTrait;
    
    public $categories;
    private $postForm;

    public function setPostForm( $postForm )
    {
        $this->postForm = $postForm;
    }

    public function setCategories( $categories )
    {
        $this->categories = $categories;
    }
    
    public function indexAction() {
        
        $data = $this->params()->fromPost();
        $viewModel = new ViewModel(array(
            'postForm' => $this->postForm,
            'data' => $data
        ));
        
        $viewModel->setTemplate('market/post/index.phtml');
        
        if($this->getRequest()->isPost())
        {
            $this->postForm->setData( $data );
            if($this->postForm->isValid())
            {
                
                //$f = new \Zend\Form\Form();
                //$f->getData();
                $this->getListingsTable()->addPost( $this->postForm->getData() );
                $this->flashMessenger()
                    ->addMessage("Thanks for posting!");
                $this->redirect()->toRoute('home');
            }else{
                $invalidView = new ViewModel();
                $invalidView->setTemplate("market/post/invalid.phtml");
                $invalidView->addChild($viewModel, 'main');
                return $invalidView;
            }
        }
        
        return $viewModel;
    }
}
