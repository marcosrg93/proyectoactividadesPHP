<div class="col-ms-12">
    <div class="col-sm-3">
     <?php echo the_post_thumbnail('full', array( 'class' => 'img-responsive img-blog' )); ?>    
     </div>
    <div class="col-sm-9">
        <header class="entry-header">
            <div class="entry-date">
                <?php echo $date ?>
            </div>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> </header>
        <div class="entry-content">
            <P>
                <?php the_excerpt(); ?>
            </P> <a class="btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Leer más', 'multischool');?></a> &nbsp; <span class="entry-author"><i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a></span> &nbsp; <span class="entry-category"><i class="fa fa-bookmark"></i> <a href="#"><?php echo $cat; ?></a></span> &nbsp; <span class="entry-comments"><i class="fa fa-comments"></i> <a href="#"><?php comments_number('No hay comentarios', 'Hay 1 comentario', 'Hay varios comentarios'); ?></a></span> </div>
        <footer class="entry-meta"> </footer>
    </div>
</div>