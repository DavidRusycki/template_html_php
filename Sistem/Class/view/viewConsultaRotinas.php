<?php
namespace View;

use Html\H1;
use Html\Table;
use Model\ModelRotina;

/**
 * Classe de consulta das rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ViewConsultaRotinas extends ViewConsulta
{
    /**
     * Retorna o Model da tela
     * @return ModelRotina
     */
    public function getInstanceModel()
    {
        $oModel = new ModelRotina();
        $oModel->setDb($this->getController()->getDb());
        return $oModel;
    }
    
    /**
     * {@inheritDoc}
     */
    public function addComponentesBody() {
        $this->getBody()->addComponente(new H1('Tela de rotinas'));
        $this->getBody()->addComponente(new Table(['Código', 'Nome'], 2, $this->getInstanceModel()->buscaAllRotinas()));
    }
    
}

