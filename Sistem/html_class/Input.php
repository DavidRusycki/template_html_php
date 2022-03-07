<?php
namespace Html;

class Input extends HtmlElement
{
    
    private $type;
    private $placeholder;
    
    public function __construct($type = '', $name = '', $placeholder = '', $id = '') {
        $this->setType($type)->setName($name)->setPlaceholder($placeholder)->setId($id);
    }

    public function __toString() {
        $sString = "<input type=\"{$this->getType()}\" class=\"{$this->getClass()}\" id=\"{$this->getId()}\" placeholder=\"{$this->getPlaceholder()}\" name=\"{$this->getName()}\">";
        
        return $sString;
    }

    public function getType() 
    {
        return $this->type;
    }

    public function setType($type) : self 
    {
        $this->type = $type;
        
        return $this;
    }

    public function getPlaceholder() 
    {
        return $this->placeholder;
    }

    public function setPlaceholder($placeholder) : self 
    {
        $this->placeholder = $placeholder;
        
        return $this;
    }
    
}
