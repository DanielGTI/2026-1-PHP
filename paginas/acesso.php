<?php

    // Iniciar a sessao
    session_start();

    // Capturar os valores do formulario de login
    $user_login = $_POST['username'];
    $senha_login = $_POST['senha'];

    // VALIDAR o usuario e senha
    if( $user_login == "Daniel" && $senha_login == "1234" ){

        // criar as variaveis de session
        $_SESSION['login'] = true;
        $_SESSION['nome_usuario'] = $user_login;    // usuario
        $_SESSION['senha'] = $senha_login;          // senha

        // redirecionar para pagina principal
        header("Location: index.php");
        
    }else{
        header("Location: login.php");    
    }



?>