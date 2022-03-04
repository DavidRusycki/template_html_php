<?php
namespace Html;
/**
 * h1 
 * @author David Rusycki
 * @since 03/03/2022
 */
class H1
{
    
    private $class;
    private $style;
    private $others;
    private $content;

    public function __construct($content = null, $class = null, $style = null, $others = null)
    {
        $this->setContent($content)->setClass($class)->setStyle($style)->setOthers($others);
    }

    public function __toString()
    {
        $sRetorno = "<h1 class=\"{$this->getClass()}\" style=\"{$this->getStyle()}\" {$this->getOthers()}>{$this->getContent()}</h1>";
        return $sRetorno;
    }

    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */ 
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of style
     */ 
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set the value of style
     *
     * @return  self
     */ 
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get the value of others
     */ 
    public function getOthers()
    {
        return $this->others;
    }

    /**
     * Set the value of others
     *
     * @return  self
     */ 
    public function setOthers($others)
    {
        $this->others = $others;

        return $this;
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
