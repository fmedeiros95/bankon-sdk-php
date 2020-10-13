<?php

namespace BankOn\Services\Financeiro;

class Resposta
{
    private $transacao;
    private $favorecido;
    private $favorecidoUser;
    private $data;
    private $hora;
    private $valor;

    /**
     * Get the value of transacao
     */ 
    public function getTransacao()
    {
        return $this->transacao;
    }

    /**
     * Set the value of transacao
     *
     * @return  self
     */ 
    public function setTransacao($transacao)
    {
        $this->transacao = $transacao;

        return $this;
    }

    /**
     * Get the value of favorecido
     */ 
    public function getFavorecido()
    {
        return $this->favorecido;
    }

    /**
     * Set the value of favorecido
     *
     * @return  self
     */ 
    public function setFavorecido($favorecido)
    {
        $this->favorecido = $favorecido;

        return $this;
    }

    /**
     * Get the value of favorecidoUser
     */ 
    public function getFavorecidoUser()
    {
        return $this->favorecidoUser;
    }

    /**
     * Set the value of favorecidoUser
     *
     * @return  self
     */ 
    public function setFavorecidoUser($favorecidoUser)
    {
        $this->favorecidoUser = $favorecidoUser;

        return $this;
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
     * Get the value of hora
     */ 
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */ 
    public function setHora($hora)
    {
        $this->hora = $hora;

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
}
