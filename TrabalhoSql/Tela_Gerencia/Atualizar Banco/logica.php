<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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
                        echo"<pre>";
                        echo "$key => $value1";
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
    //verificar se id existe em categoria
    $pdo = new PDO(
        "mysql:host=localhost;port=3306;dbname=trabalhosql;",
        'root',
        'root12345'
    );
$lista=$_POST;
unset($lista['Email']);//exclui email pois ele é preenchido automaticamente;

    if (isset($lista['Aluno_id'])){
        foreach ($lista as $key => $value) {
            if (!empty($value) && $key!="Aluno_id") {//verifica se $valor está preenchido
                echo"<pre>";
                print_r("$key => $value");
                echo"</pre>";
                $sql = $pdo ->prepare("UPDATE Alunos set $key=? WHERE Aluno_id=?");
                $sql ->execute([$value,$lista['Aluno_id']]);
            }
    
        }       
    }
                    
    

elseif (isset($lista['Professores_id'])) {

    foreach ($lista as $key => $value) {
        if (!empty($value) && $key!="Professores_id") {
    $sql = $pdo ->prepare("UPDATE Professores SET $key=? WHERE Professores_id=?");
    $sql ->execute([$value,$lista['Professores_id']]);
        } 
    }


}
elseif (isset($lista['Disciplina_id'])){

    foreach ($lista as $key => $value) {
        if(!empty($value) && $key!="Disciplina_id"){
        $sql = $pdo ->prepare("UPDATE Disciplina SET $key=? WHERE Disciplina_id=?");
        $sql ->execute([$value,$lista['Disciplina_id']]);
        }
    }

}
elseif (isset($lista['Nota_id'])) {

    foreach ($lista as $key => $value) {
    if(!empty($value) && $key!="Nota_id"){
        $sql = $pdo ->prepare("UPDATE Notas SET $key=?  WHERE Nota_id=?");
        $sql ->execute([$value,$lista['Nota_id']]);
    }
    }

}
elseif (isset($lista['Turma_id'])) {

    foreach ($lista as $key => $value) {
        if(!empty($value) && $key!="Turma_id"){
        $sql = $pdo ->prepare("UPDATE Turmas SET $key=? WHERE Turma_id=?");
        $sql ->execute([$value,$lista['Turma_id']]);
    }
    }
}
//session_start();
//$_SESSION['ProfessorLogado'] = true;
echo("<script>
alert('Atualização feita com suceeso!');
    window.location.href = '../Gerencia.php'
    </script>");



?>
</body>
</html>