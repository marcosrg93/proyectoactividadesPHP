<?php 


 //load_theme_textdomain( , get_template_directory() . '/languages' );
 
 //add_action('after_setup_theme', array('AlisiosLanguage', 'load_i18n'));
 add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
   load_theme_textdomain('multischool',  get_template_directory() . '/languages');
}

//Añadir imagen destacada a las post
add_theme_support('post-thumbnails');

//añadir post personalizados 
add_theme_support('post-formats', array ('image', 'gallery','audio', 'video','link','quote'));



//Ver la pagina en la que estas
add_action('wp_hed', 'show_template');

function show_template(){
    global $template;
    print_r($template);
}
/*function que limita en numero de caracteres en description*/
function length_description($descripcion,$tamanio){
    $arraydescripcion = str_split($descripcion);
    $texto='';
    for($i=0;$i<strlen($descripcion);$i++){
        if(strlen($texto)<$tamanio || $arraydescripcion[$i]!=""){
            $texto.=$arraydescripcion[$i];
        }
    }
    return $texto;
}

//Parametro de entrada el array de categorias
//Devuelve la primera o las dos primeras categorias del post
function ver_categorias($miscategorias){
    $tam = count($miscategorias);
    $mensaje = "";
    if($tam == 1){
        $mensaje = $miscategorias[0];
    }else if($tam >= 2){
        $mensaje = $miscategorias[0] . ' & ' . $miscategorias[1];
    }
    return $mensaje;
}

add_filter('excerpt_more', 'new_excerpt_more');

function get_excerpt($count){  
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content(); 
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = $excerpt.'... <a href="'.$permalink.'">leer mas</a>';
    return $excerpt;
}

function multischool_short_excerpt($length){
    $tam = 20;
    if(is_search()){
        if($tam<$length){
             $excerpt = $tam;
            
        }
    } else{
        $excerpt = $length; 
    }
    
    return $excerpt;
}

//function greenlight_short_excerpt($length){
//    if(!is_home()){
//        return 20;
//    } else{
//        return $length;
//    }
//}
add_filter('excerpt_length', 'multischool_short_excerpt', 999);


/*
 * Filter Hook para modificar el link Read More de la función  the_excerpt()
 */

/*add_filter('excerpt_more', 'no_excerpt_more');*/
//Leer más personalizado
function new_excerpt_more ($more){
    global $post;/*Variable global que contiene lo que se va a visualizar*/
    return ' ... <a class="more btn btn-primary" href="' . get_permalink($post->ID) . '">Leer más</a>';
}

function no_excerpt_more ($more){
    return ' ';
}

/* Añadimos Jquery de la forma aconsejada por wordpress*/
function textddomain_jquery_enqueue(){
    wp_deregister_script('jquery');/*Decimos a wp que no use su jquery propio tanto para mi tema como para los plugins que usen mi tema*/
    wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s":"") . "://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js", false, null);
    wp_enqueue_script('jquery');
}


if(!is_admin()){
    add_action('wp_enqueue_scripts','textddomain_jquery_enqueue',11);
}







/**
  *Filter hook que inserta una custom-class a las clases de la etiqueta img en WP
  *En este caso la clase img-responsive de bootstrap
  */
function add_responsive_class($content){
        //Convertimos el contenido en una codificación HTML en UTF8
        $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
        $document = new DOMDocument(); //Representa al documento html
        // Deshabilitamos los errors libxml y los deja en manos del usuario -true-
        libxml_use_internal_errors(true);
        //Cargamos el contenido de un post en el objeto DOMDocument
        $document->loadHTML(utf8_decode($content));
        //Recogemos en el array $imgs todos los tags img que tenga el documento
        $imgs = $document->getElementsByTagName('div');
        // A cada elemento le asignamos el atributo class con valor img-responsive
        // $existing_class = $->getAttribute('class');
        foreach ($imgs as $img) {           
           $img->setAttribute('class','img-responsive');
        //$img->setAttribute('class','img-responsive', $existing_class);
        }
        //Salvamos los cambios
        $html = $document->saveHTML();
        //Devolvemos el contenido ya modificado
        return $html;   
}

//add_filter ('the_content', 'add_responsive_class');


/**
  *Filter hook que inserta una custom-class en este caso la clase img-responsive de bootstrap
  *de la etiqueta img en WP
  *
  * Referencia: http://wordpress.stackexchange.com/questions/184231/how-can-i-customize-the-content-output
  */
function add_class_to_img_and_p_in_content($content) {


   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';

   $content = preg_replace($pattern, $replacement, $content);

   $pattern ="/<div(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement2 = '<p$1class="$2 "$3>';
   $replacement = '<div>';
   $replacement3 = '';

   $content = preg_replace($pattern, $replacement, $content);


   return $content;
}
add_filter('the_content', 'add_class_to_img_and_p_in_content',11);




