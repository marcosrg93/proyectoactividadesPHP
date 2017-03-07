<?php 
        /*
        
            Template Name: Actividades
        */
?>

<?php get_header();?>
<?php get_template_part('template-part/nav'); ?>
<section id="cta" class="wow fadeIn">
        <div class="container">
               <div class="row">
        <div class="col-sm-9 section-header">
            <h2 class="section-title text-center wow fadeInDown">Actividades</h2>
            <p class="text-center wow fadeInDown">
                Comentar, charlar, conocer gente y estar informados, ese es el objetivo de este blog.
                <br> Tus comentarios nos ayudan a crecer y desarrollarnos.
            </p>
        </div>
           <div class="col-sm-3 text-right">
                    <a class="btn btn-primary btn-lg" href="<?php echo esc_url(home_url()); ?>/actividades/index.php">Acceso Profesores</a>
                </div>
                </div>
              
        </div>
</section><!--/#cta-->
<section id="blog">
<div class="container">
 
        <div class="row">
            <div id="actividades" class="col-sm-8"></div>
            <div class="col-sm-4">
                <!--<div class="search">-->
                <!--    <div class="input-group">-->
                <!--        <input id="imputSearchAct" type="search" class="form-control search_box" placeholder="<?php echo esc_attr_x( 'Buscar …', 'placeholder' ) ?>"   /> -->
                <!--        <span class="input-group-btn">-->
                <!--            <button id="search-buttonACT" class="btn btn-primary search-button" >-->
                <!--                <i class="fa fa-search" aria-hidden="true"></i>-->
                <!--            </button>-->
                <!--        </span>-->
                <!--    </div> -->
                <!--</div>-->
                <!--<div class="getFechas">-->
                <!--    <h3 class="section-title">Busqueda Por Fechas</h3>-->
                <!--    <div class='input-group date' id='datetimepicker9'>-->
                <!--        <label>Fecha de Inicio</label>-->
                <!--        <input type='datetime' class="form-control" id="getHoraInicio" placeholder ="AAAA-MM-DD" name="horaInicio"/>-->
                <!--    </div>-->
                <!--    <div class='input-group date' id='datetimepicker10'>-->
                <!--        <label>Fecha de Fin</label>-->
                <!--        <input type='datetime' class="form-control" id="getHoraFinal" placeholder ="AAAA-MM-DD" name="horaFinal"/>-->
                <!--    </div>-->
                <!--    <br/>-->
                <!--    <a  id="fechaBtnAct" class="btn btn-primary btn-lg">Buscar por Fecha</a>-->
                <!--</div>-->
                <div class="profesores">
                    <h3 class="section-title">Profesores</h3>
                    <ul id="listaprofesores">
                        
                    </ul>
                </div>
                <div class="grupo">
                    <h3 class="section-title">Grupos</h3>
                    <ul id="listagrupos">
                        
                    </ul>
                </div>
            </div>
        </div>
