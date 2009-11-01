  </div> <?php // End of the grid_12 from the header ?>

  <?php If (Get_Theme_Setting('sidebar_adjustment') != 'left') get_sidebar(); ?>
  
  <div class="clear"></div>

  <div class="footer">
    <span>
    &copy; <?php echo Date('Y') ?> <?php bloginfo('title') ?>
    <?php If (!Get_Theme_Setting('no_theme_by')) : ?>&mdash; <?php PrintF(__('Be-Berlin-Theme by <a href="%s" target="_blank">%s</a>', 'theme'), 'http://dennishoppe.de', 'Dennis Hoppe') ?><?php EndIf; ?>
    &mdash; <?php PrintF(__('Powered by <a href="%s" target="_blank">%s</a>', 'theme'), 'http://wordpress.org', 'WordPress') ?>
    </span>
  </div>
  
</div> <!-- End of container_16 -->

<?php wp_footer(); ?>

</body>
</html>