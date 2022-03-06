<?php
namespace Html;

class Head  
{
    
    private $Metas = [];
    private $Title;
    private $others;

    public function __construct($aMetas, $Title)
    {
        $this->setMetas($aMetas)->setTitle($Title);
    }

    public function __toString()
    {
        $sResult = "<head> \n";
        foreach($this->getMetas() as $oMeta) {
            $sResult .= $oMeta . "\n";
        }
        $sResult .= $this->getTitle();
        $sResult .= $this->getOthers();
        $sResult .= " </head> \n";

        return $sResult;
    }

    /**
     * Get the value of Metas
     */ 
    public function getMetas()
    {
        return $this->Metas;
    }

    /**
     * Set the value of Metas
     *
     * @return  self
     */ 
    public function setMetas($Metas)
    {
        $this->Metas = $Metas;

        return $this;
    }

    /**
     * Get the value of Title
     */ 
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set the value of Title
     *
     * @return  self
     */ 
    public function setTitle($Title)
    {
        $this->Title = $Title;

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
    
    public function addOthers($sOthers) 
    {
        $this->others .= ' ' . $sOthers . ' ';
        
        return $this;
    }
    
}
