<!DOCTYPE HTML> 
<html>
<head>
    <meta charset="utf-8">
    <title>OnMack - Login</title>
        
		<link href="css/homepage.css" type="text/css" rel="stylesheet"/>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
	<?php include 'header.php';?>
<?php


$userErr = $passErr = "";
$user = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["usuário"])) {
     $userErr = "Usuário é necessário.";
   } else {
     $user = test_input($_POST["usuário"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $userErr = "Usuário incorreto"; 
     }
   }
   
   if (empty($_POST["senha"])) {
     $passErr = "Senha necessária";
   } else {
     $pass = test_input($_POST["senha"]);
     
     if (!filter_var($pass)) {
       $pass = "Senha incorreta"; 
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
   Usuário: <input type="text" name="user" value="<?php echo $user;?>">
   <span class="error">* <?php echo $userErr;?></span>
   <br><br>
   Senha: <input type="text" name="pass" value="<?php echo $pass;?>">
   <span class="error">* <?php echo $passErr;?></span>
   <br><br>
</form>

	
	
		
	<section id="cor">
		<img class="foto" src="download.jpg" alt="logo"/>  </br>
		
		
	
		<div style="clear:both"> </div>
	
	<?php include 'footer.php';?>
	</section>
	


</body>
</html>