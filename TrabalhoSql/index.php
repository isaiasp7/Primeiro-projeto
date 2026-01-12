<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css ">
    <title>Sistema Escola</title>
</head>

<body>
    <div class="Tela">

        <iframe src="https://lottie.host/embed/0cd3dbd0-2b44-405e-b68f-82d13cc2f0b8/egGs8SIx3g.json"></iframe>


        <form action="redireciona.php" method="post">

            <h1 class="title">Login</h1>
            <hr>
            <div class="container">

                <div class="div2">

                    <div class="usuario">
                        <label for="usuario">Usuário</label>
                        <input type="email" name="usuario" id="usuario" required minlength="4" autocomplete="off">
                    </div>

                    <div class="senha">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" required>
                        <p id="mensagem"></p>
                    </div>
                </div>
                <div class="submit">
                    <input type="submit" value="Acessar" name="Login" id="Acesso">




                </div>
                <div class="Cadastro">
                    <h5>Ainda não possui conta?<a href="Tela_Cadastro/Cadastro.html"> Cadastrar </a></h5>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (!empty($_SESSION['erro_login'])) {
          echo $_SESSION["erro_login"]; // Mensagem 
          
    }else{
        echo "ainda não";
    }
  
    ?>






</body>

</html>