<?php

namespace Tests;

use BankOn\Cliente;
use BankOn\Services\Financeiro\NovaTransferencia;
use BankOn\Services\Financeiro\Transferencia;

class NovaTransferenciaTest extends TestCase
{
   /* public function testNovaTransferencia()
    {
        $env_token = \getenv('TOKEN_TRANSACAO');

        $cliente = new Cliente;
        $cliente->setTokenTransacao($env_token);

        $transferencia = new Transferencia;
        $transferencia->setBeneficiario('test');
        $transferencia->setValor(1);
        $transferencia->setIdTransferencia('test');

        $novaTransferencia = new NovaTransferencia;
        $novaTransferencia->executar($cliente,$transferencia);
    }*/
}