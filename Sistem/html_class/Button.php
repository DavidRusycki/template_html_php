<?php
namespace Html;

class Button extends HtmlElement
{
    
    private $type;
    private $content;
    
    public function __construct($type = '', $content = '') {
        $this->setType($type)->setContent($content);
    }

    public function __toString() {
        $sString = "<button class=\"{$this->getClass()}\" type=\"{$this->getType()}\">{$this->getContent()}</button>";
        
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
    
    public function getContent() 
    {
        return $this->content;
    }

    public function setContent($content) : self 
    {
        $this->content = $content;
        
        return $this;
    }


    
}
