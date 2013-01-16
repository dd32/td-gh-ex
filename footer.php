    </div>
    <footer id="footer" role="contentinfo">
        <div class="blog-info">
            <p><?php printf(__('The published material is released under: ','rockers')); ?><a rel="license" href="http://www.gnu.org/licenses/gpl-2.0.html"><abbr title="creative commons">CC</abbr> GPL 2.0</a></p>
            <?php do_action('rockers_credits'); ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a> <?php printf( __('is proudly powered by ', 'rockers')); ?> <a href="<?php echo esc_url( __('http://wordpress.org/', 'rockers')); ?>" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'rockers'); ?>" rel="generator"><?php printf( __('%s', 'rockers'), 'WordPress'); ?></a>
            </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>