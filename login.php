<!DOCTYPE HTML> 
<html>
<head>
    <meta charset="UTF-8">
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

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



</body>
</html>