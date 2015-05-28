<script type="text/javascript">
var  param = getParameterByName("ret");
if(param == "success"){
$.growl({ title: "Campaign Created Sucessfully", message: "Campaign created sucessfully. wating for approval!" });

}
$(document).ready(function(){
/*$("#grid-basic").bootgrid({
	formatters: {"link": function(column, row){return "<a href=\"#\">" + column.id + ": " + row.id + "</a>";}}}
    );	*/
$("#grid-basic").DataTable();
});

</script>
<div id="container">
	<div>
            	<h1>DashBoard</h1>
                <div class="content">
                	
                	<?php
                		if(isset($error) && !empty($error)){
                	?>
                		<div class="errorholder">
                			<span class="error"><?php echo $error;?></span>
                		</div>

                	<?php 
               			 }
                	?>

                    <h3>Campaigns</h3>
                    <a href="newcampaign"  class="blackbutton">Create New</a>
                    
                   	<table id="grid-basic" class="table table-condensed table-hover table-striped">
    						<thead>
					        <tr>
					            <th data-column-id="orderid" >Campaign ID</th>
					            <th data-column-id="cname">Campaign Name</th>
					              <th data-column-id="brandname">Brand Name</th>
					            <th data-column-id="sdate">Order Date</th>
					            <th data-column-id="edate">Total Budget</th>
					            <th data-column-id="total" data-sortable="false" >Status</th>
					            <th  data-column-id="detaillink" data-type="string"  data-sortable="false"></th>
					            <?php if($usertype == 2){ ?>
								<th  data-column-id="approvelink" data-type="string"  data-sortable="false"></th>
					            <?php } ?>
					        </tr>
					    	</thead>
					   		 <tbody>
					   		 <?php
					   		 foreach($orders as $order){
					   		 	if(!empty($order->orderid)) {
					   		 		$status = $order->status;
					   		 		if($status == 1){$class="green";} else {$class='';}
					   		 ?>
					   		 <tr>
					            <td><?php echo $order->orderid ?></td>
					            <td> - </td>
					            <td>Brand names here </td>
					            <td><?php echo $order->order_date ?></td>
					             <td>AED <?php echo $order->amount ?></td>
					            <td class="<?php echo $class ?>" ><?php if($order->status == 0 ) echo "Approval pending"; else echo "Approved";?></td>
					             <td><a href="<?php echo site_url()?>orders/details?oid=<?php echo $order->orderid?>&ut=1" data-id="<?php echo $order->orderid ?>">Details</a></td>
					             <?php if($usertype == 2){ ?>
 								<td><a href="javascript:void(0);" class="approveorder" data-id="<?php echo $order->orderid ?>">Sync</a></td>
					             <?php } ?>
					        	</tr>
					         
					   		 <?php 
					   			}} 
					   		?>
					      	  
					       </tbody>
					</table>
                    
                    
                </div><!-- content -->
            </div><!-- widgetbox -->
    
    <div class="one_third last">
    	
    </div><!--one_third last-->
    
    <br clear="all" />
    
</div><!--maincontent-->

<br />

