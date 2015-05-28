<div id="container">
	<div>
            	<h1>You have <?php echo count($units)?> Items in your cart</h1>
                <div class="content">
           	
<div class="maincontent" style="margin:0 5px !important;">
            <div class="clear"></div>
            <div class="content nopadding ohidden">
            <form action="<?php echo site_url()?>advertiser/processbulkad" name="buybulkad" id="buybulkad"method="post" enctype="multipart/form-data">   
 <input type="hidden" id="payformdata" name="payformdata"  value="">
                	<table cellpadding="0" cellspacing="0" class="sTable3 checkouttbl"  width="100%">
                        <thead>
                            <tr>
                               
                                <td>Details</td>
                                <td style="width:100px" align="center"></td>
                                <td align="left">Impressions</td>
                                <td align="center">Cycle</td>
                                <td align="center">Cost</td>
                                <td align="center">Creatives</td>
                            </tr>
                        </thead>
                        <tbody>
           <?php
			$total = 0;			
			foreach($units as $unit){
				$unitid = $unit->id;
				$unitname = $unit->name;
				$unit_type = $unit->code;
				$unit_width = $unit->width;
				$unit_height = $unit->height;
				$unit_cost = $unit->itemprice;
				$unit_qty = $unit->qty;
				$rowcost = ($unit_qty/1000) * $unit_cost;
				$total = $total+ $rowcost;
				$button_text = "Creative";
				$btnurl =  site_url()."advertiser/uploadcreative?id=".$unitid;
				if(!empty($a_creative_id)){
					$button_text = "Creative";
					$btnurl = site_url()."advertiser/editcreative?cid=".$a_creative_id;	
				}
			
		?>
			<tr data-id="<?php echo $unitid?>">
                <td><span><?php echo $unitname?></span><br><span><?php echo $unit_width . "x".$unit_height?></span></td>
                <td><span>AED <?php echo $unit_cost ?> per 1k Impressions.</span></td>
                <td><span><?php echo $unit_qty?>	<input type="hidden" name="qty[]" value="<?php echo $unit_qty?>"></span></td>
                <?php
                	$today = time();
                	$defult_date_range = date("m/d/Y H:i:s"). " - ".date('m/d/Y H:i:s', strtotime('+1 day', $today));

                ?>
                <td align="left"><span class="add-on input-group-addon calicon"><i class="glyphicon glyphicon-calendar fa fa-calendar "></i></span><input type="text" style="width: 300px" name="daterange[]" id="daterange_<?php echo $unitid?>" class="form-control addaterange" value="<?php echo $defult_date_range?>" /> 
                	<div class="clear"></div>	
                	<div class="upload-popup" id="upload_win_<?php echo $unitid?>" style="margin:0 auto;display:none">
                		  <div class="formfield">	 	
                		  	<input type="hidden" name="unitid[]" value="<?php echo $unitid?>">
						 		<label for="alt_text">Alternative Text</label><input type="text" name="alt_text[]" id="alt_text_<?php echo $unitid?>" value="">
						 </div>
							<div class="formfield">	 	
						 		<label for="link">Link</label><input type="text" name="link[]" id="link_<?php echo $unitid ?>" value="">
						 	</div>
						 	<div class="formfield filefield">	 	
						 		<label for="alt_text">Upload Creative</label><input data_u_id="<?php echo $unitid ?>" c_width="<?php echo $unit_width ?>" c_height="<?php echo $unit_height?>" class="creativefileupload" type="file" name="file[]" id="file_<?php echo $unitid?>" value="">
						 		<br>
						 		<span>Creative Asset size: <?php echo $unit_width ."x". $unit_height ?></span>
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
                <td align="center"><span id="cost_<?php echo $unitid?>">AED <?php echo $rowcost ?></span><input type="hidden" class="tcost" id="tcost_<?php echo $unitid?>" name="tcost[]" value="<?php echo $rowcost ?>"></td>
                <td style="text-align:center;vertical-align:middle">
                	<a class="button green creative-upload" data-unit-id="<?php echo $unitid ?>" href="javascript:void(0)"><span><em><?php echo $button_text?></em></span></a>
                	
                </td>
                <td align="center"><a href="javascript:void(0)">X</a></td>
            </tr>
        <?php } ?>    
        		<tr>
        		 <td style="" id="totalspan" colspan="9">
        		 <div class="checkholder">
        		 <div class="checkoutbtnholder">
        		 		<a class="button green creative-upload checkoutlnk"  href="javascript:void(0);"><span><em>Continue Checkout</em></span></a>
        		 </div>
        		
        		 <div class="totalholder">
        		 <span>Total<br><span class="totalCost"></span>AED <?php echo $total;?></span>
					<input type="hidden" name="totalcost" id="totalcost" value="<?php echo $total;?>">
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
	<div id="dialog_checkout"   class="branddialog" title="Order confirmation">
					<div>
						<form name="payform" id="payform">
						<input  type="hidden" name="advertise_type" id="advertise_type" value="<?php echo $advertise_type?>" />	
						 <table>
						 	<tr><td>Order Date</td><td><?php echo date("Y-m-d H:i:s")?></td></tr>

						 	<tr><td>Customer Name</td><td><input name="customername" id="customername" type="text" value=""  maxlength="100" class="frmfield" required></td></tr>
						 	<tr><td>Customer Email</td><td><input name="companyname" id="companyname" type="text" value=""  maxlength="100" class="frmfield" required></td></tr>
						 	<tr><td>Customer Email</td><td><input name="customeremail" id="customeremail" type="email" value=""  maxlength="100" class="frmfield" required></td></tr>
						 	<tr><td>Customer Phone</td><td><input name="customerphone" id="customerphone" type="number"  required value=""  maxlength="100" class="frmfield"></td></tr>
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
										    	<input name="CCNo" type="number" value="" size="16" maxlength="40" class="frmfield" required>
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
										    	<input name="ccv"  required type="password" value="" size="6" maxlength="10" class="frmfield" style="border:1px solid #ccc;height:30px;width:100px;">
										    </td>	
										   </tr> 
										</table>
						 			</div>
						 		</td></tr>
						 		<tr><td><div style="width:50px;"><a class="button green creative-upload confirm_checkout"  style="text-align:center;height:30px;" href="javascript:void(0);"><span><em>Pay</em></span></a></div></td><td></td></tr>
						 	</form>
						 </table> 
					</div>

            	</div>	

           
    <!-- end -->
    <?php // } ?>
</div><!--maincontent-->
</div>

</div>
</div>
<br />

