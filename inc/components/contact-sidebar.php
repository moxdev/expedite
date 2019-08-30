<?php
/**
 * Contact Page Sidebar
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_system_contact_sidebar' ) ) :
	/**
	 * Outputs contact info sidebar
	 */
	function expedite_delivery_system_contact_sidebar() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$add          = get_field( 'address', 'contact-information' );
			$city         = get_field( 'city', 'contact-information' );
			$state        = get_field( 'state', 'contact-information' );
			$zip          = get_field( 'zip', 'contact-information' );
			$phone        = get_field( 'phone', 'contact-information' );
			$office_label = get_field( 'office_phone_label', 'contact-information' );
			$office       = get_field( 'office', 'contact-information' );
			$email        = get_field( 'email', 'contact-information' );

			if ( $add || $city || $state || $zip || $phone || $office || $email ) :
				?>
				<aside class="contact-info">
					<?php
					if ( $add ) :
						?>
						<div class='address-section'>
							<h2>Location:</h2>
							<?php
							if ( $add ) :
								?>
								<span class="address">
									<span class="street-address">

										<?php echo esc_html( $add ) . '<br>'; ?>

									</span><!-- street-address-->

									<?php
									if ( $city ) :
										?>
										<span class="city">

											<?php
											echo esc_html( $city );

											if ( $state || $zip ) {
												echo ', ';
											}
											?>

										</span><!-- city-->

										<?php
									endif;

									if ( $state ) :
										?>
										<span class="state">

											<?php echo esc_html( $state ); ?>

										</span><!-- state-->
										<?php
									endif;

									if ( $zip ) :
										?>
										<span class="zip">

											<?php echo ' ' . esc_html( $zip ); ?>

										</span><!-- zip-->
										<?php
									endif;
									?>

								</span><!-- address -->
								<?php
							endif;
							?>
						</div><!-- address-section -->
						<?php
					endif;

					if ( $phone || $office || $email ) :

						if ( $phone ) :
							$phone_label = get_field( 'phone_label', 'contact-information' );
							?>
							<h2><?php echo esc_html( $phone_label ); ?></h2>

							<a class="tel" href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
							<?php
						endif;

						if ( $office ) :
							$office_label = get_field( 'office_phone_label', 'contact-information' );
							?>
							<h2><?php echo esc_html( $office_label ); ?></h2>

							<a class="tel" href="tel:<?php echo esc_attr( $office ); ?>"><?php echo esc_html( $phone ); ?></a>
							<?php
						endif;

						if ( $email ) :
							?>
							<h2>Email:</h2>

							<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
							<?php
						endif;
					endif;
					?>
				</aside><!-- contact-info -->
				<?php
			endif;
		}
	}
endif;

