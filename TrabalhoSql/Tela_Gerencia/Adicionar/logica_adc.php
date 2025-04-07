<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once(__DIR__ . "/../../SingletonBd/Conexao.php");    
    //==========================================================
        
    function RetornaId(){
        /*antes cada entidade era requisitada assim 
        $sqlN = $pdo ->prepare("SELECT Nota_id FROM Notas");
        $sqlN ->execute();
        $NotasId=$sqlN ->fetchAll(PDO::FETCH_ASSOC);*/
        $AlunosId=Conexao::Fetch_assoc_specific("Alunos","Aluno_id");
        
        //P

        $ProfessoresId=Conexao::Fetch_assoc_specific("Professores","Professores_id");
        
        //
        $TurmasId=Conexao::Fetch_assoc_specific( "Turmas","Turma_id");
        
        //
        $DisciplinasId=Conexao::Fetch_assoc_specific("Disciplina","Disciplina_id");
       
        //
        $NotasId=Conexao::Fetch_assoc_specific("Notas","Nota_id");
        $listaId=array_merge($AlunosId,$ProfessoresId,$TurmasId,$DisciplinasId,$NotasId);

        return $listaId;
    }


        //
        function verificarIds_Nota() {
            
            $resultA = Conexao::Fetch_assoc_specific("Alunos",'Aluno_id');
        
           
            $resultD = Conexao::Fetch_assoc_specific("Disciplina",'Disciplina_id');
        
            // Inicializar as variáveis de verificação

            $verificaAid = false;
            $verificaDid = false;
        
            // Verificar se os IDs estão presentes nas listas
           
        
            foreach ($resultA as $value) {
                if (isset($_POST["Aid"]) && $_POST["Aid"] == $value["Aluno_id"]) {
                    $verificaAid = true;
                }
            }
        
            foreach ($resultD as $value) {
                if (isset($_POST["Did"]) && $_POST["Did"] == $value["Disciplina_id"]) {
                    $verificaDid = true;
                }
            }
        
            // Verificar se todos os IDs foram encontrados
            if (!($verificaAid && $verificaDid)) {
                header("location: Adicionar.php");
                exit(); // É uma boa prática adicionar exit() após header para garantir que o script pare de executar
            }
        
            // Retorna um array associativo com o resultado de ambas as verificações
            return [
                "verificaDid" => $verificaDid,
                "verificaAid" => $verificaAid
            ];
        }
        //

        function verificarIds_Turma() {

            $resultP = Conexao::Fetch_assoc_specific("Professores",'Professores_id');
        
            $resultA = Conexao::Fetch_assoc_specific("Alunos",'Aluno_id');
           
            $resultD = Conexao::Fetch_assoc_specific("Disciplina",'Disciplina_id');
        
            // Inicializar as variáveis de verificação
            $verificaPid = false;
            $verificaAid = false;
            $verificaDid = false;
        
            // Verificar se os IDs estão presentes nas listas
            foreach ($resultP as $value) {
                if (isset($_POST["Pid"]) && $_POST["Pid"] == $value["Professores_id"]) {
                    $verificaPid = true;
                }
            }
        
            foreach ($resultA as $value) {
                if (isset($_POST["Aid"]) && $_POST["Aid"] == $value["Aluno_id"]) {
                    $verificaAid = true;
                }
            }
        
            foreach ($resultD as $value) {
                if (isset($_POST["Did"]) && $_POST["Did"] == $value["Disciplina_id"]) {
                    $verificaDid = true;
                }
            }
        
            // Verificar se todos os IDs foram encontrados
            if (!($verificaPid && $verificaAid && $verificaDid)) {
                header("location: Adicionar.php");
                exit(); // É uma boa prática adicionar exit() após header para garantir que o script pare de executar
            }
        
            // Retorna um array associativo com o resultado de ambas as verificações
            return [
                "verificaDid" => $verificaDid,
                "verificaPid" => $verificaPid,
                "verificaAid" => $verificaAid
            ];
        }
      

// Conectar ao banco de dados
//root:JMjVSycDSfmpMtAUOLHKkUEzYWgusJTh@junction.proxy.rlwy.net:34807/railway
$pdo = new PDO(
    "mysql:host=localhost;port=3306;dbname=trabalhosql;",
    'root',
    'root12345'
);




