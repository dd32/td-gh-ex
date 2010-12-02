<!--search form-->
				
				    <form method="get" id="search" action="<?php echo home_url(); ?>">

					<div>
					<?php $req=''; ?>
					<input type="submit" id="searchsubmit" value="" />
               		<input type="text" value="Search" name="s" id="s"  onfocus="if(this.value=='Search'){this.value=''};" onblur="if(this.value==''){this.value='Search'};" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                	
					</div>
               		</form>