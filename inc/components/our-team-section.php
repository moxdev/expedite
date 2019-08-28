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
		if ( have_rows( 'team_member' ) ) :
			?>
			<section id="our-team">
				<?php
				while ( have_rows( 'team_member' ) ) :
					the_row();
					$team_image       = get_sub_field( 'team_image' );
					$team_name        = get_sub_field( 'team_name' );
					$team_title       = get_sub_field( 'team_title' );
					$team_description = get_sub_field( 'team_description' );
					?>
					<div class="team-member">
						<?php
						if ( $team_image ) :
							$team_image_title = $team_image['title'] ? $team_image['title'] : $team_image['alt'];
							?>
							<figure class="col-left">
								<img class="headshot" src="<?php echo esc_url( $team_image['sizes']['team-member'] ); ?>" alt="<?php echo esc_attr( $team_image['alt'] ); ?>" title="<?php echo esc_attr( $team_image_title ); ?>"/>
							</figure>
							<?php
						endif;

						if ( $team_name || $team_title || $team_description ) :
							?>
							<div class="col-right">
								<?php
								if ( $team_name ) :
									?>
									<h2 class="team-member-name">
										<?php echo esc_html( $team_name ); ?>
									</h2>
									<?php
								endif;

								if ( $team_title ) :
									?>
									<h3 class="team-member-title">
										<?php echo esc_html( $team_title ); ?>
									</h3>
									<?php
								endif;

								if ( $team_description ) :
									?>
									<div class="team-member-description">

										<?php echo wp_kses_post( $team_description ); ?>

									</div>
									<?php
								endif;
								?>
							</div>
							<?php
						endif;
						?>
					</div><!-- .team-member -->
					<?php
				endwhile;
				?>
			</section><!-- #our-team -->
			<?php
		endif;
	}
endif;
