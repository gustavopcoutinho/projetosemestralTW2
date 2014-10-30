<!DOCTYPE HTML> 
<html>
<head>
    <meta charset="UTF-8">
    <title>OnMack - Cadastro</title>
		<link href="css/homepage.css" type="text/css" rel="stylesheet"/>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<header>
		<nav id="menu1">
			<ul class="menu">
                            <li><a href="index.php" target=""> HOME </a></li>
                                <li><a href="cadastro.php" target=""> CADASTRO </a></li>
                                <li><a href="login.php" target=""> LOGIN </a></li>
                                <li><a href="sobre.php" target=""> SOBRE NÓS </a></li>
                                <li><a href="faq.php" target="">  DÚVIDAS FREQUENTES</a></li>
                        </ul>
		</nav>
		</header>
<?php



$userErr = $passErr = $anoNascErr = $anoIErr = $nameErr = $emailErr = $genderErr = $cursoErr = "";
$user = $pass = $anoNasc = $anoI = $name = $email = $gender = $descricao = $curso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Nome é necessário.";
   } else {
     $name = test_input($_POST["name"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Somente letras e espaços em branco permitidos."; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email necessário";
   } else {
     $email = test_input($_POST["email"]);
     
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Formato de email inválido"; 
     }
   }
   if (empty($_POST["anoNasc"])) {
     $anoNascErr = "Ano de nacimento necessário";
   } else {
     $anoNasc = test_input($_POST["anoNasc"]);
   }
     
   if (empty($_POST["curso"])) {
     $curso = "";
   } else {
     $curso = test_input($_POST["curso"]);
          }
          if (empty($_POST["curso"])) {
     $cursoErr = "Curso necessário";
   }
   if (empty($_POST["anoInicio"])) {
     $anoIErr = "Ano de início necessário";
   } else {
     $anoI = test_input($_POST["anoInicio"]);
   }

   if (empty($_POST["descricao"])) {
     $descricao = "";
   } else {
     $descricao = test_input($_POST["descricao"]);
   }

   if (empty($_POST["sexo"])) {
     $genderErr = "Necessário informar o sexo.";
   } else {
     $gender = test_input($_POST["sexo"]);
   }
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["usuário"])) {
     $userErr = "Usuário é necessário.";
   } else {
     $user = test_input($_POST["usuário"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $userErr = "Usuário invválido"; 
     }
   }
   
   if (empty($_POST["senha"])) {
     $passErr = "Senha necessária";
   } else {
     $pass = test_input($_POST["senha"]);
     
     if (!filter_var($pass)) {
       $pass = "Senha inválida"; 
     }
   }
   
}
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Validação</h2>
<p><span class="error">* Campo necessário.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Nome: <input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Ano de nascimento: <input type="text" name="anoNasc" value="<?php echo $anoNasc;?>">
   <span class="error">* <?php echo $anoNascErr;?></span>
   <br><br>
   Curso: <input type="text" name="curso" value="<?php echo $curso;?>">
   <span class="error">* <?php echo $cursoErr;?></span>
   <br><br>
   Ano de início: <input type="text" name="anoInicio" value="<?php echo $anoI;?>">
   <span class="error">* <?php echo $anoIErr;?></span>
   <br><br>
   Descrição: <textarea name="descricao" rows="5" cols="40"><?php echo $descricao;?></textarea>
   <br><br>
   Sexo:
   <input type="radio" name="sexo" <?php if (isset($gender) && $gender=="Feminino") echo "checked";?>  value="feminino">Feminino
   <input type="radio" name="sexo" <?php if (isset($gender) && $gender=="Masculino") echo "checked";?>  value="masculino">Masculino
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   Usuário: <input type="text" name="user" value="<?php echo $user;?>">
   <span class="error">* <?php echo $userErr;?></span>
   <br><br>
   Senha: <input type="text" name="pass" value="<?php echo $pass;?>">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Suas informações:</h2>";
echo "<br>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $anoNasc;
echo "<br>";
echo $curso;
echo "<br>";
echo $anoI;
echo"<br>";
echo $descricao;
echo "<br>";
echo $gender;
echo "<br>";
echo $user;
echo "<br>";
echo $pass;


?>
<section id="cor">
		<img class="foto" src="download.jpg" alt="logo"/>  </br>
		
		
	
		<div style="clear:both"> </div>
	
	<footer>
		<nav id="menu2">
			<ul class="menuu">
		
			<li><a href="index.php" target=""> HOME </a></li>
                                <li><a href="cadastro.php" target=""> CADASTRO </a></li>
                                <li><a href="login.php" target=""> LOGIN </a></li>
                                <li><a href="sobre.php" target=""> SOBRE NÓS </a></li>
                                <li><a href="faq.php" target="">  DÚVIDAS FREQUENTES</a></li>
                        </ul>
		<h4>Copyright 2014. OnMack. Todos os direitos reservados.</h4> 
	</footer>
	</section>
	
</body>
</html>