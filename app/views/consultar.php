<fieldset>
    <legend>CONSULTAR</legend>
    <?php

    use app\Db;

    echo Db::consultar('consultar');
    ?>
    <form method='post' action="app/controllers/acao.php">
        <button type='submit' name='botaoimprimir' class='btn btn-primary'>SALVAR</button>
        <br><br>
    </form>
</fieldset>