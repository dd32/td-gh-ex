<!-- =========================
CTA RIBBON SECTION
============================== -->
<?php

$aza_buttons_type = get_theme_mod ('aza_ribbon_layout', '2');

$aza_ribbon_background_color = get_theme_mod ('aza_ribbon_background_color', 'rgba(0, 69, 97, 0.35)');

$text =  get_theme_mod('aza_ribbon_text', 'START USING THIS BEAUTIFUL THEME TODAY');
$text_color = get_theme_mod ('aza_ribbon_text_color', '#ffffff');

$button_link = get_theme_mod('aza_ribbon_button_link', '#');
$button_text = get_theme_mod('aza_ribbon_button_text', 'LEARN MORE');
$button_color = get_theme_mod ('aza_ribbon_button_color', '#fc535f');
$button_text_color = get_theme_mod  ('aza_ribbon_button_text_color','#ffffff');
?>
           <section id="ribbon" style="background: <?php echo $aza_ribbon_background_color; ?>">
            <div class="container">
                <div class="row ribbon-row">
                  <?php
                  switch ( $aza_buttons_type ) {
                     case '1':
                               if(!empty($button_text)) {
                                 echo '<div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">'; ?>
                                   <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn center-block" style="background-color: <?php echo $button_color; ?>; color: <?php echo $button_text_color; ?>;">
                                                <?php echo $button_text; ?>
                                            </button>
                                 <?php echo '</div>';
                               }

                               if(!empty($text)) {
                                  echo '<div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                                  <h3 style="color:'. $text_color .'">'.esc_html($text).'</h3></div>';
                                }
                     break;

                     case '2':
                               if(!empty($text)) {
                                 echo '<div class="col-lg-7 col-md-12 col-xs-12 col-sm-12 text-center">
                                 <h3 style="color:'. $text_color .'">'.esc_html($text).'</h3></div>';
                               }
                               if(!empty($button_text)) {
                                 echo '<div class="col-lg-5 col-md-12 col-xs-12 col-sm-12">'; ?>
                                   <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn center-block" style="background-color: <?php echo $button_color; ?>; color: <?php echo $button_text_color; ?>;">
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
