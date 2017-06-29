<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package froma2c
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'froma2c' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
			<?php if ( has_custom_logo() ) :
				the_custom_logo();
			elseif ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif;?>

			<!--No description in sticky logo part
			<?php $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
		endif; ?> end no description-->
		</div><!-- .site-branding -->

		<!--Banner Section-->
		<?php if ( is_front_page() && is_home() ) : ?>
			<div class="banner">
		<?php endif;?>

		<nav id="site-navigation" class="main-navigation nav-bar" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'froma2c' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class' 	 => 'navigation'
				) );
			?>
		</nav><!-- #site-navigation -->

		<?php if ( is_front_page() && is_home() ) : ?>
			<div class="banner-box container">
				<?php $args = array( 'posts_per_page' => '1' );
				$recent_posts = new WP_Query($args);
				$bannerBackground = wp_get_attachment_image_src( get_post_thumbnail_id( $page->ID ), 'full' );

				while( $recent_posts->have_posts() ) :
				    $recent_posts->the_post() ?>
				    <div class="banner-box-content">
								<p class="post-category"><a href="#"><?php the_category( ', ' ); ?></a></p>
				        <a href="<?php echo get_permalink() ?>"><h2><?php the_title() ?></h2></a>
				        <div class="post-excerpt"><?php the_excerpt(); ?></div>
				    </div><!--banner-box-content-->
				<?php endwhile; ?>
				<?php wp_reset_postdata();?>
			</div><!--banner-box-->
			</div><!--Banner Section-->

			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php $description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif;
		endif;?>


		<style media="screen">
		.banner {
			  background-image: url('<?php echo $bannerBackground[0]; ?>');
			}
		</style>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
