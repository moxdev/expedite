<?php
/**
 * Front Page Callout Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_front_page_callout' ) ) :
	/**
	 * Outputs white section with title, sub-title, description and button
	 */
	function expedite_delivery_system_front_page_callout() {
		if ( function_exists( 'get_field' ) ) :
			$call_out_section = get_field( 'call_out_section' );
			$co_title         = $call_out_section['co_title'];
			$co_sub_title     = $call_out_section['co_sub_title'];

			if ( $co_title || $co_sub_title ) :
				$co_description = $call_out_section['co_description'];
				$co_button      = $call_out_section['co_button'];
				?>
				<section id="front-page-callout">
					<div class="content-wrapper">
						<div class="callout-content">
							<?php
							if ( $co_title ) :
								?>
								<h2 class="section-title">
									<?php
									echo wp_kses(
										$co_title,
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

							if ( $co_sub_title ) :
								?>
								<h3 class="section-sub-title">
									<?php
									echo wp_kses(
										$co_sub_title,
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

							if ( $co_description ) :
								?>
								<div class="co-desc-container">
									<?php echo wp_kses_post( $co_description ); ?>
								</div>
								<?php
							endif;

							if ( $co_button ) :
								$link_url    = $co_button['url'];
								$link_title  = $co_button['title'];
								$link_target = $co_button['target'] ? $co_button['target'] : '_self';
								?>
								<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php
							endif;
							?>
						</div><!-- .callout-content -->
					</div><!-- .content-wrapper -->
				</section><!-- .front-page-callout -->
				<?php
			endif;
		endif;
	}
endif;

