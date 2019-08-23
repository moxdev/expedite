<?php
/**
 * ACF Flexible Content
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_flexible_content' ) ) :
	/**
	 * ACF Flexible Content Areas
	 */
	function expedite_delivery_system_flexible_content() {
		if ( function_exists( 'get_field' ) ) {
			if ( have_rows( 'flexible_content_areas' ) ) :
				while ( have_rows( 'flexible_content_areas' ) ) :
					the_row();
					if ( get_row_layout() === 'highlight_image_cards_content' ) :
						scheffres_highlight_image_cards();
					elseif ( get_row_layout() === 'highlight_link_cards_content' ) :
						scheffres_highlight_link_cards();
					elseif ( get_row_layout() === 'additional_content' ) :
						scheffres_additional_content();
					elseif ( get_row_layout() === 'testimonial_content' ) :
						scheffres_testimonial_carousel();
					endif;
				endwhile;
			endif;
		}
	}
endif;

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
			<figure class="page-feature">

				<?php the_post_thumbnail( 'post-thumbnail', [ 'title' => $img_title ] ); ?>

				<figcaption>
					<?php the_title(); ?>
				</figcaption>
			</figure>
			<?php
			wp_enqueue_script( 'expedite-delivery-system-object-fit-library', get_template_directory_uri() . '/js/vendor/ofi.min.js', array(), '20190415', true );
			add_action( 'wp_footer', 'expedite_delivery_system_object_fit_js', 100 );
		endif;
	}
endif;
