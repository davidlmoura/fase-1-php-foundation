<?php if($_POST['Ok'] == 1) {

    echo '
    <h1>Dados alterados!</h1>
    ';

    } else {


        echo '
        <h2>Editar Conteúdo</h2>
        <div class="container">
        <form class="form-signin" method="post" action="">
        <label for="inputName" class="sr-only">Nome</label>
        <input type="conteudo" name="nome" id="inputName" class="form-control" placeholder="Conteúdo" value="'.ExibirPagina().'" required autofocus>
        <input type="hidden" id="Ok" name="Ok" value="1" /><br /> <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Alterar</button>
        </form>
        </div>
        ';

    }

?>