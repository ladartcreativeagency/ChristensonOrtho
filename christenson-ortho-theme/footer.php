<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vroom_theme_framework
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row site-info">
			<div class="large-12 medium-12 small-12 columns">
			<?php printf( esc_html__( 'Custom Developed by %2$s.', 'vroom-theme-framework' ), 'vroom-theme-framework', '<a href="http://vroom.digital" rel="designer">Vroom Digital LLC</a>' ); ?>
				
			</div><!-- /.cols -->
		</div><!-- /.row.site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
