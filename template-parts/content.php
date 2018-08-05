<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage bee-news
 * @since Bee News 1.0
 */
?>

<?php global $archive_counter; 
?>

<?php if($archive_counter == 3): ?>
	<div class="row row-advertisement">
            <div class="col-md-8">
                <div class="advertisement">
                   
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php if  ($archive_counter == 1): ?>
		<div class="row"> 
<?php elseif  ($archive_counter == 3): ?>
		<div class="news-block-recent margin-v"> <!--start of second news blockk layout !-->
			<div class="row">
<?php endif; ?>


			<div class="<?php echo ($archive_counter >2) ?'col-md-12':'col-md-6' ?>"> 
	            <article class="news-block-list" id="post-<?php the_ID(); ?>"> 
					<header class="entry-header">
					<a href="<?php the_permalink(); ?>">
			        <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			        </a>
			        <?php bee_news_meta_simplified(); ?>
			        </header>
	                
		            <?php if  ($archive_counter >2): ?>
		            <div class="col-md-4">
		            <?php endif;?>
			        <?php bee_news_post_thumbnail();?>
			        <?php if  ($archive_counter >2): ?>
		            </div>
		            <?php endif;?>


			    	<?php if  ($archive_counter >2): ?>
		            <div class="col-md-8">
		            <?php endif;?>
        
			        <?php bee_news_force_excerpt(); ?>
			        
			         <div class="entry-content">        
	                </div>
	                <?php if  ($archive_counter >2): ?>
		            </div>
		            <?php endif;?>


	            </article>                             
            </div>

<?php 
// close the row tag if it is the last post or the 2nd post
if  ($archive_counter == 2) : ?>
	</div> <!-- end of .row -->
<?php elseif  ($archive_counter == $wp_query->post_count): ?>
		</div> <!-- end of .row -->
			</div> <!-- end of  layout 2 -->
<?php endif; ?>