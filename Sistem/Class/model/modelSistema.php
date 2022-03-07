<?php
namespace Model;

use \Enum\EnumSistema;

/**
 * Modelo Principal do sistema.
 * @author David Rusycki
 * @since 04/03/2022
 */
class ModelSistema extends Model
{
    
    private ModelUsuario $Usuario;
    private Array $get;
    private Array $post;
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
 
    /**
     * Retorna a ação da requisição.
     */
    public function getAcao()
    {
        return $this->getGet()[EnumSistema::ACAO];
    }
    
    public function getPost(): array 
    {
        return $this->post;
    }

    public function setPost(array $post) : self 
    {
        $this->post = $post;
        
        return $this;
    }
    
    public function definePost($xIndice, $xValor)
    {
        $this->post[$xIndice] = $xValor;
        
        return $this;
    }
    
}
