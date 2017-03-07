<div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
    <article>
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php __(the_title()); ?></a></h2>
        </header>

        <div class="entry-content">
            <P><?php __(the_excerpt()); ?></P>
            <?php new_excerpt_more('Leer más'); ?> <!-- Función a la que le paso el parámetro que quiero meter como texto del ancla -->
        </div>

        <footer class="entry-meta">
            <span class="entry-author"><i class="fa fa-user"></i> <a href="<?php the_author(); ?>"><?php the_author(); ?></a></span>
            <span class="entry-category"><i class="fa fa-bookmark"></i> <a href="#"><?php the_category(' | '); ?></a></span>
            <span class="entry-comments"><i class="fa fa-comments"></i> <a href="#"><?php comments_number('No hay comentarios', 'Hay 1 comentario', 'Hay varios comentarios'); ?></a></span>
            <span class="entry-date"><i class="fa fa-calendar"></i> <span class="fecha"><?php echo get_the_date(); ?></span></span>
        </footer>
    </article>
</div><br>