function inicializar_widgets(){
    
    //Registramos la zona de widgets del sidebar
    register_sidebar(array(
    'name' => __('Sidebar Widgets'),
    'id' => 'sidebar',
    'description' => __('Sidebar Widget Area'),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    ));
    
    //Registramos la zona de widgets del sidebar
    register_sidebar(array(
    'name' => __('Footer Widgets'),
    'id' => 'header',
    'description' => __('Footer Widget Area'),
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    ));
    
}


add_action('widgets_init', 'inicializar_widgets');



//function show_link_pages($mypages){
//        foreach( $mypages as $page ) {      
//    $content = $page->post_content;
//    if ( ! $content || $content == 'servicios' ) // Check for empty page
//        $content+'#servicios'
//    }
//    return $content = apply_filters( 'the_content', $content );
//            
//}
//add_filter('the_content', 'show_link_pages');



function sidebar_link_page ($pages, $r){
    
    foreach ($pages as $page){
        $link = get_page_link($page->ID);
        if($page->post_title == 'Servicios'){
            echo '<li><a href="'.esc_url(home_url()).'#servicios"/>'.$page->post_title.'</a></li>';
        }else{
            echo '<li><a href="'.$link.'"/>'.$page->post_title.'</a></li>';
        }    
    }
    return $pages;
};

add_filter('get_pages', 'sidebar_link_page',10,2);




//Funcion que devuleve true o false en funcion de si tiene gravatar o no
function greenlight_has_gravatar($email){
    //Ciframos la cuenta de email
    $hash = md5(strtolower(trim($email)));
    //Generamos la supuesta uri del gravatar si existiese
    $uri = 'http://www.gravatar.com/avatar/'. $hash .'?d=404';
    //Recuperamos todas las cabeceras enviadas por el servidor en respuesta a una peticion http
    $headers = @get_headers($uri, 0);
    
    //Si tiene gravatar debe aparecer un 200  en la uri
    if(!preg_match("|200|", $headers[0])){
        $has_valid_avatar = FALSE;
    }else{
        $has_valid_avatar = TRUE;
    }
    return $headers;
}


function greenlight_has_gravatar1($email){
    //ciframos la cuenta de email
    $hash = md5(strtolower(trim($email)));
    //generamos la supuesta uri del gravatar si existe
    $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
    //recuperamos todas las cabeceras enviadas por el servidor en respuesta a una peticion html
    $headers = @get_headers($uri);
    //si tiene gravatar debe aparecer un 200 en la uri
    if(!preg_match("|200|", $headers[0])){
        $has_valid_avatar = FALSE;
    } else {
        $has_valid_avatar = TRUE;
    }
    return $has_valid_avatar;
}


function greenlight_has_author_image($name){
    
    //Variable con nos va a devolver
    $result = false;
    //array que contiene las extensiones  que puede tener la imagen
    $extensions = array ('jpg','png','gif');
    
    $url_img = get_template_directory_uri().'/img/'.$name.'.'.$val;
    
    foreach($extensions as $val){
        if(file_exists($url_img)){
            $result = $url_img;
        }
        return $result;
    }
    
}







