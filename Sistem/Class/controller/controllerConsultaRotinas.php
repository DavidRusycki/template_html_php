<?php
namespace Controller;
use \View\ViewConsultaRotinas;

/**
 * Controller Consulta de rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ControllerConsultaRotinas extends ControllerConsulta
{
    
    /**
     * {@inheritDoc}
     */
    public function getInstanceTela() {
        return new ViewConsultaRotinas($this);
    }
    
}