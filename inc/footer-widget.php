                <div class="row">                   
                   <div class="col-md-4 item">
                                <?php if ( is_active_sidebar( 'footer_widget_1' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_1' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4 item">
                                <?php if ( is_active_sidebar( 'footer_widget_2' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_2' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4 item">
                                <?php if ( is_active_sidebar( 'footer_widget_3' ) ) : ?>
                                    <div>
                                        <?php dynamic_sidebar( 'footer_widget_3' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                       
                </div>  