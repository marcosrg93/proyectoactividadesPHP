<?php get_header();?>
<?php get_template_part('template-part/nav'); ?>
<?php get_template_part('template-part/slider');?>
    
<section id="cta" class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2>Actividades preparadas por el instituto</h2>
                    <p>El equipo academico desarrolla un amplio abanico de actividades durante todo el año y que abarcan todo tipo de actividades que ayuden al alumnado a aprender desde un modo mas practico.                    </p>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary btn-lg" href="<?php echo get_page_link(get_page_by_title('Actividades')->ID); ?>">Ver Actividades</a>
                </div>
            </div>
        </div>
    </section><!--/#cta-->
   
    <section id="services" >
        <div class="container">

            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Enseñanzas</h2>
                <p class="text-center wow fadeInDown">Abarcamos un gran número de campos de la enseñanza, desde E.S.O para jovenes y adultos hasta Grados superiores<br>nuestros alumnos y las empresas con las que trabajamos nos abalan.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                        <div class="media service-box hover_fix">
                            <div class="pull-left">
                                <i class="fa fa-child"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ESO</h4>
                                <p>Somos un centro bilingüe que cuenta con aula de Convivencia y aula Solidaria, ayudando al alumnado lo máximo posible.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                        <div class="media service-box hover_fix">
                            <div class="pull-left">
                                <i class="fa fa-group"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Ciclos Formativos</h4>
                                <p>Ya sea Grado Medio o Grado Superior, desde administración de sistemas hasta comercio internacional.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
                        <div class="media service-box hover_fix">
                            <div class="pull-left">
                                <i class="fa fa-university"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Bachillerato</h4>
                                <p>La finalidad del bachillerato es proporcionar a los alumnos y alumnas madurez y responsabilidad social.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                
                    <div class="col-md-4 col-sm-6  col-md-offset-2 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                        <div class="media service-box hover_fix">
                            <div class="pull-left">
                                <i class="fa fa-user-md"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">FPB</h4>
                                <p>Un ciclo de Formación Profesional Básica te permitirá iniciarte en el apredizaje de un oficio y su actividad profesional.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                   
                    <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms">
                        <div class="media service-box hover_fix">
                            <div class="pull-left">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Adultos</h4>
                                <p>Alternativas educativas para mayores de 18 años como educación secundaria, bachillerato presencial, entre otros.</p>
                            </div>
                        </div>
                    </div><!--/.col-md-4-->
                </div>
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#services-->
    <section id="animated-number">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Curiosidades</h2>
                <p class="text-center wow fadeInDown">Aquí os dejamos algunas curiosidades sobre nuestro centro:</p>
            </div>
            <div class="row text-center">
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                        <div class="animated-number" data-digit="1752" data-duration="1000"></div>
                        <strong>ACTIVIDADES REALIZADAS</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="100ms">
                        <div class="animated-number" data-digit="101" data-duration="1000"></div>
                        <strong>EMPRESAS SATISFECHAS</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="200ms">
                        <div class="animated-number" data-digit="439" data-duration="1000"></div>
                        <strong>PROYECTOS REALIZADOS</strong>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="300ms">
                        <div class="animated-number" data-digit="5304" data-duration="1000"></div>
                        <strong>PREGUNTAS RESPONDIDAS</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#animated-number-->
    <section id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Proyectos</h2>
                <p class="text-center wow fadeInDown">Nuestros proyectos se enfocan a la mejora de nuestras instalaciones y de los medios<br> usados en ellas, siempre orientado hacia nuestro alumnado y su futuro.</p>
            </div>
            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                    <img class="img-responsive" src="<?php bloginfo('template_url');?>/images/main-feature.png" alt="">
                </div>
                <div class="col-sm-6">
                    <div class="media service-box wow fadeInRight hover_fix">
                        <div class="pull-left">
                            <i class="fa fa-line-chart"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">AENOR ISO 9001</h4>
                            <p>Plataforma que pone a tu alcance certificaciones de sistemas de gestión del medio ambiente, de seguridad o de responsabilidad social.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight hover_fix">
                        <div class="pull-left">
                            <i class="fa fa-language"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Enseñanza Bilingüe (inglés)</h4>
                            <p>La enseñanza bilingüe es la puerta hacia un nuevo mundo educativo, aumentando las capacidades de aprendizaje de nuestros alumnos.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight hover_fix">
                        <div class="pull-left">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Proyecto Medioambiental</h4>
                            <p>Hacer de nuestro centro un ejemplo a seguir de energía renovable y responsabilidad ambiental son algunos de nuestros objetivos.</p>
                        </div>
                    </div>

                    <div class="media service-box wow fadeInRight hover_fix">
                        <div class="pull-left">
                            <i class="fa fa-plug"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Escuela TIC 2.0</h4>
                            <p>Nuestras instalaciones son pioneras en la iniciativa TIC 2.0, siendo su integración con la tecnología su principal fuerte.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#features-->    
     <section id="get-in-touch">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Contacto</h2>
            </div>
        </div>
    </section><!--/#get-in-touch-->

    <section id="contact">
        <div id="google-map" style="height:650px" data-latitude="37.161787" data-longitude="-3.591193"></div>
        <div class="container-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <div class="contact-form">
                            <h3>Contacto</h3>

                            <address>
                              <strong> IES Zaidín-Vergeles </strong><br>
                              Avda. Primavera, 26-28<br>
                              (18008) Granada<br>
                              <abbr title="Telefono">Tel:</abbr> 958 89 38 50
                            </address>

                            <form id="main-contact-form" name="contact-form" method="post" action="#">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Asunto" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" rows="8" placeholder="Mensaje" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#bottom-->


<?php get_footer();?>