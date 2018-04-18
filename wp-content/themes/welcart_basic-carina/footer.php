	</div><!-- #main -->
	
	<?php get_sidebar( 'footer' ); ?>
	
	<footer id="colophon" role="contentinfo">
		<nav id="site-info" class="footer-navigation cf">
		<?php
		$page_c	= get_page_by_path( 'usces-cart' );
		$page_m	= get_page_by_path( 'usces-member' );
		wp_nav_menu( array( 'theme_location' => 'footer', 'exclude' => "{$page_c->ID},{$page_m->ID}" , 'menu_class' => 'footer-menu cf' )); 
		?>
		</nav>
	
		<p class="copyright"><?php usces_copyright(); ?></p>
	</footer><!-- #colophon -->

<div class="gray-bg"></div>
</div><!-- .site -->
	
<?php wp_footer(); ?>
</body>
</html>