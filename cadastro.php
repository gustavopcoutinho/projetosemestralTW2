<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php

$anoIErr = $nameErr = $emailErr = $genderErr = $cursoErr = "";
$anoI = $name = $email = $gender = $comment = $curso = "";

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
     
   if (empty($_POST["curso"])) {
     $curso = "";
   } else {
     $curso = test_input($_POST["curso"]);
          }
          if (empty($_POST["curso"])) {
     $cursoErrErr = "Curso necessário";
   }
   if (empty($_POST["anoInicio"])) {
     $anoIErr = "Ano de início necessário";
   } else {
     $anoI = test_input($_POST["anoInicio"]);
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["sexo"])) {
     $genderErr = "Necessário informar o sexo.";
   } else {
     $gender = test_input($_POST["sexo"]);
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
   Curso: <input type="text" name="curso" value="<?php echo $curso;?>">
   <span class="error">* <?php echo $cursoErr;?></span>
   <br><br>
   Ano de início: <input type="text" name="anoInicio" value="<?php echo $anoI;?>">
   <span class="error">* <?php echo $anoIErr;?></span>
   <br><br>
   Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <br><br>
   Sexo:
   <input type="radio" name="sexo" <?php if (isset($gender) && $gender=="Feminino") echo "checked";?>  value="feminino">Femminino
   <input type="radio" name="sexo" <?php if (isset($gender) && $gender=="Masculino") echo "checked";?>  value="masculino">Masculino
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Suas informações:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $curso;
echo "<br>";
echo $anoI;
echo"<br>";
echo $comment;
echo "<br>";
echo $sexo;
?>

</body>
</html>