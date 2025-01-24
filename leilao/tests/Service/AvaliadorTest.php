<?php

namespace Alura\Leilao\Tests\Service;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    public function testAvaliadorDeveEncontrarMaiorValorOrderCrescente()
    {
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

        self::assertEquals(5650, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarMaiorValorOrderDecrescente()
    {
        //Arrumar a casa / Organizar teste
        $leilao = new Leilao('Marea Fiat');

        $joao = new Usuario('joao');
        $julio = new Usuario('julio');

        $leilao->recebeLance(new Lance($julio, 5650));
        $leilao->recebeLance(new Lance($joao, 2000));

        // Executar código a ser testado
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        //verificar retorno
        $maiorValor = $leiloeiro->getMaiorValor();

        self::assertEquals(5650, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarMenorValorOrderDecrescente()
    {
        //Arrumar a casa / Organizar teste
        $leilao = new Leilao('Marea Fiat');

        $joao = new Usuario('joao');
        $julio = new Usuario('julio');

        $leilao->recebeLance(new Lance($julio, 5650));
        $leilao->recebeLance(new Lance($joao, 2000));

        // Executar código a ser testado
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        //verificar retorno
        $menorValor = $leiloeiro->getMenorValor();

        self::assertEquals(2000, $menorValor);
    }

    public function testAvaliadorDeveEncontrarMenorValorOrderCrescente()
    {
        //Arrumar a casa / Organizar teste
        $leilao = new Leilao('Marea Fiat');

        $joao = new Usuario('joao');
        $julio = new Usuario('julio');

        $leilao->recebeLance(new Lance($joao, 2000));
        $leilao->recebeLance(new Lance($julio, 5650));

        // Executar código a ser testado
        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        //verificar retorno
        $menorValor = $leiloeiro->getMenorValor();

        self::assertEquals(2000, $menorValor);
    }
}