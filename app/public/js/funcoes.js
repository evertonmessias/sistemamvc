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

    $("#botaoprereg").click(() => {
        $("#registrar").css({ 'display': 'block' });
        $("#entrar").css({ 'display': 'none' });
        $("#contatar").css({ 'display': 'none' });
    });
    $("#botaoprecont").click(() => {
        $("#registrar").css({ 'display': 'none' });
        $("#entrar").css({ 'display': 'none' });
        $("#contatar").css({ 'display': 'block' });
    });    

    $("#botaoregistrar").click(() => {
        if (registro($("#rcpf").val(), $("#rnome").val(), $("#rsenha").val())) {
            var botaoregistrar = $("#botaoregistrar").val();
            var rnome = $("#rnome").val();
            var rcpf = validacpf($("#rcpf").val());
            var rsenha = $("#rsenha").val();
            $.post("./app/controllers/acao.php",{botaoregistrar: botaoregistrar,
                    rnome: rnome, rcpf: rcpf, rsenha: rsenha},function (mostrar) {
                    $("#quadro").fadeIn(); $("#mensagem").css({ 'background-color': '#28A745' }).html(mostrar);
                });
        }
    });

    $("#botaocontatos").click(() => {
        if (validar($("#cnome").val(), $("#ctel").val(), $("#cemail").val())) {
            var botaocontatos = $("#botaocontatos").val();
            var nome = $("#cnome").val();
            var tel = $("#ctel").val();
            var email = $("#cemail").val();
            var msg = $("#cmsg").val();
            $.post("./app/controllers/acao.php",
                { botaocontatos: botaocontatos, nome: nome, tel: tel, email: email, msg: msg },
                function (mostrar) {
                    $("#quadro").fadeIn(); $("#mensagem").css({ 'background-color': '#28A745' }).html(mostrar); $("#cnome").val('').focus();
                    $("#ctel").val(''); $("#cemail").val(''); $("#cmsg").val('');
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




function editaruser(x) {
    idd = 0;
    $('tr.linha').css({ 'background-color': '#fff' });
    $('#editaruser').css({ 'display': 'block' });
    $('#linha' + x).css({ 'background-color': '#ccc' });    
    var nome = $(".tname" + x).text();    
    $("#name").val(nome);    
    idd = x;
    $("#botaoeditaruser").click(() => {
        if ($("#name").val().length < 2 || $("#pass").val().length < 2) {
            $("#quadro").fadeIn(); $("#mensagem").html("Digite os valores corretamente !");
            $("#nome").val('').focus();
            $("#senha").val('');
            return false;
        } else {
            var botaoeditaruser = $("#botaoeditaruser").val();
            var name = $("#name").val();
            var pass = $("#pass").val();
            $.post("./app/controllers/acao.php", { botaoeditaruser: botaoeditaruser, name: name, pass: pass, idd:idd}, function (mostrar) {
                $("#quadro").fadeIn(); $("#mensagem").css({ 'background-color': '#28A745' }).html(mostrar);
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

function registro(cpf, nome, senha) {
    if (!validacpf(cpf)) {
        $("#quadro").fadeIn(); $("#mensagem").html("Digite um CPF válido !");
        return false;
    } else if (nome.length < 2) {
        $("#quadro").fadeIn(); $("#mensagem").html("Digite o Nome corretamente !");
        return false;
    } else if (senha.length < 6) {
        $("#quadro").fadeIn(); $("#mensagem").html("Digite Senha com mínimo de 6 caracteres !");
        return false;
    } else {
        return true;
    }
}

function validacpf(numero) {
    var exp = /\.|\-/g;
    var cpf = numero.replace(exp, '').toString();
    if (cpf.length == 11) {
        var v = [];
        //Calcula o primeiro dígito de verificação.
        v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
        v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
        v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
        v[0] = v[0] % 11;
        v[0] = v[0] % 10;
        //Calcula o segundo dígito de verificação.
        v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
        v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
        v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
        v[1] = v[1] % 11;
        v[1] = v[1] % 10;
        //Retorna Verdadeiro se os dígitos de verificação são os esperados.            
        if ((v[0] != cpf[9]) || (v[1] != cpf[10])) { return false }
        else if (cpf[0] == cpf[1] && cpf[1] == cpf[2] && cpf[2] == cpf[3] && cpf[3] == cpf[4] && cpf[4] == cpf[5] && cpf[5] == cpf[6] && cpf[6] == cpf[7] && cpf[7] == cpf[8] && cpf[8] == cpf[9] && cpf[9] == cpf[10]) { return false }
        else { return cpf }
    } else { return false } // 11               
}
