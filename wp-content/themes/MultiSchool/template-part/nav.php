<header id="header">
        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand logo" href="<?php echo esc_url(home_url()); ?>"><img src="<?php bloginfo('template_url');?>/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li ><a class="scroll active" href="<?php echo esc_url(home_url()); ?>">Inicio</a></li>
                        <li ><a class="scroll" href="<?php echo esc_url(home_url()); ?>#services">Enseñanzas</a></li>
                        <li ><a class="scroll" href="<?php echo esc_url(home_url()); ?>#features">Proyectos</a></li>
                        <li ><a class="scroll" href="<?php echo get_page_link(get_page_by_title('Actividades')->ID); ?>">Actividades</a></li>
                        <li ><a class="scroll" href="<?php echo get_page_link(get_page_by_title('Noticias')->ID); ?>">Noticias</a></li> 
                        <li ><a class="scroll" href="<?php echo get_page_link(get_page_by_title('About')->ID); ?>">Sobre Nosotros</a></li>
                        <li ><a class="scroll" href="<?php echo esc_url(home_url()); ?>#get-in-touch">Contacto</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->
