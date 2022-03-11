<?php
namespace Controller;
use \View\ViewConsultaPessoa;

/**
 * Controller Consulta de rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ControllerConsultaPessoa extends ControllerConsulta
{
    
    /**
     * {@inheritDoc}
     */
    public function getInstanceTela() {
        return new ViewConsultaPessoa($this);
    }
    
}