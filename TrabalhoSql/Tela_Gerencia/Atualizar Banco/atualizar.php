<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

   
</head>
<body>
<div class="container">
            
        
            
            <div class="img">
                 <dotlottie-player src="https://lottie.host/8a8c41d3-da33-485b-91fe-2870fc94d388/VYART79tp5.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></dotlottie-player>
            </div>
            <form action="logica.php" method="post">
                <p align="center">Reescreva o valor que deseja alterar</p> 
                <?php 

                require_once __DIR__ . "/../../SingletonBd/Conexao.php";
                function VerificaId($campo, $table){
                     $dicionarioBD= null;
                    switch ($table) {
                                case "Alunos":
                                    $dicionarioBD=Conexao::Fetch_assoc_specific("Alunos","Aluno_id");
                                    break;
                                case "Professores":
                                    $dicionarioBD=Conexao::Fetch_assoc_specific("Professores","Professores_id");
                                    break;
                                case "Turmas":
                                $dicionarioBD=Conexao::Fetch_assoc_specific("Turmas","Turma_id");
                                break;
                                case "Disciplina":
                                    $dicionarioBD=Conexao::Fetch_assoc_specific("Disciplina","Disciplina_id");
                                    break;
                                case "Notas":
                                $dicionarioBD=Conexao::Fetch_assoc_specific("Notas","Nota_id");
                                break;
                                default:
                                    echo("<script>
                                    alert('Não existe essa entidade!');
                                    window.location.href = 'atualizar.html'
                                    </script>");
                                    return false; // importante sair da função aqui também
                            }
                    $encontrado=false;
                    foreach ($dicionarioBD as $key => $value) {
                            if($campo==$value){
                                $encontrado=true;
                                return true;
                            }
                    }
                    if ($encontrado==false) {
                        return false;
                    }
                    
                }
                $pdo = new PDO(
                    "mysql:host=localhost;port=3306;dbname=admescola;",
                    'root',
                    'root12345'
                );
                    if (isset($_POST['option'])) {
                        
                        if ($_POST['option']=="Alunos") {
                            if (VerificaId($_POST['id'],"Alunos")) {

                                //root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
                             
                                $sql = $pdo ->prepare("SELECT * FROM Alunos WHERE Aluno_id=?");
                                $sql ->execute([$_POST['id']]);
                                $info = $sql ->fetch(PDO::FETCH_ASSOC);
                                echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                foreach ($info as $key => $value) {
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>"; // Exibe o valor atual com um name único
                                    echo("</tr><tr>");
                                    echo "<input type='hidden' name='Aluno_id' value='{$_POST['id']}'>";
                                    echo "<input type='hidden' name='entidade' value='Alunos'>";

                                }
                                echo"</form></table></tr>";
                            }else{
                                
                                echo("<script>
                                alert('Esse aluno não existe!');
                                window.location.href = 'atualizar.html';
                                </script>");
                        }

                        }elseif ($_POST['option']=="Professores") {
                            
                            if (VerificaId($_POST['id'],"Professores")) {
                            //root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
                          
                            $sql = $pdo ->prepare("SELECT * FROM Professores WHERE Professores_id=?");
                            $sql ->execute([$_POST['id']]);
                            $info = $sql ->fetch(PDO::FETCH_ASSOC);
                             echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                foreach ($info as $key => $value) {
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>"; // Exibe o valor atual com um name único
                                    echo("</tr><tr>");
                                       echo "<input type='hidden' name='Professor_id' value='{$_POST['id']}'>";
                                      echo("<input type='hidden' name='entidade' value='Professores'>");
                                }
                                echo"</form></table></tr>";
                        }else{
                            echo("<script>
                            alert('Esse Professor não existe!');
                             window.location.href = 'atualizar.html'
                             </script>");
                        }
                                   
                        }elseif ($_POST['option']=="Turmas"){ 
                            if (VerificaId($_POST['id'],"Turmas")) {
                                //root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
                               
                                $sql = $pdo ->prepare("SELECT * FROM Turmas WHERE Turma_id=?");
                                $sql ->execute([$_POST['id']]);
                                $info = $sql ->fetch(PDO::FETCH_ASSOC);
                                 echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                   foreach ($info as $key => $value) {
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>"; // Exibe o valor atual com um name único
                                    echo("</tr><tr>");
                                       echo "<input type='hidden' name='Turma_id' value='{$_POST['id']}'>";
                                    echo("<input type='hidden' name='entidade' value='Turmas'>");
                                }
                                echo"</form></table></tr>";
                      echo"</form></table></tr>"; 
                                 }else{
                                
                                echo("<script>
                                alert('Essa turma não existe!');
                                window.location.href = 'atualizar.html';
                                </script>");
                        }
                            
                        }elseif ($_POST['option']=="Disciplinas") {
                            if (VerificaId($_POST['id'],"Disciplina")) {
                                $sql = $pdo ->prepare("SELECT * FROM Disciplina WHERE Disciplina_id=?");
                                $sql ->execute([$_POST['id']]);
                                $info = $sql ->fetch(PDO::FETCH_ASSOC);
                                 echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                   foreach ($info as $key => $value) {
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>"; // Exibe o valor atual com um name único
                                    echo("</tr><tr>");
                                       echo "<input type='hidden' name='Disciplina_id' value='{$_POST['id']}'>";
                                    echo("<input type='hidden' name='entidade' value='Disciplina'>");
                                }
                                echo"</form></table></tr>";
                     
                                 }else{
                                
                                echo("<script>
                                alert('Essa disciplina não existe!');
                                window.location.href = 'atualizar.html';
                                </script>");
                        }

                        }elseif ($_POST['option']=="Notas") {
                            if (VerificaId($_POST['id'],"Notas")) {
                            $sql = $pdo ->prepare("SELECT * FROM Notas WHERE Nota_id=?");
                            $sql ->execute([$_POST['id']]);
                            $info = $sql ->fetch(PDO::FETCH_ASSOC);
                             echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                              foreach ($info as $key => $value) {
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>"; // Exibe o valor atual com um name único
                                    echo("</tr><tr>");
                                    echo "<input type='hidden' name='Nota_id' value='{$_POST['id']}'>";
                                    echo("<input type='hidden' name='entidade' value='Notas'>");
                                }
                                echo"</form></table></tr>";
                            }else{
                                echo("<script>
                                alert('Esse Aluno não existe!');
                                 window.location.href = '../Gerencia.php'
                                 </script>");
                            }
                        }
                    
                            //  echo("<script>
                            //  alert('Atualização feita com suceeso!');
                            //  window.location.href = '../Gerencia.php'
                                //  </script>");
                    }else{
                        echo("<script>
                        alert('Selecione algo!');
                         window.location.href = 'atualizar.html'
                         </script>");
                    }

                    
                

                    
                ?>
                <input type="submit" value="Atualizar">
           
            </form>

    
        </div>
</body>
</html>