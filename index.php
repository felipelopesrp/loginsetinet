<?php 
require 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Setinet</title>
  <?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) {

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { 
        
        require 'register.php';
        
    }
}
?>
<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Inscreva-se</a></li>
        <li class="tab active"><a href="#login">Entrar</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Bem Vindo!</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Login<span class="req">*</span>
            </label>
            <input type="login" required autocomplete="off" name="login"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Senha<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="senha"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Esqueceu a Senha?</a></p>
          
          <button class="button button-block" name="login" />Entrar</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Inscreva-se de Graça</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nome<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='nome' />
            </div>
        
            <div class="field-wrap">
              <label>
                Sobrenome<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='sobrenome' />
            </div>
          </div>
		  
		  <div class="field-wrap">
            <label>
              Login<span class="req">*</span>
            </label>
            <input type="login"required autocomplete="off" name='login' />
          </div>

          <div class="field-wrap">
            <label>
              Email <span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Senha<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='senha'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Registre-se</button>
          
          </form>

        </div>  
        
      </div>
      
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
