<?php
include 'integracion/DAOOferta.php';
class SAOferta
{

    public function crear($oferta){
        $id = -1;
        if (isset($oferta)) {
            $dao = new DAOOferta();
            $id = $dao->crear($oferta);
        }
        return $id;
    }

    public function mostrar($id){
        $oferta = null;
        if (isset($id)) {
            $dao = new DAOOferta();
            $oferta = $dao->mostrar($id);
            
        }
        return $oferta;
    }

    public function mostrarTodas(){
        $dao = new DAOOferta();
        $lista = $dao->mostrarTodas();
        return $lista;
    }

    public function actualizar($oferta){
        $id = -1;
        if (isset($oferta)) {
            $dao = new DAOOferta();
            $id = $dao->actualizar($oferta);
        }
        return $id;
    }

    public function eliminar($id){
        $idResult = null;
        if (isset($id)) {
            $dao = new DAOOferta();
            $idResult = $dao->eliminar($id);
        }
        return $idResult;
    }

    public function guardar(){
        $dao = new DAOOferta();
        return $dao->guardar();
    }
}