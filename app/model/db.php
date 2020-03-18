<?php
namespace app;
abstract class Db
{
    public static function consultar($tipo)
    {
        $sql = "SELECT 
        pessoas.id,
        pessoas.nome,
        pessoas.telefone,
        pessoas.email 
        from " . Sistema::$tabela1 . "";
        $lista = Sistema::conexao()->query($sql);
        $saida = "";
        print "<table class='tabela'><tr class='$tipo'><th class='thida'><h4>ID</h4></th><th><h4>Nome</h4></th><th><h4>Telefone</h4></th><th><h4>E-Mail</h4></th></tr>";
        foreach ($lista as $vetor) {
            if ($tipo == "consultar") {
                $saida .= "<tr><td class='tdida'>" . $vetor['id'] . "</td><td>" . $vetor['nome'] . "</td><td>" . $vetor['telefone'] . "</td><td>" . $vetor['email'] . "</td></tr>";
            } elseif ($tipo == "alterar") {
                $saida .= "<tr class='linha' id='linha" . $vetor['id'] . "' onclick='alterar(" . $vetor['id'] . ")'>
                <td class='tdida'>" . $vetor['id'] . "</td>
                <td class='tnome" . $vetor['id'] . "'>" . $vetor['nome'] . "</td>
                <td class='ttelefone" . $vetor['id'] . "'>" . $vetor['telefone'] . "</td>
                <td class='temail" . $vetor['id'] . "'>" . $vetor['email'] . "</td>
                </tr>";
            } elseif ($tipo == "apagar") {
                $saida .= "<tr class='linha' id='linha" . $vetor['id'] . "' onclick='apagar(" . $vetor['id'] . ")'>              
                <td class='tdida'>" . $vetor['id'] . "</td>
                <td>" . $vetor['nome'] . "</td>
                <td>" . $vetor['telefone'] . "</td>
                <td>" . $vetor['email'] . "</td>
                </tr>";
            }
        }
        $saida .= "</table>";
        return $saida;
    }
    public static function inserir()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $tab = Sistema::$tabela1;
        $sql = "INSERT INTO $tab (id, nome, telefone, email) VALUES (default, '$nome', '$tel', '$email')";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<script>window.location.href='?p=inserir'</script>";
        } else {
            print "<p><b>Algum ERRO ocorreu !!!</b></p>";
        }
    }
    public static function alterar()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $idd = $_POST['idd'];
        $tab = Sistema::$tabela1;
        $sql = "UPDATE $tab SET nome = '$nome', email = '$email' , telefone = '$tel' WHERE id = '$idd'";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<script>window.location.href='?p=alterar'</script>";
        } else {
            print "<p><b>ERRO ao alterar !!!</b></p>";
        }
    }
    public static function apagar()
    {
        $tab = Sistema::$tabela1;
        $idd = $_POST['idd'];
        $sql = "DELETE FROM $tab WHERE id = '$idd'";
        $result = Sistema::conexao()->query($sql);
        if ($result) {
            print "<script>window.location.href='?p=apagar'</script>";
        } else {
            echo "<p><b>ERRO ao apagar !!!</b></p>";
        }
    }
    public static function contatos()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        $eu = 'everton.messias@gmail.com';
        $assunto = 'Mensagem do Site';

        $cabecalho = 'MIME-Version: 1.0' . "\r\n";
        $cabecalho .= 'Content-type: text/html; charset=UTF-8;' . "\r\n";
        $cabecalho .= $email."\r\n"; 

        $enviar = mail($eu, $assunto, $nome.", escreveu:\r\n".$msg, $cabecalho);
        
        print "Nome: " . $nome . "<br>E-mail: " . $email . "<br><br>";
        if ($enviar) {
            print "Mensagem Enviada com Sucesso !";
        } else {
            print "Erro - Mensagem não Enviada !";
        }
    }
    public static function login()
    {
        $nome = @$_POST['nome'];
        $senha = @$_POST['senha'];
        Sistema::conexao();
        $criptosenha = md5($senha);
        $sql = "SELECT users.name,users.pass from users where users.name='$nome' and users.pass='$criptosenha'";
        $resultado = Sistema::conexao()->query($sql);
        $busca = false;
        foreach ($resultado as $linha) {
            if ($linha['name'] == $nome && $linha['pass'] == $criptosenha) $busca = true;
        }
        if ($busca) {
            session_start();
            $_SESSION['snome'] = $nome;
            print "<script>window.location.href='../'</script>";
        } else {
            print "<p><b>ERRO - Usuario ou senha invalidos</b></p>";
        }
    }
}