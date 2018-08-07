<?php
require_once (dirname(__FILE__) . "/../template-tags.php");
require_once (dirname(__FILE__) . "/../news-layouts.php");

class BeeLayout1 extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'news', 'description' => 'Custom Bee News Layout 1' );
    parent::__construct( 'bee_layout_1_widget', 'Bee News Layout One', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $cat_id = apply_filters( 'widget_title', $instance[ 'cat_id' ] );
    $tab_cat_id_1 = apply_filters( 'widget_title', $instance[ 'tab_cat_id_1' ] );
    $tab_cat_id_2 = apply_filters( 'widget_title', $instance[ 'tab_cat_id_2' ] );
    $tab_cat_id_3 = apply_filters( 'widget_title', $instance[ 'tab_cat_id_3' ] );
 

    global $post;
   
    ?>
    
     <div class="row">
      <div class="col-md-8">
        <?php beenews_layout_1(array('cat_id' => $cat_id ));  ?>
      </div>
      <div class="col-md-4">
        
            <div class="square">
                <a class="item twitter" target="_blank" href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['twitter-url'];?>">
                    Followers
                </a>
                <a class="item facebook" target="_blank" href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['facebook-url'];?>">
                    Likes
                </a>
                <a class="item youtube" target="_blank" href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['youtube-url'];?>">
                    Subscribers
                </a>
            </div>
           
            <?php beenews_tabs(array('cat_id' => array($tab_cat_id_1, $tab_cat_id_2, $tab_cat_id_3 ) )); ?>
        </div>
        <!-- END LEFT SLIDER OF CONTAINER -->
    </div>
    <div class="row row-advertisement">
         <div class="col-md-12">
            <div class="advertisement">
              <div class="col-md-4">
                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['center-ads-1-Link'];?>"> 
                      <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['center-ads-1']['url'];?>" class="img-responsive">
                </a>
              </div>
              <div class="col-md-4">
                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['center-ads-2-Link'];?>"> 
                    <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['center-ads-2']['url'];?>" class="img-responsive">
                </a> 
              </div>  
              <div class="col-md-4">
                <a href="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['center-ads-3-Link'];?>"> 
                    <img src="<?php global $bee_news_redux_builder; echo $bee_news_redux_builder['center-ads-3']['url'];?>" class="img-responsive">
                </a>  
              </div>       
            </div>
          </div>
    </div>
    <?php echo $args['after_widget'];
  }


  
  // Create the admin area widget settings form.
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
    $cat_id = ! empty( $instance['cat_id'] ) ? $instance['cat_id'] : ''; 
    $tab_cat_id_1 = ! empty( $instance['tab_cat_id_1'] ) ? $instance['tab_cat_id_1'] : '';
    $tab_cat_id_2 = ! empty( $instance['tab_cat_id_2'] ) ? $instance['tab_cat_id_2'] : '';
    $tab_cat_id_3 = ! empty( $instance['tab_cat_id_3'] ) ? $instance['tab_cat_id_3'] : '';
    $categories = get_terms( 'category', 'orderby=count&hide_empty=0' );

    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    
    <p>
      <label for="<?php echo $this->get_field_id( 'cat_id' ); ?>">News Category:</label>
      <select id="<?php echo $this->get_field_id( 'cat_id' ); ?>" name="<?php echo $this->get_field_name( 'cat_id' ); ?>">
        <?php foreach ($categories as $category) :?>
        <option <?php echo ($cat_id == $category->term_id)?'selected':'' ?> value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>  
        <?php endforeach;?> 
      </select>
      
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'tab_cat_id_1' ); ?>">Tab Category One:</label>
      <select id="<?php echo $this->get_field_id( 'tab_cat_id_1' ); ?>" name="<?php echo $this->get_field_name( 'tab_cat_id_1' ); ?>">
        <?php foreach ($categories as $category) :?>
        <option <?php echo ($tab_cat_id_1 == $category->term_id)?'selected':'' ?> value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>  
        <?php endforeach;?> 
      </select>
      
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'tab_cat_id_2' ); ?>">Tab Category Two:</label>
      <select id="<?php echo $this->get_field_id( 'tab_cat_id_2' ); ?>" name="<?php echo $this->get_field_name( 'tab_cat_id_2' ); ?>">
        <?php foreach ($categories as $category) :?>
        <option <?php echo ($tab_cat_id_2 == $category->term_id)?'selected':'' ?> value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>  
        <?php endforeach;?> 
      </select>
      
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'tab_cat_id_3' ); ?>">Tab Category Three:</label>
      <select id="<?php echo $this->get_field_id( 'tab_cat_id_3' ); ?>" name="<?php echo $this->get_field_name( 'tab_cat_id_3' ); ?>">
        <?php foreach ($categories as $category) :?>
        <option <?php echo ($tab_cat_id_3 == $category->term_id)?'selected':'' ?> value="<?php echo $category->term_id ?>"><?php echo $category->name ?></option>  
        <?php endforeach;?> 
      </select>
      
    </p>

  <?php
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'cat_id' ] = strip_tags( $new_instance[ 'cat_id' ] );
    $instance[ 'tab_cat_id_1' ] = strip_tags( $new_instance[ 'tab_cat_id_1' ] );
    $instance[ 'tab_cat_id_2' ] = strip_tags( $new_instance[ 'tab_cat_id_2' ] );
    $instance[ 'tab_cat_id_3' ] = strip_tags( $new_instance[ 'tab_cat_id_3' ] );
    return $instance;
  }

}

// Register the widget.
function bee_news_layout_1_register__widget() { 
  register_widget( 'BeeLayout1' );
}
add_action( 'widgets_init', 'bee_news_layout_1_register__widget' );

?>