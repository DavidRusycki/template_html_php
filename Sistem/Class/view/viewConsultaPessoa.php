<?php
namespace View;

use Html\H1;
use Html\Table;
use Model\ModelPessoa;

/**
 * Classe de consulta de Pessoa.
 * @author David Rusycki
 * @since 10/03/2022
 */
class ViewConsultaPessoa extends ViewConsulta
{
    const PG_LOCAL = 'pessoa';
    
    /**
     * Retorna o Model da tela
     * @return ModelRotina
     */
    public function getInstanceModel()
    {
        $oModel = new ModelPessoa();
        $oModel->setDb($this->getController()->getDb());
        return $oModel;
    }
    
    /**
     * {@inheritDoc}
     */
    public function addComponentesBody() {
        $this->getBody()->addComponente(new H1('Consulta de Pessoas', 'titulo_principal'));
        $oTable = new Table(['Código', 'Nome', 'Ações'], 100, $this->getInstanceModel()->buscaAllPessoas(), self::PG_LOCAL);
        $oTable->setClass('table table-hover table-sm w-75 p-3 mx-auto');
        $this->getBody()->addComponente($oTable);
    }
    
}

