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
            $tipo = isset($data['tipo']) && $data['tipo'] != '' ? Validador::clearData($data['tipo']) : null;
            $sexo = isset($data['sexo']) && $data['sexo'] != '' ? Validador::clearData($data['sexo']) : null;
            $doc = isset($data['doc']) && $data['doc'] != '' ? Validador::clearData($data['doc']) : null;
            $cep = isset($data['cep']) && $data['cep'] != '' ? Validador::clearData($data['cep']) : null;
            $endereco = isset($data['endereco']) && $data['endereco'] != '' ? Validador::clearData($data['endereco']) : null;
            $numero = isset($data['numero']) && $data['numero'] != '' ? Validador::clearData($data['numero']) : null;
            $bairro = isset($data['bairro']) && $data['bairro'] != '' ? Validador::clearData($data['bairro']) : null;
            $complemento = isset($data['complemento']) && $data['complemento'] != '' ? Validador::clearData($data['complemento']) : null;
            $cidade = isset($data['cidade']) && $data['cidade'] != '' ? Validador::clearData($data['cidade']) : null;
            $uf = isset($data['uf']) && $data['uf'] != '' ? Validador::clearData($data['uf']) : null;

            if (!$nome) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "nome");
            }

            if (!$tipo) {
                $this->lastError[] = array('msg' => "informe o tipo", 'field' => "tipo");
            }

            if (!$sexo) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "sexo");
            }

            if (!$doc) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "doc");
            }

            if (!$cep) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "cep");
            }

            if (!$endereco) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "endereco");
            }

            if (!$numero) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "numero");
            }

            if (!$bairro) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "bairro");
            }

            if (!$complemento) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "complemento");
            }

            if (!$cidade) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "cidade");
            }

            if (!$uf) {
                $this->lastError[] = array('msg' => MsgException::INFORME_NOME, 'field' => "uf");
            }

            if (count($this->lastError) > 0) {
                return false;
            }

            $connection = new Database();

            $stmt = $connection->connection()->prepare(
                'INSERT INTO `pessoa` (`nome`, `tipo`, `sexo`, `doc`, `cep`, `endereco`, `numero`, `bairro`, `complemento`, `cidade`, `uf`) VALUES (:nome, :tipo, :sexo, :doc, :cep, :endereco, :numero, :bairro, :complemento, :cidade, :uf)'
            );

            $stmt->bindParam(":nome",  $nome,  PDO::PARAM_STR);
            $stmt->bindParam(":tipo",  $tipo,  PDO::PARAM_INT);
            $stmt->bindParam(":sexo",  $sexo,  PDO::PARAM_STR);
            $stmt->bindParam(":doc",  $doc,  PDO::PARAM_STR);
            $stmt->bindParam(":cep",  $cep,  PDO::PARAM_STR);
            $stmt->bindParam(":endereco",  $endereco,  PDO::PARAM_STR);
            $stmt->bindParam(":numero",  $numero,  PDO::PARAM_STR);
            $stmt->bindParam(":bairro",  $bairro,  PDO::PARAM_STR);
            $stmt->bindParam(":complemento",  $complemento,  PDO::PARAM_STR);
            $stmt->bindParam(":cidade",  $cidade,  PDO::PARAM_STR);
            $stmt->bindParam(":uf",  $uf,  PDO::PARAM_STR);



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

    function delete($data)
    {
        try {
            $this->lastError = [];

            $id = isset($data['id']) && $data['id'] != '' ? Validador::clearData($data['id']) : null;

            if (!$id) {
                $this->lastError[] = array('msg' => "alterar", 'field' => "delete");
                return false;
            }

            $connection = new Database();

            $stmt = $connection->connection()->prepare('DELETE FROM pessoa WHERE id = :id'); // DELETA O USUÁRIO NA POSIÇÃO ID
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $this->lastMsg = "Pessoa deletado com sucesso!";
                return true;
            } else {
                $this->lastError[] = array('msg' => "Ocorreu um erro ao deletar pessoa!", 'field' => "execute");
                return false;
            }
        } catch (\Throwable $th) {
            $this->lastError[] = array('msg' => $th->getMessage(), 'field' => "execute");
            return false;
        }
    }
}
