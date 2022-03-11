<?php
namespace View;

use Html\Body;
use Html\DocType;
use Html\Head;
use Html\Html;
use Html\Meta;
use Html\templateHtml;
use Html\Title;

/**
 * Classe de consulta do sistema.
 * @author David Rusycki
 * @since 06/03/2022
 */
abstract class ViewConsulta extends View
{
    
    private Body $body;
    
    /**
     * Construtor da classe.
     * @param Body $oBody
     */
    public function __construct($oController, Body $oBody = null) {
        parent::__construct($oController);
        if (!$oBody) {
            $oBody = new Body();
        }
        $this->setBody($oBody);
    }
    
    /**
     * {@inheritDoc}
     */
    public function montaTela() : string
    {
        $oHead = new Head([new Meta("UTF-8"), new Meta('', "X-UA-Compatible", "IE=edge"), new Meta('', '', "width=device-width, initial-scale=1.0", "viewport")], new Title('Samuel'));
        $oHead->addOthers(' <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> '); 
        $oHead->addOthers(' <link rel="stylesheet" href="http://localhost/template_html_php/sistem/style/style.css"> '); 
        $oHead->addOthers(' <script src="https://kit.fontawesome.com/49a857d31a.js" crossorigin="anonymous"></script> '); 

        $this->addComponentesBody();
        
        $oHtml = new Html('pt-BR', $oHead, $this->getBody());
        $oTemplate = new templateHtml(new DocType(), $oHtml);

        return $oTemplate;
    }
    
    /**
     * Adiciona componentes ao Body da página.
     */
    public abstract function addComponentesBody();
    
    public function getBody(): Body 
    {
        return $this->body;
    }

    public function setBody(Body $body)
    {
        $this->body = $body;
        
        return $this;
    }
    
}

