<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="nav">
        <div class="barra_expandir">
            <i class="bi bi-list" id="btn_barra"></i>
        </div>
            <ul>

                <li class="item_menu">
                    <a href="Adicionar/Adicionar.php" >
                        <span class="img">
                            <i class="bi bi-person-add"></i>
                        </span>
                        <span class="txt_item2">
                            Adicionar
                        </span>
                    </a>
                </li>
                <li class="item_menu">
                    <a href="Atualizar Banco/atualizar.html" >
                        <span class="img">   <i class="bi bi-arrow-clockwise"></i></span>
                        <span class="txt_item2">
                            Atualizar Dados
                        </span>
                    </a>

                </li>
                <li class="item_menu">
                    <a href="Deletar/del.html">
                        <span class="img"> 
                            <i class="bi bi-trash3"></i>
                        </span>
                        <span class="txt_item2">
                            Deletar Dados
                        </span>
                    </a>
                </li>
            </ul>
            <script src="menu.js"></script>
            <script src="click.js"></script>
    </nav>
            <?php     
                require_once(__DIR__ . '/../SingletonBd/Conexao.php');
                require_once(__DIR__ . '/../Utils/utils.php'); 
                          

                /*function percorre($info){
                    foreach ($info as $chave1 => $valor) {
                        echo "<tr>";
                        foreach ($valor as $key => $value) {
                            # code...
                        echo "<td>" . $value . "</td>";  // Valor
                        
                        }echo "</tr>";
                    }

                } */
                //existe mensagem?
                // session_start();
                // if($_SESSION['ProfessorLogado'] == false){
                    
                //     echo("<script>
                //         alert('Você não tem permissão para entrar nessa página!');
                //         window.location.href = '../Tela01 - login';
                //     </script>");
                //     exit(); // Garante que o script PHP termine aqui
                // }
            
               
              
           ?> 
    <div class="apresentation">
        <h1 class="title" align="center" >Alunos - Cadastrados </h1> 
        
        <table>
            <tr>
                <th>ID Aluno</th>
                <th>Email</th>
                <th>Numero</th>
                <th>Cursando</th>
                <th>Nome</th>
                <th>Data Nascimento</th>
                <th>Quantidade de Faltas</th>
            </tr> 
            <?php   
                Utils::percorresHash("info");                 
            ?>
        </table>

        <!-- TableP -->
        <h1 class="title" align="center" >Professores - Cadastrados </h1> 
        
        <table>
            <tr>
                <th>Professores_id</th>
                    <th>Email</th>
                    <th>Numero</th>
                <th>Nome</th>
                <th>especializacao</th>
                
                
            </tr> 
            <tr>
            <?php   
                Utils::percorresHash("infoP");                 
            ?>
            </tr>
        </table>
        

        <!-- TableT -->
        <h1 class="title" align="center" >Turmas - Cadastrados </h1> 
        
        <table>
            <tr>
                <th>Turma id</th>
                <th>Disciplina id</th>
                <th>Professores Responsavel</th>
                <th>Aluno id</th>
              
            </tr> 
            <tr>
            <?php   
                Utils::percorresHash("infoT");                 
            ?>
            </tr>
        </table>
        
       
         <!-- TableD -->
         <h1 class="title" align="center" >Disciplinas - Cadastrados </h1> 
        
        <table>
            <tr>
                <th>Disciplina_id
                <th>Nome</th>
                <th>Descrição</th>

            </tr> 
            <tr>
            <?php   
                Utils::percorresHash("infoD");                 
            ?>
            </tr>
        </table>
        
         <!-- TableN -->
         <h1 class="title" align="center" >Notas - Cadastrados </h1> 
        
        <table>
            <tr>
                <th>Aluno_id</th>
                <th>Disciplina id</th>
                <th>Nota id</th>
                <th>Nota 1 </th>
                <th>Nota 2</th>
                <th>Media</th>
                
            </tr> 
            <tr>
            <?php   
                Utils::percorresHash("infoN");                 
            ?>
            </tr>
        </table>
        
    </div>


</body>
</html>