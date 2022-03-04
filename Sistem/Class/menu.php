<?php
namespace Sistem\Class;
use Html\Body;
use Html\Head;
use Html\Html;
use Html\Meta;
use Html\Table;
use Html\Title;
use Html\DocType;
use Html\templateHtml;
/**
 * Classe de menu do sistema.
 * @author David Rusycki
 * @since 03/03/2022
 */
class Menu  
{
    
    public function __toString()
    {
        
        $oHead = new Head([new Meta("UTF-8"), new Meta('', "X-UA-Compatible", "IE=edge"), new Meta('', '', "width=device-width, initial-scale=1.0", "viewport")], new Title('Samuel'));
        $oBody = new Body('<h1>Teste David</h1>');

        $aConteudo = [['codigo' => 1, 'nome' => 'david'], ['codigo' => 2, 'nome' => 'samuel'], ['codigo' => 3, 'nome' => 'paulo']];

        $oBody->addComponente(new Table(['Código', 'Nome'], 1, $aConteudo));
        $oHtml = new Html('pt-BR', $oHead, $oBody);

        $oTemplate = new templateHtml(new DocType(), $oHtml);

        return $oTemplate;
    }        

}

