<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require_once (dirname(__FILE__) ."/vendor/autoload.php");

//Arrumar a casa / Organizar teste
$leilao = new Leilao('Marea Fiat');

$joao = new Usuario('joao');
$julio = new Usuario('julio');

$leilao->recebeLance(new Lance($joao, 5000));
$leilao->recebeLance(new Lance($julio, 5650));

// Executar código a ser testado
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

//verificar retorno
$maiorValor = $leiloeiro->getMaiorValor();

echo $maiorValor;