<?php
/**
 * Template Name: Contact
 *
 * This is the template that displays the Contact Us Page
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

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.

				expedite_delivery_system_contact_sidebar();
				?>

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
