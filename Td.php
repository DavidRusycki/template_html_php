<?php

class Td  
{
    
    private string $texto;

    public function __construct($sTexto)
    {
        $this->setTexto($sTexto);
    }

    public function __toString()
    {
        return "<td>{$this->getTexto()}</td>\n";
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }
}
