<div id="container">
	  	<h1>Brands </h1>
             <div class="content">
               	
			<?php
			foreach($brands as $brand){
				$b_id = $brand->id;
				$b_name = $brand->brand_name;
				$b_logo = $brand->brand_logo_url;
				$b_url = $brand->brand_url;
				$b_mi = $brand->monthly_impression;
				$b_followers = $brand->followers;
				$b_fb_likes = $brand->fblike;
				$b_description = $brand->brand_description;
			?>
		<div class="brandbox">
			<a class="brandlink" brandid="<?php echo $b_id?>" id="brand_<?php echo $b_id?>" href="javascript:void(0)">
				<div class="brand-logo"><img src="<?php echo $b_logo?>" alt=""></div>
				<div class="brand-details">
					<span class="bname" ><?php echo $b_name?></span><br>
					<span class="bname"><?php echo $b_mi?> monthly impressions</span><br>
            	</div>
            	<div id="dialog_<?php echo $b_id?>"  style="display:none" class="branddialog" title="<?php echo $b_name?>">
					<div>
						 <p class="brand-logo"><img src="<?php echo $b_logo?>" alt=""></p>
						  <div class="sitestats">
						  	<ul cass="sitestats">
						  		<li>
								<a href="javascript:void(0)">
									<span class="num"><?php echo $b_mi ?></span>
									<span class="title impressions">Monthly Impressions</span>
									</a>
								</li>
								<li>
								<a href="javascript:void(0)">
									<span class="num"><?php echo $b_followers ?></span>
									<span class="title followers">Followers</span>
									</a>
								</li>
								<li>
								<a href="javascript:void(0)">
									<span class="num"><?php echo  $b_fb_likes; ?></span>
									<span class="title likes">Facebook Likes</span>
								</a>	
							</li>
						  	</ul>
						  </div>
						  <div class="clear"></div>
						  <div class="bdescription"><?php echo $b_description ?></div>
       					  <div class="b_adunits_<?php echo $b_id?>"></div>
					</div>

            	</div>	
            </a>
		</div>

			<?php } ?>

<div class="clear"></div>
</div>
</div>			
<br />

