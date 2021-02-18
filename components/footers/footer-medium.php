<?php
    $footer_content = get_theme_mod('footer_top_content_setting');
?>
<footer class="usa-footer usa-footer-medium" role="contentinfo">
    <div class="usa-grid usa-footer-return-to-top">
        <a href="#primary">Return to top</a>
    </div>


    <div class="usa-footer-secondary_section">
        <div class="usa-grid">
            <?php dynamic_sidebar('footer-below'); ?>
        </div>
    </div>
</footer>
