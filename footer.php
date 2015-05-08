		<!--/.footermain-->
		<section id="bottom" class="footermain">

			<!--/.container-->
			<div class="container"> 
				
				<!--/.row-->
				<div class="row">
					
					<!--/.themeofwp_layout-->
					<?php echo themeofwp_layout() ;?>
						<?php dynamic_sidebar('bottom'); ?>
					</div>
					<!--/.themeofwp_layout-->
					
				</div>
				<!--/.row-->
			
			</div>
			<!--/.container-->
		
		</section>
		<!--/.footermain-->

		<!--/.footerbottom-->
		<footer id="footer" class="footerbottom">
			
			<div class="container"> 
				
				<div class="row">
				
					<div class="col-md-12">
				  
					<!--/.footermenu-->
					<div class="footermenu">
						<ul class="text-center">
							<?php 
							  wp_nav_menu( array(
								'theme_location' => 'footer',
								'container'  => false,
								'menu_class' => '',
								'items_wrap'=>'%3$s'
								)
							  );
							?>
						</ul>
					</div>
					<!--/.footermenu-->
						
				</div>
				<!--/.row-->
				
				</div>
				<!--/.container-->

			</div>
			<!--/.container-->

		</footer>
		<!--/footerbottom-->

</div>
<!--/.boxed / fullwidth-->

<!--/ back to top-->
<a href="#" id='toTop'><i class="fa fa-angle-up"></i></a>
<!--/ back to top-->

<?php wp_footer(); ?>

</body>
</html>