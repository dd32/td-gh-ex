<?php get_header(); ?>  

	<div class="blog-content">
        <div class="wrap">
			<?php if(get_theme_mod( 'enable_breadcrumb_check',1 )){ ?> 
            <div itemscope itemtype="http://schema.org/WebPage" id="crumbs" class="breadcrumb">
        		<?php ascreen_breadcrumb_trail(); ?> 
			</div>
            <?php } ?> 
            <div class="main">
                <!--article-->
                <ul class="blog-article-list">
                    <li>
                		<div>
                    		<h3><?php _e('404 Page!','ascreen');?></h3>
                    		<div class="quote">
								<?php if(get_theme_mod( '404_code','' ) == '' ){ ?> 
									<?php  _e('404 not found!','ascreen')?>
                                    <a href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-home"></i> <?php  _e('Please, return to homepage!','ascreen')?></a>
                                <?php 
								}else{
									echo get_theme_mod( '404_code','' );
								}
								 ?> 
							</div>

                		</div>
            		</li>  
            	</ul><!--ul class="blog-article-list"-->
 
            </div><!--div class="main"-->

            <!--siedbar-->
            <?php get_sidebar(); ?>
            
            
    	</div><!--div class="wrap"-->
	</div><!--div class="blog-content"-->
<?php get_footer(); ?>