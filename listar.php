
<form method="POST" action="">
	<input type="text" name="nome" id="nome" required>
	<input type="submit" name="pesquisar" value="Pesquisar">
</form>

<form method="POST" action="">
	<input type="submit" name="mostrar" value="Mostrar tudo">
</form>
<?php

	include('database.php');
	echo "<p> Lista de usuários </p>";
	if(isset($_POST['pesquisar']))
	{
		$nome = $_POST['nome'];
		$consulta = $pdo->query("SELECT id, nome, usuario, email FROM tb_usuarios where lower(nome) like '%$nome%';");
        	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            	echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']} - Email: {$linha['email']}<br/>";
                
            }
    }

    else if(isset($_POST['mostrar']))
    {
    	$consulta = $pdo->query("SELECT id, nome, usuario, email FROM tb_usuarios;");
        	while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            	echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']} - Email: {$linha['email']}<br/>";
                
            }
    }

?>

<a href="index.php"> Voltar à tela inicial </a> 