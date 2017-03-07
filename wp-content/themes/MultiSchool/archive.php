<?php
    get_header();
    get_template_part("template-part/nav"); 
?>
    <div class="container">
        <div class="row">
        <p>
            <h3><?php
                if(have_posts()){
                    $total_results = $wp_the_query->post_count;
                    if($total_results > 1){
                        echo $total_results." Posts encontrados.";
                    }else{
                        echo $total_results." Post encontrado.";
                    }
            ?></h3>
            <h4><?php
                if(is_category()){
                        printf(__('<h3>Archivos por categoría: %s', 'multischool'), '<span class="texto_buscado">' . single_cat_title('', false) . '</span></h3>');
                    }elseif(is_tag()){
                        printf(__('<h3>Archivos por etiqueta: %s', 'multischool'), '<span class="texto_buscado">' . single_tag_title('', false) . '</span></h3>');
                    }elseif(is_author()){
                        the_post();
                        printf(__('<h3>Archivos por autor: %s', 'multischool'), '<span class="texto_buscado">' . get_the_author() .'</span></h3>');
                        rewind_posts();
                    }elseif(is_day()){
                        printf(__('<h3>Diario: %s', 'multischool'), '<span class="texto_buscado">' . get_the_date() . '</span></h3>');
                    }elseif(is_month()){
                        printf(__('<h3>Mensual: %s', 'multischool'), '<span class="texto_buscado">' . get_the_date('F Y') . '</span></h3>');
                    }elseif(is_year()){
                        printf(__('<h3>Diario: %s', 'multischool'), '<span class="texto_buscado">' . get_the_date('Y') . '</span></h3>');
                    }else{
                        __('··· Archivos: ···', 'multischool');
                    }
                
            ?></h4>
        </p>
        <hr>
            <div class="col-sm-8">
                    <?php
                        while(have_posts()) : the_post();
                    ?>
                    <article>
                        <header class="entry-header">
                            <div class="entry-thumbnail">
                                <?php _e(the_post_thumbnail('full', array( 'class' => 'img-responsive img-blog' ))); ?>
                            </div>
                            <div class="entry-date"><?php echo get_the_date(); ?></div>
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php __(the_title()); ?></a></h2>
                        </header>
            
                        <div class="entry-content">
                            <P><?php __(the_excerpt()) ?></P>
                            <?php new_excerpt_more('Leer más'); ?> <!-- Función a la que le paso el parámetro que quiero meter como texto del ancla -->
                        </div>
            
                        <footer class="entry-meta">
                            <span class="entry-author"><i class="fa fa-user"></i> <a href="<?php the_author(); ?>"><?php the_author(); ?></a></span>
                            <span class="entry-category"><i class="fa fa-bookmark"></i> <a href="#"><?php the_category(' | '); ?></a></span>
                            <span class="entry-comments"><i class="fa fa-comments"></i> <a href="#"><?php comments_number('No hay comentarios', 'Hay 1 comentario', 'Hay varios comentarios'); ?></a></span>
                        </footer>
                    </article><br>
                    <?php endwhile;
                          }wp_reset_postdata(); ?>
            </div>
            <div class="col-sm-4">
                <?php get_sidebar();?>
            </div>
        </div>
    </div>
<?php get_template_part('template-part/prefooter'); ?>
<?php get_footer();?>