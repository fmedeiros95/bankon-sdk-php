<?php

namespace BankOn\Services\Checkout;

class Solicitar
{
    private $email;
    private $valor;
    private $refPagamento;
    private $urlCallbackSuccesso;
    private $urlCallbackFalha;

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
     * Get the value of refPagamento
     */ 
    public function getRefPagamento()
    {
        return $this->refPagamento;
    }

    /**
     * Set the value of refPagamento
     *
     * @return  self
     */ 
    public function setRefPagamento($refPagamento)
    {
        $this->refPagamento = $refPagamento;

        return $this;
    }

    /**
     * Get the value of urlCallbackSuccesso
     */ 
    public function getUrlCallbackSuccesso()
    {
        return $this->urlCallbackSuccesso;
    }

    /**
     * Set the value of urlCallbackSuccesso
     *
     * @return  self
     */ 
    public function setUrlCallbackSuccesso($urlCallbackSuccesso)
    {
        $this->urlCallbackSuccesso = $urlCallbackSuccesso;

        return $this;
    }

    /**
     * Get the value of urlCallbackFalha
     */ 
    public function getUrlCallbackFalha()
    {
        return $this->urlCallbackFalha;
    }

    /**
     * Set the value of urlCallbackFalha
     *
     * @return  self
     */ 
    public function setUrlCallbackFalha($urlCallbackFalha)
    {
        $this->urlCallbackFalha = $urlCallbackFalha;

        return $this;
    }
}