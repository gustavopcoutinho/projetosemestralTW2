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



 $anoNascErr = $anoIErr = $nameErr  = $genderErr = $cursoErr = "";
$anoNasc = $anoI = $name = $gender = $descricao = $curso =$email= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Nome é necessário.";
   } else {
     $name = test_input($_POST["name"]);
     
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Somente letras e espaços em branco permitidos."; 
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
   
</form>

<?php
$sql = "INSERT INTO cadastro (nome,anoNasc,curso,anoIni,descr,sexo) VALUES($name,$anoNasc,$anoI,$descricao,$gender)";
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