<?php
class Body  
{
    private string $content;
    private $componentes = [];

    public function __construct($content)
    {
        $this->setContent($content);
    }

    public function __toString()
    {
        return "<body> \n {$this->getContent()} \n {$this->getHtmlComponentes()} </body> \n";
    }

    public function getHtmlComponentes() : string
    {
        $sHtml = "";

        foreach($this->getComponentes() as $sComponente) {
            $sHtml .= $sComponente . ' \n ';
        }

        return $sHtml;
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

    public function addComponente($oComponente) 
    {
        $this->componentes[] = $oComponente;
    }

    /**
     * Get the value of componentes
     */ 
    public function getComponentes()
    {
        return $this->componentes;
    }

    /**
     * Set the value of componentes
     *
     * @return  self
     */ 
    public function setComponentes($componentes)
    {
        $this->componentes = $componentes;

        return $this;
    }
}
