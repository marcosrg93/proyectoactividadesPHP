/* global $ */
(function() {

    $('#btActividad').on('click', function() {

    });

    $('#btGrupos').on('click', function() {

    });


    $('#btPerfil').on('click', function() {

    });





    $('#btLogout').on('click', function() {
       logoutAjax();
    });


}());

function logoutAjax(){
    $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'logout'

            },
            type: 'GET',
            dataType: 'json'
        }).done(function(objetoJson) {
            logout();
        });
}

function logout() {
    $(location).attr('href', 'index.php');
}
