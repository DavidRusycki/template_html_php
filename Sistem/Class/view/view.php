<?php
namespace View;

/**
 * Classe de View do sistema.
 * @author David Rusycki
 * @since 06/03/2022
 */
abstract class View
{

    private $Controller;
    
    /**
     * Construtor da classe.
     * @param Controller $oController
     */
    public function __construct($oController) {
        $this->setController($oController);
    }
    
    /**
     * Retorna a string de resultado da tela.
     */
    public function __toString() {
        return $this->montaTela();
    }
    
    /**
     * Realiza a montagem da tela.
     */
    public abstract function montaTela() : string;
    
    public function getController() 
    {
        return $this->Controller;
    }

    public function setController($Controller) : self 
    {
        $this->Controller = $Controller;
        
        return $this;
    }
    
    public function getModel() : object
    {
        return $this->getController()->getModel();
    }
    
}

