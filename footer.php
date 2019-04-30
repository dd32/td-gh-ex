	<footer class="footer">
        <div class="content has-text-centered">
            <p>
				&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>. Powered by WordPress. Theme by <a href="http://sitesbyjam.co.uk" target="_blank">SitesbyJAM</a>.
            </p>
        </div>
	</footer>
	
	<?php wp_footer(); ?>

    <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/main.js"></script>
</body>

</html>