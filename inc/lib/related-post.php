<?php
/**
 * Related Posts
 *
 * @package atoz
 */

function atoz_related_post() {

	$args = '';
    $count = get_theme_mod( 'atoz_post_related_post_count' ,3 );
      
	$args = wp_parse_args( $args, array(
		'category__in'   => wp_get_post_categories( get_the_ID() ),
		'posts_per_page' => $count,
		'post__not_in'   => array( get_the_ID() )
	) );
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) {
	?>
		<h4><?php esc_html_e('Related Posts', 'atoz'); ?></h4> 
			<?php
            $num = 0;
			while ( $related->have_posts() ) {
				$related->the_post();

                if  ( get_the_post_thumbnail() == '')
                {
                     $background_img_relatedpost   = get_template_directory_uri() . "/img/default.jpg";
                    
                    $post_thumbnail= '<img src="' . esc_url($background_img_relatedpost) . '" class="img-responsive blog-img">';
                }
                else
                {
                    //$post_thumbnail = get_the_post_thumbnail( get_the_ID(), 'img-responsive blog-img' );
                    $post_thumbnail = get_the_post_thumbnail( get_the_ID(),'atoz_related_posts', 'img-responsive blog-img');

                }
                
                $title=get_the_title();
                
                global $post;
                $categories = get_the_category($post->ID);
                $cat_link = get_category_link($categories[0]->cat_ID);
				printf('<article class="col-md-4 col-sm-4 eq-blocks">
                        <div class="blog-box-inn"> 
							<span class="posted-date">%s</span><a href="%s">%s</a>
							<a href="%s"><h2>%s</h2></a>
							<a href="%s"><p>' . $categories[0]->cat_name . '</p></a>
							<a href="%s" class="btn btn-default">View</a>  
                        </div>
                     </article>',
					esc_html( get_the_date() ),
					esc_url( get_permalink() ),
					$post_thumbnail,
					esc_url( get_permalink() ),
                    esc_html($title),
                    esc_url($cat_link),
                    esc_url( get_permalink() )
				); 
				?>
			<?php
			}
			?>
		
	<?php
	}
	wp_reset_postdata();
}
?>