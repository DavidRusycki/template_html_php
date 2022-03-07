<?php
namespace Controller;
use \View\ViewManutencaoLogin;

/**
 * Controller de manutenção para login no sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ControllerConsultaLogin extends ControllerConsulta
{
    
    /**
     * {@inheritDoc}
     */
    public function getInstanceTela() {
       return new ViewManutencaoLogin($this); 
    }
    
    /**
     * {@inheritDoc}
     */
    protected function criaTela() {}

}