</div>
</section>




 
<?php get_footer();?>

  
    
                <script type="text/javascript">
                      $(document).ready(function() {
                         mostarActividades();
                      });
                      
                      function muestraNota(dato){
                            var actividad = '';
                            if(dato.length===0){
                                actividad += ' <div id="mensajeAlerta" class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms"><div class="entry-content">Lo sentimos no se pudo encontrar una actividad con los parametros de busqueda</div><a class="btn btn-primary btn-lg" onclick="mostarActividades()" href="#">Ver Todas</a></div>';
                                return actividad;
                            }else{
                                for (var i = 0; i < dato.length; i++) {
                                actividad += ' <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">';
                                actividad += '<article><header class="entry-header">';
                                actividad += '<div class="entry-thumbnail"><img  class="img-responsive" src="data:image/png;base64,'+dato[i].imagen+'" id="imagen" /></div>'
                                actividad += '<h2 class="entry-title">'+dato[i].titulo+'</h2></header>';
                                actividad += ' <div class="entry-content">'+dato[i].descripcion+'</div>';
                                actividad += '<div class="entry-date">'+dato[i].horaInicio+'</div>';
                                actividad += '<div class="entry-date">'+dato[i].horaFinal+'</div>';
                                actividad += '<footer class="entry-meta"><span class="entry-author"><i class="fa fa-user"></i>'+ dato[i].idProfesor+'</span>';
                                actividad += '<span class="entry-comments"><i class="fa fa-comments"></i>'+dato[i].idGrupo+'</span>';
                                actividad += '</footer></article></div><br>';
                                }
                                return actividad;
                            }
                            
                        }
                        
                        
                        
                        function mostarActividades(){
                                $.ajax({
                                url: '../actividades/index.php',
                                data: {
                                    ruta: 'actividades',
                                    accion: 'actividadespage',
                                },
                                global: false,
                                type: "GET",
                                dataType: "json"
                            }).done(function(objetoJson) {
                                 $('#actividades').append(muestraNota(objetoJson.actividades));
                                 $('#mensajeAlerta').hide();
                                 mostrarProfesores();
                                 mostrarGrupo();
                                 actualizarActividades();
                                 getFechasActividades();
                                 search();
                            });
                        }
                        // var datosProfesores = objetoJson.profesores;
                        //         var listaproferosres=$('#');
                        //         for (var i = 0; i < datosProfesores.length; i++) {
                        function mostrarProfesores(){
                            $.ajax({
                                url: '../actividades/index.php',
                                data: {
                                    ruta: 'actividades',
                                    accion: 'getProfesores',
                                },
                                type: "GET",
                                dataType: "json"
                            }).done(function(objetoJson) {
                                var datosProfesores = objetoJson.profesores;
                                var listaproferosres= $('#listaprofesores');
                                for (var i = 0; i < datosProfesores.length; i++) {
                                    listaproferosres.append('<li><i class="fa fa-user"></i> <a  class="actualizar btn" data-id="'+datosProfesores[i]['idProfesor']+'" data-ruta="profesores"> '+datosProfesores[i]['nombre']+'</a></li>');
                                }
                                actualizarActividades();
                            });
                            
                        }
                        
                        function mostrarGrupo(){
                            $.ajax({
                                url: '../actividades/index.php',
                                data: {
                                    ruta: 'actividades',
                                    accion: 'getGrupos',
                                },
                                type: "GET",
                                dataType: "json"
                            }).done(function(objetoJson) {
                                var datosGrupo = objetoJson.grupos;
                                var listagrupos= $('#listagrupos');
                                for (var i = 0; i < datosGrupo.length; i++) {
                                   listagrupos.append('<li><i class="fa fa-users fa-fw"></i> <a  class="actualizar btn" data-id="'+datosGrupo[i]['idGrupo']+'" data-ruta="grupo"> '+datosGrupo[i]['nombre']+'</a></li>'); 
                                }
                                actualizarActividades();
                            });
                        }
                      
                      function actualizarActividades(){
                          $('.actualizar').on('click',function(){
                              var ruta=$(this).data('ruta');
                              switch (ruta) {
                                  case 'profesores':
                                      mostrarDatosPorProfesor($(this).data('id'));
                                      break;
                                  case 'grupo':
                                      mostrarDatosPorGrupo($(this).data('id'));
                                      break;
                                  default:
                                      break;
                              }
                          });
                      }
                      
                      function mostrarDatosPorProfesor(id){
                          $.ajax({
                            url: '../actividades/index.php',
                            data: {
                                ruta: 'actividades',
                                accion: 'actividadesProfesor',
                                idprofesor: id
                            },
                            global: false,
                            type: "GET",
                            dataType: "json"
                        }).done(function(objetoJson) {
                            $('#actividades').empty();
                            $('#actividades').append(muestraNota(objetoJson.actividades));
                        });
                      }
                      
                      function mostrarDatosPorGrupo(id){
                         $.ajax({
                            url: '../actividades/index.php',
                            data: {
                                ruta: 'actividades',
                                accion: 'actividadesGrupo',
                                idgrupo: id
                            },
                            global: false,
                            type: "GET",
                            dataType: "json"
                        }).done(function(objetoJson) {
                            $('#actividades').empty();
                            $('#actividades').append(muestraNota(objetoJson.actividades));
                        }); 
                      }
                      
                          function search(){
                              $('#search-buttonACT').on('click',function() {
                                $.ajax({
                                    url: '../actividades/index.php',
                                    data: {
                                        ruta: 'actividades',
                                        accion: 'actividadesSearch',
                                        search: $('#imputSearchAct').val()
                                    },
                                    global: false,
                                    type: "GET",
                                    dataType: "json"
                                }).done(function(objetoJson) {
                                    $('#actividades').empty();
                                    $('#actividades').append(muestraNota(objetoJson.actividades));
                                }); 
                              });
                          }
                          
                          function getFechasActividades(){
                          $('#fechaBtnAct').on('click',function(){
                             
                            $.ajax({
                                url: '../actividades/index.php',
                                data: {
                                    ruta: 'actividades',
                                    accion: 'actividadesFechas',
                                    fechaFinal: $('#getHoraFinal').val(),
                                    fechaInicio: $('#getHoraInicio').val()
                                },
                                global: false,
                                type: "GET",
                                dataType: "json"
                            }).done(function(objetoJson) {
                                $('#actividades').empty();
                                $('#actividades').append(muestraNota(objetoJson.actividades));
                            });
                          });
                      }
                </script>