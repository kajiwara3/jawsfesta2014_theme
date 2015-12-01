	<footer>
	<?php if ( is_active_sidebar( 'sidebar-aside' ) ) : ?>
<div class="footer-widgets widget-area">
	<?php dynamic_sidebar( 'sidebar-aside' ); ?>
</div><!-- .footer-widgets -->
<?php endif; ?>

		<div class="copy">
			<p>Copyright © AWS User Group Japan. All rights reserved.</p>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
