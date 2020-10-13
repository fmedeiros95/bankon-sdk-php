<?php

namespace Tests;

use BankOn\Cliente;
use BankOn\Services\Consultas\Saldo;
use BankOn\Exceptions\BankOnException;

class SaldoExceptionTest extends TestCase
{
    public function testSaldo()
    {
        $this->expectException(BankOnException::class);
        $env_token = \getenv('TOKEN_CONSULTAx');

        $cliente = new Cliente;
        $cliente->setTokenConsulta($env_token);

        Saldo::get($cliente);
    }
}
