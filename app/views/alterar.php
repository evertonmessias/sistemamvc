<fieldset>
    <legend>ALTERAR</legend>
    <?php

    use app\Db;

    echo Db::consultar('alterar');
    ?>
    <form method='post'><br>
        <div id='alterar'>
            <input type='text' id='anome' placeholder='Digite Novo Nome'><br>
            <input type='text' id='atel' placeholder='Digite Novo Telefone'><br>
            <input type='text' id='aemail' placeholder='Digite Novo E-Mail'><br>
            <br>
            <button type='button' id='botaoalterar' class='btn btn-warning'>Alterar</button>
            &ensp;
            <button type="button" onclick="window.location.href='alterar'" class="btn btn-primary">Cancela</button>
            <br>
    </form>
    </div>
</fieldset>