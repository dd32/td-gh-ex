<?php
/**
 * Footer For a1 Theme.
 */
global $a1_options;
?>
<div class="clearfix"></div>
<!--footer start-->
<footer>
    <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) {
        ?>
        <div class="col-md-12 footer-top no-padding-lr">
            <div class="container a1-container a1-main-sidebar">
                <div class="row">
                    <div class="col-md-3 col-sm-6  footer-column">
                        <?php
                        if (is_active_sidebar('footer-1')) {
                            dynamic_sidebar('footer-1');
                        }
                        ?>
                    </div>
                    <div class="col-md-3 col-sm-6  footer-column">
                        <?php
                        if (is_active_sidebar('footer-2')) {
                            dynamic_sidebar('footer-2');
                        }
                        ?>
                    </div>
                    <div class="col-md-3 col-sm-6  footer-column">
                        <?php
                        if (is_active_sidebar('footer-3')) {
                            dynamic_sidebar('footer-3');
                        }
                        ?>
                    </div>
                    <div class="col-md-3 col-sm-6  footer-column">
    <?php
    if (is_active_sidebar('footer-4')) {
        dynamic_sidebar('footer-4');
    }
    ?>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
    <div class="footer-botom">
        <div class="container a1-container">
            <div class="row">
                        <?php
                        if (!empty($a1_options['footer-content'])) {
                            echo "<p class='container a1-container footer-content'>" . esc_attr($a1_options['footer-content']) . "</p>";
                        }
                        ?>
                <div class="col-md-6 col-sm-6 copyright-text">
                    <p><?php
                        if (!empty($a1_options['footertext'])) {
                            echo esc_attr($a1_options['footertext'] . '. ');
                        }
                        _e('Powered by', 'a1');
                        echo ' <a target="_blank" href="http://wordpress.org">';
                        _e('WordPress', 'a1');
                        echo '</a>  ';
                        _e('and', 'a1');
                        echo '<a target="_blank" href="http://fasterthemes.com/wordpress-themes/a1" target="_blank"> A1 </a>.';
                        ?></p>
                </div>
                <div class="col-md-6 col-sm-6 footer-menu">
<?php wp_nav_menu(array('theme_location' => 'secondary', 'fallback_cb' => false)); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end--> 
<?php wp_footer(); ?>
</body>
</html>