<?php

namespace Tests;

use BankOn\Cliente;
use BankOn\Services\Consultas\Saldo;

class SaldoTest extends TestCase
{
    public function testSaldo()
    {
        $env_token = \getenv('TOKEN_CONSULTA');
        $env_usuario = \getenv('SEU_USUARIO');

        $cliente = new Cliente;
        $cliente->setTokenConsulta($env_token);

        $saldo = Saldo::get($cliente);
        
        $this->assertEquals($saldo->getUsuario(), $env_usuario);
    }
}
