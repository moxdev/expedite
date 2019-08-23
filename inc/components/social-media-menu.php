<?php
/**
 * Social Media Menu
 *
 * @package Expedite_Delivery_System
 */

if ( ! function_exists( 'expedite_delivery_social_media_menu' ) ) :
	/**
	 * Output social media links from ACF.
	 */
	function expedite_delivery_social_media_menu() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			$fb        = get_field( 'facebook_url', 'social-media-channels' );
			$tw        = get_field( 'twitter_url', 'social-media-channels' );
			$goo       = get_field( 'google_mb_url', 'social-media-channels' );
			$linked    = get_field( 'linkedin_url', 'social-media-channels' );
			$yt        = get_field( 'youtube_url', 'social-media-channels' );
			$pinterest = get_field( 'pinterest_url', 'social-media-channels' );
			$insta     = get_field( 'instagram_url', 'social-media-channels' );

			if ( $fb || $tw || $goo || $linked || $yt || $pinterest || $insta ) {
				?>

				<div itemscope itemtype="http://schema.org/Organization">

					<link itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>">

					<ul role="list" class="social-media">

						<?php
						if ( $fb ) :
							?>

							<li class="fb"><a itemprop="sameAs" href="<?php echo esc_url( $fb ); ?>" target="_blank" rel="noopener noreferrer">Find Us On Facebook</a></li>

							<?php
						endif;

						if ( $tw ) :
							?>

							<li class="tw"><a itemprop="sameAs" href="<?php echo esc_url( $tw ); ?>" target="_blank" rel="noopener noreferrer">Follow Us On Twitter</a></li>

							<?php
						endif;

						if ( $linked ) :
							?>

							<li class="linked"><a itemprop="sameAs" href="<?php echo esc_url( $linked ); ?>" target="_blank" rel="noopener noreferrer">Find Us On LinkedIn</a></li>

							<?php
						endif;

						if ( $goo ) :
							?>

							<li class="goo"><a itemprop="sameAs" href="<?php echo esc_url( $goo ); ?>" target="_blank" rel="noopener noreferrer">Find Us Google My Business</a></li>

							<?php
						endif;

						if ( $insta ) :
							?>

							<li class="insta"><a itemprop="sameAs" href="<?php echo esc_url( $insta ); ?>" target="_blank" rel="noopener noreferrer">Find Us On Instagram</a></li>

							<?php
						endif;

						if ( $yt ) :
							?>

							<li class="yt"><a itemprop="sameAs" href="<?php echo esc_url( $yt ); ?>" target="_blank" rel="noopener noreferrer">Watch Us On YouTube</a></li>

							<?php
						endif;

						if ( $pinterest ) :
							?>

							<li class="pin"><a itemprop="sameAs" href="<?php echo esc_url( $pinterest ); ?>" target="_blank" rel="noopener noreferrer">See Us On Pinterest</a></li>

							<?php
						endif;
						?>

					</ul>
				</div>

				<?php
			}
		}
	}
endif;

