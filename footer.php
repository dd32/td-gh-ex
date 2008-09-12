<?php
global $options;
foreach ($options as $value) {
if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>			
<div id="footer">
  <div class="inside"> 
    <p>
      Design by <a href="http://www.openbase.org/">Openbase</a>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>