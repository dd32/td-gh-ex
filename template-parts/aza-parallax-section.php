<!-- =========================
PARALLAX SECTION
============================== -->



    <?php
$parallax_image = get_theme_mod('aza_parallax_image', get_template_directory_uri() . '/images/parallax-image.png');
$parallax_text = get_theme_mod ('aza_parallax_text', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaque hic ipse iam pridem est reiectus;');
        ?>


<section id="parallax">
        <div class="parallax-container">
            <div class="parallax-background" data-parallax='{"y" : -50}' alt="">
            </div>
            <div class="parallax-layer-1" data-parallax='{"y" : 25}'>
            </div>
            <div class="parallax-layer-2" data-parallax='{"y" : 100}'>
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
            echo '<h3>'. esc_html($parallax_text) . '</h3>'; }?>
                    </div>
                 </div>
            </div>


        </div>
</section>
