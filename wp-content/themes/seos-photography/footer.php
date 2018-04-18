<?php
/**
 * The template for displaying the footer.
 *
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="site-info">
		
				<?php _e('All rights reserved', 'seos-photography'); ?>  &copy; <?php bloginfo('name'); ?>
				
				<a href="http://wordpress.org/" title="<?php esc_attr_e( 'WordPress', 'seos-photography' ); ?>"><?php printf( __( 'Powered by %s', 'seos-photography' ), 'WordPress' ); ?></a>
							
				<a title="<?php _e('Wordpress theme', 'seos-photography'); ?>" href="<?php echo esc_url(__('https://seosthemes.com/', 'seos-photography')); ?>" target="_blank"><?php _e('Theme by SEOS', 'seos-photography'); ?></a>	
				
		</div><!-- .site-info -->
	
	</footer><!-- #colophon -->
</div><!-- #page -->
	
<?php wp_footer(); ?>

</body>
</html>
