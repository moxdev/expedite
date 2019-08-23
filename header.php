<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Expedite_Delivery_System
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'expedite_delivery_system' ); ?></a>

	<header id="masthead" class="site-header">

		<?php
		if ( function_exists( 'acf_add_options_page' ) || has_nav_menu( 'menu-aux' ) || has_nav_menu( 'menu-main' ) ) :
			?>
			<div class="aux-nav-menu-toggle-container">
				<?php
				if ( function_exists( 'acf_add_options_page' ) ) :
					$phone = get_field( 'phone', 'contact-information' );

					if ( $phone || has_nav_menu( 'menu-aux' ) ) :
						?>

						<div class='aux-container'>

							<?php
							if ( $phone ) :
								?>

								<a class="aux-tel-svg" rel="noopener noreferrer" href="tel:<?php echo esc_attr( $phone ); ?>">
									<svg id="aux-tel-icon" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" aria-labelledby="phoneIconTitle phoneIconTitle" role="img"><title id="phoneIconTitle">White Phone Icon</title><desc id="phoneIconDesc">An icon of a white telephone receiver.</desc><path d="M23.2,30h0a4.44,4.44,0,0,1-.62-.05A25.68,25.68,0,0,1,7.51,22.3l0,0,0,0A25.65,25.65,0,0,1-.19,7.17C-.6,4.46,1.52,3.17,5.35.83L6.22.3a2,2,0,0,1,2.89.89l2.31,5.18a2.24,2.24,0,0,1-1.08,3l-1.72.82a.28.28,0,0,0-.17.31,18.21,18.21,0,0,0,4.46,6.35l0,0,0,0a18.12,18.12,0,0,0,6.35,4.46.28.28,0,0,0,.31-.17l.82-1.72a2.24,2.24,0,0,1,2.95-1.08l5.18,2.31a2,2,0,0,1,1.1,1.23,2.06,2.06,0,0,1-.21,1.66l-.53.86C26.73,28,25.51,30,23.2,30Z" style="fill:#fff"/></svg>
								</a>

								<a class="aux-tel" rel="noopener noreferrer" href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>

								<?php
							endif;

							if ( has_nav_menu( 'menu-aux' ) ) :
								?>

								<nav id="aux-navigation">

									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-aux',
											'menu_id' => 'aux-menu',
										)
									);
									?>

								</nav><!-- #aux-navigation -->

								<?php
							endif;
							?>

						</div><!-- .aux-container -->

						<?php
					endif;
				endif;

				if ( has_nav_menu( 'menu-main' ) ) :
					?>
					<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle Main Menu', 'expedite_delivery_system' ); ?>"><span class="inner"><span class="screen-reader-text"><?php esc_html_e( 'Menu', 'expedite_delivery_system' ); ?></span></span></button>
					<?php
				endif;
				?>

			</div><!-- .aux-nav-menu-toggle-container -->
			<?php

		endif;
		?>

		<div class="branding-desktop-nav-container">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$expedite_delivery_system_description = get_bloginfo( 'description', 'display' );
				if ( $expedite_delivery_system_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $expedite_delivery_system_description; /* WPCS: xss ok. */ ?></p>
					<?php
				endif;
				?>
			</div><!-- .site-branding -->

			<?php
			if ( has_nav_menu( 'menu-main' ) ) :
				?>
				<div class="desktop-navigation">
					<nav class="site-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-main',
								'menu_id'        => 'desktop-menu',
								'container'      => '',
							)
						);
						?>
					</nav><!-- .site-navigation -->
				</div><!-- .desktop-navigation -->
				<?php
			endif;
			?>

		</div>




		<?php
		if ( has_nav_menu( 'menu-main' ) ) :
			?>
			<div id="mobile-nav-overlay">
				<nav id="mobile-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-main',
							'menu_id'        => 'mobile-menu',
							'container'      => '',
						)
					);
					?>
				</nav><!-- #mobile-navigation -->
			</div><!-- #mobile-nav-overlay -->
			<?php
		endif;
		?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php
		if ( is_front_page() ) {
			expedite_delivery_system_front_page_feature();
		} else {
			expedite_delivery_system_page_feature();
		}
		?>
