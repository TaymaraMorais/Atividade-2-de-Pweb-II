<!DOCTYPE html>
<html>
<head>
	<title> Login </title>
	<meta charset="utf-8">
</head>
<body>

<?php
	include('database.php');
	$verificador = 0;
	if(isset($_POST['entrar'])){

    	$email = $_POST['email'];
    	$senha = $_POST['senha'];
    	$consulta = $pdo->query("SELECT email, senha FROM tb_usuarios;");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['email'] == $email)
            {
                if(password_verify($senha, $linha['senha'])) {
                    
                    $verificador = 1;
                    break;
                } 
                
            }
        }
        if($verificador == 1)
        {
        	header("location: listar.php");
        }
        else
        {
        	echo "Dados incorretos";
        }
	}

	
?>
	<form method="POST" action=""> 
		<p> Email: <input type="text" name="email" id="email" required=""> </p>
		<p> Senha: <input type="password" name="senha" id="senha" required=""></p>
		<input type="submit" name="entrar" value="Entrar">

	</form>

</body>
</html>

