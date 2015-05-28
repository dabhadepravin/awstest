jQuery(document).ready(function () {
	 // jQuery("#adschedule").daterangepicker();
		jQuery("#btn_step1").click(function () {
			window.location.href = 'http://localhost/dfp/step2'; 
		});
	jQuery(".brandlink").click(function(){
		var bid = jQuery(this).attr("brandid");
		 jQuery( "#dialog_"+bid ).dialog( "open" );
			jQuery.ajax({
				url: "advertiserajax?bid="+bid}).done(function(response){
				jQuery(".b_adunits_"+bid).html(response);
				});
		});
		 jQuery(".creative-upload-form").click(function () {
		 	jQuery( ".upload-popup" ).dialog("close");
		 		
		 });

		 
		 jQuery(".approveuser").click(function () {
		 		var loadimage = "<img src='"+site_url+"public/images/loader.gif' style='width:20px;height:20px;' />";
		 		jQuery(this).find(".status").html(loadimage);
		 		var uid = jQuery(this).attr("data-uid");
		 		jQuery.ajax({
				url: site_url+"administrator/apporveuser?uid="+uid}).done(function(response){
					window.location.reload();
				});
		 		
		 });

		 jQuery(".approveorder").click(function () {
		 		var loadimage = "<img src='"+site_url+"public/images/loader.gif' style='width:20px;height:20px;' />";
		 		jQuery(this).parent().prev().prev().html(loadimage);
		 		var oid = jQuery(this).attr("data-id");
		 		jQuery.ajax({
				url: site_url+"administrator/approveorder?oid="+oid}).done(function(response){
					window.location.reload();
				});
		 		
		 });
		 
		jQuery(".creative-upload").click(function(){
			var unitid = jQuery(this).attr("data-unit-id");
			jQuery( "#upload_win_"+unitid).show();

		});


		var _URL = window.URL || window.webkitURL;

		jQuery(".creativefileupload").change(function(e) {
			var v_width = jQuery(this).attr("c_width");
			var v_height = jQuery(this).attr("c_height");
			var unitid = jQuery(this).attr("data_u_id");
   			 var file, img;
	   		if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function() {
	            
	            if(v_width != this.width && v_height != this.height){
	            	
	            	jQuery("#error_"+unitid + " span").html("<strong>Please update correct size images</strong>");
	            	jQuery("#error_"+unitid).show();
	            }
	        };
	        img.onerror = function() {
	            alert( "not a valid file: " + file.type);
	        };
	        img.src = _URL.createObjectURL(file);
		    }	

		});

		jQuery(".pfileupload").change(function(e) {
			var v_width = jQuery(this).attr("c_width");
			var v_height = jQuery(this).attr("c_height");
			
   			 var file, img;
	   		if ((file = this.files[0])) {
	        img = new Image();
	        img.onload = function() {
	            
	            if(v_width != this.width && v_height != this.height){
	            	
	            	jQuery(".error-div-upload span").html("<strong>Please update correct size images</strong>");
	            	jQuery(".error-div-upload").show();
	            }
	        };
	        img.onerror = function() {
	            alert( "not a valid file: " + file.type);
	        };
	        img.src = _URL.createObjectURL(file);
		    }	

		});

		 jQuery(".checkoutlnk").click(function () {
		 		
		 		jQuery("#ordertotal").html("AED " + jQuery("#totalcost").val());
		 		jQuery( "#dialog_checkout").dialog( "open" );
		 });
		 jQuery(".removetr").click(function(){

		 	jQuery(this).parent().parent().remove();
		 });
		 jQuery(".blkadtypebtn").click(function(){
		 	jQuery(".cartholder").show();
		 	var ad_type = jQuery(this).attr("data-ad-type");
		 	var item_cost =  jQuery(this).attr("data-ad-c");
		 	var imp_val = jQuery("#"+ad_type+"-sel").val();
		 	var cost = (imp_val*item_cost) ;
		 	var str = ad_type +"|"+item_cost+"|"+imp_val; 
		 	var html = '';
		 	html = "<tr><td><input type='hidden' name='"+ad_type+"-val' class='rowval' value='"+str+"' />"+ad_type+"</td><td>"+(imp_val*1000)+"</td><td>"+item_cost+"</td><td>"+cost+"</td><td><a class='removetr' href='javascript:void(0);'>Remove</a></td>";
		 	
		 	jQuery(".carttable").append(html);

		 });
		 jQuery( "#payform").submit(function( event ) {
  			event.preventDefault();
  			var payformdata = JSON.stringify(jQuery(this).serializeArray());
  			jQuery("#payformdata").val(payformdata);
  			jQuery("#buybulkad").submit();
 			
		 });
		  jQuery( "#payformpre").submit(function( event ) {
  			event.preventDefault();
  			var payformdata = JSON.stringify(jQuery(this).serializeArray());
  			jQuery("#payformdata").val(payformdata);
  			jQuery("#buybulkad").submit();
 			
		 });
		 jQuery(".confirm_checkout-pre").click(function () {

		 		//var payformdata = jQuery("#payform").serialize();
		 		//alert(payformdata);
		 		//jQuery("#payformdata").val(payformdata);
		 		jQuery("#payformpre").submit();
		 });		
		
		 jQuery(".confirm_checkout").click(function () {

		 		//var payformdata = jQuery("#payform").serialize();
		 		//alert(payformdata);
		 		//jQuery("#payformdata").val(payformdata);
		 		jQuery("#payform").submit();
				/*jQuery( "#dialog_checkout").dialog( "close" );
		 		//post data for checkout
		 		var orders =[];
		 		var i = 0;
		 		var adata = [];

		 		adata = {c123uhq: jQuery("#c123uhq").val()};

		 		orders.push(adata);
		 		jQuery("table.checkouttbl tr").each(function () {
		 			var order = [];
		 			var ad_id = jQuery(this).attr("data-id");
		 			if(ad_id > 0){
		 			var qty = jQuery(this).find("#qty").val();
		 			var date_range = jQuery(this).find("#daterange_1").val();
		 			order ={ad_id: ad_id,qty:qty,daterange:date_range};
		 			orders.push(order);
		 			
		 			i++;
		 		}
		 		});
		 		console.log(orders);
		 		var formdata = JSON.stringify(orders);
		 		jQuery.post(site_url+"advertiser/checkout", { data:formdata })
  				.done(function( data ) {
  					console.log(data);
    				//window.location.href = site_url+"advertiser/dashboard?ret=success" ;
  				});*/
		});
	
	jQuery(".qtyselect").change(function(){
		var datacost = jQuery(this).attr("data-cost");
		var ad_id = jQuery(this).attr("data-id");
		jQuery( ".qtyselect option:selected" ).each(function() {
			var  qty = jQuery(this).val();
			if(qty != 0){
				var cost = qty * datacost;			
				 jQuery( "#tcost_"+ad_id ).val(cost);
				 jQuery( "#cost_"+ad_id ).text("AED " + cost);
				 var totalcost= 0;
				 jQuery(".tcost").each(function () {
				 	totalcost = totalcost + parseInt( jQuery(this).val());
				 });
				  jQuery(".totalCost").text("AED " + totalcost);
				   jQuery( "#totalcost" ).val(totalcost);
				  
					 
			}
			 
		 });
		 
		 jQuery("#totalspan").show();
	});
		
});

jQuery(function() {
   jQuery( ".branddialog" ).dialog({
   	width:700,
   	height:400,
      autoOpen: false
     });
   /*jQuery( ".upload-popup" ).dialog({
   	width:700,
   	height:400,
      autoOpen: false
     });*/

  jQuery('.addaterange').daterangepicker({timePicker:true,format:'MM/DD/YYYY h A'});

        });

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}