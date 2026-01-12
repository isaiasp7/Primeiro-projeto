<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
                <img src="../img - backgroud/306fd0fb64f67ff40f81d8e37f8bf674-removebg-preview.png" alt="">
                
                <table class="s">
                        <h1 class="title">Dados Do Aluno<hr></h1> 
                        
                    <tr>
                        <th>ID Aluno</th>
                        <th>Nome</th>
                        <th>Data Nascimento</th>
                        <th>Quantidade de Faltas</th>
                        <th>Número</th>
                        <th>Cursando</th>
                        <th>Email</th>
                    </tr> 
                            <?php 
                            session_start();
                            $file="Dado_Aluno.json";
                            $dado_aluno=(array)json_decode(file_get_contents($file));
                            foreach ($dado_aluno as $key) {         
                                echo("<td> $key </td>");
                            }            

                            ?>
                </table>
                
    </div>

  
</body>
</html>