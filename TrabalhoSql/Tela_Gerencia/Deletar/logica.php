<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once("../Utils/utils.php");    
    
                 function RetornaId(){
                    $AlunosId=Conexao::Fetch_assoc_specific("Alunos","Aluno_id");

                    $ProfessoresId=Conexao::Fetch_assoc_specific("Professores","Professores_id");

                    $TurmasId=Conexao::Fetch_assoc_specific( "Turmas","Turma_id");

                    $DisciplinasId=Conexao::Fetch_assoc_specific("Disciplina","Disciplina_id");

                    $NotasId=Conexao::Fetch_assoc_specific("Notas","Nota_id");
                    $listaId=array_merge($AlunosId,$ProfessoresId,$TurmasId,$DisciplinasId,$NotasId);
                    return $listaId;
        }


            //verificar se o id digitado existe na tabela alunos
        if ($_POST['option']=="Alunos") {
            $verifica_id=RetornaId();
            $A_encontrado=false;
            foreach ($verifica_id as $key => $value) {
                foreach ($value as $key1 => $value1) {
                      if($_POST['id']==$value1 && 'Aluno_id'==$key1){
                                 $A_encontrado=true;
                                 $pdo =  $pdo = new PDO("mysql:host=junction.proxy.rlwy.net;port=34807;dbname=railway",'root', 'JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh');
                                 $sql = $pdo ->prepare("DELETE FROM Alunos WHERE Aluno_id=?");
                                 $sql ->execute([$_POST['id']]);
                                 echo("<script>
                                        alert('Dado Deletado com sucesso!');
                                        window.location.href = '../Gerencia.php';
                                        </script>");
                                 
                                 

                     }
                    
                }
                
            }if($A_encontrado==false){
                                
                         echo("<script>
                         alert('Esse aluno não existe!');
                         window.location.href = 'del.html';
                         </script>");
                 }
            
          
            

        }
        elseif ($_POST['option']=="Professores") {
            $verifica_id=RetornaId();
            $P_encontrado=false;
            foreach ($verifica_id as $key => $value) {                            
                foreach ($value as $key1 => $value1) {
                     if($_POST['id']==$value1 && 'Professores_id'==$key1){
                                $P_encontrado=true;
                                $pdo =  $pdo = new PDO("mysql:host=junction.proxy.rlwy.net;port=34807;dbname=railway",'root', 'JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh');
                                $sql = $pdo ->prepare("DELETE FROM Professores WHERE Professores_id=?");
                                $sql ->execute([$_POST['id']]);    
                                    echo("<script>
                                    alert('Dado Deletado com sucesso!');
                                    window.location.href = '../Gerencia.php';
                                    </script>");
                        
                    }
                     
                }
                
            }if($P_encontrado==false){
                                
                echo("<script>
                alert('Esse Professor não existe!');
                window.location.href = 'del.html';
                </script>");
        }
            
           

        }
        elseif ($_POST['option']=="Disciplinas") {
            $verifica_id=RetornaId();
            $D_encontrado=false;
            foreach ($verifica_id as $key => $value) {
                foreach ($value as $key1 => $value1) {
                     if($_POST['id']==$value1 && 'Disciplina_id'==$key1){
                                $D_encontrado=true;
                                $pdo =  $pdo = new PDO("mysql:host=junction.proxy.rlwy.net;port=34807;dbname=railway",'root', 'JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh');
                                $sql = $pdo ->prepare("DELETE FROM Discplina WHERE Disciplina_id=?");
                                $sql ->execute([$_POST['id']]);
                                    echo("<script>
                                       alert('Dado Deletado com sucesso!');
                                       window.location.href = '../Gerencia.php';
                                        </script>");
                      }
                     
                }
                
            }if ($D_encontrado==false) {
                echo("<script>
                    alert('Essa disciplina não existe!');
                    window.location.href = '../Gerencia.php';
                    </script>");
            }
            

            

        }
        elseif ($_POST['option']=="Turmas") {
            $verifica_id=RetornaId();
            $T_encontrado=false;
            foreach ($verifica_id as $key => $value) {
                foreach ($value as $key1 => $value1) {
                     if($_POST['id']==$value1 && $key1=='Turma_id'){
                                $N_encontrado=true;
                                $pdo =  $pdo = new PDO("mysql:host=junction.proxy.rlwy.net;port=34807;dbname=railway",'root', 'JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh');
                                $sql = $pdo ->prepare("DELETE FROM Turmas WHERE Turma_id=?");
                                $sql ->execute([$_POST['id']]);
                                echo("<script>
                                       alert('Dado Deletado com sucesso!');
                                       window.location.href = '../Gerencia.php';
                                        </script>");
         
                                
                    }
                    
                }
                
            }if($N_encontrado==false){
                                echo("<script>
                                alert('Essa Turma não existe!');
                                window.location.href = 'del.html';
                                </script>");
                        }
            
            

        }
        elseif ($_POST['option']=="Notas") {
            $verifica_id=RetornaId();
            $N_encontrado=false;
            foreach ($verifica_id as $key => $value) {
                foreach ($value as $key1 => $value1) {
                     if($_POST['id']==$value1 && 'Nota_id'==$key1){ 
                                $N_encontrado=true;
                                $pdo =  $pdo = new PDO("mysql:host=junction.proxy.rlwy.net;port=34807;dbname=railway",'root', 'JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh');
                                $sql = $pdo ->prepare("DELETE FROM Notas WHERE Nota_id=?");
                                $sql ->execute([$_POST['id']]);
                                echo("<script>
                                       alert('Dado Deletado com sucesso!');
                                       window.location.href = '../Gerencia.php';
                                        </script>");
                            
                    }
                   
                }
                        
            }if($N_encontrado==false){
                                echo("<script>
                                alert('Esse boletim não existe!');
                                window.location.href = 'del.html';
                                </script>");
                    }
            
           
            

        }

    
     
        

    ?>
</body>
</html>