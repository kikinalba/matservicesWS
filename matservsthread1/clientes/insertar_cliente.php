<?php
/**
 * Insertar un nuevo cliente en la base de datos
 */

require 'Clientes.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Insertar Clientes
    $retorno = Clientes::insert(
        $body['empresa'],
        $body['nombre'],
        $body['apellidos'],
        $body['telefono_casa'],
        $body['telefono_celular'],
        $body['direccion1'],
        $body['direccion2'],
        $body['rfc'],
        $body['email'],
        $body['ciudad'],
        $body['estado'],
        $body['cp'],
        $body['pais'],
        $body['comentarios'],
        $body['noCuenta']);

    if ($retorno) {
        $json_string = json_encode(array("estado" => 1,"mensaje" => "Creacion correcta"));
		//echo $json_string;
    } else {
        $json_string = json_encode(array("estado" => 2,"mensaje" => "No se creo el registro"));
		//echo $json_string;
    }
}

?>