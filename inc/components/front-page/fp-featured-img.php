<?php
/**
 * Front Page Hero Image with Title and WYSIWYG
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_front_page_feature' ) ) :
	/**
	 * Outputs feature image post_thumbnail with a title and wysiwyg
	 */
	function expedite_delivery_system_front_page_feature() {
		if ( function_exists( 'get_field' ) ) :
			$hero      = get_field( 'featured_image_section' );
			$title     = $hero['feature_title'];
			$sub_title = $hero['feature_sub_title'];
			$button    = $hero['feature_button'];

			if ( is_front_page() && has_post_thumbnail() ) :
				$img_id    = get_post_thumbnail_id();
				$img_alt   = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
				$img_title = get_the_title( $img_id ) ? get_the_title( $img_id ) : $img_alt;
				?>

				<section id="front-page-hero">
					<figure class="feature-wrapper">
						<?php
						the_post_thumbnail( 'post-thumbnail', [ 'title' => $img_title ] );
						?>
					</figure>
					<?php
					if ( $hero ) :
						?>
						<div class="hero-content-container">
							<div class="hero-content">
								<?php
								if ( $title ) :
									?>
									<span class="hero-title">
										<?php
										echo wp_kses(
											$title,
											array(
												'span'   => array(),
												'em'     => array(),
												'strong' => array(),
												'br'     => array(),
											)
										);
										?>
									</span>
									<?php
								endif;

								if ( $sub_title ) :
									?>
									<span class="hero-sub-title">
										<?php
										echo wp_kses(
											$sub_title,
											array(
												'span'   => array(),
												'em'     => array(),
												'strong' => array(),
												'br'     => array(),
											)
										);
										?>
									</span>
									<?php
								endif;

								if ( $button ) :
									$link_url    = $button['url'];
									$link_title  = $button['title'];
									$link_target = $button['target'] ? $button['target'] : '_self';
									?>
									<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php
								endif;
								?>
							</div><!-- .hero-content -->
						</div>
						<?php
					endif;
					?>
				</section><!-- .front-page-hero -->

				<?php
				wp_enqueue_script( 'expedite-delivery-system-object-fit-library', get_template_directory_uri() . '/js/vendor/ofi.min.js', array(), '20190415', true );
				add_action( 'wp_footer', 'expedite_delivery_system_object_fit_js', 100 );
			endif;

		endif;

	}
endif;
