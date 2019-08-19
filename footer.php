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
		</div><!-- .wrapper -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<small>&copy; <?php bloginfo( 'name' ); ?> <?php esc_html_e( 'All Rights Reserved', 'expedite_delivery_system' ); ?>.</small>
			<small><a class="mms" href="https://www.mm4solutions.com"><?php esc_html_e( 'Website by Millennium Marketing Solutions', 'expedite_delivery_system' ); ?></a>.</small>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
