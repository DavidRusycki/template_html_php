<?php
namespace Sistem\Class;
use Html\H1;
use Html\Body;
use Html\Head;
use Html\Html;
use Html\Meta;
use Html\Table;
use Html\Title;
use Html\DocType;
use Html\templateHtml;
/**
 * Classe de menu do sistema.
 * @author David Rusycki
 * @since 03/03/2022
 */
class Menu  
{
 
    private Body $Body;

    public function __construct()
    {
        $this->setBody(new Body('<h1>Sai sim</h1>'));
    }

    public function __toString()
    {
        $oHead = new Head([new Meta("UTF-8"), new Meta('', "X-UA-Compatible", "IE=edge"), new Meta('', '', "width=device-width, initial-scale=1.0", "viewport")], new Title('Samuel'));
        
        $this->addComponentesBody();

        $oHtml = new Html('pt-BR', $oHead, $this->getBody());
        $oTemplate = new templateHtml(new DocType(), $oHtml);

        return $oTemplate;
    }

    private function addComponentesBody()
    {
        $aConteudo = [['codigo' => 1, 'nome' => 'david'], ['codigo' => 2, 'nome' => 'samuel'], ['codigo' => 3, 'nome' => 'paulo']];
        $this->getBody()->addComponente(new Table(['Código', 'Nome'], 2, $aConteudo));
        $this->getBody()->addComponente(new H1('Belissimo David'));
    }

    /**
     * Get the value of Body
     */ 
    public function getBody()
    {
        return $this->Body;
    }

    /**
     * Set the value of Body
     *
     * @return  self
     */ 
    public function setBody($Body)
    {
        $this->Body = $Body;

        return $this;
    }

}

