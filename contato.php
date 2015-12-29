<?php if($_POST['Ok'] == 1) {

    echo '
    <h1>Dados enviados!</h1>
    <div>
    <ul>
        <li>
            Nome: '.$_POST['nome'].'
        </li>
        <li>
            E-mail: '.$_POST['email'].'
        </li>
        <li>
            Assunto: '.$_POST['assunto'].'
        </li>
        <li>
            Mensagem: '.$_POST['mensagem'].'
        </li>
    </ul>
    </div>
    ';

    } else {

        echo '
        <h1>Contato</h1>
        <div class="container">
        <form class="form-signin" method="post" action="?pag=contato">
        <label for="inputName" class="sr-only">Nome</label>
        <input type="name" name="nome" id="inputName" class="form-control" placeholder="Nome" required autofocus>
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
        <label for="inputSubject" class="sr-only">Assunto</label>
        <input type="subject" name="assunto" id="inputSubject" class="form-control" placeholder="Assunto" required autofocus>
        <label for="inputMessage" class="sr-only">Mensagem</label>
        <textarea class="form-control" type="message" name="mensagem" id="inputMessage" rows="6" placeholder="Mensagem" required autofocus></textarea>
        <input type="hidden" id="Ok" name="Ok" value="1" />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>
        </form>
        </div>
        ';

    }

?>