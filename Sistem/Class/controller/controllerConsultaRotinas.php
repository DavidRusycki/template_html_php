<?php
namespace Controller;

/**
 * Controller Consulta de rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ControllerConsultaRotinas
{
        
    private $tela;
    
    public function imprimeTela()
    {
        echo $this->getTela();
    }
    
    public function getTela() {
        return $this->tela;
    }

    public function setTela($tela): void {
        $this->tela = $tela;
    }
    
}

