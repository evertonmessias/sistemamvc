<fieldset>
    <?php

    use app\Db;

    echo Db::user($_COOKIE['snome']);
    ?>
    <br>
    <legend>EDITAR USUARIO</legend>
    <div id='editaruser'>
        <form method='post'><br>
            <input type='text' readonly class='campoemail' id='email' placeholder='E-Mail'><br>
            <input type='password' id='pass' placeholder='Nova Senha'><br>
            <button type='button' id='botaoeditaruser' class='btn btn-success'>EDITAR</button>
            &ensp;
            <a href='home'><button type="button" class="btn btn-danger">CANCELAR</button></a>
            <br><br>
        </form>
    </div>
</fieldset>