<!-- =========================
INTERGEO MAPS 
============================== -->

<?php
    $frontpage_map_shortcode = get_theme_mod('frontpage_map_shortcode');
 if( !empty($frontpage_map_shortcode) ){
?>
        <div id="container-fluid"> 
        <div class="map_overlay"></div>
            <div id="cd-google-map">
                <?php echo do_shortcode($frontpage_map_shortcode);?>
            </div>
        </div>

        <!-- .container-fluid -->
<?php   
     }
?>
