<?php
namespace View;

/**
 * Classe de consulta das rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ViewConsultaRotinas
{
 
    public function __toString() {
        $oTable = new \Html\Table(['codigo', 'nome'], 100, \Components\FacadeDb\Postgres::getInstance()->select('select * from tbrotina'));
        return $oTable;
    }
    
}

