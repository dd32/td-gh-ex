<?php
if ( 'yes' === $sample_partners['partners_enable'] ):
  ?>
  <section class="partners mgb-lg">
    <div class="container">
      <div class="row">
        <?php if($sample_partners['partner_items'] ):
          foreach( $sample_partners['partner_items'] as $key => $partner):
            ?>
            <div class="col-xl-3">
              
               <div class="img">
                <img src="<?php echo esc_url($partner['partner_image']['url']);?>" alt="">
              </div>
          </div>
          <?php 
        endforeach;
      endif;?>
    </div>
  </div>
</section>
<?php endif;?>