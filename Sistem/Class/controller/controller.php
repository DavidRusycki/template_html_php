<?php
namespace Controller;

use Model\ModelSistema;

/**
 * Controller base.
 * A ideia do controlador é definir a interface que todo controller do sistema deve ter.
 * @author David Rusycki
 * @since 06/03/2022
 */
abstract class Controller
{
    
    private $tela;
    private $ControllerSistema;
    
    /**
     * Construtor
     */
    public function __construct($oControllerSistema) 
    {
        $this->setControllerSistema($oControllerSistema);
        $this->setTela($this->getInstanceTela());
        $this->criaTela();
    }
    
    /**
     * Retorna a instância da tela.
     */
    public abstract function getInstanceTela();
    
    /**
     * Realiza a criação da tela.
     */
    protected abstract function criaTela();
    
    /**
     * Imprime a tela.
     */
    public function imprimeTela() 
    {
        echo $this->getTela();
    }
    
    /**
     * Retorna a tela
     * @return Object
     */
    public function getTela() 
    {
        return $this->tela;
    }

    /**
     * Seta a tela.
     * @param Object $tela
     * @return $this
     */
    public function setTela($tela)
    {
        $this->tela = $tela;
        
        return $this;
    }

    public function getModelSistema() : ModelSistema
    {
        return $this->getControllerSistema()->getModel();
    }

    public function setModelSistema(ModelSistema $ModelSistema) : self 
    {
        $this->getControllerSistema()->setModel($ModelSistema);
        
        return $this;
    }
 
    public function getControllerSistema() 
    {
        return $this->ControllerSistema;
    }

    public function setControllerSistema($ControllerSistema) : self 
    {
        $this->ControllerSistema = $ControllerSistema;
        
        return $this;
    }
    
    public function getDb()
    {
        return $this->getModelSistema()->getDb();
    }
    
}

