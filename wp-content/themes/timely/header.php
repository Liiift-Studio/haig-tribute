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
		    <nav class="nav__wrapper">
		      <ul class="nav">

		        <li role="presentation" class="active">
		          <a href="#section1">
		            <span class="nav__counter">1952</span>
		            <h3 class="nav__title">Birth</h3>
		            <p class="nav__body"><strong>Early Years</strong>. Haig's childhood was...</p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="#section2">
		            <span class="nav__counter">1965</span>
		            <h3 class="nav__title">School Days</h3>
		            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="#section3">
		            <span class="nav__counter">1980</span>
		            <h3 class="nav__title">In Business</h3>
		            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="#section4">
		            <span class="nav__counter">1995</span>
		            <h3 class="nav__title">Section 4 Title</h3>
		            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="#section5">
		            <span class="nav__counter">2005</span>
		            <h3 class="nav__title">Retirement?</h3>
		            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
		          </a>
		        </li>

		        <li role="presentation">
		          <a href="#section6">
		            <span class="nav__counter">2021</span>
		            <h3 class="nav__title">Section 6 Title</h3>
		            <p class="nav__body">Sed sit amet justo sed odio tempus tempus. Vestibulum sed varius mi, sit amet condimentum lacus.</p>
		          </a>
		        </li>

		      </ul>
		  </nav><!-- .timeline -->

	</header><!-- #masthead -->

