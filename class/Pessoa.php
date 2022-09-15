<?php
require("../../config/connection.php");
require("../../class/Validator.php");

class Pessoa
{
    protected $lastError = [];
    protected $lastMsg = null;

    public function lastError()
    {
        return $this->lastError;
    }

    public function lastMsg()
    {
        return $this->lastMsg;
    }


    function create($data)
    {
        try {
            $this->lastError = [];

            $nome = isset($data['name']) && $data['name'] != '' ? Validador::clearData($data['name']) : null;

            if (!$nome) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "name");
            }

            $connection = new Database();

            $stmt = $connection->connection()->prepare(
                'INSERT INTO `user` (`nome`) VALUES (:nome)'
            );

            $stmt->bindParam(":name",  $nome,  PDO::PARAM_STR);

        } catch (\Throwable $th) {
            $this->lastError[] = array('msg' => $th->getMessage(), 'field' => "execute");
            return false;
        }
    }
}
