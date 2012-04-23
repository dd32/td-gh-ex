<!-- footer begin-->
<section class="row">
<div class="footer">
<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
<?php bloginfo('name'); ?></a> | 
 <a href="<?php echo esc_url(__('http://amdhas.tk','artblogazine')); ?>" title="<?php esc_attr_e('artblogazine', 'artblogazine'); ?>">
                    <?php printf('artblogazine'); ?></a>
            powered by <a href="<?php echo esc_url(__('http://wordpress.org','artblogazine')); ?>" title="<?php esc_attr_e('WordPress', 'artblogazine'); ?>">
                    <?php printf('WordPress'); ?></a>
</div>
</section>
<?php wp_footer(); ?>
<!--footer end-->
</body>
</html>