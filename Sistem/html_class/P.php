<?php
namespace Html;

class P extends HtmlElement
{
    
    private $content;
    
    public function __construct($content = '') {
        $this->setContent($content);
    }

    public function __toString() {
        $sString = "<p class=\"{$this->getClass()}\">{$this->getContent()}</p>";
        
        return $sString;
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
