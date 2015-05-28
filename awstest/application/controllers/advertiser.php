<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertiser extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
        parent::__construct();
         $this->load->model('advertiser_model');
         $this->load->model('order_model');
           $this->load->model('order_model');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('advertiser/welcome_message');
		$this->load->view('footer');
	}

	public function dashboard(){
		$data['cuser'] = $this->session->userdata('advtid');
		//get users orders
		$orders = $this->advertiser_model->getMyOrders($data['cuser']);
		$data['usertype'] =1 ;
		$data['orders'] = $orders;
		$this->load->view('header');
		$this->load->view('advertiser/dashboard',$data);
		$this->load->view('footer');
	}

	public function newcampaign(){

		$data['cuser'] = $this->session->userdata('advtid');
		$this->load->view('header');
		$this->load->view('campaign/step2');
		$this->load->view('footer');
	}
	public function step3(){
		$data['cuser'] = $this->session->userdata('advtid');
		$cat = $_GET['cat'];
		$brands = $this->advertiser_model->getBrands($cat);
		$data['brands'] = $brands;
		$this->load->view('header');
		$this->load->view('campaign/step3',$data);
		$this->load->view('footer');
	}

	public function advertiserajax(){
	if(isset($_GET['bid'])){
		$bid = $_GET['bid'];
		$adtypes = $this->advertiser_model->getAdType($bid);
		$html = '';
		$html.='<div class="zonegroup cf">';
		$html.= '<table class="zone-listing">'; 
		$html.= '<tbody>';
		foreach($adtypes as $ad){ 
			$html.= '<tr class=" soldout">';
			$html.= '<td>'.$ad->ad_type.'<br>'.$ad->position.'<br>'.$ad->width.'px '.$ad->height.'px '.'</td>';
			$html.= '<td class="aligncenter">'.$ad->estimated_impressions.'<br>Est.Impressions</td>';
			$html.= '<td class="aligncenter" >'.$ad->ad_units.' <br>Available</td>';
			$html.= '<td class="aligncenter"><a class="add-to-cart button green buynow"  href="buyad/?id='.$ad->id.'&bid='.$bid.'"><span><em>Buy</em></span></a></td>';
			$html.= '</tr>';
		 }
		 $html.= '</tbody>';
		 $html.= '</table>';
		 $html.= '</div>';
		 echo 	$html;
		 exit;
	}
	
}

public function buyad(){
	$data['cuser'] = $this->session->userdata('advtid');
	//@session_start();
	$brandid = $_GET['bid'];
	$ads = explode(",",$this->session->userdata('adis')); //$_SESSION['adis'];
	$adid =  $_GET['id'];
	if(!empty($adid))
		$ad_ids[]  = $adid;
	for($i=0;$i<count($ads);$i++){
		$ad_ids[] = $ads[$i];
	}
	
	$this->session->set_userdata('adis',implode(",",array_filter(array_unique($ad_ids))));
	$ads = explode(",",$this->session->userdata('adis')); //$_SESSION['adis'];
	
	//get ad details
	$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);

	$data['ads'] = $addetails;

	$data['unitid'] = $adid;
	$data['brandid'] = $brandid;
	//$advertdetails = $this->advertiser_model->get_advertiser($data['cuser']);
	//$data['advertiser_details'] = $advertdetails;
	$this->load->view('header');
	$this->load->view('campaign/step4',$data);
	$this->load->view('footer');

}

public function buybulkad(){
	$adtype = $_GET['adtype'];

	$data['cuser'] = $this->session->userdata('advtid');
	//@session_start();
	$ads = explode(",",$this->session->userdata('adis')); //$_SESSION['adis'];
	$adid =  $_GET['id'];
	if(!empty($adid))
		$ad_ids[]  = $adid;
	for($i=0;$i<count($ads);$i++){
		$ad_ids[] = $ads[$i];
	}
	
	$this->session->set_userdata('adis',implode(",",array_filter(array_unique($ad_ids))));
	$ads = explode(",",$this->session->userdata('adis')); //$_SESSION['adis'];
	
	//get ad details
	$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);
	$data['ads'] = $addetails;
	$advertdetails = $this->advertiser_model->get_advertiser($data['cuser']);
	$data['advertiser_details'] = $advertdetails;
	$this->load->view('header');
	$this->load->view('campaign/step4',$data);
	$this->load->view('footer');

}

