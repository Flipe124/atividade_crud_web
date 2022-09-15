<?php
class Validador
{
    static public function clearData($valor)
    {
        $valor = trim($valor); // remove ambos os lados de uma seqüência de caracteres em branco ou outros caracteres predefinidos.
        $valor = stripslashes($valor); // remove as barras invertidas adicionadas.
        $valor = htmlspecialchars($valor); // remove/converte alguns caracteres predefinidos em entidades HTML.
        return $valor;
    }
}
