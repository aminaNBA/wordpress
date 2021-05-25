<?php
if ( is_user_logged_in() ) {
?>
	<div class="site-header-right-link">
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account">
			<?php _e('My Account','oceanic'); ?>
		</a>
	</div>
<?php
} else {
?>
	<div class="site-header-right-link">
		<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account"><?php _e('Sign In / Register','oceanic'); ?></a></div>
<?php
}
?>
	<div class="header-cart">
	<?php
	get_template_part( 'templates/header-cart-contents' );
	?>
	</div>
