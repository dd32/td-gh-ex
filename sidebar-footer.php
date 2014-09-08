    <div id="footer-widget-area" role="complementary">
    <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
        <div id="first" class="widget-area">
            <ul>
        <?php dynamic_sidebar('first-footer-widget-area'); ?>
            </ul>
        </div>
    <?php endif; ?>

        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <div id="second" class="widget-area">
                <ul>
        <?php dynamic_sidebar('second-footer-widget-area'); ?>
                </ul>
            </div>
        <?php endif; ?>

            <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
                <div id="third" class="widget-area">
                    <ul>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
                    </ul>
                </div>
            <?php endif; ?>
                <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
                    <div id="fourth" class="widget-area">
                        <ul>
                <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
                        </ul>
                    </div>
                <?php endif; ?>
    </div>