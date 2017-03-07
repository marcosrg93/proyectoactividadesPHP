<aside>
    <div class="buscar">
        <?php
        get_search_form();
    ?>
    </div>
    <div class="widget categories">
        <?php if (!function_exists('dynamic_sidebar')|| !dynamic_sidebar('Sidebar Widgets')) : ?>
            <div>Lo siento no hay widgets</div>
            <?php endif;?>
    </div>
    <div class="archivos">
        <h3 class="section-title">Archivos</h3>
        <ul class=" lista-sidebar arrow" style="list-style-type: none">
            <?php
        wp_get_archives();
    ?>
        </ul>
    </div>
    <div class="categorias">
        <h3 class="section-title">Categorías</h3>
        <ul class="lista-sidebar arrow">
            <?php
                    $variable =  wp_list_categories( array(
                            'orderby'    => 'name',
                            'show_count' => true,
                            'title_li' => ''
                    ) );
                     
                        $variable = preg_replace( '~\((\d+)\)(?=\s*+<)~', '$1', $variable );
                        echo $variable;
                    
                    ?>
        </ul>
    </div>
</aside>