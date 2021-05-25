
<?php
if( get_theme_mod( 'oceanic-show-header-top-bar', true ) ) :
?>

    <div class="site-top-bar border-bottom">
        
        <div class="site-container">
            
            <div class="site-top-bar-left">
				<div class="site-top-bar-left-text"><?php echo wp_kses_post( pll__( get_theme_mod( 'oceanic-header-info-text', customizer_library_get_default( 'oceanic-header-info-text' ) ) ) ); ?></div>
            </div>
            <div class="site-top-bar-right">
                
                <?php
                if ( oceanic_is_woocommerce_activated() && get_theme_mod( 'oceanic-header-shop-links', true ) ) {
					get_template_part( 'templates/shop-links' );
                }
                ?>
                
            </div>
            <div class="clearboth"></div>
            
        </div>
    </div>

<?php
endif;
?>

<div class="site-container">
    
    <div class="site-header-branding">
        <?php
		if( has_custom_logo() ) :
			echo get_custom_logo();
		else :
        ?>
        	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
        <?php
		endif;
		?>
    </div>
    
</div>

<?php 
get_template_part( 'templates/header/navigation-menu' );
