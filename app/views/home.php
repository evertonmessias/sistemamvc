<fieldset>
    <span class='titulo'>BEM VINDO</span><br>
    <?php
    if (isset($_SESSION['gnome'])) {
        $user = unserialize($_SESSION['gnome']);
        $googlenome = $user->getName();
        $sessaonome = $user->getEmail(); //sessaonome é o email  
        $img = $user->getAvatar();     
        $conta = "<br><span class='subtitulo'>$googlenome<br><a href='user'>$sessaonome</a></span><br>";
        $avatar = "<br><img class='avatar' src='$img'/><br>";               
    } elseif (isset($_SESSION['snome'])) {
        $sessaonome = $_SESSION['snome'];
        $conta = "<br><a href='user'><span class='subtitulo'>$sessaonome</span></a><br>";
        $avatar = "<br><img class='avatar' src='app/public/img/agenda.png'/><br>";
    }
    setcookie('snome', $sessaonome, time() + 3600, "/");
    echo $conta;
    echo $avatar; 
    ?>
    <br><br>
    <button type="button" onclick="window.location.href='sair'" class="btn btn-dark">Sair</button>
</fieldset>