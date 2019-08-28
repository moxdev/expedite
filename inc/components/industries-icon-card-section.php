<?php
/**
 * Industries Page Icon Card Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_industries_icon_section' ) ) :
	/**
 * Outputs the indutries section with Icon, Title, Description
	 */
	function expedite_delivery_system_industries_icon_section() {
		if ( have_rows( 'ind_icon_cards' ) ) :
			?>
			<section id="industries">
				<?php
				while ( have_rows( 'ind_icon_cards' ) ) :
					the_row();
					$ind_icon_image       = get_sub_field( 'ind_icon_card_image' );
					$ind_icon_title       = get_sub_field( 'ind_icon_card_title' );
					$ind_icon_description = get_sub_field( 'ind_icon_card_description' );
					?>
					<div class="industry">
						<?php
						if ( $ind_icon_image ) :
							$ind_icon_image_title = $ind_icon_image['title'] ? $ind_icon_image['title'] : $ind_icon_image['alt'];
							?>
							<div class="col-left">
								<img src="<?php echo esc_url( $ind_icon_image['sizes']['icon-industries'] ); ?>" alt="<?php echo esc_attr( $ind_icon_image['alt'] ); ?>" title="<?php echo esc_attr( $ind_icon_image_title ); ?>"/>
							</div>
							<?php
						endif;

						if ( $ind_icon_title || $ind_icon_description ) :
							?>
							<div class="col-right">
								<?php
								if ( $ind_icon_title ) :
									?>
									<h2 class="industry-title">
										<?php
										echo wp_kses(
											$ind_icon_title,
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

								if ( $ind_icon_description ) :
									?>
									<div class="industry-desc">
										<?php echo wp_kses_post( $ind_icon_description ); ?>
									</div>
									<?php
								endif;
								?>
							</div>
							<?php
						endif;
						?>
					</div><!-- .industry -->
					<?php
				endwhile;
				?>
			</section><!-- #industries -->
			<?php
		endif;
	}
endif;
