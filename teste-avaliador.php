<?php

use App\Leilao\Model\Lance;
use App\Leilao\Model\Leilao;
use App\Leilao\Model\Usuario;
use App\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

// Arrage - Given
$leilao = new Leilao('Fiat 147 0Km');
$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

// Act - When
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

// Assert - Then
$maiorValor = $leiloeiro->getMaiorValor();

$valorEsperado = 2500;

if ($valorEsperado == $maiorValor) {
    echo 'TESTE OK';
} else {
    echo 'TESTE FALHOU';
}
