
<div id="container">
 <div>
 	<div class="adtypeholder">
 	<div class="adtypes">
		<a href="javascript:void(0)" class="blkadtype" data-ad-type="mpu">
			<p class="title">MPU</p>
			<p class="text">AED 10 per 1k Impressions</p>
			<p class="formfield">
				<select class="qtyselect" name="qty" id="mpu-sel">
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
			</p>			
		</a>
		<p class="formfield"><button type="button" data-ad-type='mpu' data-ad-c='10' class="blkadtypebtn">Buy</button></p>
	</div>
	<div class="adtypes">
<a href="javascript:void(0)" class="blkadtype" data-ad-type="lb">
		<p class="title">Leader Board</p>
			<p class="text">AED 20 per 1k Impressions</p>
			<p class="formfield">
				<select class="qtyselect" name="qty" id="lb-sel">
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
			</p>			
		</a>
		<p class="formfield"><button type="button" data-ad-type='lb' data-ad-c='20' class="blkadtypebtn">Buy</button></p>
		<!--<a href="javascript:void(0)" class="blkadtype" data-ad-type="lb">Leader Board</a>-->
	</div>
	<div class="adtypes">
		<a href="javascript:void(0)" class="blkadtype" data-ad-type="hp">
		<p class="title">Half page</p>
			<p class="text">AED 25 per 1k Impressions</p>
			<p class="formfield">
				<select class="qtyselect" name="qty" id="hp-sel">
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
			</p>			
		</a>
		<p class="formfield"><button type="button" data-ad-type='hp' data-ad-c='25' class="blkadtypebtn" >Buy</button></p>
		<!--<a href="javascript:void(0)" class="blkadtype" data-ad-type="hp">Half page</a>-->
	</div>
	</div>
	<div class="clear"></div>
	<div class="cartholder" style="display:none;width:640px;border:1px solid #ccc;margin:10px;min-height:240px;">
		<form name="formcontinue-blk" id="formcontinue-blk" action="<?php echo site_url()?>advertiser/processorder" method="post">
		<input  type="hidden" name="advertise_type" id="advertise_type" value="bulk" />	
		<h3 style="padding:5px;">Your Cart</h3>
		<div>
		<table class="carttable" style="width:100%;margin:10px;">
			<tr>
			<th>Ad Type</th><th>Impressions</th><th>per 1k cost</th><th>Total</th></tr>
		</table>
	</div>
		<br />
		<div class="btnholder-continue">
			<input type="submit" value="Continue" name="submit" /> 
			
		</div>
	</form>
	</div>	
</div>
</div>
<br />