public function processorder(){
	$hp_val = $mpu_val = $lb_val = '';
	$orders = array();
	if(isset($_POST['hp-val']) && !empty($_POST['hp-val'])){
		$hp_val = $_POST['hp-val'];
		$o_temp = array();
		$temp = explode("|", $hp_val);
		$o_temp['adtype'] = $temp[0];
		$o_temp['itemprice'] = $temp[1];
		$o_temp['qty'] = $temp[2]*1000;
		$o_temp['unitid'] = 3;
		$orders[] = $o_temp;

	}
	if(isset($_POST['lb-val']) && !empty($_POST['lb-val'])){
		
		$lb_val = $_POST['lb-val'];
		$o_temp = array();
		$temp = explode("|", $lb_val);
		$o_temp['adtype'] = $temp[0];
		$o_temp['itemprice'] = $temp[1];
		$o_temp['qty'] = $temp[2]*1000;
		$o_temp['unitid'] = 2;
		$orders[] = $o_temp;

	}
	if(isset($_POST['mpu-val']) && !empty($_POST['mpu-val'])){
		$mpu_val = $_POST['mpu-val'];
		$o_temp = array();
		$temp = explode("|", $mpu_val);
		$o_temp['adtype'] = $temp[0];
		$o_temp['itemprice'] = $temp[1];
		$o_temp['qty'] = $temp[2]*1000;
		$o_temp['unitid'] = 1;
		$orders[] = $o_temp;
	}

	foreach($orders as $order){

		//get ad unit details
		$units = $this->advertiser_model->getAdunitDetails($order['unitid']);
		foreach($units as $unit){
		$unit->itemprice = $order['itemprice'];
		$unit->qty = $order['qty'];
		$data['units'][] = $unit ;
	}
		

	}
	if(isset($_POST['advertise_type']) && !empty($_POST['advertise_type'])){
		$data['advertise_type'] = $_POST['advertise_type'];
	} else {
		$data['advertise_type'] = '';
	}
		$this->load->view('header');
		$this->load->view('campaign/bulkbuy',$data);
		$this->load->view('footer');
	

}

public function processpremiumad(){

$orderdata = array();

$orderdata['amount'] = $_POST['totalcost'];

if(isset($_POST['unitid']) && count($_POST['unitid']) > 0){
	$dataRangearr = $_POST['daterange'];
	$unitidarr = $_POST['unitid'];
	$alt_textarr = $_POST['alt_text'];
	$tcostarr = $_POST['itemcostperk'];
	$qtyarr = $_POST['qty'];
	$filenamearr = $_FILES['file']['name'];
	$fileTempnamearr = $_FILES['file']['tmp_name'];
	$linkarr = $_POST['link'];
	//get paydata
	$paydata = json_decode($_POST['payformdata']);
	$allowed_fields = array("customername","customeremail","customerphone","companyname");
	foreach ($paydata as $p_data) {
	if(in_array($p_data->name, $allowed_fields))	
		$orderdata[$p_data->name] = $p_data->value;
	}
	$advertiser_info = array();
	$advertiser_info['name'] = $orderdata['customername'] ;
	$advertiser_info['email'] = $orderdata['customeremail'] ;
	$advertiser_info['phone'] = $orderdata['customerphone'] ;
	$advertiser_info['companyname'] = $orderdata['companyname'] ;

	$this->advertiser_model->insertAdvertiser($advertiser_info);
	/*$orderdata['ccno'] = $paydata[3]->value;
	$orderdata['expdate'] = $paydata[4]->value."/".$paydata[5]->value;
	$orderdata['ccv'] = $paydata[6]->value;*/
	$orderdata['orderid'] = date("YmdHis"); 
	$orderdata['order_date'] = date("Y-m-d H:i:s"); 
	$orderdata['status'] = 0; 
	$order_items=array();
	for($i=0;$i<count($_POST['unitid']);$i++){
		$order = array();
		$order['brand_id'] = $_POST['brandid'];
		$order['unitid'] = $unitidarr[$i];
		$order['daterange'] = $dataRangearr[$i];
		$order['alt_text'] = $alt_textarr[$i];
		$order['tcost'] = $tcostarr[$i] * $qtyarr[$i] ;
		$order['qty'] = $qtyarr[$i];
		$order['link'] = $linkarr[$i];
		$filename = $filenamearr[$i];
		$tempfilename = $fileTempnamearr[$i];
		$target_file = str_replace(" ","-",getcwd()."/public/creatives/".$filename);
		@move_uploaded_file($tempfilename, $target_file);
		if(!empty($filename))
			$order['filename'] = $target_file;

		$order_items[] = $order;

	}
	
	//create order
	$internalOrderid = $this->order_model->insertOrder($orderdata);
	
	if(!empty($internalOrderid)){

		//insert order item
		$this->order_model->insertOrderItem($order_items,$orderdata['orderid'],"premium");	
	}
	$this->session->unset_userdata('adis');
	$data['orderno'] = $orderdata['orderid'];
	$this->load->view('header');
	$this->load->view('campaign/success',$data);
	$this->load->view('footer');

}


}

