<?php
/**
 * Template part for displaying section content in template-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package beetech
 */
?>

<?php
$section_option = get_theme_mod( 'homepage_portfolio_option' );
if( $section_option == 'show' ) {
$section_title = get_theme_mod( 'portfolio_section_title');
$section_description = get_theme_mod( 'portfolio_section_description');
$portfolio_cat_id = get_theme_mod('portfolio_cat_id');
?>
    <section class="bt-portfolio" id="bt-section-portfolio">
    	<div class="bt-wrapper">
    		<?php if($section_title || $section_description){ ?>
    			<div class="bt-section-header">
    				<?php if($section_title){ ?><h2><?php echo esc_attr($section_title); ?></h2><?php } ?>
                    <?php if($section_description){ ?>
        				<p>
        				    <?php echo esc_attr($section_description); ?>
        				</p>
                    <?php } ?>
    			</div>
            <?php } 
            if($portfolio_cat_id){
            $portfolio_cat_query = new WP_Query(array('post_type'=>'post','cat'=>$portfolio_cat_id,'posts_per_page'=>6));
            if($portfolio_cat_query->have_posts()):?>
        		<div class="row clearfix">
                    <?php while($portfolio_cat_query->have_posts()): $portfolio_cat_query->the_post();
                    $portfolio_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'beetech_portfolio_thumb'); ?>
        			<div class="col">
        				<?php if($portfolio_image[0]){ ?>
                            <a href="<?php the_permalink() ?>"><img src="<?php echo esc_url($portfolio_image[0]) ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/></a>
                        <?php } ?>
        				<div class="caption">
                            <?php if(get_the_title()){ ?>
            					<div class="caption-border">
            						<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
            					</div>
                            <?php } ?>
        				</div>
        			</div>
                 <?php endwhile; ?>   
    		</div>
            <?php endif;
            } ?>   
    	</div>
    </section>
<?php } ?>