<?php

    if ( ! class_exists( 'Redux_Validation_css' ) ) {
        class Redux_Validation_css {

            /**
             * Field Constructor.
             * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
             *
             * @since ReduxFramework 1.0.0
             */
            function __construct( $parent, $field, $value, $current ) {

                $this ->parent = $parent;
                $this->field   = $field;
                $this->value   = $value;
                $this->current = $current;

                //$this->validate();
                $this->safe_css_validate();
            }

            //function

            /**
             * Field Render Function.
             * Takes the vars and validates them
             *
             * @since ReduxFramework 3.0.0
             */
          /*  function validate() {

                // Strip all html
                $data = $this->value;
                
                $data = wp_filter_nohtml_kses( $data );
                $data = str_replace( '&gt;', '>', $data );

                $this->value = $data;

            } //function
            */
            /**
             * Safe CSS code copied right from jetpack.
             * Takes the vars and cleans and validates them
             *
             */
            function safe_css_validate() {
                pinnacle_safecss_class();
                $data = $this->value;

                $csstidy = new csstidy();
                $csstidy->optimise = new safecss( $csstidy );
                $csstidy->set_cfg( 'remove_bslash',              false );
                $csstidy->set_cfg( 'compress_colors',            false );
                $csstidy->set_cfg( 'compress_font-weight',       false );
                $csstidy->set_cfg( 'optimise_shorthands',        0 );
                $csstidy->set_cfg( 'remove_last_;',              false );
                $csstidy->set_cfg( 'case_properties',            false );
                $csstidy->set_cfg( 'discard_invalid_properties', true );
                $csstidy->set_cfg( 'css_level',                  'CSS3.0' );
                $csstidy->set_cfg( 'preserve_css',               true );
                $csstidy->set_cfg( 'template',                   dirname( __FILE__ ) . '/csstidy/wordpress-standard.tpl' );


                $data = preg_replace( '/\\\\([0-9a-fA-F]{4})/', '\\\\\\\\$1', $data );
                $data = str_replace( '<=', '&lt;=', $data );
                // Why KSES instead of strip_tags?  Who knows?
                $data = wp_kses_split( $prev = $data, array(), array() );
                $data = str_replace( '&gt;', '>', $data ); // kses replaces lone '>' with &gt;
                // Why both KSES and strip_tags?  Because we just added some '>'.
                $data = strip_tags( $data );

                $csstidy->parse( $data );

                $data = $csstidy->print->plain();

                $this->value = $data;
            } //function
        } //class
    }
function pinnacle_safecss_class() {
    // Wrapped so we don't need the parent class just to load the plugin
    if ( class_exists('pinnacle_safecss_class') )
        return;

    require_once( dirname( __FILE__ ) . '/csstidy/class.csstidy.php' );

    class safecss extends csstidy_optimise {
        function safecss( &$css ) {
            return $this->csstidy_optimise( $css );
        }

        function postparse() {
            
            /**
             * Do actions after parsing the css
             *
             * @since ?
             * @module Custom_CSS
             * @param safecss $obj
             **/
            do_action( 'csstidy_optimize_postparse', $this );

            return parent::postparse();
        }

        function subvalue() {

            /**
             * Do action before optimizing the subvalue
             *
             * @since ?
             * @module Custom_CSS
             * @param safecss $obj
             **/
            do_action( 'csstidy_optimize_subvalue', $this );

            return parent::subvalue();
        }
    }
}