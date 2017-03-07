 <?php 
 /*
  *$camments_args es un array asociativo con varios argumentos de entrada 
  *opcionales
 */
 if(post_password_required()){
  return;
 }
 $comment_args = array(
  /*title pone el titulo del formulario de wordpress*/
  'title_reply'=>'Danos tu opinion:',
  /*
  *fields es un argumento que se le puede pasar varios valores 
  * el gancho del formulario de comment y
  * un array asociativo que donde se le puede asignar los input del formulario con los estilos deseados
  */
  'fields' => apply_filters( 'comment_form_default_fields', array(
                                                   /*
                                                   * argumento String que pone una cadena despues del input author
                                                   */
                                                   'author' => '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ).'" class="form-control comment-style" placeholder="Nombre" />',
                                                   /*
                                                   * argumento String que pone una cadena despues del input email
                                                   */
                                                   'email'  =>'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" class="form-control comment-style margen" placeholder="Email"/>',
                                                   /*
                                                   * argumento String que pone una cadena despues del input web
                                                   */
                                                   'url'    => '' ) 
  ),
  /*
  * argumento String que asigna el texarea del formulario comment con los estilos deseados
  */
'comment_field' =>'<label for="comment">' . __( 'Escribe tu opinion:' ). '</label>' .
                  '<textarea id="comment" name="comment" rows="8" class="form-control" cols="45" placeholder="'.__('Comentario').'" cols="45" aria-required="true"></textarea>',
/*
* argumento String que pone una cadena antes del texarea si no se pone nada se pondra un valor predeterminado
*/

'comment_notes_before' => '',
/*
* argumento String que pone las clases que nesecitemos al button del formulario
*/
'class_submit'=>'btn btn-primary margen-arriba',
/*
* argumento String que pone una cadena antes del texarea si no se pone nada se pondra un valor predeterminado
*/
'comment_notes_after' => '<div>Tu dirección de correo electrónico no será publicada</div>',
 );
 ?>
 <div class="form-group">
  <?php comment_form($comment_args);?>
 </div>
 <div id="comments" class="comments-area">
  <?php if ( have_comments() ) : ?>
   <h2 class="comments-title">
    <?php
    /*
    * funcion que pone distintos mensages dependiendo del numero de comentarios que tenga
    */
     printf( _nx('Un Comentario "%2$s"', '%1$s  Comentarios en "%2$s"', get_comments_number(), 'comments title'),
     number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
    ?>
   </h2>
   <div class="comment-list">
       <?php
           wp_list_comments( array(
               'style'       => 'div',
               'short_ping'  => true,
               'avatar_size' => 74,
           ) );
       ?>
   </div><!-- .comment-list -->
<?php endif; // have_comments() ?>
</div><!-- #comments -->