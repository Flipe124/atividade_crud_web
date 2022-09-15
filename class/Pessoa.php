<?php
require("../../config/connection.php");
require("../../class/Validador.php");
require("../../class/MsgException.php");

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

            $nome = isset($data['nome']) && $data['nome'] != '' ? Validador::clearData($data['nome']) : null;

            if (!$nome) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "nome");
            }

            echo "testte";

            $connection = new Database();

            $stmt = $connection->connection()->prepare(
                'INSERT INTO `pessoa` (`nome`) VALUES (:nome)'
            );

            $stmt->bindParam(":nome",  $nome,  PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->lastMsg = "Pessoa cadastrada com sucesso!";
                return true;
            } else {
                $this->lastError[] = array('msg' => "Ocorreu um erro ao cadastrar pessoa!", 'field' => "execute");
                return false;
            }

        } catch (\Throwable $th) {
            $this->lastError[] = array('msg' => $th->getMessage(), 'field' => "execute");
            return false;
        }
    }
}
