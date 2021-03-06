<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package froma2c
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php
		if ( is_singular() ) :
			the_title( '<h2 class="post-title">', '</h2>' );
		else :
			the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>

		<p class="post-category">
      <a href="#"><?php the_category( ', ' ); ?></a>
    </p>

	</header><!-- .entry-header -->

	<div class="post container">
		<div class="entry-content">
			<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'froma2c' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'froma2c' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php froma2c_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

	</div><!--post container-->

</article><!-- #post-<?php the_ID(); ?> -->
