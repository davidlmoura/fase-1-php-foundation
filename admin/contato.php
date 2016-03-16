<?php if($_POST['Ok'] == 1) {

    EditarConteudo();

    echo '
    <h1>Dados alterados!</h1>
    ';

} elseif($_POST['Logado'] == 1) {

    if(EfetuarLogin() == true) {
        $_SESSION['logado'] = 1;
        echo "<h3>Login Efetuado Com Sucesso!</h3>";
    } else {
        unset($_SESSION['logado']);
        echo "<h3>Dados Incorretos!</h3>";
    }

} else {

    if($path[3] == "login") {

        echo '
        <h2>Login</h2>
        <div class="container">
        <form class="form-signin" method="post" action="">
        <label for="inputUsuario" class="sr-only">Usuário</label>
        <input type="text" name="usuario" id="inputUsuario" class="form-control" placeholder="Usuário" required autofocus>
        <label for="inputSenha" class="sr-only">Senha</label>
        <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha" required autofocus>
        <input type="hidden" id="Logado" name="Logado" value="1" /><br /> <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        </form>
        </div>
        ';


    } elseif($path[3] == "logout") {

        unset($_SESSION['logado']);
        echo "<h3>Logoff Efetuado Com Sucesso!</h3>";

    } else {

        echo '
        <h2>Editar Conteúdo</h2>
        <div class="container">
        <form class="form-signin" method="post" action="">
        <label for="inputName" class="sr-only">Conteúdo</label>
         <textarea name="conteudo" id="editor1" rows="10" cols="80" class="form-control" placeholder="Conteúdo" required autofocus>
            ' . ExibirPagina() . '
            </textarea>
        <input type="hidden" id="Ok" name="Ok" value="1" /><br /> <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Alterar</button>
        </form>
        </div>
        ';

    }

}

?>