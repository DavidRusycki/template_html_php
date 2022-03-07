<?php
namespace Html;

class Form extends HtmlElement
{
    private string $action;
    private string $method;
    private $componentes = [];
    
    public function __construct($action = '', $method = '') {
        $this->setAction($action)->setMethod($method);
    }

    public function __toString() {
        $sString = "<form class=\"{$this->getClass()}\" action=\"{$this->getAction()}\" method=\"{$this->getMethod()}\" >";
        foreach($this->getComponentes() as $oComponente) 
        {
            $sString .= $oComponente;
        }
        $sString .= "</form>";
        
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
    
    public function getAction() {
        return $this->action;
    }

    public function setAction($action) : self 
    {
        $this->action = $action;
        
        return $this;
    }
    public function getMethod() {
        return $this->method;
    }

    public function setMethod($method) : self 
    {
        $this->method = $method;
        
        return $this;
    }
    
}
