<?php

    session_start();                // Iniciar session
    session_unset();                // Remover as variaveis de session
    session_destroy();              // Destruir a session
    header('Location: login.php');  // Enviar para a tela de login

    exit();                         // Finalizar o script
?>