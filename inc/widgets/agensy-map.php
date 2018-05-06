<?php
/**
 *
 * @package agensy
 */
 if(!function_exists('agensy_google_map_widget')){
add_action('widgets_init', 'agensy_google_map_widget');

function agensy_google_map_widget() {
    register_widget('agensy_google_map');
}
}
if(!class_exists('agensy_google_map')){
class agensy_Google_Map extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'agensy_google_map', 'Agensy : Google Map', array(
            'description' => esc_html__('Google Map', 'agensy')
                )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        $agensy_cat_list = agensy_cat_lists();
        $fields = array(
                'agensy_google_map_title' => array(
                'agensy_widgets_name' => 'agensy_google_map_title',
                'agensy_widgets_title' => esc_html__('Title', 'agensy'),
                'agensy_widgets_field_type' => 'text'
            ),
                'agensy_google_map_api' => array(
                'agensy_widgets_name' => 'agensy_google_map_api',
                'agensy_widgets_title' => esc_html__('Map API Key', 'agensy'),
                'agensy_widgets_description' => esc_html__('Add your own API key','agensy'),
                'agensy_widgets_field_type' => 'text'
            ),
                'agensy_google_map_lat' => array(
                'agensy_widgets_name' => 'agensy_google_map_lat',
                'agensy_widgets_title' => esc_html__('Latitude', 'agensy'),
                'agensy_widgets_field_type' => 'text'
            ),
                'agensy_google_map_long' => array(
                'agensy_widgets_name' => 'agensy_google_map_long',
                'agensy_widgets_title' => esc_html__('Longitude', 'agensy'),
                'agensy_widgets_field_type' => 'text'
            ),
                'agensy_google_map_zoom' => array(
                'agensy_widgets_name' => 'agensy_google_map_zoom',
                'agensy_widgets_title' => esc_html__('Zoom Level', 'agensy'),
                'agensy_widgets_description' => esc_html__('Enter zoom level eg: 20','agensy'),
                'agensy_widgets_field_type' => 'number'
            ),
                'agensy_google_map_width' => array(
                'agensy_widgets_name' => 'agensy_google_map_width',
                'agensy_widgets_title' => esc_html__('Map Width', 'agensy'),
                'agensy_widgets_description' => esc_html__('Enter map width in percentage below 100 eg: 25','agensy'),
                'agensy_widgets_field_type' => 'number'
            ),
                'agensy_google_map_height' => array(
                'agensy_widgets_name' => 'agensy_google_map_height',
                'agensy_widgets_title' => esc_html__('Map Height', 'agensy'),
                'agensy_widgets_description' => esc_html__('Enter map height in pixels eg: 150','agensy'),
                'agensy_widgets_field_type' => 'number'
            )

        );

        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        extract($args);
        $agensy_google_map_title = $instance['agensy_google_map_title'];
        $agensy_google_map_api   = $instance['agensy_google_map_api'];
        $agensy_google_map_lat   = $instance['agensy_google_map_lat'];
        $agensy_google_map_long  = $instance['agensy_google_map_long'];
        $agensy_google_map_zoom  = $instance['agensy_google_map_zoom'];
        $agensy_google_map_width = $instance['agensy_google_map_width'];
        $agensy_google_map_height = $instance['agensy_google_map_height'];
        
        if( empty($agensy_google_map_api)){
            $agensy_google_map_api = 'AIzaSyDdNxiZdrOWmRpKu7vrCO9j1rSgEUqSnZk';
        }
        
        if( empty($agensy_google_map_zoom) ){
            $agensy_google_map_zoom = 20;
        }
         if( empty($agensy_google_map_width) ){
            $agensy_google_map_width = 20;
        }
        if( empty($agensy_google_map_height) ){
            $agensy_google_map_height = 250;
        }
        
        $style = 'style="width:'.absint($agensy_google_map_width).'%;height:'.absint($agensy_google_map_height).'px;"';
        
        $icon_link = get_template_directory_uri() . '/images/location.png';
        
        echo $before_widget;
        
        
            if($agensy_google_map_long || $agensy_google_map_lat){
                if($agensy_google_map_title){ 
                    echo $before_title . $agensy_google_map_title . $after_title;
                 } ?>
                <div id="googleMapWid" <?php echo $style;?></di>></div>
                <script>
                    function myMapWid() {
                        var myCenter   = new google.maps.LatLng(<?php echo esc_attr($agensy_google_map_lat)?>,<?php echo esc_attr($agensy_google_map_long)?>);
                        var mapCanvas  = document.getElementById("googleMapWid");
                        var mapType    = google.maps.MapTypeId.ROADMAP;     
                        /** use following map types for other available map
                        google.maps.MapTypeId.SATELLITE
                        google.maps.MapTypeId.HYBRID
                        google.maps.MapTypeId.TERRAIN
                        */    
                        var mapOptions = {
                            center: myCenter,
                            zoom: <?php echo esc_attr($agensy_google_map_zoom) ?> ,
                            disableDefaultUI: true,
                            mapTypeId: mapType 
                        };    
                        var map        = new google.maps.Map(mapCanvas, mapOptions);
                        var url = <?php echo json_encode($icon_link)?>;
                        /** placing marker on the map **/    
                        var marker = new google.maps.Marker({
                            position:  myCenter,
                            animation: google.maps.Animation.BOUNCE,
                            icon: url
                          });
                        marker.setMap(map);
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo esc_attr($agensy_google_map_api)?>&callback=myMapWid"></script>
                    
        <?php
            }
        echo $after_widget;
    }
     public function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            extract($widget_field);

            // Use helper function to get updated field values
            $instance[$agensy_widgets_name] = agensy_widgets_updated_field_value($widget_field, $new_instance[$agensy_widgets_name]);
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param	array $instance Previously saved values from database.
     *
     * @uses	agensy_widgets_show_widget_field()		defined in widget-fields.php
     */
    public function form($instance) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
            extract($widget_field);
            $agensy_widgets_field_value = !empty($instance[$agensy_widgets_name]) ? esc_attr($instance[$agensy_widgets_name]) : '';
            agensy_widgets_show_widget_field($this, $widget_field, $agensy_widgets_field_value);
        }
    }
}

}