<!-- =========================
CTA RIBBON SECTION
============================== -->
<?php

$aza_buttons_type = get_theme_mod ('aza_ribbon_layout', '2');
$text =  get_theme_mod('aza_ribbon_text', 'START USING THIS BEAUTIFUL THEME TODAY');
$button_link = get_theme_mod('aza_ribbon_button_link', '#');
$button_text = get_theme_mod('aza_ribbon_button_text', 'LEARN MORE');

?>

           <section id="ribbon">
            <div class="container">
                <div class="row ribbon-row">
                  <?php
                  switch ( $aza_buttons_type ) {
                     case '1':
                               if(!empty($button_text)) {
                                 echo '<div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">'; ?>
                                   <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn center-block">
                                                <?php echo $button_text; ?>
                                            </button>
                                 <?php echo '</div>';
                               }

                               if(!empty($text)) {
                                  echo '<div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                                  <h3>'.esc_html($text).'</h3></div>';
                                }
                     break;

                     case '2':
                               if(!empty($text)) {
                                 echo '<div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                                 <h3>'.esc_html($text).'</h3></div>';
                               }
                               if(!empty($button_text)) {
                                 echo '<div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">'; ?>
                                   <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn center-block">
                                                <?php echo $button_text; ?>
                                            </button>
                                 <?php echo '</div>';
                               }
                     break;
                   }
                    ?>
                </div>
            </div>
        </section>
