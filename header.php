<!DOCTYPE html>
<!--[if lt IE 8]><html class="ie7"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if gt IE 9]><html><![endif]-->
<!--[if !IE]><html><![endif]-->
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>
        <?php 
            global $page, $paged;
            wp_title( '|', true, 'right' );
            // Add the blog name.
            bloginfo( 'name' );
            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ($site_description && (is_home() || is_front_page())) {
                echo " | $site_description";   
            }
        ?>
    </title>
    <link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" media="all" type="text/css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <i class="pin"></i>
    <header role="banner" id="overlay">
        <div class="mission">
            <div class="valigner"></div>
            <iframe language="en" width="896" height="504" src="https://www.youtube.com/embed/_j73uTSTdtA" frameborder="0" allowfullscreen></iframe>
            <div class="valigner"></div>
            <div class="tmp-wrapper">
                <img id="tmp-logo" src="<?php bloginfo( 'template_url' ); ?>/images/Brainfuel_Logofont.png"/>
            <?php if ( is_active_sidebar( 'widget-custom-header' ) ) : ?>
                <?php dynamic_sidebar( 'widget-custom-header' ); ?>
            <?php endif; ?>
            <div id="countdown">
                <div class="time-wrapper">
                    <div class="time weeks"></div>
                    weeks
                </div>
                <div class="time-wrapper">
                    <div class="time days"></div>
                    days
                </div>
                <div class="time-wrapper">
                    <div class="time hours"></div>
                    hours
                </div>
                <div class="time-wrapper">
                    <div class="time minutes"></div>
                    minutes
                </div>
                <div class="time-wrapper">
                    <div class="time seconds"></div>
                    seconds
                </div>
                <h2>UNTIL FIRST RELEASE!</h2>
            </div>
                <input id="lang-de" type="button" value="Deutsch"/>
                <input id="lang-en" type="button" value="english" class="active" />
                </div>
        </div> <!-- END .mission -->
    </header>
    <div id="nav-wrapper">
        <h1 id="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php if ( get_header_image() ) { ?>
                <img id="logo-main" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_html( get_bloginfo( 'title' ) ); ?> logo" />
                <?php } else {
                bloginfo( 'title' );
                } ?>
            </a>
        </h1>
        <!-- <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2> -->
        <nav>
            <?php wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container'      => '',
                'fallback_cb'    => '__return_false'
            )); ?>
        </nav>
    </div>
<div id="main-content">