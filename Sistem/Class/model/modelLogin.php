<?php
namespace Model;
use Components\FacadeDb\Manager;

/**
 * Modelo de Login
 * @author David Rusycki
 * @since 06/03/2022
 */
class ModelLogin extends Model
{
 
    private string $usuario;
    private string $senha;
        
    /**
     * Seta os dados do post
     * @param Array $aPost
     */
    public function setDadosPost($aPost) {
        $this->setUsuario($aPost['usuario']);
        $this->setSenha($aPost['senha']);
    }
    
    /**
     * Valida o login do usuário
     */
    public function validaLogin() {
        $sSql = "select * from tbusuario where nome = '{$this->getUsuario()}' and senha = '{$this->getSenha()}'";
        $aResult = $this->getDb()->select($sSql);
        
        return !!$aResult;
    }
    
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function setUsuario(string $usuario): self
    {
        $this->usuario = $usuario;
        
        return $this;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;
        
        return $this;
    }


    
}

