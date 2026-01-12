<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start(); 
    require_once("ConexaoSingleton/Conexao.php"); 
    require_once("ConexaoSingleton/CRUDgereric.php"); 

    

            
            //antes de verificar os campos preciso validar os inputs
        function validaLogin($email,$senha,$entidade){
                    if(CRUDgenerics::ValidationLogin($email,$senha,$entidade)){
                        echo "credenciais corretas";
                    return true;
                    }else {
                        echo "credenciais incorretas";
                    return false;
                    }
                    
        }

        
        function redireciona($resultado){
            switch ($resultado) {
                case 'aluno':
                    $_SESSION['Logado'] = "Aluno";
                    header('Location: Tela_Aluno/Aluno.php');
                    break;
                    
                case 'gerencia':
                    $_SESSION['Logado'] = "Professor";
                    header("Location:Tela_Gerencia/Gerencia.php");
                    break;
                default:
                 $_SESSION['erro_login'] = "Email ou senha incorretos."; // Armazena a mensagem
                    header("Location: index.php");
                    break;
            }
        }

        // Código
        $email = $_POST['usuario'];
        $senha = $_POST['senha'];
        $typeUser = explode("@", $email)[1];
        /*echo "email = $email<br>";
        echo "senha = $senha<br>";
        echo "trecho = $typeUser<br>";
        echo  boolval(str_contains($typeUser, "aluno"));*/
     
        if (str_contains($typeUser, "aluno")) {
            if (validaLogin($email,$senha,"Alunos")) {
                //redireciona("aluno");
            }
            
        }elseif (str_contains($typeUser, "professor")) {
             if (validaLogin($email,$senha,"Professores")) {
                 //redireciona("gerencia");
            }

        }

    ?>
</body>

</html>