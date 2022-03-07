<?php
namespace View;

use Enum\EnumAcoes;
use Enum\EnumSistema;
use Html\A;
use Html\Button;
use Html\Div;
use Html\Form;
use Html\H1;
use Html\Input;
use Html\Label;
use Html\Main;
use Html\P;

/**
 * Classe de consulta das rotinas do sistema.
 * @author David Rusycki
 * @since 05/03/2022
 */
class ViewManutencaoLogin extends ViewManutencao
{
    
    /**
     * {@inheritDoc}
     */
    public function addComponentesHead() {
        $this->getHead()->addOthers(' <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/"> ');
        $this->getHead()->addOthers(' <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> ');
        $this->getHead()->addOthers(' <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> ');
        $this->getHead()->addOthers(' <link href="signin.css" rel="stylesheet"> ');
        $this->getHead()->addOthers(' <link rel="stylesheet" href="http://localhost/template_html_php/sistem/style/login.css"> ');
    }
    
    /**
     * {@inheritDoc}
     */
    public function addComponentesBody() {
        $this->getBody()->setClass('text-center');
        
        $oCampoUsuario = new Input('text', 'usuario', 'name@example.com', 'floatingInput');
        $oCampoUsuario->setClass('form-control');
        $oLabelCampoUsuario = new Label('floatingInput', 'Usuário');
        
        $oDivUsuario = new Div();
        $oDivUsuario->setClass('form-floating');
        $oDivUsuario->addComponente($oCampoUsuario);
        $oDivUsuario->addComponente($oLabelCampoUsuario);
        
        $oCampoSenha = new Input('password', 'senha', 'Password', 'floatingPassword');
        $oCampoSenha->setClass('form-control');
        $oLabelCampoSenha = new Label('floatingPassword', 'Senha');
        
        $oDivSenha = new Div();
        $oDivSenha->setClass('form-floating');
        $oDivSenha->addComponente($oCampoSenha);
        $oDivSenha->addComponente($oLabelCampoSenha);
        
        $oButton = new Button('submit', 'Entrar');
        $oButton->setClass('w-100 btn btn-lg btn-success');
        
        $oLinkCadastro = new A('Cadastrar', 'localhost/template_html_php?{$pAcao}={$sAcao}&{$pRotina}=login&{$pMetodo}={$sMetodo}');
        
        $oParagrafo = new P('&copy; 2021');
        $oParagrafo->setClass('mt-5 mb-3 text-muted');
        
        $pAcao = EnumSistema::ACAO;
        $sAcao = EnumAcoes::INCLUIR;
        $pRotina = EnumSistema::PG;
        $pMetodo = EnumSistema::METODO;
        $sMetodo = EnumSistema::PROCESSA_DADOS;
        
        $oForm = new Form("?{$pAcao}={$sAcao}&{$pRotina}=login&{$pMetodo}={$sMetodo}", 'POST');
        
        $oForm->addComponente(new H1('Login', 'h3 mb-3 fw-normal'));
        $oForm->addComponente($oDivUsuario);
        $oForm->addComponente($oDivSenha);
        $oForm->addComponente($oButton);
        $oForm->addComponente($oLinkCadastro);
        $oForm->addComponente($oParagrafo);
        
        $oMain = new Main();
        $oMain->setClass('form-signin');
        $oMain->addComponente($oForm);
        
        $this->getBody()->addComponente($oMain);
    }
    
}

