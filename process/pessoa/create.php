<?php

require("../../class/Pessoa.php");

$obj = new Pessoa();
$obj->create($_POST);

$response = array("error" => [], "msg" => null);

if (count($obj->lastError()) > 0) {
    $response["error"] = $obj->lastError();
    $response["msg"] = null;
} else {
    $response["error"] = [];
    $response["msg"] = $obj->lastMsg();
}

echo json_encode($response);
