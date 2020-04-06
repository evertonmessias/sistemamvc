<?php
namespace app;

class Db
{
    public static function user()
    {
        function adm($x){
            if($x == 1){
                return "sim";
            }else{
                return "não";
            }
        }
        $sql = "SELECT *         
        from " . DB_TAB0 . "";
        $lista = Sistema::conexao()->query($sql);
        $saida = "";
        $saida .= "<table class='tabela user'><tr class='user'><th class='thida'><h4>ID</h4></th><th><h4>Nome</h4></th><th><h4>Adm ?</h4></th></tr>";
        foreach ($lista as $vetor) {
                $saida .= "<tr class='linha' id='linha" 
                . $vetor['id'] . "' onclick='apagaruser(" . $vetor['id'] . ")'>              
                <td class='tdida'>" . $vetor['id'] . "</td>
                <td>" . $vetor['name'] . "</td>
                <td>" . adm($vetor['adm']) . "</td>
                </tr>";            
        }
        $saida .= "</table>";
        return $saida;
    }
    public static function consultar($tipo)
    {
        $sql = "SELECT 
        pessoas.id,
        pessoas.nome,
        pessoas.telefone,
        pessoas.email 
        from " . DB_TAB1 . "";
        $lista = Sistema::conexao()->query($sql);
        $saida = "";
        $saida .= "<table class='tabela'><tr class='$tipo'><th class='thida'><h4>ID</h4></th><th><h4>Nome</h4></th><th><h4>Telefone</h4></th><th><h4>E-Mail</h4></th></tr>";
        foreach ($lista as $vetor) {
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
        $saida .= "</table>";
        return $saida;
    }
    public static function inserir()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $tab = DB_TAB1;
        $sql = "INSERT INTO $tab (id, nome, telefone, email) VALUES (default, '$nome', '$tel', '$email')";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<br><h2>Sucesso !!!</h2><br>";
        } else {
            print "<p><b>Algum ERRO ocorreu !!!</b></p>";
        }
    }
    public static function inseriruser()
    {
        $name = $_POST['name'];
        $pass = md5($_POST['pass']);
        $adm = $_POST['adm'];        
        $tab = DB_TAB0;
        $sql = "INSERT INTO $tab (id, name, pass, adm) VALUES (default, '$name', '$pass', '$adm')";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<br><h2>Sucesso !!!</h2><br>";
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
        $tab = DB_TAB1;
        $sql = "UPDATE $tab SET nome = '$nome', email = '$email' , telefone = '$tel' WHERE id = '$idd'";
        $resposta = Sistema::conexao()->query($sql);
        if ($resposta) {
            print "<script>window.location.href='alterar'</script>";
        } else {
            print "<p><b>ERRO ao alterar !!!</b></p>";
        }
    }
    public static function apagar()
    {
        $tab = DB_TAB1;
        $idd = $_POST['idd'];
        $sql = "DELETE FROM $tab WHERE id = '$idd'";
        $result = Sistema::conexao()->query($sql);
        if ($result) {
            print "<script>window.location.href='apagar'</script>";
        } else {
            echo "<p><b>ERRO ao apagar !!!</b></p>";
        }
    }
    public static function apagaruser()
    {
        $tab = DB_TAB0;
        $idd = $_POST['idd'];
        $sql = "DELETE FROM $tab WHERE id = '$idd'";
        $result = Sistema::conexao()->query($sql);
        if ($result) {
            print "<script>window.location.href='user'</script>";
        } else {
            echo "<p><b>ERRO ao apagar !!!</b></p>";
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
        'From: ' .$email . "\r\n". 
        'Reply-To: ' . $meuemail. "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        $mensagem = "<h5>Nome: ".$nome."<br>Telef: ".$tel."<br>Mensagem: </h5><p>".$msg."</p>";

        $enviar = mail($meuemail, $assunto, $mensagem, $cabecalho);
        
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
        $tab = DB_TAB0;
        $criptosenha = md5($senha);
        $sql = "SELECT * from $tab where users.name='$nome' and users.pass='$criptosenha'";
        $resultado = Sistema::conexao()->query($sql);
        $busca = false;
        foreach ($resultado as $linha) {
            if ($linha['name'] == $nome && $linha['pass'] == $criptosenha) {
                $busca = true;
                $adm = $linha['adm'];
            }
        }
        if ($busca) {
            session_start();
            $_SESSION['snome'] = $nome;
            $_SESSION['sadm'] = $adm;
            print "<script>window.location.href='home'</script>";
        } else {
            print "<p><b>ERRO - Usuario ou senha invalidos</b></p>";
        }
    }
    public static function registrar(){
        $cpf = @$_POST['rcpf'];
        $nome = @$_POST['rnome'];
        $senha = @$_POST['rsenha'];
        print "SUCESSO !!!<br>$cpf, $nome, $senha<br>Agora efetue Login";
    }
}