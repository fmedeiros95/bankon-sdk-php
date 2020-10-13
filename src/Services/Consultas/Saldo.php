<?php

namespace BankOn\Services\Consultas;

use BankOn\Cliente;
use BankOn\Http\Api;
use BankOn\Http\Endpoint;
use BankOn\Exceptions\BankOnException;

class Saldo
{
    private $usuario;
    private $valorDisponivel;
    public static function get(Cliente $cliente)
    {

        $response = self::getResponse($cliente);

        $arr = \json_decode($response->getBody(), true)['Dados'];

        $saldo = new Saldo;
        $saldo->setUsuario($arr['usuario']);
        $saldo->setValorDisponivel($arr['saldo_disponivel']);

        return $saldo;
    }


    public static function getResponse(Cliente $cliente)
    {


        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::GET, Endpoint::CONSULTAS_SALDO, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authentication' => $cliente->getTokenConsulta()
            ]
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BankOnException($arr['message']);
        }

        return $response;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     *
     * @return  self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get the value of valorDisponivel
     */
    public function getValorDisponivel()
    {
        return $this->valorDisponivel;
    }

    /**
     * Set the value of valorDisponivel
     *
     * @return  self
     */
    public function setValorDisponivel($valorDisponivel)
    {
        $this->valorDisponivel = $valorDisponivel;

        return $this;
    }
}
