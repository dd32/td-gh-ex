<button role="button" title="Search" class="btn btn--icon p-0 bg-none l-h-0 mr-3 mr-lg-0" data-toggle="modal" data-target="#searchModal">
    <svg class="at-icon at-icon--md" id="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005"><path d="M505.749 475.587l-145.6-145.6c28.203-34.837 45.184-79.104 45.184-127.317C405.333 90.926 314.41.003 202.666.003S0 90.925 0 202.669s90.923 202.667 202.667 202.667c48.213 0 92.48-16.981 127.317-45.184l145.6 145.6c4.16 4.16 9.621 6.251 15.083 6.251s10.923-2.091 15.083-6.251c8.341-8.341 8.341-21.824-.001-30.165zM202.667 362.669c-88.235 0-160-71.765-160-160s71.765-160 160-160 160 71.765 160 160-71.766 160-160 160z"/>
    </svg>
</button>

<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog--cover" role="document">
        <div class="modal-content">
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
                        <button role="button" class="btn btn--icon p-0 bg-none l-h-0 mr-3 mr-lg-0" data-dismiss="modal" aria-label="Close" title="Close">
                            <svg class="at-icon at-icon--md"id="close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 469.785 469.785">
                                <path d="M285.368 234.691L459.36 60.697c13.895-13.88 13.895-36.395 0-50.275-13.881-13.895-36.38-13.895-50.275 0L235.091 184.416 61.082 10.421c-13.866-13.895-36.395-13.895-50.275 0-13.88 13.881-13.88 36.395 0 50.275l174.01 173.995L10.421 409.085c-13.895 13.895-13.895 36.395 0 50.275 6.94 6.955 16.043 10.425 25.145 10.425 9.088 0 18.19-3.47 25.132-10.425L235.09 284.967l173.995 173.995c6.955 6.94 16.043 10.425 25.145 10.425 9.088 0 18.19-3.485 25.131-10.425 13.895-13.88 13.895-36.38 0-50.275L285.367 234.691z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
