<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode(array("message" => "El Usuario se ha creado correctamente!"));
?>