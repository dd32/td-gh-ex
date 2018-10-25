<div class="top-bar-area bg-dark text-light"> 
            <div class="container"> 
                <div class="row"> 
                    <div class="topbar-info"> 
                        <div class="top-address col-md-8 col-sm-9"> 
                            <ul> 
                                <li>
                                   <i class="fa fa-phone"></i> <?php echo wp_kses_post( get_theme_mod( 'topline_section_phone' )); ?>
                                </li>                                 
                                <li>
                                   <i class="fa fa-envelope-o"></i> <?php echo wp_kses_post( get_theme_mod( 'topline_section_mail' )); ?>
                                </li>                                 
                                <li>
                                   <i class="fa fa-map-marker"></i> <?php echo wp_kses_post( get_theme_mod( 'topline_section_location' )); ?>
                                </li>                                 
                            </ul>                             
                        </div>                         
                        <div class="topbar-social col-md-4 col-sm-3"> 
                            <ul class="text-right"> 
                                <li> 
								<?php if( get_theme_mod( 'topline_section_face_url' ) ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_face_url' )); ?>" target="_blank"><i class="fa fa-facebook"></i></a> 
                                 <?php endif; ?>
								</li>                                 
                                <li> 
								<?php if( get_theme_mod( 'topline_section_twit_url' ) ) : ?>
                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_twit_url' )); ?>" target="_blank"><i class="fa fa-twitter"></i></a> 
                                 <?php endif; ?>
								</li>                                 
                                <li> 
								<?php if( get_theme_mod( 'topline_section_instag_url' ) ) : ?>

                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_instag_url' )); ?>" target="_blank"><i class="fa fa-instagram"></i></a> 
                                  <?php endif; ?>
								</li>                                 
                                <li> 
								<?php if( get_theme_mod( 'topline_section_linke_url' ) ) : ?>

                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_linke_url' )); ?>" target="_blank"><i class="fa fa-linkedin"></i></a> 
                                <?php endif; ?>
								</li>                                 
                                <li> 
								<?php if( get_theme_mod( 'topline_section_yout_url' ) ) : ?>

                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_yout_url' )); ?>" target="_blank"><i class="fa fa-youtube"></i></a> 
                                 <?php endif; ?>
								</li>
                                <li> 
								<?php if( get_theme_mod( 'topline_section_goo_url' ) ) : ?>

                                    <a href="<?php echo esc_url( get_theme_mod( 'topline_section_goo_url' )); ?>" target="_blank"><i class="fa fa-google"></i></a> 
                                 <?php endif; ?>
								</li>                                 
                            </ul>                             
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </div>         