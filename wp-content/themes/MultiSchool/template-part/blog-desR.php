       <div class="blog-post blog-media wow fadeInRight" data-wow-duration="300ms" data-wow-delay="100ms">
                        <article class="media clearfix">
                            <div class="entry-thumbnail pull-left">
                                <?php echo the_post_thumbnail('full', array( 'class' => 'img-responsive img-blog' )); ?>
                                <!--<span class="post-format post-format-gallery"><i class="fa fa-image"></i></span>-->
                            </div>
                            <div class="media-body">
                                <header class="entry-header">
                                    <div class="entry-date"><?php echo $date ?></div>
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php __(the_title()); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <P><?php _e(get_excerpt(120))?></P>
                                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">Leer más</a>
                                </div>

                                <footer class="entry-meta">
                                    <span class="entry-author"><i class="fa fa-user"></i> <a href="<?php get_the_author_link(); ?>"><?php the_author(); ?></a></span>
                                    <span class="entry-category"><i class="fa fa-bookmark"></i> <a href="#"><?php _e($cat); ?></a></span>
                                    <span class="entry-comments"><i class="fa fa-comments"></i> <a href="#"><?php comments_number('No hay comentarios', 'Hay 1 comentario', 'Hay varios comentarios'); ?></a></span>
                                </footer>
                            </div>
                        </article>
                        
                    </div>