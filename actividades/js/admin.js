/* global $ */
(function() {
    
    var page = 1;


    /*
     * Admin Menu
     * Menu lateral que realiza las peticiones Ajax
     * Los datos que llegan por json se listan en una tabla
     */
//     $('#btActividad').on('click', function() {
//         alert('Mostrar Actividades');
//     });


//     $('#btProfesor').on('click', function() {
//         alert('Mostrar Profesores');
//     });


//     $('#btGrupos').on('click', function() {
//         alert('Mostrar Grupos');
//         listarGrupos();
//     });


//     $('#btPerfil').on('click', function() {
//         alert('Mostrar Perfil');
//     });






//  function listarGrupos(){
//         $.ajax({
//             url: 'index.php',
//             data: {
//                 ruta: 'grupos',
//                 accion: ' grupopage',
//                 pagina: page
//             },
//             type: "GET",
//             dataType: "json"
//         }).done(function(objetoJson) {
//             /*$('#loading').find('.pantallaCarga').remove();*/
//             /*$('#loading').show();*/
//             actualizar(objetoJson);
//             //Asignamos eventos a la tabla
//             eliminar();
//             modificar();
//             //Cargamos datos en la modal
//             edModificar();
//             page = objetoJson.page;
//         });
//     }



}());
