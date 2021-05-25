
<div class="site-container">
    
    <div class="site-header-left">

        <?php
        if ( has_custom_logo() ) :
        	echo get_custom_logo();
        else :
        ?>
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
            <div class="site-description"><?php bloginfo( 'description' ); ?></div>
        <?php
        endif;
        ?>

    	<!--
        <?php if( get_header_image() ) : ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" /></a>
        <?php else : ?>
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
            <div class="site-description"><?php bloginfo( 'description' ); ?></div>
        <?php endif; ?>
        -->
        
    </div><!-- .site-branding -->
    
    <div class="site-header-right">
        
        <?php
        if ( oceanic_is_woocommerce_activated() && get_theme_mod( 'oceanic-header-shop-links', true ) ) {
        	get_template_part( 'templates/shop-links' );
        } else {
		?>
			<div class="site-top-bar-left-text"><?php echo wp_kses_post( pll__( get_theme_mod( 'oceanic-header-info-text', customizer_library_get_default( 'oceanic-header-info-text' ) ) ) ); ?></div>
        <?php
        }
        ?>
        
    </div>
    <div class="clearboth"></div>
    
</div>

<?php 
get_template_part( 'templates/header/navigation-menu' );
