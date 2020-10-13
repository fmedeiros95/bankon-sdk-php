<?php

namespace BankOn\Services\Checkout;

use Carbon\Carbon;

class Resposta
{
    private $tokenPagamento;
    private $urlPagamento;
    private $solicitacao;
    private $expiracao;
    private $expiracaoCarbon;

    /**
     * Get the value of tokenPagamento
     */
    public function getTokenPagamento()
    {
        return $this->tokenPagamento;
    }

    /**
     * Set the value of tokenPagamento
     *
     * @return  self
     */
    public function setTokenPagamento($tokenPagamento)
    {
        $this->tokenPagamento = $tokenPagamento;

        return $this;
    }

    /**
     * Get the value of urlPagamento
     */
    public function getUrlPagamento()
    {
        return $this->urlPagamento;
    }

    /**
     * Set the value of urlPagamento
     *
     * @return  self
     */
    public function setUrlPagamento($urlPagamento)
    {
        $this->urlPagamento = $urlPagamento;

        return $this;
    }

    /**
     * Get the value of solicitacao
     */
    public function getSolicitacao()
    {
        return $this->solicitacao;
    }

    /**
     * Set the value of solicitacao
     *
     * @return  self
     */
    public function setSolicitacao($solicitacao)
    {
        $this->solicitacao = $solicitacao;

        return $this;
    }

    /**
     * Get the value of expiracao
     */
    public function getExpiracao()
    {
        return $this->expiracao;
    }

    /**
     * Set the value of expiracao
     *
     * @return  self
     */
    public function setExpiracao($expiracao)
    {
        $this->expiracao = $expiracao;

        return $this;
    }

    /**
     * Get the value of expiracaoCarbon
     */
    public function getExpiracaoCarbon()
    {
        $this->expiracaoCarbon = new Carbon($this->expiracao);
        return $this->expiracaoCarbon;
    }

    /**
     * Set the value of expiracaoCarbon
     *
     * @return  self
     */
    public function setExpiracaoCarbon($expiracaoCarbon)
    {
        $this->expiracaoCarbon = $expiracaoCarbon;

        return $this;
    }
}
