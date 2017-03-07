<div class="media">
    <div class="pull-left">
        <?php
        if ( has_post_thumbnail() ) {
    echo the_post_thumbnail(array(64, 64), array( 'class' => 'img-responsive img-blog' )); 
}
else {
    echo '<img width="64" height="64"  src="' . get_bloginfo( 'stylesheet_directory' ) 
        . '/images/blog/no-photo.png" />';
}
         ?>
    </div>
    <div class="media-body"> <span class="media-heading"><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></span><br> <small class="muted">Publicado el <?php the_time('d F Y'); ?></small> </div>
</div>