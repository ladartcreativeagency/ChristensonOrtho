<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vroom_theme_framework
 */

get_header(); ?>
<div class="row">
	<div class="large-9 medium-9 small-12 columns">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				<?php the_post_navigation(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>	<!-- /.cols -->
	<?php get_sidebar(); ?>
		
</div> <!-- /.row -->
<?php get_footer(); ?>
