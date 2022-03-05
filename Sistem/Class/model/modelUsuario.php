<?php
namespace Model;
use Components\FacadeDb\Manager;

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
    private Manager $Db;

    /**
     * Retorna um model de usuário baseado no código do usuário.
     */
    public function getUsuarioFromCodigo($iCodigo) 
    {
        $xRetorno = $this->getDb()->select("select * from tbusuario where codigo = {$iCodigo}");
        if (is_array($xRetorno)) {
            $aLinha = end($xRetorno);
            $oNewModel = new Self();
            $oNewModel->setDb($this->getDb());
            $oNewModel->setCodigo($aLinha['codigo']);
            $oNewModel->setNome($aLinha['nome']);

            $xRetorno = $oNewModel;
        }
        return $xRetorno;
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

    /**
     * Get the value of Db
     */ 
    public function getDb()
    {
        return $this->Db;
    }

    /**
     * Set the value of Db
     *
     * @return  self
     */ 
    public function setDb($Db)
    {
        $this->Db = $Db;

        return $this;
    }
}
