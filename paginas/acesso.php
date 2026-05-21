<?php

    // Inicia a sessao para permitir gravar os dados do usuario logado.
    session_start();

    // Carrega a conexao com o banco de dados do sistema.
    require_once '../config/conexao.php';

    // Captura os dados enviados pelo formulario de login.
    $user_login = isset($_POST['username']) ? trim($_POST['username']) : '';
    $senha_login = isset($_POST['senha']) ? trim($_POST['senha']) : '';

    // Monta a consulta que procura um usuario com o login e a senha informados.
    $stmt = $conexao->prepare("SELECT id, username, senha FROM usuarios WHERE username = ? AND senha = ?");

    if ($stmt === false) {
        die('Erro ao preparar login: ' . $conexao->error);
    }

    // Liga os valores do formulario aos campos da consulta.
    $stmt->bind_param('ss', $user_login, $senha_login);

    // Executa a busca do usuario no banco.
    $stmt->execute();

    $result = $stmt->get_result();

    // Pega o primeiro usuario encontrado. Se nao encontrar, o resultado sera nulo.
    $usuario = $result->fetch_assoc();

    // Finaliza os recursos da consulta e fecha a conexao com o banco.
    $stmt->close();
    $conexao->close();

    // Se encontrou um usuario valido, cria a sessao e libera o acesso ao sistema.
    if ($usuario) {

        // Guarda os dados principais do usuario na sessao.
        $_SESSION['login'] = true;
        $_SESSION['nome_usuario'] = $usuario['username'];
        $_SESSION['senha'] = $usuario['senha'];

        // Envia o usuario para a pagina principal apos o login.
        header("Location: ../index.php");
        
    }else{
        // Se nao encontrar usuario compativel, volta para a tela de login.
        header("Location: ../login.php");    
    }



?>
