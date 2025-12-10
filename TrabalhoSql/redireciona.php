<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once("SingletonBd/Conexao.php");    

// Função para verificar as credenciais
            function verificarCredenciais($usuario, $senha, $dados) {
                // Verifica se o usuário é aluno
                foreach ($dados['Alunos'] as $aluno) {
                     echo"<pre>";
                     print_r( $aluno);
                     echo"</pre>";
                    if ($aluno['Aluno_id'] ==$senha  && $aluno['Email'] == $usuario) { 
                        $json_lista=json_encode($aluno);
                        file_put_contents("Tela_Aluno/Dado_Aluno.json",$json_lista);
                         return 'aluno';
                    }
                }
            
                // Verifica se o usuário é da gerencia
                foreach ($dados['Gerencia'] as $professor) {
                    // echo"<pre>";
                    // print_r($professor);
                    // echo"</pre>";
                    if ($professor['Professores_id'] ==  $senha && $professor['Email'] ==$usuario) {
                        $json_lista=json_encode($professor);
                        file_put_contents("Tela_Gerencia/Dado_Gerencia.json",$json_lista);
                        return 'gerencia';
                    }
                }
                


                return 'invalido'; // Se não encontrar correspondência
            }


            // Código
           
              

            // Obtendo os resultados em um array associativo
            $infoA = Conexao::Fetch_assoc("Alunos");
            $infoP = Conexao::Fetch_assoc("Professores");
            $Aluno=[
                "Alunos" =>  $infoA
            ];

            $professor=[
                "Gerencia" => $infoP
            ];

            //Json
           

            
            //

            $info=array_merge($Aluno,$professor);
            // Dados do usuário (obtidos de um formulário, por exemplo)
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

          
            // Exemplo de uso da função
            $resultado = verificarCredenciais($usuario, $senha, $info);
            
             switch ($resultado) {
                 case 'aluno':
                     session_start();
                     $_SESSION['AlunoLogado'] = false;
                     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                         // Lógica de validação do login
                  
                              $_SESSION['AlunoLogado'] = true;
                             header('Location: tela01.php');
                     }
                     else {
                             echo "Você não tem acesso a essa tela.";
                  
                     }
                
                    header("Location:Tela_Aluno/Aluno.php");
                
                     break;
                    case 'gerencia':
                        
                        session_start();
                        $_SESSION['ProfessorLogado'] = false;
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Lógica de validação do login
                 //
                                $_SESSION['ProfessorLogado'] = true;
                                 header('Location: tela01.php');
                         }
                         else {
                                echo "Você não tem acesso a essa tela.";
                      
                         }
                     header("Location:Tela_Gerencia/Gerencia.php");
                     break;
                 default:
                     header("Location: index.html");
                
                     break;
             }
            






  

    ?>
</body>
</html>