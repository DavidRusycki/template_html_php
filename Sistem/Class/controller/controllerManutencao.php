<?php
namespace Controller;

use Enum\EnumAcoes;

/**
 * Controller de manutenção base.
 * A ideia do controlador é apenas de definir uma interface para outros possíveis controladores de manutenção, ou seja definir o que todos os controllerManutencao do sistema devem ter.
 * @author David Rusycki
 * @since 06/03/2022
 */
abstract class ControllerManutencao extends Controller
{
    
    public abstract function getInstanceTela();
    public abstract function getInstanceModel();
    
    protected function criaTela() {}

    /**
     * Define a forma como os dados serão processados.
     */
    public function processaDados() {
        $iAcao = $this->getModelSistema()->getAcao();
        switch ($iAcao) {
            case EnumAcoes::INCLUIR:
                $this->processaDadosInclusao();
                break;
            case EnumAcoes::ALTERAR:
                $this->processaDadosAlteracao();
                break;
            case EnumAcoes::EXCLUIR:
                $this->processaDadosExclusao();
                break;

            default:
                $this->processaDadosOutrasAcoes();
                break;
        }
    }
    
    /**
     * Método a ser sobreescrito para tratar a ação.
     */
    public function processaDadosInclusao() {}
    /**
     * Método a ser sobreescrito para tratar a ação.
     */
    public function processaDadosAlteracao() {}
    /**
     * Método a ser sobreescrito para tratar a ação.
     */
    public function processaDadosExclusao() {}
    /**
     * Método a ser sobreescrito para tratar ações que não são "padrões".
     */
    public function processaDadosOutrasAcoes() {}
    
}

