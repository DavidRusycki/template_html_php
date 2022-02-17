<?php
require_once('templateHtml.php');
require_once('DocType.php');
require_once('Head.php');
require_once('Title.php');
require_once('Body.php');

$oHead = new Head([new Meta("UTF-8"), new Meta(null, "X-UA-Compatible", "IE=edge"), new Meta(null, null, "width=device-width, initial-scale=1.0", "viewport")], new Title('Samuel'));
$oBody = new Body('<h1>Teste David</h1>');
$oHtml = new Html('pt-BR', $oHead, $oBody);

$oTemplate = new templateHtml( new DocType(), $oHtml);

echo $oTemplate;