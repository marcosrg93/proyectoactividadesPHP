<?php 
        /*
        
            Template Name: Author
        */
?>
<?php get_header();?>
<?php get_template_part('template-part/nav'); ?>
<?php
    $curauth = (get_query_var('author_name')) ? 
    get_user_by('slug', get_query_var('author_name')) :
    get_userdata(get_query_var('author'));
?>
<section id="meet-team">
    <div class="container">
        <div class="section-header">
            <div class="col-sm-6 col-md-3">
                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                    <div class="team-img">
                        <?php echo get_avatar($curauth->ID,270,'',$curauth -> user_nicename,array('class' => array('img-responsive')));?>
                    </div>
                    <br/>
                    <ul class="social-icons">
                        <li><a href="http://<?php echo the_author_meta('Facebook', $curauth->ID);?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="http://<?php echo the_author_meta('Twitter', $curauth->ID);?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="mailto:<?php echo $curauth->user_email;?>"><i class="fa fa-envelope"></i></a></li>
                        <li><a href="http://<?php echo the_author_meta('Linkedin', $curauth->ID);?>"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-9">
                <div class="section-header">
                    <h2 class="section-title text-center wow fadeInDown"><?php printf(__($curauth->display_name));?></h2>
                    <p class="text-center wow fadeInDown"><?php printf(__($curauth->description));?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--section animada de las skill del autor-->
<section id="animated-skill">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Skill</h2>
            <p class="text-center wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>
        <div class="row text-center canvasSkill">
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp widthcanvas" data-wow-duration="400ms" data-wow-delay="0ms" s>
                    <canvas class="gauge" width="230" height="120" data-color="#0085A1" data-max="100"></canvas>
                    <strong>CUPS OF COFFEE CONSUMED</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="wow fadeInUp widthcanvas" data-wow-duration="400ms" data-wow-delay="0ms">
                    <canvas class="gauge" width="230" height="120" data-color="#0085A1" data-max="100"></canvas>
                    <strong>CUPS OF COFFEE CONSUMED</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6 ">
                <div class="wow fadeInUp widthcanvas" data-wow-duration="400ms" data-wow-delay="0ms">
                    <canvas class="gauge" width="230" height="120" data-color="#0085A1" data-max="100"></canvas>
                    <strong>CUPS OF COFFEE CONSUMED</strong>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6 ">
                <div class="wow fadeInUp widthcanvas" data-wow-duration="400ms" data-wow-delay="0ms">
                    <canvas class="gauge" width="230" height="120" data-color="#0085A1" data-max="100"></canvas>
                    <strong>CUPS OF COFFEE CONSUMED</strong>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="blog">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown"><?php if(have_posts()){
                    $total_resul= $wp_the_query->post_count;
                    if($total_resul>1){
                        printf(__($total_resul." Posts"));
                    }elseif($total_resul=1){
                        printf(__($total_resul." Post"));
                    }else{
                        printf(__("No Post"));
                    }
                ?></h2>
            <p class="text-center wow fadeInDown">
                Aqui dispone de todos las entradas de este Profesor
                <br> Tus comentarios nos ayudan a crecer y desarrollarnos.
            </p>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <!-- El loop -->
                <!-- Consulta que muestra solo un post -->
                <?php
                            while(have_posts()):
                                the_post();
                        ?>
                <?php get_template_part('template-part/blog', 'des'); ?>
                <?php endwhile; ?>
                <?php }?>
                <?php wp_reset_postdata(); ?>
                <!-- final de los posts -->
            </div>
        </div>
    </div">
</section>

<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/drawings.js"></script>
<?php get_template_part('template-part/prefooter'); ?>
<?php get_footer();?>
