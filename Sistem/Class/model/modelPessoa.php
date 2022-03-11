<?php
namespace Model;
use Components\FacadeDb\Manager;

/**
 * Modelo de Pessoa
 * @author David Rusycki
 * @since 05/03/2022
 */
class ModelPessoa extends Model
{

    private $codigo;
    private $nome;
    
    /**
     * Retorna as rotinas do sistema.
     * @return Array
     */
    public function buscaAllPessoas()
    {
        $xResult = $this->getDb()->select("select * from tbpessoa;");
        
        return $xResult;
    }
    
    /**
     * Retorna o nome tratado.
     * @param String $sNome
     * @return String
     */
    public function getNomeTratado($sNome = null) : string
    {
        $sNome = ucfirst(is_null($sNome) ? $this->getNome() : $sNome);
        return $sNome;
    }
    
    public function getCodigo() 
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getNome() 
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
 
}
