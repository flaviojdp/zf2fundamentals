<?php

namespace Market\Form;

use Zend\InputFilter\InputFilter;

class PostFilter extends InputFilter
{
    private $categories;
    
    public function setCategories( $categories )
    {
        $this->categories = $categories;
    }
    
    public function buildFilter()
    {
        $category = new \Zend\InputFilter\Input('category');
        $category->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags')
                ->attachByName('StringToLower')
        ;
        
        $category->getValidatorChain()
                ->attachByName('InArray',array(
                    'haystack' => $this->categories
                ))
        ;
        
        $title = new \Zend\InputFilter\Input('title');
        $title->getFilterChain()
                ->attachByName('StringTrim')
                ->attachByName('StripTags')
        ;
        
        $titleRegex = new \Zend\Validator\Regex(array(
            'pattern' => '/^[a-zA-Z0-9 ]*$/'
        ));
        $titleRegex->setMessage("Title should onlu contain numbers, latters or spaces!");
        
        $title->getValidatorChain()
                ->attach($titleRegex)
                ->attachByName('StringLength',array(
                    'min' => 1,
                    'max' => 128
                ))
        ;
        
        $this->add($category)
                ->add($title);
    }
}
