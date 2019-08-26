<?php
/**
 * Front Page Mobile App Callout Section
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_front_page_mobile_app_callout' ) ) :
	/**
	 * Outputs yellow section with title, sub-title, button and icon image
	 */
	function expedite_delivery_system_front_page_mobile_app_callout() {
		if ( function_exists( 'get_field' ) ) :
			$mobile_app_section = get_field( 'mobile_app_section' );
			$ma_title           = $mobile_app_section['mobile_app_title'];
			$ma_sub_title       = $mobile_app_section['mobile_app_sub_title'];

			if ( $ma_title || $ma_sub_title ) :
				$ma_button = $mobile_app_section['mobile_app_button'];
				$ma_img    = $mobile_app_section['mobile_icon_image'];
				?>
				<section id="front-page-mobile-app">
					<div class="content-wrapper">
						<?php
						if ( $ma_img ) :
							$ma_img_title = $ma_img['title'] ? $ma_img['title'] : $ma_img['alt'];
							?>
							<figure class="mobile-app-featured-image">
								<img src="<?php echo esc_url( $ma_img['sizes']['icon-mobile-app'] ); ?>" alt="<?php echo esc_attr( $ma_img['alt'] ); ?>" title="<?php echo esc_attr( $ma_img_title ); ?>"/>
							</figure>
							<?php
						endif;

						?>
						<div class="mobile-app-content">
							<?php
							if ( $ma_title ) :
								?>
								<h2 class="section-title">
									<?php
									echo wp_kses(
										$ma_title,
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

							if ( $ma_sub_title ) :
								?>
								<h3 class="section-sub-title">
									<?php
									echo wp_kses(
										$ma_sub_title,
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

							if ( $ma_button ) :
								$link_url    = $ma_button['url'];
								$link_title  = $ma_button['title'];
								$link_target = $ma_button['target'] ? $ma_button['target'] : '_self';
								?>
								<a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php
							endif;
							?>
						</div><!-- .mobile-app-content -->
					</div><!-- .content-wrapper -->
				</section><!-- .front-page-hero -->
				<?php
			endif;
		endif;
	}
endif;

