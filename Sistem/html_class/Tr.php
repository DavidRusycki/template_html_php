<?php
namespace Html;

class Tr  
{
    private $Colunas = [];

    public function __construct($aTd)
    {
        $this->setColunas($aTd);
    }

    public function __toString()
    {
        $sResult = "<tr>";
        foreach($this->getColunas() as $oColuna) 
        {
            $sResult .= $oColuna . "\n";
        }
        $sResult .= "</tr>";

        return $sResult;
    }

    /**
     * Get the value of Colunas
     */ 
    public function getColunas()
    {
        return $this->Colunas;
    }

    /**
     * Set the value of Colunas
     *
     * @return  self
     */ 
    public function setColunas($Colunas)
    {
        $this->Colunas = $Colunas;

        return $this;
    }
}
