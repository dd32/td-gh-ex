<button role="button" title="Search" class="btn btn--icon p-0 bg-none l-h-0 mr-3 mr-lg-0" data-custom-open="search-modal">
    <i class="fas fa-search"></i>
</button>

<!-- [1] -->
<div class="modal micromodal-slide" id="search-modal" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container w-100" role="dialog" aria-modal="true" aria-labelledby="search-modal-title">
            <header class="modal__header d-flex justify-content-end">
                <button class="modal__close" aria-label="<?php esc_attr_e('Close modal', 'aspro'); ?>" data-custom-close="search-modal"></button>
            </header>
            <main class="modal__content" id="search-modal-content">
                <div class="at-search">
                    <div class="at-container h-100">
                        <div class="row justify-content-center align-items-center h-100 m-0">
                            <div class="at-search--form">
                                <form role="search" method="GET">
                                    <label class="m-0">
                                        <span class="screen-reader-text"><?php esc_html_e('Search for', 'aspro'); ?>:</span>
                                        <input type="search"
                                               id="custom-search-popup"
                                               class="search-field"
                                               placeholder="<?php esc_attr_e('Start Typing ...', 'aspro'); ?>"
                                               value=""
                                               name="s"/>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
