<?php


class Oferta
{
    private $codOferta;
    private $clase;
    private $total;

    public function __construct($codOferta, $clase, $total)
    {
        $this->codOferta = $codOferta;
        $this->clase = $clase;
        $this->total = $total;
    }

    public function getCodOferta()
    {
        return $this->codOferta;
    }
    public function setCodOferta($codOferta)
    {
        $this->codOferta = $codOferta;
    }

    public function getClase()
    {
        return $this->clase;
    }
    public function setClase($clase)
    {
        $this->clase = $clase;
    }

    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total)
    {
        $this->total = $total;
    }
}