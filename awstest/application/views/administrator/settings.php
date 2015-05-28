<div id="container">
	<div>
    <h1>Settings</h1>
    <div class="content">
    	<p style="font-weight:bold;color:green"><?php if(isset($message)) echo $message?></p>
    	<form name="setting_form" action="<?php echo site_url()?>administrator/usettings" method="post">
    	<table class="settingform" cellpadding="1" cellspacing="1">
    	<?php 
    		foreach($settings as $setting){
    			$req_str = '';
    			if($setting->setting_required == 1){
    				$req_str = "required";
    			}
    	?>
    		<tr>
    			<td><span class="rowtitle"><?php echo $setting->setting_lbl; ?></span></td>
    			<td><input type="<?php echo $setting->setting_datatype; ?>" id="<?php echo $setting->setting_name; ?>" name="<?php echo $setting->setting_name; ?>" value="<?php echo $setting->setting_value; ?>" <?php echo $req_str?> /> </td>
    		</tr>
    	<?php } ?>
    		
    		
    		<tr>
    			<td colspan="2"><input type="submit" name="submit" value="Save"></td>
    		</tr>
    	</table>
    </form>
    </div>
</div>	
