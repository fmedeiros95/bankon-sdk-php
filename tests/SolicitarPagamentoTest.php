<?php

namespace Tests;

use BankOn\Cliente;
use BankOn\Services\Checkout\SolicitarPagamento;
use BankOn\Services\Checkout\Solicitar;

class SolicitarPagamentoTest extends TestCase
{
    public function testSolicitarPagamento()
    {
        $env_token = \getenv('TOKEN_TRANSACAO');

        $cliente = new Cliente;
        $cliente->setTokenTransacao($env_token);

        $solicitar = new Solicitar;
        $solicitar->setEmail('test@gmail.com');
        $solicitar->setValor(100);
        $solicitar->setRefPagamento('test');
        $solicitar->setUrlCallbackSuccesso('http://www.seudominio.com.br/url-sucesso');
        $solicitar->setUrlCallbackFalha('http://www.seudominio.com.br/url-falha');

        $solicitarPagamento = new SolicitarPagamento;
        $resposta = $solicitarPagamento->executar($cliente, $solicitar);

        $this->assertEquals($resposta->getUrlPagamento(), "https://api.bankon.com.br/checkout/p/" . $resposta->getTokenPagamento());
    }
}
