<?php
namespace Model;
/**
 * Modelo Principal do sistema.
 * @author David Rusycki
 * @since 04/03/2022
 */
class ModelSistema  
{
    
    private ModelUsuario $Usuario;
    private Array $get;
    private $controllerRequisicao;

    public function getUsuario() : ModelUsuario
    {
        if (empty($this->Usuario)) 
        {
            $this->Usuario = new ModelUsuario();
        }
        return $this->Usuario;
    }

    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;

        return $this;
    }
    
    public function getGet(): array {
        return $this->get;
    }

    public function setGet(array $get) 
    {
        $this->get = $get;
        return $this;
    }
    
    public function defineGet($xIndice, $xValor)
    {
        $this->get[$xIndice] = $xValor;
    }
    
    public function getControllerRequisicao() 
    {
        return $this->controllerRequisicao;
    }

    public function setControllerRequisicao($controllerRequisicao)
    {
        $this->controllerRequisicao = $controllerRequisicao;
        return $this;
    }
    
}