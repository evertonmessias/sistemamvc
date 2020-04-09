<fieldset>
    <span class='titulo'>BEM VINDO</span><br>
    <?php
    if (isset($_SESSION['gnome'])) {
        $user = unserialize($_SESSION['gnome']);
        $snome = $user->getEmail();
        $email = "<br><a href='https://www.google.com/account' target='_blank'>
        <span class='subtitulo'>$snome</a><br>";
        $avatar = $user->getAvatar();
        $obs = "<small>(Obs: Se desejar <b>login off-line</b> use seu <u>E-mail</u> também como senha)</small> ";
    } elseif (isset($_SESSION['snome'])) {
        $snome = $_SESSION['snome'];
        $email = "<br><a href='user'><span class='subtitulo'>$snome</span></a><br>";
        $avatar = 'app/public/img/agenda.png';
        $obs = "";

    }
    setcookie('snome', $snome, time() + 360, "/");
    echo $email;
    echo "<br><img class='avatar' src='{$avatar}'/>"; ?>
    <br><br>
    <button type="button" onclick="window.location.href='sair'" class="btn btn-dark">Sair</button>
    <br><br><br><br><br><br><br><br>
    <?=$obs?>
</fieldset>