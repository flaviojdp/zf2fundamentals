<?php


namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Number;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Url;
use Zend\Form\Element\Email;
use Zend\Form\Element\Captcha;


class PostForm extends Form{
    
    private $categories;
    
    public function setCategories( $categories )
    {
        $this->categories = $categories;
    }
    
    public function buildForm()
    {
        $this->setAttribute("method","POST");
        
        $category = new Select('category');
        $category->setLabel("Category")
                ->setValueOptions(
                array_combine($this->categories, $this->categories)
                )
        ;
        
        $title = new Text("title");
        $title->setLabel("Title")
                ->setAttributes(array(
                    'size' => 25,
                    'maxElement' => 128
                ))
        ;
        
        $price = new Number('price');
        $price->setLabel('Price');
        
        $dataExpires = new Radio("dataExpires");
        $dataExpires->setLabel("Data Expires");
        
        $description = new Textarea("description");
        $description->setLabel("Description");
        
        $photFilename = new Url("photo_filename");
        $photFilename->setLabel("Photo file name");
        
        $contactName = new Text("contactName");
        $contactName->setLabel("Contact name");
        
        $contactEmail = new Email("contactEmail");
        $contactEmail->setLabel("Contact email");
        
        $contactPhone = new Text("contactPhone");
        $contactPhone->setLabel("Contact Phone");
        
        $cityCode = new Select("cityCode");
        $cityCode->setLabel("City code:");
        
        $deleteCode = new Number("delete_code");
        $deleteCode->setLabel("Delete Code");
        
        $captcha = new Captcha();
        $captcha->setLabel("Informe o código");
        $captcha->setOption("class","Dump");
        
        $submit = new Submit("submit");
        $submit->setAttribute("value","Post");
        
        $this->add($category)
                ->add($title)
                ->add($price)
                ->add($dataExpires)
                ->add($price)
                ->add($dataExpires)
                ->add($description)
                ->add($photFilename)
                ->add($contactName)
                ->add($contactEmail)
                ->add($contactPhone)
                ->add($cityCode)
                ->add($deleteCode)
                //->add($captcha)
                ->add($submit)
        ;
    }
    
}