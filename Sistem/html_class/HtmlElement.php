<?php
namespace Html;

/**
 * Classe base para elementos html
 */
abstract class HtmlElement  
{
    
    private string $class = '';
    private string $id;
    private string $name;
 
    public abstract function __construct();
    public abstract function __toString();
    
    public function getClass(): string 
    {
        return $this->class;
    }

    public function setClass(string $class) : self 
    {
        $this->class = $class;
        
        return $this;
    }

    public function getId(): string 
    {
        return $this->id;
    }

    public function setId(string $id) : self 
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getName(): string 
    {
        return $this->name;
    }

    public function setName(string $name) : self 
    {
        $this->name = $name;
        
        return $this;
    }
    
}
