<?php global $author_data;?>
<div class="col-sm-6 col-md-3">
    <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
        <div class="team-img">
            <?php echo get_avatar($author_data->ID,270,'',$author_data -> user_nicename,array('class' => array('img-responsive')));?>
        </div>
        <div class="team-info">
        <!--funcion del code del worpres que te saca el link del author al que se le pasa el id-->
            <h3><a href="<?php echo get_author_posts_url($author_data->ID); ?>"><?php printf(__($author_data->display_name)); ?></a></h3>
            <span><?php printf(__(the_author_meta('Cargo', $author_data->ID)));?></span>
        </div>
        <p><?php /*echo $author_data->description;*/
        $descripcion=$author_data->description;
        /*function que modificica el numero de caracteres del description*/
        printf(__(length_description($descripcion,100)));?></p>
        
        <ul class="social-icons">
            <li><a href="http://<?php echo the_author_meta('Facebook', $author_data->ID);?>"><i class="fa fa-facebook"></i></a></li>
            <li><a href="http://<?php echo the_author_meta('Twitter', $author_data->ID);?>"><i class="fa fa-twitter"></i></a></li>
            <li><a href="mailto:<?php echo $author_data->user_email;?>"><i class="fa fa-envelope"></i></a></li>
            <li><a href="http://<?php echo the_author_meta('Linkedin', $author_data->ID);?>"><i class="fa fa-linkedin"></i></a></li>
        </ul>
    </div>
</div>