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
				<section class="front-page-mobile-app">
					<!-- <img class="top-curve" src="wp-content/themes/expedite_delivery_system/imgs/blue-curve-down-lg.svg" alt=""> -->
					<div class="content-wrapper">
						<?php
						if ( $ma_img ) :
							$ma_img_title = $ma_img['title'] ? $ma_img['title'] : $ma_img['alt'];
							?>
							<figure class="mobile-app-featured-image">
								<img class="icon-mobile-app" src="<?php echo esc_url( $ma_img['sizes']['icon-mobile-app'] ); ?>" alt="<?php echo esc_attr( $ma_img['alt'] ); ?>" title="<?php echo esc_attr( $ma_img_title ); ?>"/>
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
					<!-- <img class="bottom-curve" src="wp-content/themes/expedite_delivery_system/imgs/white-up-lg-test.svg" alt=""> -->
				</section><!-- .front-page-hero -->
				<?php
				function expedite_delivery_system_section_divider() {
					?>
					<script>
						var section = document.querySelector('.front-page-mobile-app');
						var topCurve = document.querySelector('.top-curve');
						var bottomCurve = document.querySelector('.bottom-curve');
						var figure = document.querySelector('.front-page-mobile-app .content-wrapper .mobile-app-featured-image');
						var icon = document.querySelector('.icon-mobile-app');
						// var content = document.querySelector('.mobile-app-content');

						function placeDivider() {
							// console.log(section);
							// console.log(topCurve);
							// console.log(bottomCurve);
							// console.log(figure);
							// console.log(icon);
							// console.log(`section width = ${section.offsetWidth}`);
							// console.log(`icon height = ${icon.height}`);
							// console.log(`bottom curve height = ${bottomCurve.height}`);
							// console.log(`-${topCurve.height * 2}px`);

							console.log(`figure margin-top: -${section.offsetHeight * 0.15}px`);

							figure.style.marginTop = -(section.offsetHeight * 0.15) + 'px';

							// elem.style.marginTop = (logo.height * 0.125) + 'px';
							// feedWrapper.style.paddingTop = (logo.height * 0.3) + 'px';
							// prevSibling.style.paddingBottom = (logo.height * 0.375) + 'px';
						}

						if(section && figure) {
							window.addEventListener('load', placeDivider);
							window.addEventListener('resize', placeDivider);
						}
					</script>
					<?php
				}
				add_action( 'wp_footer', 'expedite_delivery_system_section_divider', 100 );
			endif;
		endif;
	}
endif;

