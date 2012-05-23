<?php

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to twentyten_header_image_width and twentyten_header_image_height to change these values.
  //  define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 200 ) );
//    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 198 ) );





    function movie_taxonomy() {
        register_taxonomy(
        'group',
        'portfolie',
        array(
        'hierarchical' => true,
        'label' => 'Group',
        'query_var' => true,
        'rewrite' => array('slug' => 'group')
        )
        );
    }

    add_action( 'init', 'movie_taxonomy' );

    function create_post_type2() {
        register_post_type( 'portfolie',
        array(
        'labels' => array(
        'name' => __( 'Portfolie' ),
        'singular_name' => __( 'Item' )
        ),
        'public' => true,
        'menu_position' => 5,
        'rewrite' => array('slug' => 'portfolie')
        )
        );
    }

    add_action( 'init', 'create_post_type2' );

    /**
    * This is a menu. It works with the content-type portfolie. Renders "Group" as heading and portfolie items as menu
    * 
    */

    function artist_menu(){ 

        global $wpdb;         
        /*
        $hold=$wpdb ;
        $yourCategory = 'whatever';
        $yourTag = 'whatever';
        $querystr =    "
        SELECT p.* from
        $wpdb->posts p, $wpdb->terms t, $wpdb->term_taxonomy tt, $wpdb->term_relationships tr, $wpdb->terms t2, $wpdb->term_taxonomy tt2, $wpdb->term_relationships tr2
        WHERE p.id = tr.object_id
        AND t.term_id = tt.term_id
        AND tr.term_taxonomy_id = tt.term_taxonomy_id
        AND p.id = tr2.object_id
        AND t2.term_id = tt2.term_id
        AND tr2.term_taxonomy_id = tt2.term_taxonomy_id
        AND (tt.taxonomy = 'category' AND tt.term_id = t.term_id AND t.slug = '$yourCategory')
        AND (tt2.taxonomy = 'post_tag' AND tt2.term_id = t2.term_id AND t2.slug = '$yourTag')
        ";
        */

        $querystr="SELECT * from $wpdb->term_taxonomy where  $wpdb->term_taxonomy.taxonomy='group'";

        $pageposts = $wpdb->get_results($querystr, OBJECT);
        $r=array();
        if ($pageposts):
            foreach ($pageposts as $post):

                $r[]= $post->term_id;
                endforeach;
            else :
            // nothing found
            endif;

        if(count($r)>0){

            $querystr="SELECT * from $wpdb->terms where  $wpdb->terms.term_id IN (".implode(',',$r).")";
            $pageposts = $wpdb->get_results($querystr, OBJECT);

        }


        if ($pageposts){
        $out="<div id=\"portfolie-menu\"><ul class=\"menu\" >";
   
            foreach ($pageposts as $post){

                $out.="<li class=\"groupHeading\">".$post->name."</li>";
                $t=$post->term_id;


                $querystr="SELECT * from $wpdb->term_taxonomy where  $wpdb->term_taxonomy.term_id=$t";

                $b= $wpdb->get_var($querystr);
                /*
                $pageposts = $wpdb->get_results($querystr, OBJECT);
                //var_dump($pageposts);
                foreach ($pageposts as $post){

                $b=$post->term_taxonomy_id;
                }
                */

                $quer="SELECT p.*  from $wpdb->posts  p, $wpdb->term_relationships tr
                WHERE p.id = tr.object_id    
                AND tr.term_taxonomy_id = $b  
                AND post_status =\"publish\"";

                $postss = $wpdb->get_results($quer, OBJECT);
                foreach ($postss as $post){

                    $out.=  "<li><a href='".get_permalink($post->ID )."'>".$post->post_title."</a></li>"  ;

                }

                // do regular WordPress Loop stuff in here
            }
        $out.= "</ul></div></div>";
   
        return $out;
        }else{
            return ;
        }
                
                
        

    }

define('MY_CHILD_THEME_URL', get_theme_root_uri() . "/" . basename(dirname(__FILE__)) );

add_filter( 'twentyten_header_image_width', 'my_child_theme_header_image_width' );
add_filter( 'twentyten_header_image_height', 'my_child_theme_header_image_height' );

function my_child_theme_header_image_width () {
    return 200;
}
function my_child_theme_header_image_height () {
    return 200;
}

add_action( 'after_setup_theme', 'my_child_theme_setup_0', 0 );
function my_child_theme_setup_0 () {
    define( 'HEADER_IMAGE', MY_CHILD_THEME_URL . '/images/headers/ugle.jpg' );
}

add_action( 'after_setup_theme', 'ana_lagragna_theme_setup_99', 99 );
function ana_lagragna_theme_setup_99 () {

    register_default_headers( array(
        'newname' => array(
            'url' => MY_CHILD_THEME_URL . '/images/headers/newimage.jpg',
            'thumbnail_url' => MY_CHILD_THEME_URL . '/images/headers/newimage-thumbnail.jpg',
            /* translators: header image description */
            'description' => __( 'New Name', 'twentyten' )
        ),
        'anothername' => array(
            'url' => MY_CHILD_THEME_URL . '/images/headers/anotherimage.jpg',
            'thumbnail_url' => MY_CHILD_THEME_URL . '/images/headers/anotherimage-thumbnail.jpg',
            /* translators: header image description */
            'description' => __( 'Another Name', 'twentyten' )
        ),
    ) );
    unregister_default_headers( array(
        'berries',
        'cherryblossom',
        'concave',
        'fern',
        'forestfloor',
        'inkwell',
        'path',
        'sunset'
    ) );
}


include('_functions.php');
    
    ?>