<?php

namespace BankOn;

class Cliente
{
    private $tokenConsulta;
    private $tokenTransacao;

    /**
     * Get the value of tokenConsulta
     */
    public function getTokenConsulta()
    {
        return $this->tokenConsulta;
    }

    /**
     * Set the value of tokenConsulta
     *
     * @return  self
     */
    public function setTokenConsulta($tokenConsulta)
    {
        $this->tokenConsulta = $tokenConsulta;

        return $this;
    }

    /**
     * Get the value of tokenTransacao
     */
    public function getTokenTransacao()
    {
        return $this->tokenTransacao;
    }

    /**
     * Set the value of tokenTransacao
     *
     * @return  self
     */
    public function setTokenTransacao($tokenTransacao)
    {
        $this->tokenTransacao = $tokenTransacao;

        return $this;
    }
}
