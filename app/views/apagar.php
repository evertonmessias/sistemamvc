<fieldset>
    <legend>APAGAR</legend>
    <?php

    use app\Db;

    echo Db::consultar('apagar');
    ?>
    <form method='post'><br>
        <div id='apagar'>
            <button type='button' id='botaoapagar' class='btn btn-danger'>Confirma</button>
            &ensp;
            <button type="button" onclick="window.location.href='apagar'" class="btn btn-primary">Cancela</button>
            <br>
    </form>
    </div>
</fieldset>