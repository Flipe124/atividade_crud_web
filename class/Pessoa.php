<?php
require("../../config/connection.php");

class Pessoa{
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
}