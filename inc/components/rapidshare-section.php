<?php
/**
 * Industries Page Icon Card Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_rapidshare_section' ) ) :
	/**
	 * Outputs the icon cards section
	 */
	function expedite_delivery_system_rapidshare_section() {
		if ( function_exists( 'get_field' ) ) :
			$rapidshare_instructions = get_field( 'rapidshare_instructions' );
			$rapidshare_image        = get_field( 'rapidshare_image' );

			if ( $rapidshare_instructions || $rapidshare_image ) :
				?>
				<section id="rapidshare">
					<?php
					if ( $rapidshare_instructions ) :
						?>
						<div class="col-left">
							<?php echo wp_kses_post( $rapidshare_instructions ); ?>
						</div>
						<?php
					endif;

					if ( $rapidshare_image ) :
						$rapidshare_image_title = $rapidshare_image['title'] ? $rapidshare_image['title'] : $rapidshare_image['alt'];
						?>
						<figure class="col-right">
							<img src="<?php echo esc_url( $rapidshare_image['sizes']['rapidshare'] ); ?>" alt="<?php echo esc_attr( $rapidshare_image['alt'] ); ?>" title="<?php echo esc_attr( $rapidshare_image_title ); ?>"/>
						</figure>
						<?php
					endif;
					?>
				</section><!-- #rapidshare -->
				<?php
			endif;
		endif;
	}
endif;
