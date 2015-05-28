<div id="container">
	<div class="advinfo"> 
		<div class="fiftyleft cpad">
			<h2>For Advertisers</h2>
			<h3>Guaranteed media buying of relevant audiences at scale. Get out of the "black box" solutions and know what you are buying.</h3>
			<h4>It's easier than it sounds.</h4>
			<div class="separator mbottom cf"></div>
			<div class="submit bcenter cf" style="margin:10px;padding:10px">
			<a href="<?php echo site_url()?>users/register" class="button primary primary"> <span><em>Get Started</em></span> </a>
		</div>
			<p></p>
		</div>
	</div>
	<div class="loginform">
		<?php
                		if(isset($error) && !empty($error)){
                	?>
                		<div class="errorholder">
                			<span class="error"><?php echo $error;?></span>
                		</div>

                	<?php 
               			 }
                	?>
		<div class="breathablewrap">

			
	    <form name="form1" id="form1" action="<?php echo site_url()?>users/processlogin"  method="post" class="form standard noverify">
			<div class="reg">
				<label for="emailid">User Name</label>
				<div class="inputpad cf">
					<input type="text" id="username" name="username" value="" class="large text email " label="Username" autofocus="autofocus">
				</div>
			</div>
		<div class="alt">
			<label for="passwordid">Password</label>
			<div class="inputpad cf">
				<input type="password" id="passwordid" name="password" value="" class="large password " label="Password">
			</div>
		</div>
		<input type="hidden" name="ref" value="">
	    <div class="submit bcenter cf" style="margin:10px 0;">
			<button type="submit" class="button primary primary" name="submit1" value="submit" id="submitbutton" rel="">
				<span><em>Login			</em></span>
			</button>
		</div>
		<div class="clear"></div>
	    <div class="separator mtop cf"></div>
	       	<p class="center">
	    		<a href="<?php echo site_url()?>users/forgot">Reset Password</a> · <a href="<?php echo site_url()?>users/register">Create an account</a>
	    	</p>
	    </form>
	</div>
	</div>
	</div>
</div>

