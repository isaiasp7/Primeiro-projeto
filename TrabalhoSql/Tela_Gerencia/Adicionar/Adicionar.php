<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

</head>

<body>
    <?php  
        require_once("ConexaoSingleton/Conexao.php"); 
        require_once(__DIR__ . "/../../Utils/utils.php");    
          
         ?>
    <div class="apresentation">
        <h1 class="title" align="center">Alunos - Cadastrados</h1>
        <table>
            <tr>
                <th>ID Aluno</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Cursando</th>

                <th>Data Nascimento</th>
                <th>Quantidade de Faltas</th>
            </tr>
            <?php   
               Utils::percorresHash("info");               
            ?>
            <tr>
                <form action="logica_adc.php" id="form" method="post">
                    <td>Gerado Automaticamente</td>
                    <td>
                        <input type="text" id="input" name="Nome" placeholder="Nome">
                    </td>
                    <td>
                        <input type="text" id="input" name="Email" placeholder="Email">
                    </td>
                    <td>
                        <input type="number" id="input" name="Telefone" placeholder="Telefone" required>
                    </td>
                    <td>
                        <input type="text" id="input" name="Curso" placeholder="Curso" required>
                    </td>
                    <td>
                        <input type="date" id="input" name="data" placeholder="Data Nascimento" required>
                    </td>
                    <td>
                        <input type="number" id="input" name="QFaltas" placeholder="Faltas">
                    </td>



                    <button type="submit" style="display:none;"></button>
                </form>
            </tr>


        </table>


        <!-- TableP -->
        <h1 class="title" align="center">Professores - Cadastrados</h1>
        <table>
            <tr>

                <th>Professores_id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>

                <th>especializacao</th>

            </tr>

            <tr>
                <?php   
                Utils::percorresHash("infoP");               
            ?>
            </tr>
            <tr>
                <form action="logica_adc.php" id="form" method="post">
                    <td>Gerado Automaticamente</td>
                    <td>
                        <input type="text" id="input" name="Nome" placeholder="Nome">
                    </td>
                    <td><input type="number" id="input" name="Pnum" placeholder="Número"></td>
                    <td><input type="text" id="input" name="PNome" placeholder="Nome" required></td>
                    <td><input type="text" id="input" name="Pformacao" placeholder="Formação" required></td>


                    <button type="submit" style="display:none;"></button>
                </form>
            </tr>
        </table>


        <!-- TableT -->
        <h1 class="title" align="center">Turmas - Cadastrados</h1>
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
            <tr>
                <form action="logica_adc.php" id="form" method="post">
                    <td>Gerado Automaticamente</td>
                    <td><input type="number" id="input" name="Did" placeholder="Disciplina id" required></td>
                    <td><input type="number" id="input" name="Pid" placeholder="Professor id" required></td>
                    <td><input type="number" id="input" name="Aid" placeholder="Aluno id" required></td>
                    <button type="submit" style="display:none;"></button>
                </form>
            </tr>
        </table>


        <!-- TableD -->
        <h1 class="title" align="center">Disciplinas - Cadastrados</h1>
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
            <tr>
                <form action="logica_adc.php" id="form" method="post">
                    <td>Gerado Automaticamente</td>
                    <td><input type="text" id="input" name="Nome" placeholder="Nome" required></td>
                    <td><input type="text" id="input" name="desc" placeholder="Descricao" required></td>
                    <button type="submit" style="display:none;"></button>
                </form>
            </tr>
        </table>

        <!-- TableN -->
        <h1 class="title" align="center">Notas - Cadastrados</h1>
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
            <tr>

                <form action="logica_adc.php" id="form" method="post">
                    <td><input type="number" id="input" name="Aid" placeholder="ID"></td>
                    <td><input type="text" id="input" name="Did" placeholder="ID"></td>
                    <td>Gerado Automaticamente</td>
                    <td><input type="number" step="0.1" id="input" name="N1" placeholder="Nota1"></td>
                    <td><input type="number" step="0.1" id="input" name="N2" placeholder="Nota2"></td>
                    <td>Gerado com base em notas</td>
                    <button type="submit" style="display:none;"></button>
                </form>
            </tr>

        </table>

    </div>
    <script>
    document.getElementById('input').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault(); // Impede comportamento padrão
            document.getElementById('form').submit(); // Envia o formulário
        }
    });
    </script>


</body>

</html>