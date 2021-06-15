<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Timely
 */

?>



	<main id="main" class="site-main" role="main">
		<section class="none-header">
			<header class="page-header">
				<h1 class="page-title">
					<?php
					if ( is_404() ) { esc_html_e( 'Page not available', 'timely' );
					} else if ( is_search() ) {
						/* translators: %s = search query */
						printf( esc_html__( 'Nothing found for &ldquo;%s&rdquo;', 'timely'), get_search_query() );
					} else {
						esc_html_e( 'Nothing Found', 'timely' );
					}
					?>
				</h1>


				<div class="page-content">
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

						<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'timely' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

					<?php elseif ( is_search() ) : ?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'timely' ); ?></p>

					<?php elseif ( is_404() ) : ?>

						<p><?php esc_html_e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'timely' ); ?></p>

					<?php else : ?>

						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'timely' ); ?></p>

					<?php endif; ?>
				</div><!-- .page-content -->
			</header><!-- .page-header -->
		</section>

	</main><!-- #main -->


<?php
get_sidebar();
get_footer();
