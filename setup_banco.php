<?php

/*
    COMO USAR ESTE ARQUIVO EM UM SERVIDOR NOVO

    Este arquivo serve para preparar o banco de dados do projeto.
    Ele faz duas coisas automaticamente:

    1. Cria a tabela "celulares", caso ela ainda nao exista.
    2. Insere os dados iniciais, mas apenas se a tabela estiver vazia.

    PASSO A PASSO SIMPLES:

    1. Instale o MySQL no servidor.
    2. Crie um banco de dados com o nome "php_aula".
    3. Confira se o arquivo "config/conexao.php" esta com:
       - servidor correto
       - usuario correto
       - senha correta
       - nome do banco correto
    4. Rode este arquivo uma vez no navegador ou pelo PHP.

    EXEMPLOS DE EXECUCAO:

    - Pelo navegador:
      http://localhost/2026-1-PHP/setup_banco.php

    - Pelo terminal:
      php setup_banco.php

    DEPOIS DISSO:

    Se a mensagem final indicar sucesso, o projeto ja estara com
    a estrutura minima criada e com os dados iniciais cadastrados.

    IMPORTANTE:

    - Este arquivo pode ser executado novamente sem problema.
    - Ele nao duplica os dados iniciais se a tabela ja tiver registros.
*/

require_once 'config/conexao.php';

// Cria a tabela principal do projeto, se ela ainda nao existir.
$sqlTabelaCelulares = "
    CREATE TABLE IF NOT EXISTS celulares (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fabricante VARCHAR(100) NOT NULL,
        modelo VARCHAR(150) NOT NULL,
        memoria INT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
";

if (!$conexao->query($sqlTabelaCelulares)) {
    die('Erro ao criar a tabela celulares: ' . $conexao->error);
}

// Verifica se a tabela ja possui dados cadastrados.
$result = $conexao->query("SELECT COUNT(*) AS total FROM celulares");

if ($result === false) {
    die('Erro ao verificar dados iniciais: ' . $conexao->error);
}

$total = (int) $result->fetch_assoc()['total'];

// Se estiver vazia, insere os registros iniciais do sistema.
if ($total === 0) {
    $sqlSeeder = "
        INSERT INTO celulares (fabricante, modelo, memoria) VALUES
        ('Apple', 'iPhone 17 Pro Max', 512),
        ('Samsung', 'Galaxy 26', 256),
        ('Motorola', 'Moto G 56', 256)
    ";

    if (!$conexao->query($sqlSeeder)) {
        die('Erro ao inserir dados iniciais: ' . $conexao->error);
    }

    echo 'Estrutura criada e dados iniciais inseridos com sucesso.';
} else {
    echo 'Estrutura verificada com sucesso. A tabela celulares ja possui dados.';
}

// Fecha a conexao com o banco ao final do processo.
$conexao->close();

?>
