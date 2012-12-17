    </div>
    <footer id="footer" role="contentinfo">
        <div class="blog-info">
            <p><a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.it"><img alt="Licenza Creative Commons" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png"></a></p>
            <?php do_action('rockers_credits'); ?><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a> <?php printf( __('is proudly powered by ', 'rockers')); ?> <a href="<?php echo esc_url( __('http://wordpress.org/', 'rockers')); ?>" title="<?php esc_attr_e('Semantic Personal Publishing Platform', 'rockers'); ?>" rel="generator"><?php printf( __('%s', 'rockers'), 'WordPress'); ?></a>
            </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>