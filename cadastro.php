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
<?php include 'header.php';?>
<?php include 'conecta_mysql.php'?>
<?php



$userErr=$passErr=$emailErr="";
 $user=$pass=$email = "";


   
   if (empty($_POST["email"])) {
     $emailErr = "Email necessário";
   } else {
     $email = test_input($_POST["email"]);
     
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Formato de email inválido"; 
     }
   }
   
   if (empty($_POST["usuario"])) {
     $userErr = "Usuário necessário";
   } else {
     $user = test_input($_POST["usuario"]);
     
     if (!filter_var($user)) {
       $user = "Usuário inválido"; 
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
   
   E-mail: <input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
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
$sql = "INSERT INTO cadastro (email,usuario,senha) VALUES($email,$user,$pass)";
$resultado = mysqli_query($conexao,$sql) or die("Não foi possível 
executar a SQL: ".mysqli_error($conexao));



?>
<section id="cor">
		<img class="foto" src="download.jpg" alt="logo"/>  </br>
		
		
	
		<div style="clear:both"> </div>
	
	<?php include 'footer.php';?>
	</section>
	
</body>
</html>