// Verificar se há dados para Adicionar Aluno
if (isset($_POST["Nome"]) && isset($_POST["data"]) && isset($_POST["Cursando"])) {
    // Adiciona aluno
    $listaId=RetornaId();
        for ($i=0; $i <count($listaId) ; $i++) { 
                do{
                    $id = rand(1, 9999);
                    
                }while (in_array($id,array_values($listaId)));
            
        }
    $nome = $_POST["Nome"];
    $data = $_POST["data"];
    $qFaltas = $_POST["QFaltas"] ? $_POST["QFaltas"] : 0;
    $num = $_POST["Numero"] ? $_POST["Numero"] : 0;
    $cursando = $_POST["Cursando"];

    $sql = $pdo->prepare("INSERT INTO Alunos (Aluno_id, Nome, data_nascimento, Quant_Faltas, Numero, Cursando) VALUES (?, ?, ?, ?, ?, ?)");
    $sql->execute([$id, $nome, $data, $qFaltas, $num, $cursando]);

    // Redirecionar após inserção
    echo("<script>
    alert('Novo Aluno adiciona!');
     window.location.href = '../Gerencia.php'
     </script>");
    exit();
}

// Verificar se há dados para Adicionar Professor
elseif (isset($_POST["PNome"]) && isset($_POST["Pnum"]) && isset($_POST["Pformacao"])) {
    // Adiciona Professor
    $listaId=RetornaId();
        for ($i=0; $i <count($listaId) ; $i++) { 
                do{
                    $Pid = rand(1, 9999);
                    
                }while (in_array($Pid,array_values($listaId)));
            
        }
    $Pnome = $_POST["PNome"];
    $Pnum = $_POST["Pnum"];
    $formacao = $_POST["Pformacao"];

    $sql = $pdo->prepare("INSERT INTO Professores (Professores_id, Nome, especializacao, Numero) VALUES (?, ?, ?, ?)");
    $sql->execute([$Pid, $Pnome,$formacao, $Pnum ]);

    // Redirecionar após inserção
    echo("<script>
    alert('Novo Professor adiciona!');
     window.location.href = '../Gerencia.php'
     </script>");
    exit();
}

// Verificar se há dados para Adicionar Turma
elseif (isset($_POST["Did"]) && isset($_POST["Pid"]) && isset($_POST["Aid"])) {
    // Verificar IDs
    $verifica = verificarIds_Turma();
    
    if ($verifica["verificaDid"] && $verifica["verificaPid"] && $verifica["verificaAid"]) {
        $Did = $_POST["Did"];
        $Pid = $_POST["Pid"];
        $Aid = $_POST["Aid"];
        $listaId=RetornaId();
        //loop para gerar um id valido
        for ($i=0; $i <count($listaId) ; $i++) { 
                do{
                    $Tid = rand(1, 9999);
                    
                }while (in_array($Tid,array_values($listaId)));
            
        }

        // Inserir na tabela Turmas
        $sql = $pdo->prepare("INSERT INTO Turmas (Turma_id, Disciplina_id, Professor_resp, Aluno_id) VALUES (?, ?, ?, ?)");
        $sql->execute([$Tid, $Did, $Pid, $Aid]);

        // Redirecionar após inserção
        echo("<script>
    alert('Nova Turma adiciona!');
     window.location.href = '../Gerencia.php'
     </script>");
        exit();
    } else {
        // Redirecionar se a verificação falhar
        header("Location:Adicionar.php");
        exit();
    }
}
// Verificar se há dados para Adicionar Disciplinas
elseif (isset($_POST["Nome"]) && isset($_POST["desc"])) {
    // Verificar IDs
    $listaId=RetornaId();
    //loop para gerar um id valido
    for ($i=0; $i <count($listaId) ; $i++) { 
            do{
                $Did = rand(1, 9999);
                
            }while (in_array($Did,array_values($listaId)));
        
    }
        $Nome=$_POST['Nome'];
        $desc=$_POST['desc'];
        // Inserir na tabela Turmas
        $sql = $pdo->prepare("INSERT INTO Disciplina (Disciplina_id,Nome,descricao) VALUES ( ?, ?, ?)");
        $sql->execute([$Did, $Nome, $desc]);

        // Redirecionar após inserção
        echo("<script>
    alert('Nova disciplina adicionada!');
     window.location.href = '../Gerencia.php'
     </script>");
        exit();
   
}

    // Verificar se há dados para Adicionar Notas
    //erro**************************************
elseif (!empty($_POST["Aid"]) && !empty($_POST["Did"]) && !empty($_POST["N1"]) && !empty($_POST["N2"])) {
    // Verificar IDs
    $verifica = verificarIds_Nota();
    if ($verifica["verificaDid"] && $verifica["verificaAid"]) {
         $Did = $_POST["Did"];
         $Aid = $_POST["Aid"];
        $listaId=RetornaId();
        //loop para gerar um id valido
        for ($i=0; $i <count($listaId) ; $i++) { 
                do{
                    $Nid = rand(1, 9999);
                    
                }while (in_array($Nid,array_values($listaId)));
            
        }
        $nota1=$_POST['N1'];
        $nota2=$_POST['N2'];
        // Inserir na tabela Notas
        $sql = $pdo->prepare("INSERT INTO Notas (Aluno_id, Disciplina_id,Nota_id, Nota1, Nota2) VALUES (?, ?, ?, ?,?)");
        $sql->execute([$Aid, $Did,$Nid, $nota1, $nota2]);

         //Redirecionar após inserção
         echo("<script>
         alert('Novas notas adicionadas!');
          window.location.href = '../Gerencia.php'
          </script>");
        exit();
    } else {
         //Redirecionar se a verificação falhar
        header("location: Adicionar.php");
        exit();
    }

}


        
    ?>
</body>
</html>