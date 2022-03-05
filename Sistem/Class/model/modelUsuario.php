<?php
namespace Model;
/**
 * Modelo de Usuário
 * @author David Rusycki
 * @since 04/03/2022
 */
class ModelUsuario
{

    private int $codigo;
    private string $nome;
    private bool $logado = false;

    public function getUsuarioFromCodigo() 
    {
        
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get the value of logado
     */ 
    public function getLogado()
    {
        return $this->logado;
    }

    /**
     * Set the value of logado
     *
     * @return  self
     */ 
    public function setLogado($logado)
    {
        $this->logado = $logado;

        return $this;
    }

}
