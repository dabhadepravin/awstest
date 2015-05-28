<div id="container">
	<div>
				<div class="top-app-nav-right">
<div style="float:right"><h4>
	<a style="padding:10px;" href="<?php echo site_url()?>administrator/dashboard">Back to Dashboard</a>

</h2></div>
				</div>
            	<h1>User Details</h1>
            	<div class="content">
                	<div>
                		<p><strong>User id:</strong> <?php echo $userinfo[0]->id ?></p>
                		<p><strong>DFP id: </strong><?php echo $userinfo[0]->dfpid ?></p>
                		<p><strong>Username:</strong> <?php echo $userinfo[0]->username ?></p>
                		<p><strong>Name: </strong><?php echo $userinfo[0]->name ?></p>
                		<p><strong>Email:</strong> <?php echo $userinfo[0]->email ?></p>
                		<p><strong>Phone:</strong> <?php echo $userinfo[0]->phone ?></p>
                		<p><strong>Fax: </strong><?php echo  $userinfo[0]->fax ?></p>
                		<p><strong>Address: </strong><?php echo  $userinfo[0]->address ?></p>
                		<p><strong>Company:</strong> <?php echo  $userinfo[0]->companyname ?></p>
                	</div>
                	<div class="hr clear"></div>
                	<?php
                	if($orders){ 
                		
                	?>
                	<table id="campaign-table" class="grid-basic table table-condensed table-hover table-striped">
    						<thead>
					        <tr>
					            <th data-column-id="orderid" >Campaign ID</th>
					            <th data-column-id="cname">Campaign Name</th>
					              <th data-column-id="brandname">Brand Name</th>
					            <th data-column-id="sdate">Order Date</th>
					            <th data-column-id="edate">Total Budget</th>
					            <th data-column-id="total" data-sortable="false" >Status</th>
					            <th  data-column-id="detaillink" data-type="string"  data-sortable="false"></th>
					            <th  data-column-id="reportlink" data-type="string"  data-sortable="false"></th>
					           
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
					             <td><a href="<?php echo site_url()?>orders/details?oid=<?php echo $order->orderid?>&ut=2" data-id="<?php echo $order->orderid ?>">Details</a></td>
					             <td><a href="<?php echo site_url()?>orders/details?oid=<?php echo $order->orderid?>&ut=2" data-id="<?php echo $order->orderid ?>">Report</a></td>
					            
					        	</tr>
					         
					   		 <?php 
					   			}} 
					   		?>
					      	  
					       </tbody>
					</table>
					
					<?php } 
					?>
				</div>	
                </div>
    </div>
</div>                	