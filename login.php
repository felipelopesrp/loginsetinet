<?php

$login = $mysqli->escape_string($_POST['login']);
$result = $mysqli->query("SELECT * FROM users WHERE login='$login'");

if ( $result->num_rows == 0 ){
    $_SESSION['message'] = "Não existe este usuário";
    header("location: error.php");
}
else {
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['login'] = $user['login'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['sobrenome'] = $user['sobrenome'];
        $_SESSION['active'] = $user['active'];
        
        
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "Senha incorreta";
        header("location: error.php");
    }
}

