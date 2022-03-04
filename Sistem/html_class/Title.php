<?php
namespace Html;

class Title  
{
    
    private string $content;

    public function __construct($sContent)
    {
        $this->setContent($sContent);
    }

    public function __toString()
    {
        return "<title>{$this->getContent()}</title> \n";
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}

