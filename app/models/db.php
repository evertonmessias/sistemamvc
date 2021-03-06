<?php

namespace app;

use Dompdf\Dompdf;

class Db
{
    public static function user($email)
    {
        $tab = DB_TAB0;
        $idd = "";
        $sql = "SELECT * FROM " . $tab . " WHERE `email` = '$email'";
        $lista = Sistema::conexao()->query($sql);
        $saida = "";
        $saida .= "<table class='tabela user'><tr class='user'><th class='thida'><h4>ID</h4></th><th><h4>Nome</h4></th></tr>";
        foreach ($lista as $vetor) {
            $idd = $vetor['id'];
            $saida .= "<tr class='linha' id='linha" . $vetor['id'] . "' onclick='editaruser(" . $vetor['id'] . ")'>
                <td class='tid" . $vetor['id'] . "'>" . $vetor['id'] . "</td>
                <td class='tname" . $vetor['id'] . "'>" . $vetor['email'] . "</td>                              
                </tr>";
        }
        $saida .= "</table>";

        if ($idd == "") return false;
        else {
            return $saida;
        }
    }

    public static function editaruser()
    {
        $idd = $_POST['idd'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $tab = DB_TAB0;
        $sql = "UPDATE `$tab` SET email = '$email', pass = '$pass' WHERE id = '$idd'";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "Sucesso !!!<br>(Necessita <a href='sair'>'Sair'</a>)";
        } else {
            print "<p><b>Algum ERRO ocorreu !!!</b></p>";
        }
    }

    public static function consultar($tipo)
    {
        $tab = $_COOKIE['snome'];
        $idd = "";
        $sql = "SELECT * 
        from `$tab`";
        $lista = Sistema::conexao()->query($sql);
        $saida = "";
        $saida .= "<table class='tabela'><tr class='$tipo'><th class='thida'><h4>ID</h4></th><th><h4>Nome</h4></th><th><h4>Telefone</h4></th><th><h4>E-Mail</h4></th></tr>";
        foreach ($lista as $vetor) {
            $idd = $vetor['id'];
            if ($tipo == "consultar" || $tipo == "inserir") {
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
        $saida .= "</table><br>";
        if ($idd == "") return "<h3>Não ha Registros ! &#9785;</h3>";
        else return $saida;
    }

    public static function imprimir()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(Db::consultar('consultar'));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }


    public static function inserir()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $tab = $_COOKIE['snome'];
        $sql = "INSERT INTO `$tab` (id,nome,telefone,email) VALUES (default, '$nome', '$tel', '$email')";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<br><h2>Sucesso !!!</h2><br>";
        } else {
            print "<p><b>Algum ERRO ocorreu $tab !!!</b></p>";
        }
    }

    public static function alterar()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $idd = $_POST['idd'];
        $tab = $_COOKIE['snome'];
        $sql = "UPDATE `$tab` SET nome = '$nome', email = '$email' , telefone = '$tel' WHERE id = '$idd'";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<script>window.location.href='alterar'</script>";
        } else {
            print "<p><b>ERRO ao alterar !!!</b></p>";
        }
    }
    public static function apagar()
    {
        $tab = $_COOKIE['snome'];
        $idd = $_POST['idd'];
        $sql = "DELETE FROM `$tab` WHERE id = '$idd'";
        $result = Sistema::conexao()->query($sql);
        if ($result) {
            print "<script>window.location.href='apagar'</script>";
        } else {
            echo "<p><b>ERRO ao apagar !!!</b></p>";
        }
    }

    public static function login()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        Sistema::conexao();
        $tab = DB_TAB0;
        $criptosenha = md5($senha);
        $sql = "SELECT * from $tab where users.email='$email' and users.pass='$criptosenha'";
        $resultado = Sistema::conexao()->query($sql);
        $busca = false;
        foreach ($resultado as $linha) {
            if ($linha['email'] == $email && $linha['pass'] == $criptosenha) {
                $busca = true;
            }
        }
        if ($busca) {
            session_start();
            $_SESSION['snome'] = $email;
            print "<script>window.location.href='home'</script>";
        } else {
            print "<p><b>ERRO - Usuario ou senha invalidos</b></p>";
        }
    }
    public static function registrar($email, $senha)
    {
        $tab = DB_TAB0;
        $criptosenha = md5($senha);

        $sql = "INSERT INTO $tab (id, email, pass) VALUES (default, '$email', '$criptosenha')";
        $resposta = Sistema::conexao()->query($sql);

        $sql2 = "CREATE TABLE `$email` (`id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,`nome` varchar(32) NOT NULL,`telefone` varchar(32) NOT NULL,`email` varchar(32) NOT NULL)DEFAULT CHARSET=utf8;";
        $resposta2 = Sistema::conexao()->query($sql2);

        if ($resposta && $resposta2) {
            print "Sucesso !!!<br>$email, $senha<br>Agora efetue Login";
        } else {
            print "<p><b>CPF já Cadastrado !!!</b></p>";
        }
    }
    public static function contatos()
    {
        $nome = $_POST['nome'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];
        $meuemail = 'everton.messias@gmail.com';
        $assunto = 'Mensagem do Sistema VMC';

        $cabecalho =
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=UTF-8;' . "\r\n" .
            'From: ' . $email . "\r\n" .
            'Reply-To: ' . $meuemail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $mensagem = "<h5>Nome: " . $nome . "<br>Telef: " . $tel . "<br>Mensagem: </h5><p>" . $msg . "</p>";

        $enviar = mail($meuemail, $assunto, $mensagem, $cabecalho);

        print "Nome: " . $nome . "<br>E-mail: " . $email . "<br><br>";
        if ($enviar) {
            print "Mensagem Enviada com Sucesso !";
        } else {
            print "Erro - Mensagem não Enviada !";
        }
    }
}
