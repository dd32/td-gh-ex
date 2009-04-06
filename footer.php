		<div id="footer">
		  &copy; <a href="<?php bloginfo('url') ?>" title="Home"><?php bloginfo('name') ?></a>
		</div>
	  <div class="inner">
		  <div class="lastfm">
		  <h4>My music selection makes <img src="<?php bloginfo('template_url') ?>/images/ico-last-fm-trans.png" alt="last.fm" /> look good</h4>
			<?php
				if (function_exists('lastfmrecords_display')) {
					lastfmrecords_display();
				} else {
				  echo "You can't see my music, but that doesn't mean it's not there.";
				}
			?>
	  	</div>
			<div class="recentcomments">
				<h4>Recent comments</h4>
				<?php
				if (function_exists('recent_comments')) {
					recent_comments();
				}
				?>
			</div>
      <div class="credits">
				<p>WordPress Theme designed by <a href="http://www.chris-wallace.com">Chris Wallace</a>.</p>
				<p>
    			<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
  			</p>
      </div>
		</div>
	</div>
  
  <?php wp_footer() ?>
  
</body>
</html>