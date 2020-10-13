<?php

namespace BankOn\Services\Financeiro;

class Transferencia
{
    private $beneficiario;
    private $valor;
    private $idTransferencia;

    /**
     * Get the value of beneficiario
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }

    /**
     * Set the value of beneficiario
     *
     * @return  self
     */
    public function setBeneficiario($beneficiario)
    {
        $this->beneficiario = $beneficiario;

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
     * Get the value of idTransferencia
     */
    public function getIdTransferencia()
    {
        return $this->idTransferencia;
    }

    /**
     * Set the value of idTransferencia
     *
     * @return  self
     */
    public function setIdTransferencia($idTransferencia)
    {
        $this->idTransferencia = $idTransferencia;

        return $this;
    }
}