public function processbulkad(){


$orderdata = array();

$orderdata['amount'] = $_POST['totalcost'];
if(isset($_POST['unitid']) && count($_POST['unitid']) > 0){
	$dataRangearr = $_POST['daterange'];
	$unitidarr = $_POST['unitid'];
	$alt_textarr = $_POST['alt_text'];
	$tcostarr = $_POST['tcost'];
	$qtyarr = $_POST['qty'];
	$filenamearr = $_FILES['file']['name'];
	$fileTempnamearr = $_FILES['file']['tmp_name'];
	$linkarr = $_POST['link'];
	if(isset($_POST['advertiser_type']))
		$advertiser_type = $_POST['advertiser_type'];
	else
		$advertiser_type = '';
	//get paydata
	$paydata = json_decode($_POST['payformdata']);
	
	$allowed_fields = array("customername","customeremail","customerphone","companyname");
	foreach ($paydata as $p_data) {
	if(in_array($p_data->name, $allowed_fields))	
		$orderdata[$p_data->name] = $p_data->value;
	}
	/*$orderdata['ccno'] = $paydata[3]->value;
	$orderdata['expdate'] = $paydata[4]->value."/".$paydata[5]->value;
	$orderdata['ccv'] = $paydata[6]->value;*/
	$orderdata['orderid'] = date("YmdHis"); 
	$orderdata['order_date'] = date("Y-m-d H:i:s"); 
	$orderdata['status'] = 0; 
	$orderdata['ordertype'] = $advertiser_type;
	$advertiser_info = array();
	$advertiser_info['name'] = $orderdata['customername'] ;
	$advertiser_info['email'] = $orderdata['customeremail'] ;
	$advertiser_info['phone'] = $orderdata['customerphone'] ;
	$advertiser_info['companyname'] = $orderdata['companyname'] ;
	$this->advertiser_model->insertAdvertiser($advertiser_info);
	$order_items=array();
	for($i=0;$i<count($_POST['unitid']);$i++){
		$order = array();
		$order['unitid'] = $unitidarr[$i];
		$order['daterange'] = $dataRangearr[$i];
		$order['alt_text'] = $alt_textarr[$i];
		$order['tcost'] = $tcostarr[$i];
		$order['qty'] = $qtyarr[$i];
		$order['link'] = $linkarr[$i];
		$filename = $filenamearr[$i];
		$tempfilename = $fileTempnamearr[$i];
		$target_file = str_replace(" ","-",getcwd()."/public/creatives/".$filename);
		@move_uploaded_file($tempfilename, $target_file);
		if(!empty($filename))
			$order['filename'] = $target_file;

		$order_items[] = $order;

	}
	
	//create order
	$internalOrderid = $this->order_model->insertOrder($orderdata);
	
	if(!empty($internalOrderid)){

		//insert order item
		$this->order_model->insertOrderItem($order_items,$orderdata['orderid']);	
	}
	$this->session->unset_userdata('adis');
	$data['orderno'] = $orderdata['orderid'];
	$this->load->view('header');
	$this->load->view('campaign/success',$data);
	$this->load->view('footer');

}


}
public function uploadcreative(){
		$data['cuser'] = $this->session->userdata('advtid');
		$adid =  $_GET['id'];	
		$brand_id = $_GET['bid'];
		$data['brandid'] = $brand_id;
		$ads = array($adid);
		$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);
		$data['ads'] = $addetails;
		$data['action'] = "upload_creative";
		$this->load->view('header');
		$this->load->view('campaign/step5',$data);
		$this->load->view('footer');
		
		
}
public function editcreative(){
	$data['cuser'] = $this->session->userdata('advtid');
	$brand_id = $_GET['bid'];
	$data['brandid'] = $brand_id;
	$creativeid =  $_GET['cid'];	
	$creativedetails = $this->advertiser_model->getCreativeDetails($creativeid);
	$ad_id = $creativedetails[0]->ad_type_id;
	$ads = array($ad_id);
	$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);
	
	$data['ads'] = $addetails;
	$data['creatives'] = $creativedetails; 
	$data['creative_id'] = $creativeid;
	$data['action'] = "edit_creative";
	$this->load->view('header');
	$this->load->view('campaign/step5',$data);
	$this->load->view('footer');	
	
	}

