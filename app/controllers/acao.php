<?php
use app\Db;
require_once '../../vendor/autoload.php';

if(isset($_POST['botaoregistrar'])){
    Db::registrar();
}

if(isset($_POST['botaoeditaruser'])){
    Db::editaruser();
}

if(isset($_POST['botaocontatos'])){
    Db::contatos();
}
if(isset($_POST['botaoinserir'])){
    Db::inserir();
}

if(isset($_POST['botaoalterar'])){
    Db::alterar();
}
if(isset($_POST['botaoapagar'])){
    Db::apagar();
}

if(isset($_POST['botaologin'])){
    Db::login();
}

