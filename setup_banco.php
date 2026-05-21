<?php

/*
    COMO USAR ESTE ARQUIVO EM UM SERVIDOR NOVO

    Este arquivo serve para preparar o banco de dados do projeto.
    Ele faz algumas coisas automaticamente:

    1. Cria a tabela "celulares", caso ela ainda nao exista.
    2. Cria a tabela "usuarios", usada na tela de login.
    3. Insere os dados iniciais, mas apenas se as tabelas estiverem vazias.

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

    LOGIN INICIAL DO SISTEMA:

    - Usuario: Daniel
    - Senha: 1234

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

// Cria a tabela de usuarios usada pela pagina de login.
$sqlTabelaUsuarios = "
    CREATE TABLE IF NOT EXISTS usuarios (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        senha VARCHAR(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
";

if (!$conexao->query($sqlTabelaUsuarios)) {
    die('Erro ao criar a tabela usuarios: ' . $conexao->error);
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
}

// Verifica se ja existe algum usuario cadastrado para o login.
$resultUsuarios = $conexao->query("SELECT COUNT(*) AS total FROM usuarios");

if ($resultUsuarios === false) {
    die('Erro ao verificar usuarios iniciais: ' . $conexao->error);
}

$totalUsuarios = (int) $resultUsuarios->fetch_assoc()['total'];

// Se estiver vazia, cria o usuario inicial do sistema.
if ($totalUsuarios === 0) {
    $sqlSeederUsuarios = "
        INSERT INTO usuarios (username, senha) VALUES
        ('Daniel', '1234')
    ";

    if (!$conexao->query($sqlSeederUsuarios)) {
        die('Erro ao inserir usuario inicial: ' . $conexao->error);
    }
}

echo 'Estrutura do banco verificada com sucesso. Tabelas de celulares e usuarios prontas para uso.';

// Fecha a conexao com o banco ao final do processo.
$conexao->close();

?>