//Action hook para visualizar y editar camnpos personalizados en el backend de wp para usuarios
    add_action ('show_user_profile', 'greenlight_add_custom_fields');
    add_action ('edit_user_profile', 'greenlight_add_custom_fields');
    function greenlight_add_custom_fields($user){
        ?>
    <h2>Redes Sociales</h2>
    <table class="form-table">
        <tr>
            <th>
                <label for="Facebook">Facebook</label>
            </th>
            <td>
                <input type="text" id="Facebook" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('Facebook', $user->ID)); ?>" placeholder="www.facebook.com/user" name="Facebook" />
                <br> <span class="description">Facebook</span> </td>
        </tr>
        <tr>
            <th>
                <label for="Twitter">Twitter</label>
            </th>
            <td>
                <input type="text" id="Twitter" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('Twitter', $user->ID)); ?>" placeholder="www.twitter.com/user" name="Twitter" />
                <br> <span class="description">Twitter</span> </td>
        </tr>
        <tr>
            <th>
                <label for="Linkedin">Linkedin</label>
            </th>
            <td>
                <input type="text" id="Linkedin" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('Linkedin', $user->ID)); ?>" placeholder="www.linkedin.com/user" name="Linkedin" />
                <br> <span class="description">Linkedin</span> </td>
        </tr>
    </table>
    <h2>Habilidades personales</h2>
    <table class="form-table">
        <tr>
            <th>
                <label for="skill1">Habilidad</label>
            </th>
            <td>
                <input type="text" id="skill1" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('skill1', $user->ID)); ?>" placeholder="Nombre de la Habilidad 1" name="skill1" />
                <br> <span class="description">Primera skill del usuario</span> </td>
            <td>
                <input type="text" id="valskill1" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('valskill1', $user->ID)); ?>" placeholder="valskill1" name="valskill1" />
                <br> <span class="description">Valor de la primera skill del usuario</span> </td>
        </tr>
        <tr>
            <th>
                <label for="skill2">Skill 2</label>
            </th>
            <td>
                <input type="text" id="skill2" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('skill2', $user->ID)); ?>" placeholder="skill2" name="skill2" />
                <br> <span class="description">Segunda skill del usuario</span> </td>
            <td>
                <input type="text" id="valskill2" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('valskill2', $user->ID)); ?>" placeholder="valskill2" name="valskill2" />
                <br> <span class="description">Valor de la segunda skill del usuario</span> </td>
        </tr>
        <tr>
            <th>
                <label for="skill3">Skill 3</label>
            </th>
            <td>
                <input type="text" id="skill3" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('skill3', $user->ID)); ?>" placeholder="skill3" name="skill3" />
                <br> <span class="description">Tercera skill del usuario</span> </td>
            <td>
                <input type="text" id="valskill3" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('valskill3', $user->ID)); ?>" placeholder="valskill3" name="valskill3" />
                <br> <span class="description">Valor de la tercera skill del usuario</span> </td>
        </tr>
        <tr>
            <th>
                <label for="skill4">Skill 4</label>
            </th>
            <td>
                <input type="text" id="skill4" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('skill4', $user->ID)); ?>" placeholder="skill4" name="skill4" />
                <br> <span class="description">Cuarta skill del usuario</span> </td>
            <td>
                <input type="text" id="valskill4" class="regular-text" value="<?php echo esc_attr (get_the_author_meta ('valskill4', $user->ID)); ?>" placeholder="valskill4" name="valskill4" />
                <br> <span class="description">Valor de la cuarta skill del usuario</span> </td>
        </tr>
    </table>
    <?php
    }
    
    //Para cuando poder guardar los campos personalizados
    add_action('personal_options_update', 'greenlight_save_custom_fields');
    add_action('edit_user_profile_update', 'greenlight_save_custom_fields');
    function greenlight_save_custom_fields($user_id){
//        if(!current_user_can('edit_user', $user_id)){
//            return false;
        update_usermeta($user_id, 'Facebook', $_POST['Facebook']);
        update_usermeta($user_id, 'Twitter', $_POST['Twitter']);
        update_usermeta($user_id, 'Linkedin', $_POST['Linkedin']);
        update_usermeta($user_id, 'skill1', $_POST['skill1']);
        update_usermeta($user_id, 'skill2', $_POST['skill2']);
        update_usermeta($user_id, 'skill3', $_POST['skill3']);
        update_usermeta($user_id, 'skill4', $_POST['skill4']);
        update_usermeta($user_id, 'valskill1', $_POST['valskill1']);
        update_usermeta($user_id, 'valskill2', $_POST['valskill2']);
        update_usermeta($user_id, 'valskill3', $_POST['valskill3']);
        update_usermeta($user_id, 'valskill4', $_POST['valskill4']);
        
    
    }



//Funcion que añade una etiqueta span al contador de categorias

function cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}
add_filter('wp_list_categories', 'cat_count_span');



    //Incluimos las opciones del tema
    //include 'redgame-options.php';
    
//Función para la paginación de los posts

function paginacion_links($type = 'plain', $endsize = 1, $midsize = 1){
    global $wp_query, $wp_rewrite;
    //obtenemos el numero de la página actual, si fuese el front-page usariamos page en lugar de paged
    $current = get_query_var('paged') > 1 ? get_query_var('paged') : 1;
    //Saneamos el código de $type, para que $type valga algo de lo del array obligatoriamente
    if(!in_array($type, array('plain', 'list', 'array'))) $type = 'plain';
    //Saneamos los otros dos parámetros, para que sean números enteros
    $endsize = absint($endsize);
    $midsize = absint($midsize);
    //Argumentos a pasar a la función de paginación de wp
    $pagination = array(
        'base' => @add_query_arg('paged', '%#%'), //esta @ elimina el echo de los warnings
        'format' => '', //formato de la url
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => false,
        'end_size' => $endsize,
        'midsize' => $midsize,
        'type' => $type,
        'prev_text' => '<span class="fa fa-arrow-left"></span>&nbsp;&nbsp;', //lo que saldrá en las etiquetas de anterior
        'next_text' => '&nbsp;&nbsp;<span class="fa fa-arrow-right"></span>' //lo que saldrá en las etiquetas de siguiente
    );
    
    if($wp_rewrite->using_permalinks()){
        $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))).'page/%#%', 'paged');
    }
    
    if(!empty($wp_query->query_vars['s'])){
        $pagination['add_args'] = array('s' => get_query_var('s'));
    }
    
    return paginate_links($pagination);
}
?>