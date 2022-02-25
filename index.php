<?php
require_once('templateHtml.php');
require_once('DocType.php');
require_once('Head.php');
require_once('Title.php');
require_once('Body.php');
require_once('Table.php');

$oHead = new Head([new Meta("UTF-8"), new Meta('', "X-UA-Compatible", "IE=edge"), new Meta('', '', "width=device-width, initial-scale=1.0", "viewport")], new Title('Samuel'));
$oBody = new Body('<h1>Teste David</h1>');

$aConteudo = [['codigo' => 1, 'nome' => 'david'], ['codigo' => 2, 'nome' => 'samuel'], ['codigo' => 3, 'nome' => 'paulo']];

$oBody->addComponente(new Table(['Código', 'Nome'], 2, $aConteudo));
$oHtml = new Html('pt-BR', $oHead, $oBody);

$oTemplate = new templateHtml(new DocType(), $oHtml);

echo $oTemplate;