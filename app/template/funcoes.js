idd = 0;
function alterar(x) {
    idd = 0;
    $("#anome").val("");
    $("#atel").val("");
    $("#aemail").val("");
    $('tr.linha').css({ 'background-color': '#fff' });
    $('#alterar').css({ 'display': 'block' });
    $('#linha' + x).css({ 'background-color': '#ccc' });
    var nome = $(".tnome" + x).text();
    var telefone = $(".ttelefone" + x).text();
    var email = $(".temail" + x).text();
    $("#anome").val(nome);
    $("#atel").val(telefone);
    $("#aemail").val(email);
    idd = x;
    $("#botaoalterar").click(function () {        
        if ($("#anome").val().length < 2 || $("#aemail").val().length < 2 || $("#atel").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite os campos corretamente !");
            $("#anome").val('').focus(); $("#aemail").val(''); $("#atel").val('');
            return false;
        }
        else {
            var botaoalterar = $("#botaoalterar").val();
            var nome = $("#anome").val();
            var email = $("#aemail").val();
            var tel = $("#atel").val();
            $.post("./app/model/acao.php", {botaoalterar:botaoalterar , idd: idd, nome: nome, email: email, tel: tel }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
            });
        }
    });
}
function apagar(y) {
    idd = 0;
    $('tr.linha').css({ 'background-color': '#fff' });
    $('#apagar').css({ 'display': 'block' });
    $('#linha' + y).css({ 'background-color': '#ccc' });
    idd = y;
    $("#botaoapagar").click(function () { 
        var botaoapagar = $("#botaoapagar").val();       
        $.post("./app/model/acao.php", { botaoapagar:botaoapagar,idd: idd }, function (mostrar) {
            $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
        });
    });
}

$(function () {

    $("#quadro").click(function () {
        $(this).fadeOut();
    });

    $("#botaoinserir").click(function () {
        if ($("#nome").val().length < 2 || $("#email").val().length < 2 || $("#tel").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite os campos corretamente !");
            $("#nome").val('').focus();
            $("#email").val(''); $("#tel").val('');
            return false;
        } else {
            var botaoinserir = $("#botaoinserir").val();
            var nome = $("#nome").val();
            var email = $("#email").val();
            var tel = $("#tel").val();
            $.post("./app/model/acao.php", {botaoinserir:botaoinserir,nome: nome, email: email, tel: tel }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
            });
        }
    });

    $("#botaologin").click(function () {
        if ($("#nome").val().length < 2 || $("#senha").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite o login corretamente !");
            $("#nome").val('').focus();
            $("#senha").val('');
            return false;
        } else {
            var botaologin = $("#botaologin").val();
            var nome = $("#nome").val();
            var senha = $("#senha").val();           
            $.post("./model/acao.php", {botaologin:botaologin, nome: nome, senha: senha }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
            });
        }
    });

    $("#botaocontatos").click(function () {
        if ($("#cnome").val().length < 2 || $("#cemail").val().length < 2 || $("#cmsg").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite os campos corretamente !");
            $("#cnome").val('').focus();
            $("#cemail").val(''); $("#cmsg").val('');
            return false;
        } else {
            var botaocontatos = $("#botaocontatos").val();
            var nome = $("#cnome").val();
            var email = $("#cemail").val();
            var msg = $("#cmsg").val();
            $.post("./app/model/acao.php", {botaocontatos:botaocontatos, nome: nome, email: email, msg: msg }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").html(mostrar);$("#cnome").val('').focus();
                $("#cemail").val(''); $("#cmsg").val('');
            });
        }
    });

})