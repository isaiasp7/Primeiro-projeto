<?php 
    require_once("ConexaoSingleton/Conexao.php"); 
            //retorna os id
            
    function RetornaId(){
        /*antes cada entidade era requisitada assim 
        $sqlN = $pdo ->prepare("SELECT Nota_id FROM Notas");
        $sqlN ->execute();
        $NotasId=$sqlN ->fetchAll(PDO::FETCH_ASSOC);*/
        $AlunosId=Conexao::Fetch_assoc_specific("Alunos","Aluno_id");
        foreach ($AlunosId as $key => $value) {
            print "$key = $value\n\n";
        }
        //P

        $ProfessoresId=Conexao::Fetch_assoc_specific("Professores","Professores_id");
        print $ProfessoresId;
        //
        $TurmasId=Conexao::Fetch_assoc_specific( "Turmas","Turma_id");
        print $TurmasId;
        //
        $DisciplinasId=Conexao::Fetch_assoc_specific("Disciplinas","Disciplina_id");
        print $DisciplinasId;
        //
        $NotasId=Conexao::Fetch_assoc_specific("Notas","Nota_id");
        $listaId=array_merge($AlunosId,$ProfessoresId,$TurmasId,$DisciplinasId,$NotasId);
        return $listaId;
    }
    $listaId=RetornaId();
    for ($i=0; $i <count($listaId) ; $i++) { 
            do{
                $id = rand(1, 9999);
                
            }while (in_array($id,array_values($listaId[$i])));
        
    }

                
                
            
        
            
        $nome = $_POST["nomeC"];
        $data = $_POST["data"];
        $num = $_POST["telefone"];
        $curso = $_POST["curso"];
        $pdo = new PDO(
            "mysql:host=localhost;port=3306;dbname=admescola;",
            'root',
            'root12345'
        );
        $sql = $pdo ->prepare("INSERT INTO Alunos set Aluno_id=?,Nome=?,data_nascimento=?,Quant_Faltas=0,Numero=?,Cursando=?");
        $sql ->execute([$id,$nome,$data,$num,$curso]);
    
        //envia json
        $sql = $pdo ->prepare("SELECT * FROM Alunos WHERE Aluno_id=$id");
        $sql->execute();
        $info=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($info as $aluno) {
        $json_lista = json_encode($aluno);
            file_put_contents("../Tela_Aluno/Dado_Aluno.json",$json_lista);
        }
        
        //Redirecionar após inserção
        
        header("Location:../Tela_Aluno/Aluno.php");
        
?>