<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package froma2c
 */

?>

<div class="post-entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<p class="post-category">
	            <a href="#"><?php the_category( ', ' ); ?></a>
	          </p>
			<?php
			if ( is_singular() ) :
				the_title( '<h2 class="post-title">', '</h2>' );
			else :
				the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( has_post_thumbnail() ) : ?>
	    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	        <?php the_post_thumbnail(); ?>
	    </a>
			<?php endif;

			if ( 'post' === get_post_type() ) : ?>
			<!-- no meta
			<div class="entry-meta">
				<?php froma2c_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_excerpt();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'froma2c' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

	</article><!-- #post-<?php the_ID(); ?> -->

</div> <!-- .post-entry -->
