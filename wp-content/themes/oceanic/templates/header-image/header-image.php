
<div class="header-image-wrap header-image-remove">
	<div class="header-image">

		<?php
		$attachment_id = null;

		if ( is_random_header_image() && $header_url = get_header_image() ) {
			// For a random header search for a match against all headers.
			foreach ( get_uploaded_header_images() as $header ) {
				if ( $header['url'] == $header_url ) {
					$attachment_id = $header['attachment_id'];
					break;
				}
			}
	
		} elseif ( $data = get_custom_header() ) {
			// For static headers
			if ( ! empty( $data->attachment_id ) ) {
				$attachment_id = $data->attachment_id;
			}
	    }
	
		$alt_text = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
		?>
	
		<img src="<?php esc_url( header_image() ); ?>" alt="<?php echo $alt_text; ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" />
		
		<?php
		if ( !empty( trim( pll__( get_theme_mod( 'oceanic-header-image-text', customizer_library_get_default( 'oceanic-header-image-text' ) ) ) ) ) ) {
		?>
		<div class="overlay">
			<?php echo wp_kses_post( pll__( get_theme_mod( 'oceanic-header-image-text', customizer_library_get_default( 'oceanic-header-image-text' ) ) ) ); ?>
		</div>
		<?php 
		}
		?>

	</div>
	
</div>
