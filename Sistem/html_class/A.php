<?php
namespace Html;

class A extends HtmlElement
{
    
    private $content;
    private $href;
    
    public function __construct($content = '', $href = '') {
        $this->setContent($content)->setHref($href);
    }

    public function __toString() {
        $sString = "<a class=\"{$this->getClass()}\" href=\"{$this->getHref()}\" >{$this->getContent()}</a>";
        
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
    
    public function getHref() 
    {
        return $this->href;
    }

    public function setHref($href) : self 
    {
        $this->href = $href;
        
        return $this;
    }


    
}
