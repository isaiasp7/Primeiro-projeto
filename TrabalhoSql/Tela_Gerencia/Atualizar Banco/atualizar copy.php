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
                function VerificaId($paramentro){
                    $AlunosId=Conexao::Fetch_assoc_specific("Alunos","Aluno_id");

                    $ProfessoresId=Conexao::Fetch_assoc_specific("Professores","Professores_id");

                    $TurmasId=Conexao::Fetch_assoc_specific( "Turmas","Turma_id");

                    $DisciplinasId=Conexao::Fetch_assoc_specific("Disciplina","Disciplina_id");

                    $NotasId=Conexao::Fetch_assoc_specific("Notas","Nota_id");
                    $listaId=array_merge($AlunosId,$ProfessoresId,$TurmasId,$DisciplinasId,$NotasId);
                    $encontrado=false;
                    foreach ($listaId as $key => $value) {
                        foreach ($value as $key1 => $value1) {
                            if($paramentro==$value1){
                                $encontrado=true;
                                return true;
                            }
                        }
                    }
                    if ($encontrado==false) {
                        return false;
                    }
                    
                }
                $pdo = new PDO(
                    "mysql:host=localhost;port=3306;dbname=trabalhosql;",
                    'root',
                    'root12345'
                );
                    if (isset($_POST['option'])) {
                        
                        if ($_POST['option']=="Alunos") {
                            if ((VerificaId($_POST['id'])==true)) {

                                //root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
                             
                                $sql = $pdo ->prepare("SELECT * FROM Alunos WHERE Aluno_id=?");
                                $sql ->execute([$_POST['id']]);
                                $info = $sql ->fetch(PDO::FETCH_ASSOC);
                                echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                foreach ($info as $key => $value) {
                                    if($key=='Aluno_id'){
                                        echo "<input type='hidden' value='$value' name='$key'>";
                                        continue;
                                    }
                                    else{
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>"; // Exibe o valor atual com um name único
                                    echo("</tr><tr>");
                                    } 
                                }
                                echo"</form></table></tr>";
                            }else{
                                
                                echo("<script>
                                alert('Esse aluno não existe!');
                                window.location.href = 'atualizar.html';
                                </script>");
                        }

                        }elseif ($_POST['option']=="Professores") {
                            
                            if ((VerificaId($_POST['id'])==true)) {
                            //root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
                          
                            $sql = $pdo ->prepare("SELECT * FROM Professores WHERE Professores_id=?");
                            $sql ->execute([$_POST['id']]);
                            $info = $sql ->fetch(PDO::FETCH_ASSOC);
                             echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                            foreach ($info as $key => $value) {
                                if($key=='Professores_id'){
                                    echo "<input type='hidden' value='$value' name='$key'>";
                                    continue;
                                }
                                else{
                                echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>";
                                echo("</tr><tr>");
                                } 
                            }
                             echo"</form></table></tr>"; 
                        }else{
                            echo("<script>
                            alert('Esse Aluno não existe!');
                             window.location.href = 'atualizar.html'
                             </script>");
                        }
                                   
                        }elseif ($_POST['option']=="Turmas"){ 
                            if ((VerificaId($_POST['id'])==true)) {
                                //root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
                               
                                $sql = $pdo ->prepare("SELECT * FROM Turmas WHERE Turma_id=?");
                                $sql ->execute([$_POST['id']]);
                                $info = $sql ->fetch(PDO::FETCH_ASSOC);
                                 echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                foreach ($info as $key => $value) {
                                    if($key=='Turma_id'){
                                        echo "<input type='hidden' value='$value' name='$key'>";
                                        continue;
                                    }
                                    else{
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>";
                                    echo("</tr><tr>");
                                    }
                                }
                                 echo"</form></table></tr>"; 
                            }else{
                                
                                echo("<script>
                                alert('Esse aluno não existe!');
                                window.location.href = 'atualizar.html';
                                </script>");
                        }

                        }elseif ($_POST['option']=="Disciplinas") {
                            if ((VerificaId($_POST['id'])==true)) {
                                $sql = $pdo ->prepare("SELECT * FROM Disciplina WHERE Disciplina_id=?");
                                $sql ->execute([$_POST['id']]);
                                $info = $sql ->fetch(PDO::FETCH_ASSOC);
                                 echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                                foreach ($info as $key => $value) {
                                    if($key=='Disciplina_id'){
                                        echo "<input type='hidden' value='$value' name='$key'>";
                                        continue;
                                    }
                                    else{
                                    echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>";
                                    echo("</tr><tr>");
                                    }
                                }
                                echo"</form></table></tr>";
                            }else{
                                
                                echo("<script>
                                alert('Esse aluno não existe!');
                                window.location.href = 'atualizar.html';
                                </script>");
                        }

                        }elseif ($_POST['option']=="Notas") {
                            if ((VerificaId($_POST['id'])==true)) {
                            $sql = $pdo ->prepare("SELECT * FROM Notas WHERE Nota_id=?");
                            $sql ->execute([$_POST['id']]);
                            $info = $sql ->fetch(PDO::FETCH_ASSOC);
                             echo "<table border='1px'><form action='logica.php' method='post'><tr>";
                            foreach ($info as $key => $value) {
                                echo("<th>$key</th>"); echo "<td><input type='text' placeholder='$value' name='$key'></td>";
                                echo("</tr><tr>");
                                
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
                         window.location.href = 'atualiza.html.php'
                         </script>");
                    }

                    
                

                    
                ?>
            <input type="submit" value="Atualizar">
           
            </form>

    
        </div>
</body>
</html>