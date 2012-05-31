<?php

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to artblog_header_image_width and artblog_header_image_height to change these values.
  //  define( 'HEADER_IMAGE_WIDTH', apply_filters( 'artblog_header_image_width', 200 ) );
//    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'artblog_header_image_height', 198 ) );





    function portfolie_taxonomy() {
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

    add_action( 'init', 'portfolie_taxonomy' );

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


include(dirname(__FILE__).'/_functions.php');





    
    ?>