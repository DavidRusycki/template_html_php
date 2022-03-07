<?php
namespace Html;

class Div extends HtmlElement
{
    private $componentes = [];
    
    public function __construct() {
        
    }

    public function __toString() {
        $sString = "<div class=\"{$this->getClass()}\">";
        foreach($this->getComponentes() as $oComponente) 
        {
            $sString .= $oComponente;
        }
        $sString .= "</div>";
        
        return $sString;
    }

    public function getComponentes() 
    {
        return $this->componentes;
    }

    public function setComponentes($componentes) : self
    {
        $this->componentes = $componentes;
        
        return $this;
    }
    
    public function addComponente($componentes) : self
    {
        $this->componentes[] = $componentes;
        
        return $this;
    }
    
}
