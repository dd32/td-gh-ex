<!-- =========================
FEATURES SECTION
============================== -->
<?php

$features_heading = get_theme_mod('aza_features_heading', "KEY FEATURES");

$button_text = get_theme_mod('aza_features_button_text', "LEARN MORE");

$button_link = get_theme_mod('aza_features_button_link',"#");

$features_icons_left = get_theme_mod ('aza_features_icons_left',json_encode(
            array(
                array('icon_value' => 'icon-arrows-squares' ,
                      'title' => 'Fully Responsive' ,
                      'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' ,
                      'color' => '#3399df'),
                array('icon_value' => 'icon-computer-imac' ,
                      'title' => 'Clean Design' ,
                      'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' ,
                      'color'    => '#f0b57c'),
)));


$features_icons_right = get_theme_mod ('aza_features_icons_right',json_encode(
            array(
                array('icon_value' => 'icon-ecommerce-diamond' ,
                      'title' => 'Beautiful Showcase' ,
                      'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' ,
                      'color'    => '#4bb992'),
                array('icon_value' => 'icon-settings-streamline-2' ,
                      'title' => 'Fully Customizable' ,
                      'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vestibulum augue posuere.' ,
                      'color'    => '#8a74b9'),
)));

?>


    <?php echo ( get_theme_mod( 'aza_zigzag_features_top' ) ) ? "<div class='zig-zag-top'></div>" : "" ?>

        <section id="features">
            <div class="features-background">
                <div class="container">

                    <?php if(!empty($features_heading)) {
            echo '<div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">'.$features_heading.'</h2>
                </div>
            </div>';
            }?>

                        <div class="row features-content">
                            <div class="col-md-4 col-sm-12">

                                <?php

                           if(!empty($features_icons_left)){
                           $features_icons_left_decoded = json_decode($features_icons_left);
                            if(!empty($features_icons_left_decoded)) { ?>
                                    <ul id="left-column">

                                        <?php                                    foreach($features_icons_left_decoded as $features_icons_left) {
                                        echo '<li><div class="circle text-center" style = "background-color: '.$features_icons_left->color.'"><span class = " '.$features_icons_left->icon_value.'"></span></div>
                                        <h3 class="features-name text-center">'.html_entity_decode($features_icons_left->title).'</h3>
                                        <p class="features-description text-center">'.html_entity_decode($features_icons_left->text).'</li>';
                                    }

                            echo '</ul>';}

                           } ?>
                            </div>

                            <div class="col-md-4 col-sm-12 text-center">
                                <div class="device">
                                    <div class="sensor"></div>
                                    <div class="devicetop">

                                        <div class="front-camera"></div>
                                        <div class="iphone-speaker"></div>
                                    </div>

                                    <div class="screen iphone-screen">
                                    </div>
                                    <div class="button">
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-4 col-sm-12">

                                <?php

                           if(!empty($features_icons_right)){
                           $features_icons_right_decoded = json_decode($features_icons_right);
                            if(!empty($features_icons_right_decoded)) {
                                echo '<ul id="right-column">';

                                    foreach($features_icons_right_decoded as $features_icons_right) {
                                       echo '<li><div class="circle text-center" style = "background-color: '.esc_html($features_icons_right->color).'"><span class = " '.esc_html($features_icons_right->icon_value).'"></span></div>
                                        <h3 class="features-name text-center">'.$features_icons_right->title.'</h3>
                                        <p class="features-description text-center">'.$features_icons_right->text.'</li>';
                                    }

                            echo '</ul>';}

                           } ?>
                            </div>
                        </div>
                        <?php if(!empty($button_text)){ ?>
                            <div class="row features-btn-row">
                                <div class="col-lg-12 col-centered">

                                    <button type="button" onclick="window.location='<?php echo $button_link; ?>'" class="btn features-btn">
                                        <?php echo $button_text; ?>
                                    </button>

                                </div>
                            </div>
                            <?php } ?>
                </div>
            </div>
        </section>

        <?php echo ( get_theme_mod( 'aza_zigzag_features_bottom' ) ) ? "<div class='zig-zag-bottom'></div>" : "" ?>
