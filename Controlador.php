<?php
error_reporting(E_ALL);
include 'negocio/SAOferta.php';
include 'negocio/Oferta.php';

if( isset($_POST['accion']) ) {
    $sa = new SAOferta();

    switch ($_POST['accion']) {

        case 'MostrarOferta':
            $id = $_POST['CodOferta'];
            $oferta = $sa->mostrar($id);
            echo json_encode(array(
                'CodOferta' => $oferta->getCodOferta(),
                'Clase' => $oferta->getClase(),
                'Total' => $oferta->getTotal()
                ));
            break;
        case 'CrearOferta':
            $codOferta = $_POST['CodOferta'];
            $clase= $_POST['Clase'];
            $total = $_POST['Total'];
            $oferta = new Oferta($codOferta,$clase,$total);
            $id = $sa->crear($oferta);
            echo json_encode(array(
                'CodOferta' => $id,
            ));
            break;
        case 'EliminarOferta':
            $id = $_POST['CodOferta'];
            $id = $sa->eliminar($id);
            echo json_encode(array(
                'CodOferta' => $id,
            ));
            break;
        case 'ActualizarOferta':
            $id = $_POST['CodOferta'];
            $clase= $_POST['Clase'];
            $total = $_POST['Total'];
            $oferta = new Oferta($id,$clase,$total);
            $id = $sa->actualizar($oferta);
            echo json_encode(array(
                'CodOferta' => $id,
            ));
            break;
        case 'MostrarTodasOfertas':
            $lista = $sa->mostrarTodas();
            $listaArray = array();
            foreach ($lista as $oferta) {
                array_push($listaArray, array(
                    'CodOferta' => $oferta->getCodOferta(),
                    'Clase' => $oferta->getClase(),
                    'Total' => $oferta->getTotal()
                ));
            }
            echo json_encode($listaArray);

            break;
        case 'Guardar':
            $res = $sa->guardar();
            $res = array(
                'guardado' => true
            );
            echo json_encode($res);

            break;
    }

}