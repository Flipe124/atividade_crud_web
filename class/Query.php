<?php
class Query{
    public static function getById($table, $id)
    {
        try {
            $connection = new Database();
            $stmt = $connection->connection()->prepare("SELECT * FROM `{$table}` WHERE `id` = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
            return $pessoa;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
