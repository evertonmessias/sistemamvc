<fieldset>
    <legend>INSERIR</legend>
    <?php

    use app\Db;

    echo Db::consultar('inserir');
    ?>
    <form method='post'><br>
        <input type='text' id='nome' placeholder='Nome'><br>
        <input type='text' id='tel' placeholder='Telefone'><br>
        <input type='text' id='email' placeholder='E-Mail'><br><br>
        <button type='button' id='botaoinserir' class='btn btn-success'>Inserir</button>
        &ensp;
        <button type="button" onclick="window.location.href='inserir'" class="btn btn-primary">Cancela</button>
        <br>
    </form>
</fieldset>