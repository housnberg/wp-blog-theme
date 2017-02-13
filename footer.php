</div><!-- .main -->
<footer>
    <!-- the .fatfooter aside - I use this to enable a screen-wide background on the footer while still keeping the footer contents in line with the layout -->
    <aside class="footer" role="complementary">
        
        <?php
            if (wp_is_mobile()) { // If it is a mobile device
                
            } else { // If it is not a mobile device
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu',
                    'container'      => '',
                    'fallback_cb'    => '__return_false'
                ));
            } // end wp_is_mobile()
        ?>
        
        <?php wp_nav_menu(array(
            'theme_location' => 'footer-menu',
            'container'      => '',
            'fallback_cb'    => '__return_false'
        )); ?>
        <?php if ( is_active_sidebar( 'widget-custom-footer-1' ) ) : ?>
            <?php dynamic_sidebar( 'widget-custom-footer-1' ); ?>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'widget-custom-footer-2' ) ) : ?>
            <?php dynamic_sidebar( 'widget-custom-footer-2' ); ?>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'widget-custom-footer-3' ) ) : ?>
            <?php dynamic_sidebar( 'widget-custom-footer-3' ); ?>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'widget-custom-footer-4' ) ) : ?>
            <?php dynamic_sidebar( 'widget-custom-footer-4' ); ?>
        <?php endif; ?>
    </aside><!-- #fatfooter -->
    <address>©<?php echo esc_html( get_bloginfo( 'title' ) ); ?> <?php echo date('Y'); ?> | designed by <a href="mailto:eugen.lj@gmx.de">hsnbrg</a></address>
</footer>
</body>
</html>