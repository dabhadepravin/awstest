<div id="container">
	  	<h1>Creatives </h1>
             <div class="content">
<div class="maincontent" style="margin:10px 20px !important;">
<?php

	$ad = $ads[0];
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
	$a_cost = $ad->cost;
	$action = $action;
	$alt_text = $url = $file_name = '';
	if(isset($creatives)){
		$creatives = $creatives[0] ;
		$alt_text = $creatives->alt_text;
		$url = $creatives->url;
		
		$file_name = $creatives->file_name;
	}
?>
               	
    <div class="clear"></div>
    <div class="upload-top" style="width:700px;margin:0 auto;">
    <div class="content nopadding ohidden">
        	<table cellpadding="0" cellspacing="0" class="sTable3" width="100%">
        	<tr>
        	<td style="vertical-align:top;text-align:center">
        		<div class="one_half bright" style="float:left;">
            <h2><?php echo $a_brand_name?></h2>
                <small></small>
        </div>
        	</td>
			<td style="vertical-align:top;">
			 <div class="one_half bright" style="float:left;">
            <h2><?php echo $a_type?></h2>
                <small><?php echo $a_width . "x". $a_height. " ".$a_position ?> </small>
        </div>
        	</td>
        	<td style="vertical-align:top;">
        	 <div class="one_half last" style="float:left;">
            <h2>JPG, GIF, and PNG</h2>
                <small>IMAGE REQUIREMENTS <?php echo $a_width . "x". $a_height. " " ?> </small>
        </div>
        	</td>
        	</tr>
        	</table>
	 </div>
	 <div class="clear"></div>
	 <div class="uploadform">
	 <form id="uploadcreative" name="uploadcreative" method="post" action="uploaddata" enctype="multipart/form-data" > 
	 <input type="hidden" name="adid" id="adid" value="<?php echo $a_id?>">
	 <?php if(isset($creative_id) && !empty($creative_id)){ ?>
	 	 <input type="hidden" name="creative_id" id="creative_id" value="<?php echo $creative_id?>">
	 <?php } ?>
	 <input type="hidden" name="action" id="action" value="<?php echo $action?>">
	 <div class="formfield">	 	
	 		<label for="alt_text">Alternative Text</label><input type="text" name="alt_text" id="alt_text" value="<?php echo $alt_text ?>">
	 	</div>
		<div class="formfield">	 	
	 		<label for="link">Link</label><input type="text" name="link" id="link" value="<?php echo $url ?>">
	 	</div>
	 	<div class="formfield filefield">	 	
	 		<label for="alt_text">Upload Creative</label><input type="file" name="file" id="file" value="">
	 		<br>
	 		<div class="imageholder">
	 		<?php if($action == "edit_creative") { ?>
	 			<img src="<?php echo site_url()?>public/creatives/<?php echo $file_name?>" width="200">
	 		<?php } ?>
	 		</div>
	 	</div>
	 <!--	<div class="formfield">	 	
	 		<input type="text" name="adschedule" id="adschedule">
	 	</div>-->
	 	<div class="formfield">	 	
	 			<a class="button green creative-upload-form" style="width:150px;text-align:center;padding:10px;" href="javascript:void(0)">
	 				<span><em>Upload Creative</em></span>
	 			</a>
	 	</div>
	 </form>
	 </div>
		   
        
       
    </div>
  		   
    <br clear="all" />
   
    
</div><!--maincontent-->
</div>
</div>
</div>
<br />

