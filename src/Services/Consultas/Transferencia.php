<?php

namespace BankOn\Services\Consultas;

use BankOn\Cliente;
use BankOn\Http\Api;
use BankOn\Http\Endpoint;
use BankOn\Exceptions\BankOnException;
use Carbon\Carbon;

class Transferencia
{
    private $data;
    private $dataCarbon;
    private $valor;
    private $origemUsuario;
    private $origemNome;
    private $origemDocumento;
    private $destinoUsuario;
    private $destinoNome;
    private $destinoDocumento;
    public static function get(Cliente $cliente, $codigo)
    {

        $response = self::getResponse($cliente, $codigo);

        $arr = \json_decode($response->getBody(), true)['Dados'];

        $transferencia = new Transferencia;
        $transferencia->setData($arr['data']);
        $transferencia->setValor($arr['valor']);
        $transferencia->setOrigemUsuario($arr['origem']['usuario']);
        $transferencia->setOrigemNome($arr['origem']['nome']);
        $transferencia->setOrigemDocumento($arr['origem']['documento']);
        $transferencia->setDestinoUsuario($arr['destino']['usuario']);
        $transferencia->setDestinoNome($arr['destino']['nome']);
        $transferencia->setDestinoDocumento($arr['destino']['documento']);

        return $transferencia;
    }

    public static function getResponse(Cliente $cliente, $codigo)
    {


        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::GET, Endpoint::CONSULTAS_TRANSFERENCIAS . '/' . $codigo, [
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
     * Get the value of data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @return  self
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of valor
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of origemUsuario
     */
    public function getOrigemUsuario()
    {
        return $this->origemUsuario;
    }

    /**
     * Set the value of origemUsuario
     *
     * @return  self
     */
    public function setOrigemUsuario($origemUsuario)
    {
        $this->origemUsuario = $origemUsuario;

        return $this;
    }

    /**
     * Get the value of origemNome
     */
    public function getOrigemNome()
    {
        return $this->origemNome;
    }

    /**
     * Set the value of origemNome
     *
     * @return  self
     */
    public function setOrigemNome($origemNome)
    {
        $this->origemNome = $origemNome;

        return $this;
    }

    /**
     * Get the value of origemDocumento
     */
    public function getOrigemDocumento()
    {
        return $this->origemDocumento;
    }

    /**
     * Set the value of origemDocumento
     *
     * @return  self
     */
    public function setOrigemDocumento($origemDocumento)
    {
        $this->origemDocumento = $origemDocumento;

        return $this;
    }

    /**
     * Get the value of destinoUsuario
     */
    public function getDestinoUsuario()
    {
        return $this->destinoUsuario;
    }

    /**
     * Set the value of destinoUsuario
     *
     * @return  self
     */
    public function setDestinoUsuario($destinoUsuario)
    {
        $this->destinoUsuario = $destinoUsuario;

        return $this;
    }

    /**
     * Get the value of destinoNome
     */
    public function getDestinoNome()
    {
        return $this->destinoNome;
    }

    /**
     * Set the value of destinoNome
     *
     * @return  self
     */
    public function setDestinoNome($destinoNome)
    {
        $this->destinoNome = $destinoNome;

        return $this;
    }

    /**
     * Get the value of destinoDocumento
     */
    public function getDestinoDocumento()
    {
        return $this->destinoDocumento;
    }

    /**
     * Set the value of destinoDocumento
     *
     * @return  self
     */
    public function setDestinoDocumento($destinoDocumento)
    {
        $this->destinoDocumento = $destinoDocumento;

        return $this;
    }

    /**
     * Get the value of dataCarbon
     */
    public function getDataCarbon()
    {
        $this->dataCarbon = new Carbon($this->data);
        return $this->dataCarbon;
    }

    /**
     * Set the value of dataCarbon
     *
     * @return  self
     */
    public function setDataCarbon($dataCarbon)
    {
        $this->dataCarbon = $dataCarbon;

        return $this;
    }
}
