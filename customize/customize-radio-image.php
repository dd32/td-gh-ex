<?php
/*
================================================================================================
White Spektrum - cutomize-radio-image.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        White Spektrum WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (http://lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Customize Radio Image
================================================================================================
*/

/*
================================================================================================
 1.0 - Customize Radio Image
================================================================================================
*/
class White_Spektrum_Control_Radio_Image extends WP_Customize_Control {
    public $type = 'radio-image';
    
    public function enqueue() {
        wp_enqueue_script('white-spektrum-customize-controls', get_template_directory_uri() . '/js/customize-controls.js', array('jquery'));
         wp_enqueue_style('white-spektrum-customize-controls', get_template_directory_uri() . '/css/customize-controls.css');
    }
    
    public function to_json() {
        parent::to_json();

        // We need to make sure we have the correct image URL.
        foreach ( $this->choices as $value => $args )
            $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );

        $this->json['choices'] = $this->choices;
        $this->json['link']    = $this->get_link();
        $this->json['value']   = $this->value();
        $this->json['id']      = $this->id;
    }
    
    public function content_template() { ?>

        <# if ( ! data.choices ) {
            return;
        } #>

        <# if ( data.label ) { #>
            <span class="customize-control-title">{{ data.label }}</span>
        <# } #>

        <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
        <# } #>

        <# _.each( data.choices, function( args, choice ) { #>
            <label>
                <input type="radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

                <span class="screen-reader-text">{{ args.label }}</span>

                <img src="{{ args.url }}" alt="{{ args.label }}" />
            </label>
        <# } ) #>
    <?php }
}