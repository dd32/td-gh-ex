<!--product thumbnails slider-->
<?php 
$products=get_option('spa_theme_options',spa_the_theme_setup()); ?>
<div class="container-fluid">
  <div class="container">
   <div class="row"> <div class="jumbotron">
      <h1 class="home_product_tagline"><?php echo $products['product_title']; ?></h1>
      <p><?php echo $products['product_contents']; ?></p>
    </div></div>
	<div class="row">
		<ul class="static-item">
			<li>
				<?php 	if($products['product1_image']!='')  ?>
				<img src="<?php echo $products['product1_image']; ?>"  alt="Spa Featture" class="product_flex_img" />
				<h4><a href="#"><?php  echo $products['product1_title']; ?></a></h4>
			</li>
			<li>
				<?php 	if($products['product2_image']!='')  ?>
				<img src="<?php echo $products['product2_image']; ?>"  alt="Spa Featture" class="product_flex_img" />
				<h4><a href="#"><?php  echo $products['product2_title']; ?></a></h4>
			</li>
			<li>
				<?php 	if($products['product3_image']!='')  ?>
				<img src="<?php echo $products['product3_image']; ?>"  alt="Spa Featture" class="product_flex_img" />
				<h4><a href="#"><?php  echo $products['product3_title']; ?></a></h4>
			</li>
			<li>
				<?php 	if($products['product4_image']!='')  ?>
				<img src="<?php echo $products['product4_image']; ?>"  alt="Spa Featture" class="product_flex_img" />
				<h4><a href="#"><?php  echo $products['product4_title']; ?></a></h4>
			</li>
			<li>
				<?php 	if($products['product5_image']!='')  ?>
				<img src="<?php echo $products['product5_image']; ?>"  alt="Spa Featture" class="product_flex_img" />
				<h4><a href="#"><?php  echo $products['product5_title']; ?></a></h4>
			</li>
		</ul>
	</div>
     
    
  </div>
</div>