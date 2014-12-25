<?php
  $tabs_arr = array(
    'general'        => __( 'General', 'blue-planet' ),
    'header'         => __( 'Header', 'blue-planet' ),
    'footer'         => __( 'Footer', 'blue-planet' ),
    'layout'         => __( 'Layout', 'blue-planet' ),
    'blog'           => __( 'Blog', 'blue-planet' ),
    'slider'         => __( 'Slider', 'blue-planet' ),
    'color'          => __( 'Color', 'blue-planet' ),
    'navigation'     => __( 'Navigation', 'blue-planet' ),
    'social'         => __( 'Social', 'blue-planet' ),
    'administration' => __( 'Administration', 'blue-planet' ),
    );
 ?>
<div class="wrap">

    <h2><?php _e('Blue Planet Theme Options', 'blue-planet'); ?></h2>
    <br />
    <?php settings_errors(); ?>

    <div id="bp-tab-container" class="tab-container">

       <ul class='etabs'>
       <?php foreach ($tabs_arr as $key => $tab): ?>
          <li class='tab'><a href="#bptab-<?php echo esc_attr($key); ?>" >
                  <?php echo $tab; ?>
              </a>
          </li>
       <?php endforeach ?>
       <?php unset($key); ?>
       <?php unset($tab); ?>
      </ul>

      <div class='panel-container'>
        <form action="options.php" method="post">
          <?php settings_fields('blue-planet-options-group'); ?>
         <?php foreach ($tabs_arr as $key => $tab): ?>
          <div id="bptab-<?php echo esc_attr($key); ?>" class="tab-item-wrap">
            <?php do_settings_sections('blue-planet-'.$key); ?>
          </div>
         <?php endforeach ?>

       <?php submit_button(__('Save Changes', 'blue-planet')); ?>
       </form>



      </div> <!-- .panel-container -->



    </div> <!-- #bp-tab-container -->


</div> <!-- .wrap -->
