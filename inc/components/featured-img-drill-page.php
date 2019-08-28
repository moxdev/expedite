<?php
/**
 * Featured Image for Drill Pages
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_page_feature' ) ) :
	/**
	 * Output post thumbnail featured image with Alt and Title.
	 */
	function expedite_delivery_system_page_feature() {
		if ( has_post_thumbnail() && ! is_home() ) :
			$img_id    = get_post_thumbnail_id();
			$img_alt   = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
			$img_title = get_the_title( $img_id ) ? get_the_title( $img_id ) : $img_alt;
			?>
			<div class="page-feature">
				<div class="feature-container">
					<figure>

						<?php the_post_thumbnail( 'post-thumbnail', [ 'title' => $img_title ] ); ?>

						<figcaption>
							<?php the_title(); ?>
						</figcaption>
					</figure>
				</div>
			</div>
			<?php
			wp_enqueue_script( 'expedite-delivery-system-object-fit-library', get_template_directory_uri() . '/js/vendor/ofi.min.js', array(), '20190415', true );
			add_action( 'wp_footer', 'expedite_delivery_system_object_fit_js', 100 );
		endif;
	}
endif;
