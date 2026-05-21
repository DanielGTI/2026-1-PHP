<?php

    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'php_aula';

    $conexao = new mysqli($servidor, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die('Erro ao conectar ao banco de dados: ' . $conexao->connect_error);
    }

    $conexao->set_charset('utf8mb4');

?>
