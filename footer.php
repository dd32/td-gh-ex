<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package AccesspressLite
 */
?>
	<div class="fixed-sidebar-demo">
		<div class="sidebar-wrapper">
		<a href="" class="sidebar-hover">
			<img src="http://demo.accesspressthemes.com/accesspresslite-new/wp-content/uploads/2016/03/2016-03-01-1.png"
 alt=""/>
		</a>
		<div class="templates-option-sidebar">
			<h3 class="fixed-sidebar-title">Templates</h3>
			<ul>
				<li class="template-list1 active"><a href="">Template 1</a></li>
				<li class="template-list2 active"><a href="">Template 2</a></li>
			</ul>	
		</div>
		</div>
		<style>
			.fixed-sidebar-demo{
				position:fixed;
				top: 30%;
				left: 0;
				margin-left: -150px;
				transition: all 0.3s ease-in-out;
				-moz-transition: all 0.3s ease-in-out;
				-webkit-transition: all 0.3s ease-in-out;
				z-index: 9;			}

			.fixed-sidebar-demo.sidebar-active{
				margin-left: 0;
			}

			.sidebar-wrapper{
				position: relative;
			}		
			
			.templates-option-sidebar {
				background:#000;
				border:1px solid #000;
				width:150px;
				min-height:130px;
				padding:10px 15px;
				color:#fff;
			}

			.sidebar-hover{
				position: absolute;
				left: 100%;
				top: 0;
				background:#000;
				padding:10px ;
				height: 52px;
				width: 52px;
				display: block;
			}

			.fixed-sidebar-title {
				font-weight: 700;
				padding-bottom: 10px;
				margin-bottom: 15px;
				color:#fff;
				border-bottom:1px solid #ffffff;
				text-align: center;
			}

			.templates-option-sidebar ul {
				list-style: none;
				margin:0;
				text-align: center;
			}

			.templates-option-sidebar ul li {
				margin-bottom: 10px;
				padding: 5px;
				border-radius:5px;
				transition: all 0.3s ease-in-out;
				-moz-transition: all 0.3s ease-in-out;
				-webkit-transition: all 0.3s ease-in-out;
				cursor: pointer;
			}
			.templates-option-sidebar ul li.template-list1 {
				border:2px solid #00ABFF;
			}
			
			.templates-option-sidebar ul li.template-list2 {
				border: 2px solid #f98253;
			}

			.templates-option-sidebar ul li a{
				color:#fff;
				text-decoration: none;
				font-weight: 400;
			}

			.templates-option-sidebar ul li.template-list1:hover, 
			.body_template_one .templates-option-sidebar ul li.template-list1.active {
				background:#00ABFF;
			}

			.templates-option-sidebar ul li.template-list2:hover, 
			.body_template_two .templates-option-sidebar ul li.template-list2.active {
				background:#f98253;
			}

			.templates-option-sidebar ul li.template-list1 a:hover, 
			.templates-option-sidebar ul li.template-list2 a:hover {
				color:#ffffff;
			}

		</style>

		<script>
			jQuery(function($){
				$('.sidebar-hover').click(function(){
					$(this).parents('.fixed-sidebar-demo').toggleClass('sidebar-active');
					return false;
				});
			});
		</script>
	</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php 
		global $accesspresslite_options;
		$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
        $home_template = $accesspresslite_settings['accesspresslite_home_template'];
        $footer_title = $accesspresslite_settings['footer_title'];
		if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) ) : ?>
		<div id="top-footer">
		<div class="ak-container"><?php
        if($home_template == 'template_two'){
         if($footer_title){?>
                <h1 class="footer_title_text"><?php echo esc_attr($footer_title); ?></h1>
        <?php }} ?>
			<div class="footer1 footer">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer2 footer">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>	
			</div>

			<div class="clearfix hide"></div>

			<div class="footer3 footer">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer4 footer">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				<?php endif; ?>	
			</div>
		</div>
		</div>
	<?php endif; ?>

		
		<div id="bottom-footer">
		<div class="ak-container">
			<h1 class="site-info">
				<a href="<?php echo esc_url('http://wordpress.org/'); ?>"><?php _e( 'Free WordPress Theme', 'accesspresslite' ); ?></a>
				<span class="sep"> | </span>
				<a href="<?php echo esc_url('https://accesspressthemes.com/');?>" title="AccessPress Themes" target="_blank">AccessPress Lite</a>
			</h1><!-- .site-info -->

			<div class="copyright">
				<?php _e('Copyright','accesspresslite') ?> &copy; <?php echo date('Y') ?> 
				<a target="_blank" href="http://demo.accesspressthemes.com/accesspresslite/">
				<?php if(!empty($accesspresslite_settings['footer_copyright'])){
					echo $accesspresslite_settings['footer_copyright']; 
					}else{
						echo bloginfo('name');
					} ?>
				</a>
			</div>
		</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>