public function uploaddata(){
		$data['cuser'] = $this->session->userdata('advtid');
		
		if(isset($_POST)) {
		$data['brandid'] = $_POST['brandid'];
		$adid = 	$_POST['adid'];
		$ads = array($adid);
		$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);

		$adwidth = $addetails[0]->width;
		$adheight = $addetails[0]->height;
		$alt_text = $_POST['alt_text'];
		$link = $_POST['link'];
		$action = $_POST['action'];
		//$advertdetails = $this->advertiser_model->get_advertiser($data['cuser']);
		//$data['advertiser_details'] = $advertdetails;

		if($action == "upload_creative"){
		    	$imginfo = getimagesize($_FILES["file"]["tmp_name"]);
		    	$width = $imginfo[0];
		    	$height = $imginfo[1];
		    	$image_error = false;
		    	
		    	if(($adwidth != $width) && ($adheight != $height) ){
		    		$image_error  = true;
		    		$data['error'] = "Invalid Image size";
		    		$data['alt_text'] = $alt_text;
		    		$data['link'] = $link;
		    		$data['adid'] = $adid;
		    		$this->load->view('header');
					$this->load->view('campaign/step5',$data);
					$this->load->view('footer');
		    	} else {
		    		$target_file = str_replace(" ","-",getcwd()."/public/creatives/".$_FILES["file"]['name']);
		    		@move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
		    	   	// insert data
		    	   
		    		$creative_data['brand_id'] = $addetails[0]->brandid;
		    		$creative_data['file_name']  = $_FILES["file"]['name'];
		    		$creative_data['ad_type_id'] = $adid;
		    		$creative_data['width'] = $width;
		    		$creative_data['height'] = $height;
		    		$creative_data['alt_text'] = $alt_text;
		    		$creative_data['url'] = $link;
		    		$creative_data['dateadded'] = date("Y-m-d H:i:s"); 
		    		$creative_data['active'] = 1;
		    		$creative_data['advertiser_id'] = $data['cuser'];
		    		//insert into DB
		    		$this->advertiser_model->adCreative($creative_data);
		    		$ads = $this->session->userdata('adis');
    				$ads = explode(",", $ads);
    				
					//get ad details
					$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);
					$data['ads'] = $addetails;
					$this->load->view('header');
					$this->load->view('campaign/step4',$data);
					$this->load->view('footer');

		    	}	
    	} else if($action == "edit_creative"){
    			$cid = 	$_POST['creative_id'];
			if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){
				$imginfo = getimagesize($_FILES["file"]["tmp_name"]);
		    	$width = $imginfo[0];
		    	$height = $imginfo[1];
		    	$image_error = false;
		    	
		    	if(($adwidth != $width) && ($adheight != $height) ){
		    		$image_error  = true;
		    		$data['error'] = "Invalid Image size";
		    		$data['alt_text'] = $alt_text;
		    		$data['link'] = $link;
		    		$data['adid'] = $adid;
		    		$this->load->view('header');
					$this->load->view('campaign/step5',$data);
					$this->load->view('footer');
		    	} else {
		    		$target_file = str_replace(" ","-",getcwd()."/public/creatives/".$_FILES["file"]['name']);
		    		@move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
		    	   	// insert data
		    	   	;
		    		$creative_data['brand_id'] = $addetails[0]->brandid;
		    		$creative_data['file_name']  = $_FILES["file"]['name'];
		    		$creative_data['ad_type_id'] = $adid;
		    		$creative_data['width'] = $width;
		    		$creative_data['height'] = $height;
		    		$creative_data['alt_text'] = $alt_text;
		    		$creative_data['url'] = $link;
		    		$creative_data['dateadded'] = date("Y-m-d H:i:s"); 
		    		$creative_data['active'] = 1;
		    //		$creative_date['cid'] = $cid;
		    		$this->advertiser_model->updateCreative($creative_data,$cid);			
			}    	
    	}else{
    				$creative_data['brand_id'] = $addetails[0]->brandid;
		    	//	$creative_data['file_name']  = $_FILES["file"]['name'];
		    		$creative_data['ad_type_id'] = $adid;
		    		//$creative_data['width'] = $width;
		    		//$creative_data['height'] = $height;
		    		$creative_data['alt_text'] = $alt_text;
		    		$creative_data['url'] = $link;
		    		$creative_data['dateadded'] = date("Y-m-d H:i:s"); 
		    		$creative_data['active'] = 1;
		    		$this->advertiser_model->updateCreative($creative_data,$cid);			
    	
    	}
    				$ads = $this->session->userdata('adis');
    				$ads = explode(",", $ads);
    				
			//get ad details
			$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);

			$data['ads'] = $addetails;
			
			 
			$advertdetails = $this->advertiser_model->get_advertiser($data['cuser']);
			$data['advertiser_details'] = $advertdetails;
			$this->load->view('header');
			$this->load->view('campaign/step4',$data);
			$this->load->view('footer');
    }
    		
    		
    
    	
    	
		}
			
	}

	public function checkout(){

		
		if(isset($_POST['data'])){

			$formdata = json_decode($_POST['data']);
			$dataitems  = array();
			$returnids = array();
			
			$orderid = "temp".time();
			//store order first
			//user  details 
			$advtid  =  $formdata[0]->c123uhq;
			//create  order 
		
			$orderdata['orderid'] = $orderid;
			$orderdata['advertiser_id'] = $advtid;
			$orderdata['order_date'] = date("Y-m-d H:i:s");
			$orderdata['status'] = 0;
			$this->advertiser_model->addorder($orderdata);
			for($i=1;$i<count($formdata);$i++){	
			//foreach($formdata[1] as $data){
				$ad_id = $formdata[$i]->ad_id;
				$qty = $formdata[$i]->qty;
				$ads = array($ad_id);
				$addetails = $this->advertiser_model->getAdDetails($ads,$data['cuser']);
				foreach($addetails as $ad){
					$cost = $ad->cost;
					$ad_id = $ad->id;
					$brand_id = $ad->brandid;
					$creative_id = $ad->creative_id;
					$item_qty = $qty;
					$dataitem = array();
					$dataitem['order_id'] = $orderid; 
					$dataitem['creative_id'] = $ad->creative_id;
					$dataitem['brand_id'] = $ad->brandid;
					$dataitem['ad_type_id'] = $ad->id;
					$dataitem['item_value'] = $cost;
					$dataitem['qty'] = $qty;
					$dataitem['item_cost'] = $qty * $cost;
					$dataitem['datecreated'] =  date("Y-m-d H:i:s");
					$dataitems[] = $dataitem;

				}
				
			}

			$order_itemid  = $this->advertiser_model->addOrderItem($dataitems,$orderid);
			echo	base64_encode(implode("|", $returnids));
		}
		exit;
		
	}

	public function bulkads(){
		$this->load->library('gahelper');
		$this->gahelper->createServiceObject("InventoryService");
		$adunits = array();
		//$adunits =$this->gahelper->getAdunitsDFP();
		$data['adunits'] = 
		$adunits = array();;
//
		$this->load->view('header');
		$this->load->view('campaign/bulkads',$data);
		$this->load->view('footer');

	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */