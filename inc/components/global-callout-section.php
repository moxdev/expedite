<?php
/**
 * Global Site Callout Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_front_page_global_callout' ) ) :
	/**
	 * Outputs global callout section with title, sub-title, button and icon image
	 */
	function expedite_delivery_system_front_page_global_callout() {
		if ( function_exists( 'get_field' ) ) :
			$global_callout_title      = get_field( 'global_callout_title', 'global-callout' );
			$global_callout_sub_title  = get_field( 'global_callout_sub_title', 'global-callout' );
			$global_callout_button_url = get_field( 'global_callout_button_url', 'global-callout' );
			$global_callout_img        = get_field( 'global_callout_img', 'global-callout' );


			if ( $global_callout_title || $global_callout_sub_title ) :
				?>
				<section id="global-callout">
					<div class="content-wrapper">
						<?php
						if ( $global_callout_img ) :
							$global_callout_img_title = $global_callout_img['title'] ? $global_callout_img['title'] : $global_callout_img['alt'];
							?>
							<figure class="global-callout-featured-image">
								<img src="<?php echo esc_url( $global_callout_img['sizes']['icon-global-callout'] ); ?>" alt="<?php echo esc_attr( $global_callout_img['alt'] ); ?>" title="<?php echo esc_attr( $global_callout_img_title ); ?>"/>
							</figure>
							<?php
						endif;

						?>
						<div class="global-callout-content">
							<?php
							if ( $global_callout_title ) :
								?>
								<h2 class="section-title">
									<?php
									echo wp_kses(
										$global_callout_title,
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

							if ( $global_callout_sub_title ) :
								?>
								<h3 class="section-sub-title">
									<?php
									echo wp_kses(
										$global_callout_sub_title,
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

							if ( $global_callout_button_url ) :
								$link_url    = $global_callout_button_url['url'];
								$link_title  = $global_callout_button_url['title'];
								$link_target = $global_callout_button_url['target'] ? $global_callout_button_url['target'] : '_self';
								?>
								<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php
							endif;
							?>
						</div><!-- .global-callout-content -->
					</div><!-- .content-wrapper -->
				</section><!-- #global-callout -->
				<?php
			endif;
		endif;
	}
endif;

