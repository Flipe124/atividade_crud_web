<?php

require("../../class/Pessoa.php");

$obj = new Pessoa();
$obj->get($_GET);

$response = array("error" => [], "pessoa" => null);

if (count($obj->lastError()) > 0) {
    $response["error"] = $obj->lastError();
    $response["pessoa"] = null;
} else {
    $response["error"] = [];
    $response["pessoa"] = $obj->pessoa();
}

echo json_encode($response);
