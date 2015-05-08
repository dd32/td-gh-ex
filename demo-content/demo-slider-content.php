<?php
/**
 * 
 * Demo content for slider
 * 
 * @package AccessPress Mag
 */
  
?>
<div id="homeslider">                        
        <div class="slider">
            <div class="big_slide">
                <div class="big-cat-box">
                    <span class="cat-name">Fashion</span>
                    <span class="comment_count"><i class="fa fa-comments"></i>5</span><span class="apmag-post-views"><i class="fa fa-eye"></i>33</span>                            
                </div>
                <div class="slide-image"><img src="<?php echo get_template_directory_uri();?>/images/demo-images/model-600238_1920-765x496.jpg" alt="big-slide" /></div>
                
                <div class="mag-slider-caption">
                  <h3 class="slide-title">Designer to Watch</h3>
                </div>
                
            </div>
        <div class="small-slider-wrapper">                
            <div class="small_slide">
                <span class="cat-name">Travel</span>
                <div class="slide-image"><img src="<?php echo get_template_directory_uri();?>/images/demo-images/girl-tab-364x164.jpg" alt="dell-monitors" /></div>
                <div class="mag-small-slider-caption">
                  <h3 class="slide-title"><a href="#">The Celtics delivered a nice pack</a></h3>
                </div>                
            </div>
                
            <div class="small_slide">
                <span class="cat-name">Lifestyle</span>
                <div class="slide-image"><img src="<?php echo get_template_directory_uri();?>/images/demo-images/girl-689137_1920-364x164.jpg" alt="the-rider" /></div>
                <div class="mag-small-slider-caption">
                  <h3 class="slide-title"><a href="#">Living in towns without light</a></h3>
                </div>                
            </div>
                
            <div class="small_slide">
                <span class="cat-name">Photography</span>
                <div class="slide-image"><img src="<?php echo get_template_directory_uri();?>/images/demo-images/camera-408258_1280-364x164.jpg" alt="iphone-4" /></div>
                <div class="mag-small-slider-caption">
                  <h3 class="slide-title"><a href="#">Big leap in 4K video streaming tech</a></h3>   
                </div>
            </div>
        </div>
        </div>
</div>
<?php
$accesspress_mag_theme_option = get_option( 'accesspress-mag-theme' );
if( empty( $accesspress_mag_theme_option )){
?>

<script type="text/javascript">
        jQuery(function($){
            $("#homeslider").bxSlider({ 
                auto: true
            });
        });
</script>

<?php } ?>