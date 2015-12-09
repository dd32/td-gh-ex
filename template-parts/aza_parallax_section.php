<!-- =========================
PARALLAX SECTION
============================== -->



    <?php
$parallax_background = get_theme_mod('aza_parallax_background', aza_get_file('/images/parallax-background.jpg'));

$parallax_layer_1 = get_theme_mod('aza_parallax_layer_1', aza_get_file('/images/parallax-layer1.png'));

$parallax_layer_2 = get_theme_mod('aza_parallax_layer_2', aza_get_file('/images/parallax-layer2.png'));

$parallax_image = get_theme_mod('aza_parallax_image', aza_get_file('/images/parallax-image.png'));

$parallax_text = get_theme_mod ('aza_parallax_text',json_encode(
            array(
                array(
                    'title' => esc_html__('Parallax Section','aza-lite') ,

                    'text' =>  esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Equidem e Cn. Itaque hic ipse iam pridem est reiectus; Ita prorsus, inquam; Respondent extrema primis, media utrisque, omnia omnibus. Duo Reges: constructio interrete. Est, ut dicis, inquam.

Quae ista amicitia est? Dici enim nihil potest verius. Sit enim idem caecus, debilis.

Primum quid tu dicis breve? Hoc Hieronymus summum bonum esse dixit. Quod vestri non item. At coluit ipse amicitias. Nihil illinc huc pervenit. Nos cum te, M.

Sed ad rem redeamus; Quid enim? Quonam, inquit, modo? Ille enim occurrentia nescio quae comminiscebatur;','aza-lite')))));
$parallax_text_decoded = json_decode($parallax_text);


        ?>


<section id="parallax">
        <div class="parallax-container">
            <div class="parallax-background" data-parallax='{"y" : -50}' style=" background-image: url(<?php echo esc_url($parallax_background) ?>)" alt="">
            </div>
            <div class="parallax-layer-1" data-parallax='{"y" : 25}' style=" background-image: url(<?php echo esc_url($parallax_layer_1) ?>)">
            </div>
            <div class="parallax-layer-2" data-parallax='{"y" : 100}' style=" background-image: url(<?php echo esc_url($parallax_layer_2) ?>)">
            </div>


            <div class="container parallax-content">
                <div class="row row-parallax">
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">

                        <img class="img-responsive parallax-img" src="
                            <?php echo esc_url($parallax_image) ?>" alt="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 parallax-features">


                        <?php
     if(!empty($parallax_text)){
                           $parallax_text_decoded = json_decode($parallax_text);
                            if(!empty($parallax_text_decoded)) {

                                    foreach($parallax_text_decoded as $parallax_text) {
                                echo '<h3>'.esc_html($parallax_text->title).'<h3>
                                <p>'.html_entity_decode($parallax_text->text).'</p>'; }}} ?>
                                                       </div>
                    </div>
                </div>


            </div>
        </section>
