<?php
require_once('Head.php');
require_once('Body.php');
class Html  
{
    
    private $lang;
    private Head $Head;
    private Body $Body;

    public function __construct($sLang, $Head, $Body)
    {
        $this->setLang($sLang)->setHead($Head)->setBody($Body);
    }

    public function __toString()
    {
        $sResult = "<html lang=\"{$this->getLang()}\">";
        $sResult .= $this->getHead();
        $sResult .= $this->getBody();
        $sResult .= "</html>";
        
        return $sResult;
    }

    /**
     * Get the value of lang
     */ 
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set the value of lang
     *
     * @return  self
     */ 
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get the value of Head
     */ 
    public function getHead()
    {
        return $this->Head;
    }

    /**
     * Set the value of Head
     *
     * @return  self
     */ 
    public function setHead($Head)
    {
        $this->Head = $Head;

        return $this;
    }

    /**
     * Get the value of Body
     */ 
    public function getBody()
    {
        return $this->Body;
    }

    /**
     * Set the value of Body
     *
     * @return  self
     */ 
    public function setBody($Body)
    {
        $this->Body = $Body;

        return $this;
    }
}
