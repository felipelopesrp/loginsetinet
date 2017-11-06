<?php 

require 'db.php';
session_start();


if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) 
    { 
        $_SESSION['message'] = "Não existe um usuário com este e-mail";
        header("location: error.php");
    }
    else { 

        $user = $result->fetch_assoc(); 
        
        $email = $user['email'];
        $hash = $user['hash'];
        $nome = $user['nome'];

        $_SESSION['message'] = "<p>Por favor cheque seu e-mail  <span>$email</span>"
        . " para clicar no link de confirmação e resetar sua senha!</p>";

        $to      = $email;
        $subject = 'Resete sua Senha ( loginsetinet.com )';
        $message_body = '
        Olá '.$nome.',

        Você pediu para resetar sua senha!

        Clique no link para resetar sua senha

        http://localhost/loginsetinet/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Resete sua Senha</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    
  <div class="form">

    <h1>Resete sua Senha</h1>

    <form action="forgot.php" method="post">
     <div class="field-wrap">
      <label>
        Email<span class="req">*</span>
      </label>
      <input type="email"required autocomplete="off" name="email"/>
    </div>
    <button class="button button-block"/>Resetar</button>
    </form>
  </div>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>
