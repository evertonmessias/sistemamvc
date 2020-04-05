$(() => {

    $("#quadro").click(() => {
        $(this).fadeOut();
        window.location.reload();
    });

    $("#botaoinserir").click(() => {
        if (validar($("#nome").val(), $("#tel").val(), $("#email").val())) {
            var botaoinserir = $("#botaoinserir").val();
            var nome = $("#nome").val();
            var email = $("#email").val();
            var tel = $("#tel").val();
            $.post("./app/controllers/acao.php", { botaoinserir: botaoinserir, nome: nome, email: email, tel: tel }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").css({ 'background-color': '#28A745' }).html(mostrar);
            });
        }
    });

    $("#botaoinseriruser").click(() => {
        if ($("#name").val().length < 2 || $("#pass").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite os valores corretamente !");
            $("#nome").val('').focus();
            $("#senha").val('');
            return false;
        } else {
            var botaoinseriruser = $("#botaoinseriruser").val();
            var name = $("#name").val();
            var pass = $("#pass").val();
            var adm = Number($('#adm').prop('checked'));
            console.log(adm);
            $.post("./app/controllers/acao.php", { botaoinseriruser: botaoinseriruser, name: name, pass: pass, adm, adm }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").css({ 'background-color': '#28A745' }).html(mostrar);
            });
        }
    });

    $("#botaologin").click(() => {
        if ($("#nome").val().length < 2 || $("#senha").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite o login corretamente !");
            $("#nome").val('').focus();
            $("#senha").val('');
            return false;
        } else {
            var botaologin = $("#botaologin").val();
            var nome = $("#nome").val();
            var senha = $("#senha").val();
            $.post("./app/controllers/acao.php", { botaologin: botaologin, nome: nome, senha: senha }, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
            });
        }
    });

    $("#botaocontatos").click(() => {
        if (validar($("#cnome").val(), $("#ctel").val(),$("#cemail").val())) {
            var botaocontatos = $("#botaocontatos").val();
            var nome = $("#cnome").val();
            var tel = $("#ctel").val();
            var email = $("#cemail").val();
            var msg = $("#cmsg").val();
            $.post("./app/controllers/acao.php",
                { botaocontatos: botaocontatos, nome: nome, tel: tel, email: email, msg: msg },
                function (mostrar) {
                    $("#quadro").fadeIn(); $("#mensagem").css({ 'background-color': '#28A745' }).html(mostrar); $("#cnome").val('').focus();
                    $("#ctel").val('');$("#cemail").val(''); $("#cmsg").val('');
                });
        }
    });

})

// *********************

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
    $("#botaoalterar").click(() => {
        if (validar($("#anome").val(), $("#atel").val(), $("#aemail").val())) {
            var botaoalterar = $("#botaoalterar").val();
            var nome = $("#anome").val();
            var email = $("#aemail").val();
            var tel = $("#atel").val();
            $.post("./app/controllers/acao.php", { botaoalterar: botaoalterar, idd: idd, nome: nome, email: email, tel: tel }, function (mostrar) {
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
    $("#botaoapagar").click(() => {
        var botaoapagar = $("#botaoapagar").val();
        $.post("./app/controllers/acao.php", { botaoapagar: botaoapagar, idd: idd }, function (mostrar) {
            $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
        });
    });
}

function apagaruser(y) {
    idd = 0;
    $('tr.linha').css({ 'background-color': '#fff' });
    $('#apagar').css({ 'display': 'block' });
    $('#inseriruser').css({ 'display': 'none' });
    $('#linha' + y).css({ 'background-color': '#ccc' });
    idd = y;
    $("#botaoapagaruser").click(() => {
        var botaoapagaruser = $("#botaoapagaruser").val();
        $.post("./app/controllers/acao.php", { botaoapagaruser: botaoapagaruser, idd: idd }, function (mostrar) {
            $("#quadro").fadeIn(); $("#mensagem").html(mostrar);
        });
    });
}

function validar(nome, telefone, email) {
    var exp = /^\w+([\.-]\w+)*@\w+\.(\w+\.)*\w{2,3}$/; // ER valida mail
    if (nome.length < 2) {
        $("#quadro").fadeIn(); $("#mensagem").html("Digite o Nome corretamente !");
        return false;
    } else if (telefone.length < 8 || isNaN(telefone)) {
        $("#quadro").fadeIn(); $("#mensagem").html("Digite o Telefone corretamente !");
        return false;
    } else if (!exp.test(email)) {
        $("#quadro").fadeIn(); $("#mensagem").html("Digite o E-Mail corretamente !");
        return false;
    } else {
        return true;
    }
}