<button id="ham-menu" type="button" class="p-0 bg-none d-block d-lg-none" data-custom-open="menu-modal">
    <div class="at-hb-menu">
        <div class="at-hb-menu--icon"></div>
    </div>
</button>

<!-- [1] -->
<div class="modal micromodal-slide" id="menu-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container w-100" role="dialog" aria-modal="true" aria-labelledby="menu-modal-title">
            <header class="modal__header d-flex justify-content-end">
                <button class="modal__close" aria-label="<?php esc_attr_e('Close modal', 'aspro'); ?>" data-custom-close="menu-modal"></button>
            </header>
            <main class="modal__content" id="menu-modal-content">
                <div class="h-100">
                    <div class="row justify-content-end align-items-center h-100 m-0">
                        <div id="ham-navigation" class="at-ham-nav">
                            <nav id="site-navigation" class="at-ham-navigation">
                                <?php
                                wp_nav_menu([
                                    'theme_location' => 'menu-1',
                                    'menu_id' => 'primary-menu',
                                ]);
                                ?>
                            </nav><!-- #site-navigation -->
                        </div>


                        <?php
                        $aspro_facebook_link = get_theme_mod('aspro_facebook_link');
                        $aspro_instagram_link = get_theme_mod('aspro_instagram_link');
                        $aspro_twitter_link = get_theme_mod('aspro_twitter_link');
                        $aspro_youtube_link = get_theme_mod('aspro_youtube_link');

                        if($aspro_facebook_link || $aspro_instagram_link ||
                            $aspro_twitter_link || $aspro_youtube_link ) :
                            ?>
                            <div class="nnc-topbar__social d-flex justify-content-end">
                                <ul class="list-inline m-0">
                                    <?php if($aspro_facebook_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_facebook_link); ?>"
                                               target="_blank"
                                               title="facebook"><i class="fab fa-facebook"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($aspro_instagram_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_instagram_link); ?>" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($aspro_twitter_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_twitter_link); ?>" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($aspro_youtube_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_youtube_link); ?>" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>


                            <div class="nnc-topbar__social-in-menu-modal">
                                <ul class="list-inline m-0">
                                    <?php if($aspro_facebook_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_facebook_link); ?>"
                                               target="_blank"
                                               title="facebook"><i class="fab fa-facebook"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($aspro_instagram_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_instagram_link); ?>" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($aspro_twitter_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_twitter_link); ?>" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($aspro_youtube_link): ?>
                                        <li class="list-inline-item">
                                            <a href="<?php echo esc_url($aspro_youtube_link); ?>" target="_blank" title="youtube"><i class="fab fa-youtube"></i></a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>

                        <?php endif; ?>






                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
