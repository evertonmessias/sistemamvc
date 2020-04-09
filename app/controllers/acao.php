<?php

use app\Db;

require_once '../../vendor/autoload.php';

if (isset($_POST['botaoregistrar'])) {
    if (Db::user($_POST['remail'])) {
        print "Usuário já existe !!!<br>";
    } else {
        Db::registrar($_POST['remail'], $_POST['rsenha']);
    }
}

if (isset($_POST['botaoeditaruser'])) {
    Db::editaruser();
}

if (isset($_POST['botaocontatos'])) {
    Db::contatos();
}
if (isset($_POST['botaoinserir'])) {
    Db::inserir();
}

if (isset($_POST['botaoalterar'])) {
    Db::alterar();
}
if (isset($_POST['botaoapagar'])) {
    Db::apagar();
}

if (isset($_POST['botaologin'])) {
    Db::login();
}

if (isset($_POST['botaoimprimir'])) {
    Db::imprimir();
}
