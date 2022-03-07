<?php
namespace Model;
use Components\FacadeDb\Manager;

/**
 * Modelo de Rotina
 * @author David Rusycki
 * @since 05/03/2022
 */
class ModelRotina extends Model
{

    private $codigo;
    private $nome;
    
    /**
     * Retorna as rotinas do sistema.
     * @return Array
     */
    public function buscaAllRotinas()
    {
        $xResult = $this->getDb()->select("select * from tbrotina;");
        
        return $xResult;
    }
    
    /**
     * Busca a rotina pelo nome.
     * @param String $sNome
     * @return self|bool
     */
    public function buscaRotinaFromNome($sNome) : self|bool
    {
        $xRetorno = false;
        $xResult = $this->getDb()->select("select * from tbrotina where nome = '{$sNome}'; ");
        if (!!$xResult) 
        {
            $xResult = end($xResult);
            $oRotina = new Self();
            $oRotina->setCodigo($xResult['codigo'])
                    ->setNome($xResult['nome']);
            $xRetorno = $oRotina;
        }
        
        return $xRetorno;
    }
    
    /**
     * Busca a rotina pelo código
     * @param Integer $iCodigo
     * @return self|bool
     */
    public function buscaRotinaFromCodigo($iCodigo) : self|bool
    {
        $xRetorno = false;
        $xResult = $this->getDb()->select("select * from tbrotina where codigo = {$iCodigo}; ");
        if (!!$xResult) 
        {
            $xResult = end($xResult);
            $oRotina = new Self();
            $oRotina->setCodigo($xResult['codigo'])
                    ->setNome($xResult['nome']);
            $xRetorno = $oRotina;
        }
        
        return $xRetorno;
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
