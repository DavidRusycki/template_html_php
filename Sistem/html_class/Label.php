<?php
namespace Html;

class Label extends HtmlElement
{
    
    private $for;
    private $content;
    
    public function __construct($for = '', $content = '') {
        $this->setFor($for)->setContent($content);
    }

    public function __toString() {
        $sString = "<label class=\"{$this->getClass()}\" for=\"{$this->getFor()}\">{$this->getContent()}</label>";
        
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

    public function getFor() 
    {
        return $this->for;
    }

    public function setFor($for) : self 
    {
        $this->for = $for;
        
        return $this;
    }
    
}
