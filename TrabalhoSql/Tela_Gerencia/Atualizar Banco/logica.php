<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    //verificar se id existe em categoria
    $pdo = new PDO(
        "mysql:host=localhost;port=3306;dbname=admescola;",
        'root',
        'root12345'
    );
    $listaPost = $_POST;
    foreach ($listaPost as $key => $value) {
    echo "$key => $value <br>";
}

 $campoId = "";
    switch ($listaPost['entidade']) {

        case "Alunos":
            $campoId = "Aluno_id";
             break;
        case "Professores":
            $campoId = "Professores_id";
             break;
        case "Disciplina":
            $campoId = "Disciplina_id";
             break;
        case "Notas":
            $campoId = "Nota_id";
             break;
        case "Turmas":
            $campoId = "Turma_id";
            break;

        default:
            echo "<script>
                alert('Entidade não reconhecida!');
                
              </script>";
            break; //window.location.href = 'atualizar.html;
    }
    echo ("campo : ".$campoId);
    echo ("campo aluno : ".$listaPost[$campoId]);
    foreach ($listaPost as $key => $value) {
        if (!empty($value) && $key != $campoId && $key != 'entidade') {
            $sql = $pdo->prepare("UPDATE {$listaPost['entidade']} SET $key=? WHERE $campoId=?");
            $sql->execute([$value, $listaPost[$campoId]]);
        }
    }

    //session_start();
    //$_SESSION['ProfessorLogado'] = true;
    echo ("<script>
            alert('Atualização feita com suceeso!');
            window.location.href = '../Gerencia.php';
                
    </script>"); 



    ?>
</body>

</html>