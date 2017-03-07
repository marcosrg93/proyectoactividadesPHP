<section class="sidebar-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2 ">
                <div class="autor">
                    <h3 class="section-title">Autores</h3>
                    <ul class="arrow" style="list-style-type: none">
                        <?php
                        if(is_author()){
        global $curauth; //variable en author
        $args=array(
            "hide_empty"=>"0",
            'exclude'=>[$curauth->ID] //quita el author de donde estemos cundo se le pasa el id del curauth
                );
                        }else{
                              $args = Array(
            'hide_empty' => false
        );
                        }
                        
                      
        
        wp_list_authors($args);
    ?> </ul>
                </div>
            </div>
            <div class="col-md-2">
                <div class="paginas">
                    <h3 class="section-title">Páginas</h3>
                    <ul class="arrow" style="list-style-type: none">
                        <li><a href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>
                        <li><a href="<?php echo esc_url(home_url()); ?>#services">Enseñanzas</a></li>
                        <li><a href="<?php echo esc_url(home_url()); ?>#features">Proyectos</a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('Actividades')->ID); ?>">Actividades</a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('Noticias')->ID); ?>">Noticias</a></li>
                        <li><a href="<?php echo get_page_link(get_page_by_title('About')->ID); ?>">Sobre Nosotros</a></li>
                        <li><a href="<?php echo esc_url(home_url()); ?>#get-in-touch">Contacto</a></li>
                    </ul>
                </div>
            </div>
               <div class="col-md-4">
                <div class="widget des">
                    <h3>Noticias Destacadas</h3>
                    <div>
                        <!-- El loop -->
                        <!-- Consulta que muestra solo un post -->
                        <?php $first_post = new WP_Query('showposts=3'); ?>
                            <?php while ($first_post->have_posts()) : $first_post->the_post(); ?>
                                <?php get_template_part( 'template-part/footer-post'); ?>
                                    <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
                <!--/.widget des-->
            </div>
            <div class="col-md-4">
                <?php if (!function_exists('dynamic_sidebar')|| !dynamic_sidebar('Footer Widgets')) : ?>
                    <div>Lo siento no hay widgets</div>
                    <?php endif;?>
            </div>
        </div>
    </div>
</section>