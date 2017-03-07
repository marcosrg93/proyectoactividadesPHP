<?php get_header();?>
    <?php get_template_part('template-part/nav'); ?>
        <section id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <article>
                                    <header class="entry-header">
                                        <div class="entry-thumbnail">
                                            <?php echo the_post_thumbnail('full', array( 'class' => 'img-responsive img-blog' )); ?>
                                        </div>
                                        <div class="entry-date">
                                            <?php the_time(); ?>
                                        </div>
                                        <h2 class="entry-title"><?php the_title();?></h2> </header>
                                    <div class="entry-content">
                                        <p>
                                            <?php 
                                            the_content();
                                        ?>
                                        </p>
                                    </div>
                                    <footer class="entry-meta"> <span class="entry-author"><i class="fa fa-user"></i><?php the_author(); ?></span> <span class="entry-category"><i class="fa fa-bookmark"></i> <a href="#"><?php  the_category(' | ');?></a> | <?php edit_post_link('Editar', '<i class="fa fa-comments"></i>', ' | '); ?> </span> <span class="entry-comments"><i class="fa fa-comments"></i> <a href="#"><?php comments_number('No hay comentarios', 'Hay 1 comentario', 'Hay varios comentarios'); ?></a></span> </footer>
                                </article><!-- Fin del post-->                       
                        <?php endwhile; endif; ?>
                           <!-- Comentarios-->
                            <?php comments_template();?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
            </div>
        </section>
    <?php get_template_part('template-part/prefooter'); ?>
    <?php get_footer();?>