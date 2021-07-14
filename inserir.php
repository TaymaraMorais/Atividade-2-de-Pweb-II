<?php
    include('database.php');

        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $criptografada = password_hash($senha, PASSWORD_DEFAULT);
        $verificador = 0;

        $consulta = $pdo->query("SELECT usuario, email FROM tb_usuarios;");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            if($linha['usuario'] == $usuario || $linha['email'] == $email)
            {
                $verificador = 1;
                break;
            }
        }

        if($verificador == 1){
            echo "Usuário ou email já cadastrado!! Insira outro";
        }
        else{
            $sql = $pdo->prepare("INSERT INTO tb_usuarios VALUES (null, ?, ?, ?, ?)");
            $sql->execute([$nome, $usuario, $email, $criptografada]);
            echo 'Usuário cadastrado com sucesso';
        }
       
?>

<a href="index.php"> Voltar à tela inicial</a>
