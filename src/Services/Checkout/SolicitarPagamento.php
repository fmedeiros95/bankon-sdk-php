<?php

namespace BankOn\Services\Checkout;

use BankOn\Cliente;
use BankOn\Http\Api;
use BankOn\Http\Endpoint;
use BankOn\Exceptions\BankOnException;
use BankOn\Services\Checkout\Solicitar;
use BankOn\Services\Checkout\Resposta;

class SolicitarPagamento
{
    
    public function executar(Cliente $cliente, Solicitar $solicitar)
    {

        $response = self::postResponse($cliente, $solicitar);

        $arr = \json_decode($response->getBody(), true)['Dados'];

        $resposta = new Resposta;
        $resposta->setTokenPagamento($arr['token_pagamento']);
        $resposta->setUrlPagamento($arr['url_pagamento']);
        $resposta->setSolicitacao($arr['solicitacao']);
        $resposta->setExpiracao($arr['expiracao']);

        return $resposta;
    }


    public static function postResponse(Cliente $cliente, Solicitar $solicitar)
    {


        $api = Api::getGuzzleHttpClient();
        $response = $api->request(Api::POST, Endpoint::CHECKOUT_SOLICITA_PAGAMENTO, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authentication' => $cliente->getTokenTransacao()
            ],
            'json' => [
                'email' => $solicitar->getEmail(),
                'valor' => $solicitar->getValor(),
                'ref_pagamento' => $solicitar->getRefPagamento(),
                'url_callback_successo' => $solicitar->getUrlCallbackSuccesso(),
                'url_callback_falha' => $solicitar->getUrlCallbackFalha(),
            ]
        ]);

        $arr = \json_decode($response->getBody(), true);

        if ($arr['sucesso'] == false) {
            throw new BankOnException($arr['message']);
        }

        return $response;
    }

   
}
