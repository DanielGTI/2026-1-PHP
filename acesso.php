<?php

    $user_login = $_POST['username'];
    $senha_login = $_POST['senha'];

    // VALIDAR
    if( $user_login == "aulaphp" && $senha_login == "1234" ){

        header("Location: index.php");
    }else{
        header("Location: login.php");    
    }



?>