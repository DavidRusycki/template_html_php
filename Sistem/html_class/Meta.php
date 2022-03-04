<?php
namespace Html;

class Meta  
{
    private string $charset;
    private string $http_equiv;
    private string $content;
    private string $name;

    public function __construct($charset = '', $http_equiv = '', $content = '', $name = '')
    {
        $this->setCharset($charset)->setHttp_equiv($http_equiv)->setContent($content)->setName($name);
    }

    public function __toString()
    {
        $sResult = "<meta";

        $sResult .= !!$this->getCharset() ? " charset=\"{$this->getCharset()}\"" : "";
        $sResult .= !!$this->getHttp_equiv() ? " http-equiv=\"{$this->getHttp_equiv()}\"" : "";
        $sResult .= !!$this->getName() ? "name=\"{$this->getName()}\"" : "";
        $sResult .= !!$this->getContent() ? "content=\"{$this->getContent()}\"" : "";

        $sResult .= ">";
        return $sResult;

    }

    /**
     * Get the value of charset
     */ 
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * Set the value of charset
     *
     * @return  self
     */ 
    public function setCharset($charset)
    {
        $this->charset = $charset;

        return $this;
    }

    /**
     * Get the value of http_equiv
     */ 
    public function getHttp_equiv()
    {
        return $this->http_equiv;
    }

    /**
     * Set the value of http_equiv
     *
     * @return  self
     */ 
    public function setHttp_equiv($http_equiv)
    {
        $this->http_equiv = $http_equiv;

        return $this;
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

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
