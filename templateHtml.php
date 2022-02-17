<?php
require_once('DocType.php');
require_once('Html.php');
class templateHtml  
{

    private DocType $DocType;
    private Html $Html;

    public function __construct($DocType, $Html)
    {
        $this->setDocType($DocType)->setHtml($Html);
    }

    public function __toString()
    {
        return $this->getDocType() + "<br>" + $this->getHtml();
    }

    /**
     * Get the value of DocType
     */ 
    public function getDocType()
    {
        return $this->DocType;
    }

    /**
     * Set the value of DocType
     *
     * @return  self
     */ 
    public function setDocType($DocType)
    {
        $this->DocType = $DocType;

        return $this;
    }

    /**
     * Get the value of Html
     */ 
    public function getHtml()
    {
        return $this->Html;
    }

    /**
     * Set the value of Html
     *
     * @return  self
     */ 
    public function setHtml($Html)
    {
        $this->Html = $Html;

        return $this;
    }
}
