<?php get_header();?>
<?php get_template_part('template-part/nav'); ?>
<section id="blog">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown"><?php _e('Últimas noticias', 'multischool');?></h2>
            <p class="text-center wow fadeInDown">
                Comentar, charlar, conocer gente y estar informados, ese es el objetivo de este blog.
                <br> Tus comentarios nos ayudan a crecer y desarrollarnos.
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-8">
           <?php    $paged = get_query_var('paged') ? get_query_var('paged') : 1; 
                    $argumentos = array(
                                        'orderby' => 'date',
                                        'post_type'=> array('post'),
                                        'paged' => $paged
                                        );
                    $custom_query = new WP_Query($argumentos); ?>
                    <!-- El loop -->
                    <?php if ( $custom_query->have_posts()) : ?>
                        <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                        <?php get_template_part('template-part/blog', 'des'); ?>
                    <?php endwhile; 
                    echo '<div class="col-sm-12"><div class="pagination">';
                        echo paginacion_links(); 
                    echo '</div></div>';
                    endif;?>
                   <!-- final de los posts -->
                   </div>
                   <div class="col-sm-4">
                       <?php get_sidebar(); ?>
                   </div>
        </div>
        <br>
    </div>
</section>
<?php get_template_part('template-part/prefooter'); ?>
<?php get_footer(); ?>