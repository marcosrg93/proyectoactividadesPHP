/* global $ */
(function() {

    var verificar = 0;
    var page = 1;
    var user = null;
    var iduser = null;


    /* eventos inmediatamente asignados */
    $(document).ready(function() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'islogin'
            },
            type: 'GET',
            dataType: 'json',
        }).done(function(objetoJson) {
            cargaprimerapagina(objetoJson);
            infoUsuario(objetoJson);
        });
    });


    $('#btLogout').on('click', function() {
        cerrar();
    });


    /* funciones */

    //Funcion qque actualiza los datos de la tabla y pone el titulo
    function actualizar(objetoJson) {
        $('#tabladatos table').remove();
        if (objetoJson.actividades) {
            $('#titulo-pagina').text('Lista Actividades');
            $('#tabladatos').append(getMetaDatosTable(objetoJson.actividades));
            $('.btadd').attr("data-ruta", 'actividades');
        }

        if (objetoJson.grupos) {
            $('#titulo-pagina').text('Lista Grupos');
            $('#tabladatos').append(getMetaDatosTable(objetoJson.grupos));
        }
        addEventToPagesLinks();
        addEventToDeleteUserLink();
    }

    function addEventToDeleteUserLink() {
        $('.delete').on('click', function() {
            var userDel = $(this).data('user');
            $('#nombreDelete').text(userDel);
            user = userDel;
        });
    }
    //evento del document que pregunta si estas logueado al servidor
    function addEventToPagesLinks() {
        $('.page-link').on('click', function() {
            var pagina = $(this).data('page');
            if (pagina == 'p+1') {
                page++;
            }
            else if (pagina == 'p-1') {
                page--;
            }
            else {
                page = pagina;
            }
            if (page < 1) {
                page = 1;
            }
            $.ajax({
                url: 'index.php',
                data: {
                    ruta: 'ajax',
                    accion: 'userpage',
                    pagina: page
                },
                type: "GET",
                dataType: "json"
            }).done(function(objetoJson) {
                actualizar(objetoJson);
                page = objetoJson.page;
            });

        });
    }

    function cargaprimerapagina(objetoJson1) {
        if (objetoJson1.login == "1") {
            listarActividades();
            modificar();
        }
    }

    /*Función para la pantalla de carga de enlaces determinados*/
    function loadingSmall() {
        var container = $('#page-wrapper');
        container.children().hide();
        container.css('padding-right', '0px');
        container.append('<div class="pantallaCarga ajuste"></div>');
        setTimeout(reloadPagina, 3000);
    }

    function reloadPagina() {
        var container = $('#page-wrapper');
        container.css('padding-right', '30px');
        $('.pantallaCarga').remove();
        container.children().show();
    }

    //Petición Ajax que cierra la sesión del usuario
    function cerrar() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'logout'
            },
            type: 'GET',
            dataType: 'json'
        }).done(function(objetoJson) {
            $(location).attr('href', 'index.php');
        });
    }

    function infoUsuario(objetoJson) {
        iduser = objetoJson.profesor.idProfesor;
        $('#welcome').text('Actividades Profesor:' + objetoJson.profesor.nombre);
        $('#user-name').append('<i class="fa fa-user fa-fw"></i> ' +objetoJson.profesor.nombre);
    }
    //funcioon que hace la estructura de la tabla que se muestra en administracion de la aplicacion
    function getMetaDatosTable(datos) {
        //array de campos no visibles
        var camposNoVisibles = ['idProfesor', 'idGrupo', 'idActividades', 'longitud', 'latitud'];
        //campo id de la tabla, nombre de la ruta
        var id, data, longitud, latitud, con = 1;
        //String de la tabla formateada y los datos de las columnas y propiedad nombre de las columnas
        var table = '',
            dato = datos[0],
            propiedad;
        //array de los nombre de las columnas
        var propiedades = []
            //contador para que solo coja el primer campo

        //bucle for que recorre los datos de las columnas  comprobando con la funcion inArray si esta en el array campos no visibles
        for (propiedad in dato) {
            if ($.inArray(propiedad, camposNoVisibles) == -1) {
                propiedades.push(propiedad);
            }
            else {
                switch (propiedad) {
                    case 'idProfesor':
                    case 'idActividades':
                    case 'idGrupo':
                        if (con == 1) {
                            id = propiedad
                        }
                        con++;
                        break;
                    case 'longitud':
                        longitud = propiedad;
                        break;
                    case 'latitud':
                        latitud = propiedad
                        break;
                    default:
                        break;
                }
            }
        }
        switch (id) {
            case 'idProfesor':
                data = "profesor";
                break;
            case 'idGrupo':
                data = "grupo";
                break;
            case 'idActividades':
                data = "actividades";
                propiedades.push('Mapa');
                break;
            default:
                // code
        }
        //añade al array propiedades las columnas modificar y borrar
        propiedades.push('Modificar');
        propiedades.push('Borrar');
        table += '<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead><tr>';
        for (var i = 0; i < propiedades.length; i++) {
            table += '<th>' + propiedades[i] + '</th>';
        }
        table += '</tr></thead><tbody>';
        for (var i = 0; i < datos.length; i++) {
            dato = datos[i];
            table += '<tr>';
            for (var j = 0; j < propiedades.length; j++) {
                table += '<td>';

                if (propiedades[j] == 'Borrar') {
                    if(id=='idGrupo' ||  dato[id] == iduser ){
                    table += '<a  class="btn btn-danger delete center-block" data-id-borrar="' + dato[id] + '" data-ruta="' + data + '" disabled><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</a>';    
                    }else{
                    table += '<a  class="btn btn-danger delete center-block" data-id-borrar="' + dato[id] + '" data-ruta="' + data + '"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar</a>';
                    }
                }
                else if (propiedades[j] == 'Modificar') {
                      if(id=='idGrupo' ||  dato[id] == iduser ){
                          table += '<a  class="btn btn-warning edit center-block" data-toggle="modal" data-target="#myModal' + data + '" data-id-modificar="' + dato[id] + '" data-ruta="' + data + '"disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</a>';
                      }else{
                    table += '<a  class="btn btn-warning edit center-block" data-toggle="modal" data-target="#myModal' + data + '" data-id-modificar="' + dato[id] + '" data-ruta="' + data + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modificar</a>';
                      }
                }
                else if (propiedades[j] == 'password') {
                    table += "******";
                }
                else if (propiedades[j] == 'imagen') {
                    table += '<img src="data:image/png;base64,' + dato[propiedades[j]] + '" id="imagen" width="200"/>';
                }
                else if (propiedades[j] == 'Mapa') {
                    table += '<div class="mapa" data-longitud="' + dato[longitud] + '" data-latitud="' + dato[latitud] + '"></div>' /*'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3179.635215416497!2d-3.593647084271136!3d37.161372479875766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd71fca6107464e5%3A0x5cc395f96e47c0d9!2sInstituto+de+Educaci%C3%B3n+Secundaria+Zaid%C3%ADn+Vergeles!5e0!3m2!1ses!2ses!4v1487583600048" width="350" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>'*/ ;
                }
                else {
                    table += dato[propiedades[j]];
                }
                table += '</td>';
            }
            table += '</tr>';
        }
        if(id=='idGrupo'){
            table += '<tr><td><a id="btAniadir"class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModalInsert' + data + '" data-ruta="' + data + '" disabled><i class="fa fa-plus" aria-hidden="true"></i> Añadir</a></td></tr></tbody></table>';
        }else{
        table += '<tr><td><a id="btAniadir"class="btn btn-primary btn-lg center-block" data-toggle="modal" data-target="#myModalInsert' + data + '" data-ruta="' + data + '"><i class="fa fa-plus" aria-hidden="true"></i> Añadir</a></td></tr></tbody></table>';
        }
        return table;
    }
    //funcion que carga la primera pagina de los profesores 

    function getPagination(page, pages) {
        var s = '';
        for (var i = 1; i <= pages; ++i) {
            s += '<li class="page-item pagina-borrar"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
        }
        return s;
    }





    /*****************************************************************************************************************************************************************************
     *****************************************************************************************************************************************************************************
     *************************************************************** Peticiones de listado de elementos por AJAX     ************************************************************* 
     *****************************************************************************************************************************************************************************
     ******************************************************************************************************************************************************************************/
    function listarProfesores() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'userpage',
                pagina: page
            },
            global: false,
            beforeSend: loadingSmall,
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            actualizar(objetoJson);
            //Asignamos eventos a la tabla
            eliminar();

            //Cargamos datos en la modal
            getInfo();
            page = objetoJson.page;
        });
    }

    function listarActividades() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'actividades',
                accion: 'actividadespage',
                pagina: page
            },
            global: false,
            beforeSend: loadingSmall,
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            //
            actualizar(objetoJson);
            insertActividades();
            //Asignamos eventos a la tabla
            eliminar();

            //Cargamos datos en la modal
            getInfo();
            page = objetoJson.page;
        });
    }

    function listarGrupos() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'grupos',
                accion: ' grupopage',
                pagina: page
            },
            global: false,
            beforeSend: loadingSmall,
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            //
            actualizar(objetoJson);
            //Asignamos eventos a la tabla
            eliminar();

            //Cargamos datos en la modal
            getInfo();
            page = objetoJson.page;
        });
    }

    /*****************************************************************************************************************************************************************************
     *****************************************************************************************************************************************************************************
     *************************************************************** Funciones Asociadas a los botones de la tabla   ************************************************************* 
     *****************************************************************************************************************************************************************************
     ******************************************************************************************************************************************************************************/
    $('.btadd').on('click', function() {
        var tipo = $(this).data('ruta');
        switch (tipo) {
            case 'profesor':
                addProfesor();
                break;
            case 'grupos':
                addgrupos();
                break;
            case 'actividades':
                addActividades();
                break;
            default:
                break;
        }
    });

    function getInfo() {
        $('.btn.btn-warning.edit').on('click', function() {
            var tipo = $(this).data('ruta');
            switch (tipo) {
                case 'profesor':
                    getInfoProfesor($(this).data('id-modificar'));
                    break;
                case 'grupo':
                    getInfoGrupo($(this).data('id-modificar'));
                    break;
                case 'actividades':
                    getInfoActividad($(this).data('id-modificar'));
                    break;
                default:
                    break;
            }
        });
    }

    function insertActividades() {
        $('#btAniadir').on('click', function() {
            var tipo = $(this).data('ruta');
            switch (tipo) {
                case 'actividades':
                    $('#addListaGruposAct').empty();
                    $('#addListaProfesoresAct').empty();
                    selectGrupos($('#addListaGruposAct'), null);
                    selectProfesores($('#addListaProfesoresAct'), id);
                    $('#datetimepicker8').datetimepicker();

                    $('#datetimepicker9').datetimepicker();

                    $("#datetimepicker8").on("dp.change", function(e) {
                        $('#datetimepicker9').data("DateTimePicker").minDate(e.date);
                    });

                    $("#datetimepicker9").on("dp.change", function(e) {
                        $('#datetimepicker8').data("DateTimePicker").maxDate(e.date);
                    });
                    break;
                default:
                    break;
            }
        });
    }

    function modificar() {
        $('.editar').on('click', function() {
            var tipo = $(this).data('ruta');
            switch (tipo) {
                case 'profesor':
                    modificarProfesores($(this));
                    break;
                case 'grupos':
                    modificarGrupos($(this));
                    break;
                case 'actividades':
                    modificarActividades($(this));
                    break;
                default:
                    break;
            }
        });
    }

    //Funcion asociada a los botones de borrar de la tabla
    function eliminar() {
        $('.btn.btn-danger.delete').on('click', function() {
            if (confirm(' ¿borrar datos?')) {
                var tipo = $(this).data('ruta');
                switch (tipo) {
                    case 'profesor':
                        deleteProfesor($(this));
                        break;
                    case 'grupos':
                        deleteGrupo($(this));
                        break;
                    case 'actividades':
                        deleteActividades($(this));
                        break;
                    default:
                        break;
                }
            }
        });
    }
    /*****************************************************************************************************************************************************************************
     *****************************************************************************************************************************************************************************
     *********************************************** Funciones que realizan las operaciones por peticiones AJAX      ************************************************************* 
     *****************************************************************************************************************************************************************************
     ******************************************************************************************************************************************************************************/
    function addProfesor() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'insertuser',
                nombre: $('#addNombre').val(),
                dni: $('#addDni').val(),
                password: $('#addPass').val(),
                departamento: $('#addDepartamento').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            if (objetoJson.r == 1) {
                listarProfesores();
                page = objetoJson.page;
                $('#myModalInsertprofesor').modal('hide');
            }
        });
    }

    function addActividades() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'actividades',
                accion: 'insertactividades',

                nivel: $('#addNivel').val(),
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            if (objetoJson.r == 1) {
                listarGrupos();
                page = objetoJson.page;
                $('#myModalInsertactividad').modal('hide');
            }
        });
    }

    function addgrupos() {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'grupos',
                accion: 'insertgrupo',
                nombre: $('#addNombreg').val(),
                nivel: $('#addNivel').val(),
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            if (objetoJson.r == 1) {
                listarGrupos();
                page = objetoJson.page;
                $('#myModalInsertgrupo').modal('hide');
            }
        });
    }

    //function asociada a mostrar los datos del modal
    function getInfoProfesor(data) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'getProfesor',
                idProfesor: data
            },
            type: 'GET',
            dataType: 'json',
            beforeSend: loadingSmall,
            global: false
        }).done(function(objetoJson) {
            actualizarDatosModalProfesor(objetoJson);
        });
    }

    function getInfoGrupo(data) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'grupos',
                accion: 'getGrupo',
                idGrupo: data
            },
            type: 'GET',
            dataType: 'json',
            beforeSend: loadingSmall,
            global: false
        }).done(function(objetoJson) {
            actualizarDatosModalGrupo(objetoJson);
        });
    }

    function getInfoActividad(data) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'actividades',
                accion: 'getActividad',
                idActividad: data
            },
            type: 'GET',
            dataType: 'json',
            beforeSend: loadingSmall,
            global: false
        }).done(function(objetoJson) {
            //actualizarDatosModalGrupo(objetoJson);
            actualizarDatosModalActividad(objetoJson);
        });
    }
    //funciones que muestran el modal con los datos
    //Recoge los datos del profesor y los pone en la ventana modal de edición
    function actualizarDatosModalProfesor(objetoJson) {
        $('#ednombre').val(objetoJson.profesor.nombre);
        $('#eddni').val(objetoJson.profesor.dni);
        $('#eddepartamento').val(objetoJson.profesor.departamento);
        $('.editar').attr("data-idmodificar", objetoJson.profesor.idProfesor);
        $('.editar').attr("data-ruta", 'profesor');
        $('.editar').attr("data-tipo", objetoJson.profesor.tipo);
    }

    function actualizarDatosModalGrupo(objetoJson) {
        $('#edNombreg').empty();
        selectGrupos($('#edNombreg'), objetoJson.grupo.idGrupo);
        $('#ednivel').val(objetoJson.grupo.nivel);
        $('.editar').attr("data-idmodificar", objetoJson.grupo.idGrupo);
        $('.editar').attr("data-ruta", 'grupos');
    }

    function actualizarDatosModalActividad(objetoJson) {
        $('#datetimepicker6').datetimepicker({
            defaultDate: objetoJson.actividad.horaInicio
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            defaultDate: objetoJson.actividad.horaFinal
        });
        $("#datetimepicker6").on("dp.change", function(e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function(e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
        $('#edIdActividadaAct').val(objetoJson.actividad.idActividades);
        $('#edIdProfesorAct').val(objetoJson.actividad.idProfesor);
        $('#edIdGrupoAct').val(objetoJson.actividad.idGrupo);
        $('#edListaGruposAct').empty();
        $('#edListaProfesoresAct').empty();
        selectGrupos($('#edListaGruposAct'), objetoJson.actividad.idGrupo);
        selectProfesores($('#edListaProfesoresAct'), objetoJson.actividad.idProfesor);
        $('#edTituloAct').val(objetoJson.actividad.titulo);
        //$('#datetimepicker').val(objetoJson.actividad.horaInicio);
        // $('#datetimepicker1').val(objetoJson.actividad.horaFinal);
        $('#imagenAct').attr('src', 'data:image/png;base64,' + objetoJson.actividad.imagen);
        $('#mapaModal').attr('data-longitud', objetoJson.actividad.longitud);
        $('#mapaModal').attr('data-latitud', objetoJson.actividad.latitud);
        $('#edDescripcionAct').text(objetoJson.actividad.descripcion);
        $('.editar').attr("data-idmodificar", objetoJson.actividad.idActividad);
        $('.editar').attr("data-ruta", 'actividades');
    }

    function selectGrupos(select, idgrupos) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'actividades',
                accion: 'getGrupos',
            },
            type: "GET",
            dataType: "json",
            beforeSend: loadingSmall,
            global: false
        }).done(function(objetoJson) {
            var datosGrupo = objetoJson.grupos;
            for (var i = 0; i < datosGrupo.length; i++) {
                if (datosGrupo[i]['idGrupo'] == idgrupos) {
                    select.append('<option value="' + datosGrupo[i]['idGrupo'] + '" selected>' + datosGrupo[i]['nombre'] + '</option>');
                }
                else {

                    select.append('<option value="' + datosGrupo[i]['idGrupo'] + '">' + datosGrupo[i]['nombre'] + '</option>');
                }
            }
        });
    }

    function selectProfesores(select, idprofesores) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'actividades',
                accion: 'getProfesores',
            },
            type: "GET",
            dataType: "json",
            beforeSend: loadingSmall,
            global: false
        }).done(function(objetoJson) {
            var datosProfesores = objetoJson.profesores;
            for (var i = 0; i < datosProfesores.length; i++) {
                if (datosProfesores[i]['idProfesor'] == idprofesores) {

                    select.append('<option value="' + datosProfesores[i]['idProfesor'] + '" selected>' + datosProfesores[i]['nombre'] + '</option>');
                }
                else {

                    select.append('<option value="' + datosProfesores[i]['idProfesor'] + '">' + datosProfesores[i]['nombre'] + '</option>');
                }
            }
        });
    }

    //peticiones ajax para actualizar los datos
    function modificarProfesores(buton) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'edituser',
                idProfesor: buton.data("idmodificar"),
                nombre: $('#ednombre').val(),
                dni: $('#eddni').val(),
                password: $('#edNpass').val(),
                tipo: buton.data("tipo"),
                departamento: $('#eddepartamento').val()
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            if (objetoJson.r != 0) {
                listarProfesores();
                actualizar(objetoJson);
                eliminar();
                getInfo();
                page = objetoJson.page;
                $('#myModalprofesor').modal('hide');
            }
            else if (objetoJson.r = 0) {
                var r = confirm("¿Cerrar sin guardar cambios?");
                if (r == true) {
                    $('#myModalprofesor').modal('hide');
                }
            }
        });
    }
    //Funcion asociada a los botones de modificar de la tabla
    function modificarGrupos(button) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'grupos',
                accion: 'editgrupo',
                idGrupo: button.data("idmodificar"),
                nombre: $('#edNombreg').val(),
                nivel: $('#ednivel').val(),
            },
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            if (objetoJson.r != 0) {
                listarGrupos();
                actualizar(objetoJson);
                eliminar();
                getInfoGrupo();
                page = objetoJson.page;
                $('#myModalgrupo').modal('hide');
            }
            else if (objetoJson.r = 0) {
                var r = confirm("¿Cerrar sin guardar cambios?");
                if (r == true) {
                    $('#myModalgrupo').modal('hide');
                }

            }
        });
    }

        //Funcion asociada a los botones de modificar de la tabla
    function modificarActividades(button) {
        var formulario=document.getElementById('myModalactividades');
        var forData=new FormData(formulario);
        var archivo = document.getElementById("archivo");
        $.ajax({
            url: 'index.php',
            
            type: "GET",
            dataType: "json"
        }).done(function(objetoJson) {
            if (objetoJson.r != 0) {
                listarGrupos();
                actualizar(objetoJson);
                eliminar();
                getInfoGrupo();
                page = objetoJson.page;
                $('#myModalgrupo').modal('hide');
            }
            else if (objetoJson.r = 0) {
                var r = confirm("¿Cerrar sin guardar cambios?");
                if (r == true) {
                    $('#myModalgrupo').modal('hide');
                }

            }
        });
    }


    function deleteProfesor(boton) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'profesor',
                accion: 'deleteuser',
                idProfesor: boton.data("id-borrar")
            },
            type: 'GET',
            dataType: 'json'
        }).done(function(objetoJson) {
            if (objetoJson.r > 0) {
                listarProfesores();
            }
        });
    }


    //Funcion asociada a los botones de borrar de la tabla
    function deleteGrupo(boton) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'grupos',
                accion: 'deletegrupo',
                idgrupo: boton.data("id-borrar")
            },
            type: 'GET',
            dataType: 'json'
        }).done(function(objetoJson) {
            if (objetoJson.r > 0) {
                listarGrupos();
            }
        });
    }


    //Funcion asociada a los botones de borrar de la tabla
    function deleteActividades(boton) {
        $.ajax({
            url: 'index.php',
            data: {
                ruta: 'actividades',
                accion: 'deleteActividades',
                idActividades: boton.data("id-borrar")
            },
            type: 'GET',
            dataType: 'json'
        }).done(function(objetoJson) {
            if (objetoJson.r > 0) {
                listarActividades();
            }
        });
    }




    /*****************************************************************************************************************************************************************************
     *****************************************************************************************************************************************************************************
     ***************************************************************                 PARTE DEL ADMIN                 ************************************************************* 
     *****************************************************************************************************************************************************************************
     ******************************************************************************************************************************************************************************/
    /*
     * Admin Menu
     * Menu lateral que realiza las peticiones Ajax
     * Los datos que llegan por json se listan en una tabla
     */
    $('#btActividad').on('click', function() {
        listarActividades();
    });


    $('#btProfesor').on('click', function() {
        listarProfesores();
    });


    $('#btGrupos').on('click', function() {
        listarGrupos();
    });


    $('#btPerfil').on('click', function() {
        alert('Mostrar Perfil');
    });


}());
