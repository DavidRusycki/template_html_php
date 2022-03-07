<?php
namespace Controller;
use \View\ViewManutencaoLogin;

/**
 * Controller de manutenção para login no sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ControllerManutencaoLogin extends ControllerManutencao
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
    public function processaDadosInclusao() {
        parent::processaDadosInclusao();
        $oModel = $this->getInstanceModel();
        $oModel->setDadosPost($this->getModelSistema()->getPost());
        $oModel->setDb($this->getModelSistema()->getDb());
        $this->validaLogin($oModel);
    }
    
    public function validaLogin($oModel)
    {
        $bValido = $oModel->validaLogin();
        
        $oModelUsuario = new \Model\ModelUsuario();
        $oModelUsuario->setDb($this->getModelSistema()->getDb());
        $oModelUsuario = $oModelUsuario->getUsuarioFromNome($oModel->getUsuario());
        
        if ($bValido) {
           $_SESSION[\Enum\EnumSistema::LOGADO] = true;
           $_SESSION[\Enum\EnumSistema::USUARIO] = $oModelUsuario->getCodigo();
           $this->setTela(new \View\ViewConsultaRotinas($this->getControllerSistema()));
        }
        
        return $bValido;
    }
    
    /**
     * {@inheritDoc}
     */
    protected function criaTela() {}

    public function getInstanceModel() {
        return new \Model\ModelLogin();
    }

}

