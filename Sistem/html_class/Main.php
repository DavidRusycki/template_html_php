<?php
namespace Html;

class Main extends HtmlElement
{
    private $componentes = [];
    
    public function __construct() {
        
    }

    public function __toString() {
        $sString = "<main class=\"{$this->getClass()}\">";
        foreach($this->getComponentes() as $oComponente) 
        {
            $sString .= $oComponente;
        }
        $sString .= "</main>";
        
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
