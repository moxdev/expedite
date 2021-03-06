<?php
/**
 * The template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Expedite_Delivery_System
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="main-content-wrapper">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'front-page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
			<?php
			expedite_delivery_system_icon_section();
			expedite_delivery_system_front_page_mobile_app_callout();
			expedite_delivery_system_front_page_callout();
			expedite_delivery_system_testimonial_display();
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
