
<div class="container">
	<div class="row">
         <div class="registorbox">
            <form id="form" action="register_advertiser" method="post" class="form-horizontal">
                	<?php
                		if(isset($error) && !empty($error)){
                	?>
                		<div class="errorholder">
                			<span class="error"><?php echo $error;?></span>
                		</div>

                	<?php 
               			 }
                	?>

                    <div class="form_default">

                             <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">User name<span class="error">*</span></label>
                                <div class="col-sm-8">
                                	<input type="text" name="username" placeholder="User name" id="username" class="form-control" />
                            	</div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Contact Person Name<span class="error">*</span></label>
                                <div class="col-sm-8">
                                	<input type="text" name="name" placeholder="Contact Person Name"  id="name" class="frmfield" />
                            	</div>
                            </div>
                            <div class="form-group">
                                <label for="companyname" class="col-sm-2 control-label">Company Name<span class="error">*</span></label>
                               <div class="col-sm-8"> 
                                	<input type="text" name="companyname"  placeholder="Company Name" id="fax" class="frmfield" />
                               </div> 
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email<span class="error">*</span></label>
                              <div class="col-sm-8">  
                                <input type="text" name="email" placeholder="Email"  id="email" class="frmfield" />
                              </div> 
                            </div>
                             <div class="form-group">
                               <label for="phone" class="col-sm-2 control-label">Phone</label>
                               <div class="col-sm-8">
                                <input type="text" name="phone" placeholder="Phone"  id="phone" class="frmfield" />
                               </div> 
                            </div>
                             <div class="form-group">
                                <label for="fax" class="col-sm-2 control-label">Fax</label>
                              <div class="col-sm-8">
                                <input type="text" name="fax" placeholder="Fax"  id="fax" class="frmfield" />
                            </div>
                            </div>
                             <div class="form-group">
                                <label for="address" class="col-sm-2 control-label">Address</label>
                               <div class="col-sm-8"> 
                               <textarea name="address" class="frmfield" rows="" cols=""></textarea>
                           </div>
                            </div>
                           <div class="form-group">
                              <label for="type" class="col-sm-2 control-label">Company Type</label>
                               <div class="col-sm-8"> 
                                <select name="type"  class="frmfield" id="type">
                                  <option value="">Choose One</option>
                                  <option value="ADVERTISER">Advertiser</option>
                                </select>
                               </div> 
                            </div>
                            <div class="form-group">
	  							  <div class="col-sm-offset-4 col-sm-8">
	    							  <button type="submit" class="btn btn-default frmsubmit">Submit</button>
	   							 </div>
 							 </div>
                            
        
                    </div><!--form-->
                	</form>
                    
                </div><!-- content -->
            </div><!-- widgetbox -->
    
    <div class="one_third last">
    	
    </div><!--one_third last-->
    
    <br clear="all" />
    
</div><!--maincontent-->

<br />

