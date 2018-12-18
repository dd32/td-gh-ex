  <footer class="footer-widget section_padding_top_30 section_padding_bottom_50 negative_margin">
                    <div class="container">
                        <div class="row topmargin_40">
                            <div class="col-md-3">
                                <?php if ( is_active_sidebar( 'footer_widget_1' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_1' ); ?>
                                    </div>
                                <?php endif; ?> 
                            </div>
                            <div class="col-md-3"> 
                                <?php if ( is_active_sidebar( 'footer_widget_2' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_2' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-3">
                                <?php if ( is_active_sidebar( 'footer_widget_3' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_3' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <?php if ( is_active_sidebar( 'footer_widget_4' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_4' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </footer>