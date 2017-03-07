<?php
    get_header();
    get_template_part('template-part/nav');
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">   
                <h3><?php
                        if(have_posts()){
                            $total_results = $wp_the_query->post_count;
                            if($total_results > 1){
                                echo 'Se han encontrado ' . $total_results . ' posts.';
                            }else{
                                echo 'Se ha econtrado ' . $total_results . ' post.';
                            }
                        } else {
                            echo 'No se han encontrado posts.';
                        }?>
                    </h3>
            </div>
            <div class="col-sm-6 busqueda">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12"> <!-- mirar tamaño de los posts con grupo -->
                <p>
                    <?php if(have_posts()) : ?>
                    <h2 class="texto_base"> <?php printf(__('Resultados de: %s'), '<span class="texto_buscado">' . esc_html(get_search_query()) . '</spam>'); ?> </h2>
                    <hr>
                    <?php //empieza el loop
                        while(have_posts()) : the_post(); ?>
                    <table>
                        <?php get_template_part('template-part/search', 'blog'); ?>
                    </table>
                    <?php 
                        endwhile; 
                        endif;
                    ?>
                </p>
            </div>
        </div>
    </div>
<?php get_template_part('template-part/prefooter'); ?>
<?php get_footer(); ?>