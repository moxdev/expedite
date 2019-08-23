<?php
/**
 * Industries Page Icon Card Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_our_team_section' ) ) :
	/**
	 * Outputs the icon cards section
	 */
	function expedite_delivery_system_our_team_section() {
		if ( have_rows( 'ind_icon_cards' ) ) :
			?>
			<div class="industries-icon-container">
				<?php
				while ( have_rows( 'ind_icon_cards' ) ) :
					the_row();
					$ind_icon_card_image       = get_sub_field( 'ind_icon_card_image' );
					$ind_icon_card_page_link   = get_sub_field( 'ind_icon_card_page_link' );
					$ind_icon_card_title       = get_sub_field( 'ind_icon_card_title' );
					$ind_icon_card_description = get_sub_field( 'ind_icon_card_description' );
					?>
					<div class="industry-icon-card">
						<?php
						if ( $ind_icon_card_page_link ) :
							$link_url    = $ind_icon_card_page_link['url'];
							$link_target = $ind_icon_card_page_link['target'] ? $ind_icon_card_page_link['target'] : '_self';
							?>
							<div class="col-left">
								<a class="page-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
									<?php
									if ( $ind_icon_card_image ) :
										$ind_icon_card_image_title = $ind_icon_card_image['title'] ? $ind_icon_card_image['title'] : $ind_icon_card_image['alt'];
										?>
										<img src="<?php echo esc_url( $ind_icon_card_image['sizes']['icon-industries'] ); ?>" alt="<?php echo esc_attr( $ind_icon_card_image['alt'] ); ?>" title="<?php echo esc_attr( $ind_icon_card_image_title ); ?>"/>
										<?php
									endif;
									?>
								</a>
							</div>
							<?php
						endif;

						if ( $ind_icon_card_title || $ind_icon_card_description ) :
							?>
							<div class="col-right">
								<?php
								if ( $ind_icon_card_title ) :
									?>
									<h2 class="industry-card-title">
										<?php
										echo wp_kses(
											$ind_icon_card_title,
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

								if ( $ind_icon_card_description ) :
									?>
									<div class="industry-card-desc">
										<?php echo wp_kses_post( $ind_icon_card_description ); ?>
									</div>
									<?php
								endif;
								?>
							</div>
							<?php
						endif;
						?>
					</div><!-- .industry-icon-card -->
					<?php
				endwhile;
				?>
			</div><!-- .industries-icon-container -->
			<?php
		endif;
	}
endif;
