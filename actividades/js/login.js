/* global $ */
(function() {

    $(document).keypress(function(e) {
        if (e.which == 13) {
            var ini = checkForm(event);
            if (ini) {
                loggingInAjax();
            }
        }
    });



    $('#btEnviar').on("click", function(event) {
        var ini = checkForm(event);
        if (ini) {
            loggingInAjax();
        }
    });

    
    
    $('.editar').on("click", function(event) {
        checkForm2(event);
       
    });



}());



/************************************************ Funciones Secundarias *************************************/


//Validamos el formulario en el submit
function checkForm2(event) {
    var dni = $('#addDni');
    var password = $('#addPass');
    var bt = $('.btadd');
    var correcto = true;
    ocultarmsg();

    if (!compruebaDni(dni)) {
        mensaje(bt,'El dni no es valido.Intentalo de nuevo', 'dni');
        correcto = false;
    }
    else {
      correcto = true;
    }
    alert("PASS"+checkTam(password, 4));
    if (!checkTam(password, 4)) {
        mensaje(bt,'La contraseña debe ser tener minimo 5 caracteres', 'pass');
        correcto = false;
    }
    else {
        correcto = true;
    }

    if(!correcto){
        event.preventDefault();
    }

    return correcto;
    //return true;
}


//Validamos el formulario en el submit
function checkForm(event) {
    var dni = $('#iptDni');
    var password = $('#iptPassword');
    var bt = $('#btEnviar');
    var correcto = true;
    ocultarmsg();

    if (!compruebaDni(dni)) {
        mensaje(bt,'El dni no es valido.Intentalo de nuevo', 'dni');
        correcto = false;
    }
    else {
      correcto = true;
    }
    alert("PASS"+checkTam(password, 4));
    if (!checkTam(password, 4)) {
        mensaje(bt,'La contraseña debe ser tener minimo 5 caracteres', 'pass');
        correcto = false;
    }
    else {
        correcto = true;
    }

    if(!correcto){
        event.preventDefault();
    }

    return correcto;
    //return true;
}


//Función que comprueba el tamaño del elemento 
//Pasandole id y tamaño a comprobar
//Devuelve true o false
function checkTam(idText, tam) {
    return $(idText).val().length > tam ? true : false;
}



function compruebaDni(nif) {

    var dni = nif.val();

    var num = "";

    for (var x = 0; x < 8; x++) {
        num = num + dni.charAt(x);

    }
    var posLetra;
    var correcto = false;
    var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
    posLetra = num % 23;

    if (num < 0 || num < 99999999) {

        if (dni.charAt(8) != letras.charAt(posLetra)) {
            correcto = false;
        }
        else {

            correcto = true;


        }
    }
    else {
        correcto = false;
    }
    return correcto;
}

function loggingInAjax() {
    var inicio;
    $.ajax({
        url: 'index.php',
        data: {
            ruta: 'profesor',
            accion: 'login',
            dni: $('#iptDni').val(),
            password: $('#iptPassword').val()
        },
        type: 'GET',
        dataType: 'json'
    }).done(function(objetoJson) {
        login(objetoJson);
    });

    return inicio;
}

function login(objetoJson) {
    if (objetoJson.login == "1") {
        $(location).attr('href', 'index.php');
    }
    else {
        var bt = $('#btEnviar');
        mensaje(bt, 'No se ha podido iniciar sesion compruebe el usuario o la contraseña', 'pass');
    }
}

function mensaje(elemento, texto, clase) {
    var alerta = $('<div/>');
    alerta.addClass('alert alert-danger ' + clase);
    alerta.text(texto);
    alerta.insertBefore(elemento);
}

function ocultarmsg() {
    $('.pass').remove();
    $('.dni').remove();
}
