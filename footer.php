  		</section>

		<?php get_sidebar(); ?>

	  </div>

  		<footer>
        <!-- feel free to remove the credit below, but we'd love it if you would leave it in. Theme adapted from Terminally Theme by Stinkyink at www.stinkyinkshop.co.uk/themes. -->
  			<p>
  				&copy; <?php echo date("Y") ?> <?php bloginfo('name'); ?><?php if (is_home()) { ?> | Theme by <a href="http://www.unitednetworksonline.com/themes/">United Networks</a><?php } ?><br />
  				<a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>.
  			</p>
  		</footer>

  		<?php wp_footer(); ?>

       <!-- closes container div from header -->
</div>
	</body>

</html>