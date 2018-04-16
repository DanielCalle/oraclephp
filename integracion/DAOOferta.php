<?php

include 'DAOConnection.php';

class DAOOferta
{
    public function crear($oferta){
        $id = null;
        if (isset($oferta)) {
            $conn = DAOConnection::getConnection();
            $codOferta = $oferta->getCodOferta();
            $clase = $oferta->getClase();
            $total = $oferta->getTotal();

            $stid = oci_parse($conn, "INSERT INTO Oferta VALUES('".$codOferta."','".$clase."',".$total.")");
            if(oci_execute($stid)) {
                $id = $oferta->getCodOferta();
            }

        }

        return $id;
    }

    public function mostrar($id){
        $oferta = null;
        if (isset($id)) {
            $conn = DAOConnection::getConnection();

            $stid = oci_parse($conn, "SELECT CLASE, TOTAL FROM Oferta WHERE CodOferta='".$id."'");
            //oci_bind_by_name($stid, ':id', $id);

            oci_execute($stid);

            if(oci_fetch($stid)) {
                $oferta = new Oferta(
                    $id,
                    oci_result($stid, 'CLASE'),
                    oci_result($stid, 'TOTAL')
                );
            }

        }

        return $oferta;
    }

    public function mostrarTodas(){
        $lista = null;
        $conn = DAOConnection::getConnection();
        
        $stid = oci_parse($conn, "SELECT CODOFERTA, CLASE, TOTAL FROM Oferta");
        oci_execute($stid);
        
       
        $lista = array();
        while(oci_fetch($stid)) {
            $id = oci_result($stid, 'CODOFERTA');
            $clase = oci_result($stid, 'CLASE');
            $total = oci_result($stid, 'TOTAL');
            $oferta = new Oferta($id, $clase, $total);
            array_push($lista,$oferta);
        }
        
        return $lista;
    }

    public function actualizar($oferta){
        $id = null;
        if (isset($oferta)) {
            $conn = DAOConnection::getConnection();
            $codOferta = $oferta->getCodOferta();
            $clase = $oferta->getClase();
            $total = $oferta->getTotal();
            $stid = oci_parse($conn, "UPDATE Oferta SET Clase='".$clase."', Total='".$total."' WHERE CodOferta='".$codOferta."'");
            /*
            oci_bind_by_name($stid, ':codOferta', $codOferta);
            oci_bind_by_name($stid, ':clase', $clase);
            oci_bind_by_name($stid, ':total', $total);
            */
            oci_execute($stid);
            if(oci_num_rows($stid)>0) {
                $id = $oferta->getCodOferta();
            }

        }

        return $id;
    }

    public function eliminar($id){
        $idResult = null;
        if (isset($id)) {
            $conn = DAOConnection::getConnection();

            $stid = oci_parse($conn, "DELETE FROM Oferta WHERE CodOferta='".$id."'");
            //oci_bind_by_name($stid, ':codOferta', $id);
            oci_execute($stid);
            if(oci_num_rows($stid)>0) {
                $idResult = $id;
            }

        }

        return $idResult;
    }

    public function guardar(){
        $conn = DAOConnection::getConnection();
        oci_commit($conn);

        return $idResult;
    }
}