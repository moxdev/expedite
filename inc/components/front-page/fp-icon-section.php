<?php
/**
 * Front Page Icon Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_icon_section' ) ) :
	/**
	 * Outputs feature image post_thumbnail with a title and wysiwyg
	 */
	function expedite_delivery_system_icon_section() {
		if ( function_exists( 'get_field' ) ) :
			$icon_section   = get_field( 'icon_section' );
			$icon_title     = $icon_section['icon_title'];
			$icon_sub_title = $icon_section['icon_title'];
			$icon_button    = $icon_section['icon_button'];

			if ( $icon_title || $icon_sub_title ) :
				?>
				<section id="front-page-icon">
					<div class="content-wrapper">
						<?php
						if ( $icon_title ) :
							?>
							<h2 class="section-title">
								<?php
								echo wp_kses(
									$icon_title,
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

						if ( $icon_sub_title ) :
							?>
							<h3 class="section-sub-title">
								<?php
								echo wp_kses(
									$icon_sub_title,
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

						if ( have_rows( 'icon_section' ) ) :
							while ( have_rows( 'icon_section' ) ) :
								the_row();
								if ( have_rows( 'icon_cards' ) ) :
									?>
									<div class="icon-container">
										<?php
										while ( have_rows( 'icon_cards' ) ) :
											the_row();
											$icon_card_image       = get_sub_field( 'icon_card_image' );
											$icon_card_title       = get_sub_field( 'icon_card_title' );
											$icon_card_description = get_sub_field( 'icon_card_description' );
											?>
											<div class="icon-card">
												<img src="<?php echo esc_url( $icon_card_image['sizes']['icon-cards'] ); ?>" alt="<?php echo esc_attr( $icon_card_image['alt'] ); ?>" title="<?php echo esc_attr( $icon_card_image['title'] ); ?>"/>

												<h2 class="card-title">
													<?php
													echo wp_kses(
														$icon_card_title,
														array(
															'span'   => array(),
															'em'     => array(),
															'strong' => array(),
															'br'     => array(),
														)
													);
													?>
												</h2>

												<div class="card-desc">
													<?php echo wp_kses_post( $icon_card_description ); ?>
												</div>

											</div>
											<?php
										endwhile;
										?>
									</div><!-- icon-container -->
									<?php
								endif;
							endwhile;
						endif;

						if ( $icon_button ) :
							$link_url    = $icon_button['url'];
							$link_title  = $icon_button['title'];
							$link_target = $icon_button['target'] ? $icon_button['target'] : '_self';
							?>
							<a class="btn-alt" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?>&nbsp;<span>&raquo;</span></a>
							<?php
						endif;
						?>
					</div>
				</section><!-- .front-page-hero -->
				<?php
			endif;

		endif;

	}
endif;
