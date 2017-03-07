<?php 
        /*
        
            Template Name: About
        */
?>

<?php get_header();?>
<?php get_template_part('template-part/nav'); ?>
    <section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nuestro Profesorado</h2>
                <p class="text-center wow fadeInDown">Destacados miembros de nuestro equipo académico</p>
            </div>
            <div class="row">
                <?php
                    /*Variable que va guardar un array de todo los post de author con la funcion 
                    get_results de la bariable $wpbd global*/
                    $authors = $wpdb->get_results("SELECT DISTINCT post_author FROM $wpdb->posts WHERE post_type = 'post' AND " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author");
                     
                    foreach ( $authors as $author ) :
                    /*cargamos los datos de cada author en una variable (ID, email,display_name, etc)*/
                    $author_data=get_userdata($author->post_author); ?>
                          <?php get_template_part('template-part/about', 'item'); ?>
                        <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>
<?php get_footer();?>