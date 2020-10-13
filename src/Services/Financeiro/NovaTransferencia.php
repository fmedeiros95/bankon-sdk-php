<?php

namespace BankOn\Services\Financeiro;

use BankOn\Cliente;
use BankOn\Http\Api;
use BankOn\Http\Endpoint;
use BankOn\Exceptions\BankOnException;
use BankOn\Services\Financeiro\Transferencia;
use BankOn\Services\Financeiro\Resposta;

class NovaTransferencia
{

    public function executar(Cliente $cliente, Transferencia $transferencia)
    {

        $response = self::postResponse($cliente, $transferencia);

        $arr = \json_decode($response->getBody(), true)['dados'];

        $resposta = new Resposta;
        $resposta->setTransacao($arr['transacao']);
        $resposta->setFavorecido($arr['favorecido']);
        $resposta->setFavorecidoUser($arr['favorecido_user']);
        $resposta->setData($arr['data']);
        $resposta->setHora($arr['hora']);
        $resposta->setValor($arr['valor']);

        return $resposta;
    }

    public static function postResponse(Cliente $cliente, Transferencia $transferencia)
    {


        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::POST, Endpoint::FINANCEIRO_TRANSFERENCIA, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authentication' => $cliente->getTokenTransacao()
            ],
            'json' => [
                'beneficiario' => $transferencia->getBeneficiario(),
                'valor' => $transferencia->getValor(),
                'id_transferencia' => $transferencia->getIdTransferencia()
            ]
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BankOnException($arr['message']);
        }

        return $response;
    }

}