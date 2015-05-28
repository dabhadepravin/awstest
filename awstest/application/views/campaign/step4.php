<input type="hidden" id="c123uhq" name="c123uhq" value="<?php echo $cuser?>" />
<div id="container">
	<div>
            	<h1>Your Cart</h1>
                <div class="content">
<div class="maincontent" style="margin:0 5px !important;">
            <div class="clear"></div>
            <div class="content nopadding ohidden">
            	
            	  <form action="<?php echo site_url()?>advertiser/processpremiumad" name="buybulkad" id="buybulkad"method="post" enctype="multipart/form-data"> 
            	  	<input type="hidden" id="payformdata" name="payformdata"  value="">
            	  	<input type="hidden" class="rowcost" id="brandid" name="brandid" value="<?php echo $brandid ?>">
                	<table cellpadding="0" cellspacing="0" class="sTable3 checkouttbl"  width="100%">
                        <thead>
                            <tr>
                                <td>Details</td>
                                <td style="width:100px">Est. Impressions</td>
                                <td style="width:100px" align="center">Qty</td>
                                <td align="left">Cycle</td>
                                <td align="center">cost</td>
                                <td align="center"></td>
                                <td align="center"></td>
                            </tr>
                        </thead>
                        <tbody>
           <?php
						
			foreach($ads as $ad){
				$a_id = $ad->id;
				$a_brandid = $ad->brand_id;
				$a_type = $ad->ad_type;
				$a_width = $ad->width;
				$a_height = $ad->height;
				$a_position = $ad->position;
				$a_estimated_impressions = $ad->estimated_impressions;
				$a_ad_units = $ad->ad_units;
				$a_brand_name = $ad->bname;
				$a_brand_url = $ad->burl;
				$a_cost = $ad->costperk;
				$a_creative_id = $ad->creative_id;
				$button_text = "Creative";
				$btnurl =  site_url()."advertiser/uploadcreative?id=".$a_id."&bid=".$brandid;
				if(!empty($a_creative_id)){
					$button_text = "Creative";
					$btnurl = site_url()."advertiser/editcreative?cid=".$a_creative_id."&bid=".$brandid;	
				}
			
		?>
			<tr data-id="<?php echo $a_id?>">
                
                <td><span><?php echo $a_brand_name?></span><br><span><?php echo $a_type;?></span><span><?php echo $a_width . "x".$a_height?></span><br><span>AED <?php echo $a_cost ?> per 1k Impressions.</span>
			<input type="hidden" class="rowcost" id="itemcostperk_<?php echo $unitid?>" name="itemcostperk[]" value="<?php echo $a_cost ?>">

                </td>
                <td><span><?php echo $a_estimated_impressions?></span></td>
                <td align="center"><span>
                <select class="qtyselect" name="qty[]" id="qty" data-id="<?php echo $a_id?>"  data-cost="<?php echo $a_cost?>">
                		<option value="0">Select</option>
						<option value="30">30,000</option>
						<option value="40">40,000</option>
						<option value="50">50,000</option>
						<option value="60">60,000</option>
						<option value="70">70,000</option>
						<option value="80">80,000</option>
						<option value="90">90,000</option>
						<option value="100">100000</option>
						<option value="200">200000</option>
						<option value="300">300000</option>
						<option value="400">400000</option>
						<option value="500">500000</option>
						</select>
                </span></td>
                <?php
                	$today = time();
                	$defult_date_range = date("m/d/Y H:i:s"). " - ".date('m/d/Y H:i:s', strtotime('+1 day', $today));

                ?>
                <td align="left"><span class="add-on input-group-addon calicon"><i class="glyphicon glyphicon-calendar fa fa-calendar "></i></span><input type="text" style="width: 300px" name="daterange[]" id="daterange_<?php echo $a_id?>" class="form-control addaterange" value="<?php echo $defult_date_range?>" /> 
                <div class="clear"></div>	
                	<div class="upload-popup" id="upload_win_<?php echo $unitid?>" style="margin:0 auto;display:none">
                		  <div class="formfield">	 	
                		  	<input type="hidden" name="unitid[]" value="<?php echo $unitid?>">
						 		<label for="alt_text">Alternative Text</label><input type="text" name="alt_text[]" id="alt_text_<?php echo $unitid?>" value="">
						 </div>
							<div class="formfield">	 	
						 		<label for="link">Link</label><input type="text"  name="link[]" id="link_<?php echo $unitid ?>" value="">
						 	</div>
						 	<div class="formfield filefield">	 	
						 		<label for="alt_text">Upload Creative</label><input data_u_id="<?php echo $unitid ?>" c_width="<?php echo $a_width ?>" c_height="<?php echo $a_height?>" class="creativefileupload" type="file" name="file[]" id="file_<?php echo $unitid?>" value="">
						 		<br>
						 		<span>Creative Asset size: <?php echo $a_width ."x". $a_height ?></span>
						 	</div>
						 <div class="error" id="error_<?php echo $unitid?>" style="display:none">	 	
						 		<span class="error"></span>
						 </div>
						 	<!--<div class="formfield">	 	
						 			<a class="button green creative-upload-form" style="width:150px;text-align:center;padding:10px;" href="javascript:void(0)">
						 				<span><em>Upload Creative</em></span>
						 			</a>
						 	</div>-->
					</div>		

                </td>
                <td align="center"><span id="cost_<?php echo $unitid?>"></span><input type="hidden" class="tcost" id="tcost_<?php echo $unitid?>" name="tcost_<?php echo $unitid?>" value="0"></td>
                <td style="text-align:center;vertical-align:middle"><a class="button green creative-upload"   data-unit-id="<?php echo $unitid?>" href="javascript:void(0);"><span><em><?php echo $button_text?></em></span></a></td>
                <td align="center"><a href="javascript:void(0)">X</a></td>
            </tr>
        <?php } ?>    
        		<tr>
        		 <td style="display:none;" id="totalspan" colspan="9">
        		 <div class="checkholder">
        		 <div class="checkoutbtnholder">
        		 		<a class="button green creative-upload checkoutlnk"  href="javascript:void(0);"><span><em>Continue Checkout</em></span></a>
        		 </div>
        		
        		 <div class="totalholder">
        		 <span>Total<br><span class="totalCost"></span></span>
					<input type="hidden" name="totalcost" id="totalcost" value="0">
				</div>	
				</div>	        		 
        		 </td>
        		</tr>
                        </tbody>
                    </table>
                   </form> 
                </div>
			
			
    
    <br clear="all" />
     <!-- checkout confirmation -->

    <?php
    //print_r($advertiser_details);
   //  if(isset($advertiser_details)) {?>
	<div id="dialog_checkout"  style="display:none" class="branddialog" title="Order confirmation">
					<div>
						 <form name="payformpre" id="payformpre">
						 <table>
						 	<tr><td>Order Date</td><td><?php echo date("Y-m-d H:i:s")?></td></tr>

						 	<tr><td>Customer Name</td><td><input name="customername"  id="customername" type="text" value=""  maxlength="100" class="frmfield"></td></tr>
						 	<tr><td>Customer Email</td><td><input name="customeremail"  id="customeremail" type="text" value=""  maxlength="100" class="frmfield"></td></tr>
						 	<tr><td>Customer Phone</td><td><input name="customerphone" id="customerphone" type="text" value=""  maxlength="100" class="frmfield"></td></tr>
						 	<tr><td>Order Total</td><td><span id="ordertotal"></span></td></tr>
						 	<tr><td>Card Information</td><td></td></tr>
						 	<tr><td></td>
						 		<td>
						 			<div class="cardinfo">
						 					<table collspan="2" cellspacing="2">
						 					<tr>	
						 					<td style="height:35px;">
										    	<label for="CCNo" style="font-weight:normal;width:250px;display:inline;">Credit Card Number:</label>
											</td>
											<td style="height:35px;">
										    	<input name="CCNo" type="text" value="" size="19" maxlength="40" class="frmfield">
											</td>
											</tr>
										    <tr>
										    <td style="height:35px;">	
										    	 <label for="CCNo" style="font-weight:normal;width:250px;display:inline;">Expiry Date:</label>
										 	</td>
										 	<td style="height:35px;">
										     <SELECT NAME="CCExpiresMonth" style="border:1px solid #ccc;height:30px;width:100px;">
										        <OPTION VALUE="" SELECTED>--Month--</OPTION>
										        <OPTION VALUE="01">January (01)</OPTION>
										        <OPTION VALUE="02">February (02)</OPTION>
										        <OPTION VALUE="03">March (03)</OPTION>
										        <OPTION VALUE="04">April (04)</OPTION>
										        <OPTION VALUE="05">May (05)</OPTION>
										        <OPTION VALUE="06">June (06)</OPTION>
										        <OPTION VALUE="07">July (07)</OPTION>
										        <OPTION VALUE="08">August (08)</OPTION>
										        <OPTION VALUE="09">September (09)</OPTION>
										        <OPTION VALUE="10">October (10)</OPTION>
										        <OPTION VALUE="11">November (11)</OPTION>
										        <OPTION VALUE="12">December (12)</OPTION>
										      </SELECT> /
										      <SELECT NAME="CCExpiresYear" style="border:1px solid #ccc;height:30px;width:100px;">
										        <OPTION VALUE="" SELECTED>--Year--</OPTION>
										        <OPTION VALUE="15">2015</OPTION>
										        <OPTION VALUE="16">2016</OPTION>
										        <OPTION VALUE="17">2017</OPTION>
										        <OPTION VALUE="18">2018</OPTION>
										        <OPTION VALUE="19">2019</OPTION>
										        <OPTION VALUE="20">2020</OPTION>
										      </SELECT>
										     </td>
										 </tr>
										     <tr> 
										     <td style="height:35px;">	
										   		<label for="ccv" style="font-weight:normal;width:250px;display:inline;">CCV Number:</label>
										   	</td>
										   	<td style="height:35px;">	
										    	<input name="ccv" type="password" value="" size="6" maxlength="10" class="frmfield" style="border:1px solid #ccc;height:30px;width:100px;">
										    </td>	
										   </tr> 
										</table>
						 			</div>
						 		</td></tr>
						 		<tr><td><div style="width:50px;"><a class="button green creative-upload confirm_checkout-pre"  style="text-align:center;height:30px;" href="javascript:void(0);"><span><em>Pay</em></span></a></div></td><td></td></tr>
						 	</form>
					</div>

            	</div>	
           
    <!-- end -->
    <?php // } ?>
</div><!--maincontent-->
</div>
</div>
</div>
<br />

