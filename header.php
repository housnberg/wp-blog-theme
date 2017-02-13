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
    <header role="banner" id="overlay">
        <div class="valigner"></div>
        <div class="mission">
            <h1>OUR MISSION</h1>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/S85gv1RGDMU" frameborder="0" allowfullscreen></iframe>
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
            <?php if ( is_active_sidebar( 'widget-custom-header' ) ) : ?>
                <?php dynamic_sidebar( 'widget-custom-header' ); ?>
            <?php endif; ?>
            <a class="button">Join the community</a>
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