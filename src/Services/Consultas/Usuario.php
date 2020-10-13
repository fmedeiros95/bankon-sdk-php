<?php

namespace BankOn\Services\Consultas;

use BankOn\Cliente;
use BankOn\Http\Api;
use BankOn\Http\Endpoint;
use BankOn\Exceptions\BankOnException;

class Usuario
{
    private $documento;
    private $nome;
    private $usuario;
    private $email;
    private $cidade;
    private $estado;

    public static function get(Cliente $cliente, $usuario)
    {

        $response = self::getResponse($cliente, $usuario);

        $arr = \json_decode($response->getBody(), true)['Dados'];

        $usuario = new Usuario;
        $usuario->setDocumento($arr['documento']);
        $usuario->setNome($arr['nome']);
        $usuario->setUsuario($arr['usuario']);
        $usuario->setEmail($arr['email']);
        $usuario->setCidade($arr['localidade']['cidade']);
        $usuario->setEstado($arr['localidade']['estado']);

        return $usuario;
    }

    public static function getResponse(Cliente $cliente, $usuario)
    {


        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::GET, Endpoint::CONSULTAS_USUARIO . '/' . $usuario, [
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
     * Get the value of documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of documento
     *
     * @return  self
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
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
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
