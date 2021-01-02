<?php
require_once "vendor/autoload.php";

use League\OAuth2\Client\Provider\Google;
use app\Db;

// Auth Google

$google = new Google(GOOGLE);
$authUrl = $google->getAuthorizationUrl();

$error = filter_input(INPUT_GET, "error", FILTER_SANITIZE_STRING);
$code = filter_input(INPUT_GET, "code", FILTER_SANITIZE_STRING);

if ($code) {
    $token = $google->getAccessToken("authorization_code", ["code" => $code]);
    $_SESSION['gnome'] = serialize($google->getResourceOwner($token));
    $gemail = unserialize($_SESSION['gnome']);
    if (!Db::user($gemail->getEmail())) {
        Db::registrar($gemail->getEmail(), $gemail->getEmail());
    }
    header("Location:" . GOOGLE['redirectUri']);
}
?>
<br>
<form method="POST">
    <div id='entrar'>
        <fieldset id="form1">
            <legend>LOGIN</legend><br>
            <div id='menulogin'>
            <a href="#" id='botaoprereg'>REGISTRAR</a>
            &nbsp;
            <a href="#" id='botaoprecont'>CONTATOS</a>
            </div>
            <br><br>
            <input type="text" id="email" placeholder="E-Mail"><br>
            <input type="password" id="senha" placeholder="Senha">
            <br><br>
            <button type="button" title='Entrar com E-Mail e Senha' id="botaologin" class="btn btn-primary">ENTRAR</button>
            &ensp;
            <?php
            echo "<a href='{$authUrl}'><button type='button' title='Entrar com uma conta Google' class='btn btn-dark'><img class='btngoogle' src='app/public/img/logo_google.png'></button></a>";
            if ($error) {
                echo "<h3>VC PRECISA AUTORIZAR</h3>";
            }
            ?>            
            <br><br><br>
        </fieldset>
    </div>
    <div id='registrar'>
        <fieldset id="form2">
            <legend>REGISTRAR</legend><br>
            <input type='text' id='remail' placeholder='Digite seu E-Mail'><br>
            <input type='password' id='rsenha' placeholder='Digite uma Senha'>
            <br><br>
            <button type='button' id='botaoregistrar' class='btn btn-success'>REGISTRAR</button>
            &ensp;
            <button type="button" onclick="window.location.reload()" class="btn btn-danger">CANCELAR</button>
            <br><br>
        </fieldset>
    </div>
    <div id="contatar">
        <fieldset id="form3">
            <legend>CONTATE O ADMINISTRADOR:</legend><br>
            <input type='text' id='cnome' placeholder='Seu Nome' required><br>
            <input type='text' id='ctel' placeholder='Seu Telefone' required><br>
            <input type='text' id='cemail' placeholder='Seu E-Mail' required><br>
            <textarea id='cmsg' cols='45' rows='8' placeholder=' Mensagem' required></textarea>
            <br><br><button type='button' id='botaocontatos' class='btn btn-secondary'>ENVIAR</button>
            &ensp;
            <button type="button" onclick="window.location.reload()" class="btn btn-danger">CANCELAR</button>
            <br><br>
        </fieldset>
    </div>
</form>