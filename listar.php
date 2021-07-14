<?php

	include('database.php');
	echo "<p> Lista de usuários </p>"; 
	$consulta = $pdo->query("SELECT id, nome, usuario, email FROM tb_usuarios;");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} - Usuário: {$linha['usuario']} - Email: {$linha['email']}<br/>";
                
            }

?>
<a href="index.php"> Voltar à tela inicial </a> 