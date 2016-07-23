<?php global $abaya_option; if(isset($abaya_option['abaya_slider'])){ ?>
<div class="flexslider">
      <ul class="slides">
      <?php foreach($abaya_option['abaya_slider'] as $abaya_slider){ ?>
        <li>
          <div class="slide-image" style="background-image:url(<?php if($abaya_slider['image']){echo esc_url($abaya_slider['image']); }  ?>)"></div>
          <div class="banner-cnt">
            <div class="banner-insidecnt">
              <div class="container">
                <div class="banner-slider-content">
                <?php if($abaya_slider['title']){ ?>
                  <h1 class="banner-title"><?php echo $abaya_slider['title']; ?></h1>
                  <?php } if($abaya_slider['description']){ ?>
                  <p class="banner-description"><?php echo $abaya_slider['description']; ?></p>
                  <?php } if($abaya_slider['url']){ ?>
                  <a href="<?php echo esc_url($abaya_slider['url']); ?>" class="banner-btn click"><?php _e('Click Here','abaya') ?></a>
                  <?php } ?>
                </div><!--banner-slider-content--> 
              </div><!--container--> 
            </div><!--banner-insidecnt--> 
          </div><!--banner-cnt-->
        </li>
        <?php } ?>
      </ul>
    </div>
    <?php } ?>