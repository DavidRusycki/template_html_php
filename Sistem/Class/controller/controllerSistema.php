<?php
namespace Sistem;

use Components\FacadeDb\Manager;
use Components\FacadeDb\Postgres;
use Model\ModelSistema;
/**
 * Controller Principal do sistema.
 * @author David Rusycki
 * @since 04/03/2022
 */
class ControllerSistema  
{
    
    private $tela;
    private ModelSistema $model;
    private Manager $Db;

    private function __construct() {}

    public static function init() : void
    {
        $oController = self::getNewSelf();
        $oController->setDb(Postgres::getInstance());
        $oController->setModel(new ModelSistema());
        $oController->loadUsuario();
        $oController->trataDadosRequisicao();
        $oController->imprimeTela();
    }

    /**
     * Retorna uma instância dele mesmo.
     */
    private static function getNewSelf() : self
    {
        return new Self();
    }

    /**
     * Valida as informações, para saber qual tela abrir se deve ou não alterar alguma informação etc.
     */
    public function trataDadosRequisicao() 
    {
        if ($this->isLogado()) {
            $this->validaParametros();
        }
    }

    /**
     * Carrega as informações relacionadas ao usuário do sistema.
     */
    public function loadUsuario() : void
    {
        //TODO Colocar constante no lugar da string das situações.
        if ($_SESSION['usuario'] && $_SESSION['logado']) {
            $this->getModel()->getUsuario()->setDb($this->getDb());
            // Verificar se o usuário está logado e buscar as informações dele para o modelo.
            $oUsuario = $this->getModel()->getUsuario()->getUsuarioFromCodigo($_SESSION['usuario']);
            if (is_object($oUsuario)) 
            {
                $oUsuario->setLogado($_SESSION['logado']);
            }
            else 
            {
                unset($_SESSION['usuario']);
                unset($_SESSION['logado']);
            }
        }
        else {
            //TODO Colocar constante no lugar da string da rotina.
            header('Location: index.php/pg=login');
        }
    }

    /**
     * Retorna se o usuário está logado.
     */
    private function isLogado() : bool
    {
        return $this->getModel()->getUsuario()->getLogado();
    }

    /**
     * Valida os parametros da requisição para fazer o redirecionamento de acordo com os parametros.
     */
    private function validaParametros() 
    {
        if ($_GET['pagina'] && $_GET['acao'])
        {

        }
        else if ($_GET['pagina'])
        {

        }
    }

    /**
     * Imprime a tela.
     */
    public function imprimeTela() : void
    {
        $bResult = isset($this->getTela());
        if ($bResult) {
            echo $this->getTela();
        }
    }

    /**
     * Get the value of tela
     */ 
    public function getTela()
    {
        return $this->tela;
    }

    /**
     * Set the value of tela
     *
     * @return  self
     */ 
    public function setTela($tela)
    {
        $this->tela = $tela;

        return $this;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of Db
     */ 
    public function getDb()
    {
        return $this->Db;
    }

    /**
     * Set the value of Db
     *
     * @return  self
     */ 
    public function setDb($Db)
    {
        $this->Db = $Db;

        return $this;
    }
}

