<?php
class Body  
{
    private string $content;

    public function __construct($content)
    {
        $this->setContent($content);
    }

    public function __toString()
    {
        return "<body> \n {$this->getContent()} \n </body> \n";
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
}
