<?php
namespace Controller;

use Components\FacadeDb\Manager;
use Components\FacadeDb\Postgres;
use \Enum\EnumSistema;
use \Enum\EnumAcoes;
use \Model\ModelSistema;
use \Model\ModelRotina;
use \ModelBo\ModelBoRotina;
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

    /**
     * Inicia o sistema.
     * @return void
     */
    public static function init() : void
    {
        $oController = self::getNewSelf();
        $oController->setDb(Postgres::getInstance());
        $oController->setModel(self::getNewModelSistema());
        $oController->getModel()->setGet($_GET);
        $oController->loadUsuario();
        $oController->trataDadosRequisicao();
        $oController->imprimeTela();
    }
    
    /**
     * Retorna uma instância dele mesmo.
     * @return self
     */
    private static function getNewSelf() : self
    {
        return new Self();
    }

    /**
     * @return ModelSistema
     */
    public static function getNewModelSistema() : ModelSistema
    {
        return new ModelSistema();
    }
    
    /**
     * Carrega as informações relacionadas ao usuário do sistema.
     */
    public function loadUsuario() : void
    {
        if (isset($_SESSION[EnumSistema::USUARIO]) && $_SESSION[EnumSistema::USUARIO] && isset($_SESSION[EnumSistema::LOGADO]) && $_SESSION[EnumSistema::LOGADO]) {
            /* Carrega as informações de usuário para que o sistema possa utilizar */
            $this->trataUsuario();
        }
        else {
            /* Cair aqui indica que o usuário não está logado então redireciona a aplicação para o Login */
            $this->direcionaLogin();
        }
    }
    
    /**
     * Carrega o usuário ou limpa as informações de usuário do sistema.
     * @return void
     */
    private function trataUsuario() : void
    {
        $this->getModel()->getUsuario()->setDb($this->getDb());
        $oUsuario = $this->getModel()->getUsuario()->getUsuarioFromCodigo($_SESSION[EnumSistema::USUARIO]);
        if (is_object($oUsuario))
        {
            $oUsuario->setLogado($_SESSION[EnumSistema::LOGADO]);
            $oUsuario->setDb($this->getDb());
            $this->getModel()->setUsuario($oUsuario);
        }
        else 
        {
            unset($_SESSION[EnumSistema::USUARIO]);
            unset($_SESSION[EnumSistema::LOGADO]);
        }
    }
    
    /**
     * Define a tela para ser a tela de login.
     * @return void
     */
    private function direcionaLogin() : void
    {
        $this->getModel()->defineGet(EnumSistema::ACAO, EnumAcoes::INCLUIR);
        $this->getModel()->defineGet(EnumSistema::PG, EnumSistema::PG_LOGIN);
    }
    
    /**
     * Retorna se o usuário está logado.
     */
    private function isLogado() : bool
    {
        return $this->getModel()->getUsuario()->getLogado();
    }
    
    /**
     * Valida as informações, para saber qual tela abrir se deve ou não alterar alguma informação etc.
     */
    public function trataDadosRequisicao() 
    {
        $this->validaParametros();
    }
    
    /**
     * Valida os parametros da requisição para fazer o redirecionamento de acordo com os parametros.
     */
    private function validaParametros() 
    {
        if (array_key_exists(EnumSistema::PG, $this->Get())) 
        {
            if ($this->Get(EnumSistema::PG) && $this->Get(EnumSistema::ACAO))
            {
                $sPg = $this->Get(EnumSistema::PG);
                $iAcao = $this->Get(EnumSistema::ACAO);
                $this->getControllerFromPageAction($sPg, $iAcao);
            }
            else if ($this->Get(EnumSistema::PG))
            {
                $this->getControllerFromPageAction($sPg);
            }
        }
        else
        {
            // Caso não tenha página definida direciona para o menu de rotinas.
            $this->getControllerFromPageAction(EnumSistema::ROTINAS);
        }
    }

    /**
     * Retorna o controller baseado na página e na ação.
     * @return object
     */
    private function getControllerFromPageAction($sNome, $iAcao = EnumAcoes::CONSULTAR) : object
    {
        $oController = false;
        $oRotina = new ModelRotina();
        $oRotina->setDb($this->getDb());
        $oBoRotina = new \ModelBo\ModelBoRotina($oRotina);
        
        $bExiste = $oBoRotina->validaRotinaExiste($sNome);
        
        if ($bExiste) 
        {
            $sNomeRotinaTratado = $oRotina->getNomeTratado($sNome);
            $sPrefix = $iAcao == EnumAcoes::CONSULTAR ? 'ControllerConsulta' : 'ControllerManutencao';
            $sController = '\Controller\\' . $sPrefix . $sNomeRotinaTratado; 
            if (class_exists($sController))
            {
                $oController = new $sController();
            }
            else 
            {
                throw new \Exception('Classe não existe: '. $sController);
            }
        }
        $this->setControllerRequisicao($oController);
        return $oController;
    }
    
    /**
     * Método para padronizar o acesso GET
     * @param Mixed $xIndice
     * @return Mixed
     */
    public function Get($xIndice = null)
    {
        $xRetorno = null;
        if (is_null($xIndice)) 
        {
            $xRetorno = $this->getModel()->getGet();
        }
        else 
        {
          $xRetorno = $this->getModel()->getGet()[$xIndice];
        }
        return $xRetorno;
    }
    
    /**
     * Imprime a tela.
     */
    public function imprimeTela() : void
    {
        $bResult = empty($this->getControllerRequisicao());
        if (!$bResult) 
        {
            echo $this->getControllerRequisicao()->imprimeTela();
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
    
    public function getControllerRequisicao() 
    {
        return $this->getModel()->getControllerRequisicao();
    }

    public function setControllerRequisicao($ControllerRequisicao) 
    {
        $this->getModel()->setControllerRequisicao($ControllerRequisicao);
        return $this;
    }
    
    
}

