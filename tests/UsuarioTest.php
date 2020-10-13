<?php

namespace Tests;

use BankOn\Cliente;
use BankOn\Services\Consultas\Usuario;

class UsuarioTest extends TestCase
{
    public function testUsuario()
    {
        $env_token = \getenv('TOKEN_CONSULTA');
        $env_usuario = \getenv('SEU_USUARIO');

        $cliente = new Cliente;
        $cliente->setTokenConsulta($env_token);

        $usuario = Usuario::get($cliente, $env_usuario);

        $this->assertEquals($usuario->getUsuario(), $env_usuario);
    }
}
