<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adpub extends CI_Controller {

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
		$orders = $this->advertiser_model->getMyOrders();
		$data['usertype'] = 2 ;

		$data['orders'] = $orders;
		$this->load->view('header');
		$this->load->view('advertiser/dashboard',$data);
		$this->load->view('footer');
	}

	public function approveorder(){
		$orderid = $_GET['oid'];

		$this->load->library('gahelper');
		$this->gahelper->createServiceObject("OrderService");

		//get order details
		$orderdata = $this->order_model->getOderDetails($orderid);
		
		$orderdfp = array();
		foreach ($orderdata as $odata) {
			
  			$orderdfp['totalBudget'] = $odata->amount;
  			$orderdfp['notes'] = "";
  			$orderdfp['internal_id'] = $odata->id;
  			$orderdfp['dfp_id'] = $odata->dfpid;
		}
		if(empty($orderdfp['dfp_id'])){
			$dfporderid =  $this->gahelper->createOrder($orderdfp);
			$this->order_model->updateOrder($dfporderid,$orderid);
			$lineitesmData = $this->order_model->getOrderitemsDetails($orderid);
			$lineitesmData = $this->order_model->getOrderitemsDetails($orderid);
			$this->gahelper->createServiceObject("LineItemService");
			$retdata = $this->gahelper->createLineItem($lineitesmData,$dfporderid);
		} else {
			//just get status and update it
			$orderData = $this->gahelper->syncOrder($orderdfp['dfp_id']);
			if(!empty($orderData)){
				//update order in lccal system
				$this->order_model->updateOrderDetails($orderid,$orderData);

			}

		}
		//$this->gahelper->approveOrders($dfporderid);
		
		//get lineitem details




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
			$html.= '<td class="aligncenter"><a class="add-to-cart button green buynow"  href="buyad/?id='.$ad->id.'"><span><em>Buy</em></span></a></td>';
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
	$addetails = $this->advertiser_model->getAdDetails($ads);
	$data['ads'] = $addetails;
	$advertdetails = $this->advertiser_model->get_advertiser($data['cuser']);
	$data['advertiser_details'] = $advertdetails;
	$this->load->view('header');
	$this->load->view('campaign/step4',$data);
	$this->load->view('footer');

}

public function uploadcreative(){
		$data['cuser'] = $this->session->userdata('advtid');
		$adid =  $_GET['id'];	
		
		$ads = array($adid);
		$addetails = $this->advertiser_model->getAdDetails($ads);
		$data['ads'] = $addetails;
		$data['action'] = "upload_creative";
		$this->load->view('header');
		$this->load->view('campaign/step5',$data);
		$this->load->view('footer');
		
		
}
public function editcreative(){
	$data['cuser'] = $this->session->userdata('advtid');
	$creativeid =  $_GET['cid'];	
	$creativedetails = $this->advertiser_model->getCreativeDetails($creativeid);
	$ad_id = $creativedetails[0]->ad_type_id;
	$ads = array($ad_id);
	$addetails = $this->advertiser_model->getAdDetails($ads);
	
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
		$adid = 	$_POST['adid'];
		$ads = array($adid);
		$addetails = $this->advertiser_model->getAdDetails($ads);

		$adwidth = $addetails[0]->width;
		$adheight = $addetails[0]->height;
		$alt_text = $_POST['alt_text'];
		$link = $_POST['link'];
		$action = $_POST['action'];;

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
		    		//insert into DB
		    		$this->advertiser_model->adCreative($creative_data);
		    		$ads = $this->session->userdata('adis');
    				$ads = explode(",", $ads);
    				print_r($ads);
    				exit;
					//get ad details
					$addetails = $this->advertiser_model->getAdDetails($ads);
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
			$addetails = $this->advertiser_model->getAdDetails($ads);

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
				$addetails = $this->advertiser_model->getAdDetails($ads);
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



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */