<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Timely
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'kuhn' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<?php the_custom_logo(); ?>
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kuhn' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
			<!-- timeline -->
			<nav class="nav__wrapper" id="myNavbar">
		      <ul class="nav">

		        <li role="presentation" class="active">
		          <a href="<?php is_front_page() ? print '#era-1' : print esc_url( home_url( '/' ) ).'#era-1'; ?>">
		            <span class="nav__counter">1944</span>
		            <h3 class="nav__title">Early Years</h3>
		            <p class="nav__body"><strong>Piraeus and beyond</strong></p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="<?php is_front_page() ? print '#era-2' : print esc_url( home_url( '/' ) ).'#era-2'; ?>">
		            <span class="nav__counter">1964</span>
		            <h3 class="nav__title">Odyssey Years</h3>
		            <p class="nav__body"><strong>In the UK</strong></p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="<?php is_front_page() ? print '#era-3' : print esc_url( home_url( '/' ) ).'#era-3'; ?>">
		            <span class="nav__counter">1974</span>
		            <h3 class="nav__title">Creative Years</h3>
		            <p class="nav__body"><strong>Return to Greece</strong></p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="<?php is_front_page() ? print '#era-4' : print esc_url( home_url( '/' ) ).'#era-4'; ?>">
		            <span class="nav__counter">1994</span>
		            <h3 class="nav__title">Mature Years</h3>
		            <p class="nav__body"><strong></strong></p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="<?php is_front_page() ? print '#era-5' : print esc_url( home_url( '/' ) ).'#era-5'; ?>">
		            <span class="nav__counter">2009</span>
		            <h3 class="nav__title">Legacy Years: </h3>
		            <p class="nav__body"><strong>Retirement and Grandkids</strong></p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="<?php is_front_page() ? print '#era-6' : print esc_url( home_url( '/' ) ).'#era-6'; ?>">
		            <span class="nav__counter">2021</span>
		            <h3 class="nav__title">Eulogies</h3>
		            <p class="nav__body"><strong></strong></p>
		          </a>
		        </li>

		      </ul>
		  </nav><!-- .timeline -->

	</header><!-- #masthead -->
