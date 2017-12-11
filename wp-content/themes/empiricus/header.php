<?php

/**
 * @package WordPress
 * @subpackage Empiricus
 * @since Empiricus 1.0
 */
?>  

<!doctype html>
<!--[if IE 7]>         <html class="lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>         <html class="lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html xmlns="http:www.w3.org/1999/xhtml" xmlns:og='http://ogp.me/ns#' <?php language_attributes(); ?>> <!--<![endif]-->
<head> 
    <title>Empiricus <?php wp_title(); ?></title>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11"> 
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <meta name="reply-to" content="http://www.empiricus.com.br/" />

    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <meta name="apple-touch-fullscreen" content="yes" /> 
   
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png">

    <?php echo wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<div class='master-container'>
<div id="swipe" class="offcanvas-transform">


<!-- Top Header ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<header class="col-1 top-header" alt="0"> 
<div class="col-center">

    <!-- Logo Principal -->
    <a title="Empiricus Research" href="<?php bloginfo( 'url' ); ?>" class="top-logo">
        <img width="201" height="68" alt="Empiricus Research" src="<?php echo get_template_directory_uri(); ?>/images/empiricus-research.png">
    </a>

    <!-- Top menu -->
    <nav class="top-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'menu', 'menu_class' => 'nav-menu' ) ); ?>
    </nav>

    <div id="nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

</div>
</header> 
    
<!-- Offcanvas ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<div class="offcanvas-menu">
    <div class="center">

        <ul class="offcanvas-top-menu">
            <li><a class="active" href="#">cadastre-se</a></li>
            <li><a href="#">ainda vale a pena comprar dólar?</a></li>
            <li><a href="#">empiricus</a></li>
            <li><a href="#">os analistas</a></li>
        </ul>

    </div>
</div>