<?php
namespace View;

/**
 * Classe de consulta das rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ViewConsultaRotinas extends ViewConsulta
{

    /**
     * {@inheritDoc}
     */
    public function addComponentesBody() {
        $this->getBody()->addComponente(new \Html\H1('Nois é Pika parça tela de rotinas'));
    }
    
}

