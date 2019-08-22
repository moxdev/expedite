<?php
/**
 * Front Page Callout Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_testimonial_display' ) ) :
	/**
	 * Displays the custom post type Testimonial on the Testimonial Page
	 *
	 * @return void
	 */
	function expedite_delivery_system_testimonial_display() {
		if ( function_exists( 'get_field' ) ) :
			$testimonial_section     = get_field( 'testimonial_section' );
			$add_testimonial_section = $testimonial_section['add_the_testimonial_section'];

			if ( $add_testimonial_section ) :
				$testimonial = get_posts(
					array(
						'post_type'      => 'testimonial',
						'posts_per_page' => -1,
					)
				);

				if ( $testimonial ) :
					$args = array(
						'post_type'   => array( 'testimonial' ),
						'post_status' => array( 'publish' ),
						'nopaging'    => true,
						'order'       => 'DESC',
						'orderby'     => 'date',
					);

					$testimonials = new WP_Query( $args );

					if ( $testimonials->have_posts() ) :
						$test_background_img = $testimonial_section['test_background_image'];
						$test_title          = $testimonial_section['test_title'];
						$test_sub_title      = $testimonial_section['test_sub_title'];

						wp_enqueue_script( 'flickity', get_template_directory_uri() . '/js/vendor/flickity.pkgd.min.js', null, '20190107', true );

						add_action( 'wp_footer', 'flickity_trigger_testimonial', 100 );
						/**
						 * Output to footer to run testimonial carousel
						 *
						 * @return void
						 */
						function flickity_trigger_testimonial() {
							?>

							<script>
								var elem = document.querySelector( '.testimonial-carousel' );
								var flkty = new Flickity( elem, {
									cellAlign: 'left',
									contain: true,
									pageDots: false,
									prevNextButtons: true,
									setGallerySize: true,
									groupCells: true,
									autoPlay: 7000,
									resize: true,
									selectedAttraction: 0.01,
									friction: 0.2,
									wrapAround: true
								});
							</script>

							<?php
						}
						?>
						<section id='front-page-testimonial'>
							<?php
							if ( $test_background_img ) :
								?>
								<figure class="testimonial-background-image">
									<img
										src="<?php echo esc_url( $test_background_img['sizes']['home-testimonial-sm'] ); ?>"
										srcset="
											<?php echo esc_url( $test_background_img['sizes']['home-testimonial-sm'] ); ?> 300w,
											<?php echo esc_url( $test_background_img['sizes']['home-testimonial-md'] ); ?> 1000w,
											<?php echo esc_url( $test_background_img['sizes']['home-testimonial-lg'] ); ?> 1500w,
											<?php echo esc_url( $test_background_img['sizes']['home-testimonial-xl'] ); ?> 2200w"
										sizes="100vw"
										alt="<?php echo esc_attr( $test_background_img['alt'] ); ?>"
										title="<?php echo esc_attr( $test_background_img['title'] ); ?>" >
								</figure>
								<?php
							endif;
							?>
							<div class="content-wrapper">
								<?php
								if ( $test_title ) :
									?>
									<h2 class="section-title">
										<?php
										echo wp_kses(
											$test_title,
											array(
												'span'   => array(),
												'em'     => array(),
												'strong' => array(),
												'br'     => array(),
											)
										);
										?>
									</h2>
									<?php
								endif;

								if ( $test_sub_title ) :
									?>
									<h3 class="section-sub-title">
										<?php
										echo wp_kses(
											$test_sub_title,
											array(
												'span'   => array(),
												'em'     => array(),
												'strong' => array(),
												'br'     => array(),
											)
										);
										?>
									</h3>
									<?php
								endif;

								?>
								<div class="testimonial-carousel">
									<?php
									while ( $testimonials->have_posts() ) :
										$testimonials->the_post();
										$business_name = get_field( 'business_name' );
										?>

										<div class="cell">
											<div class="testimonial-content">
												<blockquote>
													<?php the_content(); ?>
												</blockquote>
												<div class="title-container">
													<span class="name">
														<?php
														echo '&dash;&nbsp;';
														the_title();
														if ( $business_name ) :
															echo '&#44;&nbsp;' . esc_html( $business_name );
														endif;
														?>
													</span>
												</div><!-- .title-container -->
											</div><!-- testimonial-content -->
										</div><!-- .cell -->
										<?php
									endwhile;
									?>
								</div>
							</div>
						</section>

						<?php
					endif;

					wp_reset_postdata();

				endif;
			endif;
		endif;
	}
endif;


