<?php
/**
 * The template for displaying the footer. This template overwrites parent theme's footer.php file.
 *
 * Contains the closing of the #main and all content after
 *
 * @package Toivo Lite
 */
?>

					</main><!-- #main -->
				</div><!-- #primary -->

			<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
			
			</div><!-- .wrap-inside -->
		</div><!-- .wrap -->
	</div><!-- #content -->
	
	<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>
	
	<div class="toivo-callout toivo-callout-footer">
		<div class="entry-inner">
			<div class="toivo-callout-text">
				This is footer Callout section and example how to overwrite footer.php template file.
			</div>
			<div class="toivo-callout-link">
				<a class="toivo-button toivo-callout-link-anchor" href="https://foxland.fi">Visit Foxland</a>
			</div>
		</div>
	</div>

	<footer id="colophon" class="site-footer" role="contentinfo" <?php hybrid_attr( 'footer' ); ?>>
		
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'toivo-lite' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'toivo-lite' ), 'WordPress' ); ?></a>
			<span class="sep"><?php echo _x( '&middot;', 'Separator in site info.', 'toivo-lite' ); ?></span>
			<?php printf( __( 'Theme %1$s by %2$s', 'toivo-lite' ), 'Toivo Lite', '<a href="https://foxland.fi" rel="designer">Foxland</a>' ); ?>
		</div><!-- .site-info -->
		
	</footer><!-- #colophon -->
	
	<?php do_action( 'toivo_after_footer' ); // Hook after footer. ?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
