<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Expedite_Delivery_System
 */

?>
	<?php
	if ( function_exists( 'get_field' ) ) :
		$show_global_callout = get_field( 'show_global_callout' );

		if ( $show_global_callout ) :
			expedite_delivery_system_front_page_global_callout();
		endif;
	endif;
	?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info content-wrapper">
			<div class="col-left">
				<?php
				if ( has_nav_menu( 'menu-ftr' ) ) :
					?>
					<nav class="ftr-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-ftr',
								'menu_id'        => 'ftr-menu',
								'container'      => '',
							)
						);
						?>
					</nav><!-- .site-navigation -->
					<?php
				endif;
				?>
			</div>

			<div class="col-right">
				<?php the_custom_logo(); ?>

				<?php expedite_delivery_social_media_menu(); ?>

				<div class="copy-container">
						<span>
							<sup>&copy;</sup><?php esc_html_e( 'Copyright 2019 Expedite Delivery System.', 'expedite_delivery_system' ); ?>
						</span>
						<span>
							<?php esc_html_e( 'All Rights Reserved.', 'expedite_delivery_system' ); ?>
						</span>
						<a class="mms" href="https://www.mm4solutions.com"><?php esc_html_e( 'Powered by Millennium Marketing Solutions.', 'expedite_delivery_system' ); ?></a>
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
