<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Timely
 */

?>

<article id="<?php echo substr(strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', json_encode(get_the_category()[0]->name)))), 1, 5); ?>" <?php post_class(); ?>>

	<?php
	if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image">
		<?php if (!is_singular()) { ?>
		<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
			<?php
			$thumbnail_alt = 'Go to ' . get_the_title();
			the_post_thumbnail('timely-index', 'alt=' . $thumbnail_alt);
			?>
		</a>
		<?php } else {
			the_post_thumbnail('timely-index');
		} ?>
	</figure><!-- .featured-image full-bleed -->
	<?php } ?>

	<header class="entry-header">
		<?php timely_the_category_list(); ?>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<?php
	if ( 'post' === get_post_type() ) : ?>
	<div class="entry-meta">
		<?php timely_posted_on(); ?>
	</div><!-- .entry-meta -->
	<?php
	endif; ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'timely' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'timely' ),
				'after'  => '</div>',
			) );
		} else {
			the_excerpt();
		}
		?>
	</div><!-- .entry-content -->
	<?php
	if ( is_singular() ) { ?>
		<footer class="entry-footer">
			<?php timely_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php } ?>

</article><!-- #post-## -->
