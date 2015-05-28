<?php

?>
<div id="container">
	<div>
				<div class="top-app-nav-right">
<div style="float:right"><h4>
 <?php if($userType == 1) { ?>
	<a style="padding:10px;" href="<?php echo site_url()?>advertiser/dashboard">Back to Dashboard</a>
<?php } elseif($userType == 2) { ?>
	<a style="padding:10px;" href="<?php echo site_url()?>administrator/dashboard">Back to Dashboard</a>
<? } ?>	
</h2></div>
				</div>
            	<h1>Order Details</h1>
            	<div class="content">
                	<div class="ohead">
                		<div class="orderno obox">
                			<span class="text">Order Type</span>
                			<span class="value"><?php echo ucfirst($order[0]->ordertype)?></span>
                			<span class="text">Order No</span>
                			<span class="value"><?php echo $order[0]->orderid?></span>
                		</div>
                		<div class="odate obox">
                			<span class="text">Order Date</span>
                			<span class="value"><?php echo $order[0]->order_date?></span>
                			<span class="text">Order Status</span>
                			<span class="value"><?php if($order[0]->status == 0) echo "Approval Pending"; else echo "Approved";?></span>
                		</div>
                		<div class="ostatus obox">
                			<span class="text">Order Items</span>
                			<span class="value"><?php echo count($orderitems);?></span>
                			<span class="text">Order Total</span>
                			<span class="value"><?php echo "AED " . $order[0]->amount;?></span>
                		</div>
                	</div>
                	<?php
                		foreach($orderitems as $orderitem){
                	?>
                	<div class="orderitem-holder">
                	<div class="hr clear"></div>
                	<div class="orow">
                		<?php if(isset($orderitem->li_brandname)) {?>
                		<div class="boxfifty">
                			
                			<div class="innerbox left">
                				<span class="text">Brand Name</span>
                				<span class="value"><?php echo $orderitem->li_brandname;?></span>
                				<span class="text">Brand Url</span>
                				<span class="value"><?php echo $orderitem->li_brand_url;?></span>
                				<span class="text">Brand Category</span>
                				<span class="value"><?php echo "Category";?></span>
                			</div>

                			<div class="innerbox right">
                				<div class="oblogo">
                					<img src="<?php echo $orderitem->li_brandlogourl?>" width="150px"  />
                				</div>	
                			</div>
                		
                		</div>	
                			<?php } ?>
                		<h4>Ad unit Details</h4>	
                		<div class="">
                			<div class="innerbox left">
                				<span class="text">Monthly Impression</span>
                				<span class="value"><?php echo ($orderitem->li_qty * 1000);?></span>
                				<span class="text">Item Cost per 1k</span>
                				<span class="value"><?php echo "AED ". $orderitem->li_itemvalue;?></span>
                				<span class="text">Total Item cost</span>
                				<span class="value"><?php echo "AED ". $orderitem->li_itemcost;?></span>
                			</div>
                			
                		</div>	
                	</div>
                	<div class="clear"></div>
                	<div class="ocreative">
                		<span class="title">Creatives</span>
                		<div class="clear"></div>
                		<div class="innerbox left">
							<span class="text">Alternative Text</span>
                			<span class="value"><?php echo $orderitem->li_creativealttext;?></span>
                			<span class="text">Click Url</span>
                			<span class="value"><?php echo $orderitem->licreativeurl;?></span>
                			<!--<span class="text">Position</span>-->
                			<!--<span class="value"><?php //echo $orderitem->li_adtposition;?></span>-->
                		</div>		
                			<div class="innerbox right">
                			<div class="creativeimg">

                				<img src="<?php echo site_url()?>public/creatives/<?php echo  basename($orderitem->li_creativefilename);?>" />	
                			</div>
                		</div>
                				<div class="clear"></div>
                		</div>


                	</div>
					
					<?php } ?>
				</div>	
                </div>
    </div>
</div>                	