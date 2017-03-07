
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php if(is_front_page()){
        echo '<title>
            MultiSchool | Inicio
        </title>';
        }else{
            echo '<title>';
            wp_title('');
            echo '</title>'; 
        }
    
    ?>
        <!-- core CSS -->
       <link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet">
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
        <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/images/ico/favicon.ico">
        <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-144-precomposed.png">-->
        <!--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-114-precomposed.png">-->
        <!--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-72-precomposed.png">-->
        <!--<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url');?>/images/ico/apple-touch-icon-57-precomposed.png">-->
        <?php 
        wp_head();
    ?>
</head>
<!--/head-->

<body id="home" class="homepage">