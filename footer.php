<?php if ( !dynamic_sidebar('beforefooter') ) :  endif; ?>
</div><!-- end div #page-inner -->
</div><!-- end div #page --><!-- END PAGE --><!-- BEGIN BOTTOM-MENU -->	

<?php if (function_exists('promax_floating_cart')) { echo promax_floating_cart(); } ?>
<?php get_template_part('/includes/adfun'); ?><!-- end wrapper -->
<?php wp_footer(); ?>
</body>
</html>
