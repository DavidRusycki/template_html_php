<?php
namespace Controller;

/**
 * Controller de manutenção base.
 * A ideia do controlador é apenas de definir uma interface para outros possíveis controladores de manutenção, ou seja definir o que todos os controllerManutencao do sistema devem ter.
 * @author David Rusycki
 * @since 06/03/2022
 */
class ControllerManutencao extends Controller
{
    
    public function getInstanceTela() {}
    
    protected function criaTela() {}

}

