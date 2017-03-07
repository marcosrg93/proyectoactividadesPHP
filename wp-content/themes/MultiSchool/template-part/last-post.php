<div class="row">
                    <div class="col-sm-6">
                        <!-- El loop -->
                        <!-- Consulta que muestra solo un post -->
                        <?php $first_post = new WP_Query('showposts=1'); ?>
                            <?php while ($first_post->have_posts()) : $first_post->the_post(); ?>
                                <?php get_template_part('template-part/blog', 'des'); ?>
                                    <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                    </div>
                    <!--/.col-sm-6-->
                    <div class="col-sm-6">
                        <!-- Este es el cierre de la entrada destacada 1 -->
                        <?php $the_post = new WP_Query(array( 'showposts' => 2, 'offset' => 1 )); ?>
                            <!-- El loop -->
                            <?php if ( $the_post->have_posts()) : ?>
                                <?php while ($the_post->have_posts()) : $the_post->the_post(); ?>
                                    <?php get_template_part('template-part/blog', 'desR'); ?>
                                        <!--Post -->
                                        <?php endwhile;?>
                                            <?php else: ?>
                                                <p>
                                                    <?php _e('No hay entradas.Intenta crear una.'); ?>
                                                </p>
                                                <?php endif; ?>
                                                    <?php wp_reset_postdata(); ?>
                    </div>