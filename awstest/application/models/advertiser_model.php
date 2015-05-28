<?php
class Advertiser_Model extends CI_Model{

	function __construct() {
        parent::__construct();
    }

    function insertAdvertiser($advertiser_info){
    	if(!isset($advertiser_info['username']) && empty($advertiser_info['username'])){
    		$uname = str_replace(" ","_",$advertiser_info['name']).rand(0,1000);
    	}else {
    		$uname = $advertiser_info['username'];
    	}
		$advertiser_data["username"] = $uname;
		$advertiser_data["email"] = $advertiser_info['email'];
		$advertiser_data["name"] = $advertiser_info['name'];
		$advertiser_data["email"] = $advertiser_info['email'];
		$advertiser_data["phone"] = $advertiser_info['phone'];
		$advertiser_data["fax"] = (isset($advertiser_info['fax'])?$advertiser_info['fax']:'');
		$advertiser_data["companyname"] = (isset($advertiser_info['companyname'])?$advertiser_info['companyname']:'');
		$advertiser_data["address"] = (isset($advertiser_info['address'])?$advertiser_info['address']:'');
		$advertiser_data["dfpid"] = '';
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
   		$password = substr(str_shuffle($chars),0,8);
		
    	//insert into user first
    	$sql = "INSERT INTO users (username,password,dateadded,usertype) values ('".$advertiser_data["username"]."','".$password."',now(),1)";
    	$query = $this->db->query($sql);
    	$userid = $this->db->insert_id();
    	$sql = "INSERT into advertiser (userid,name,email,phone,fax,address,dateadded,dfpid,companyname) values (".$userid.",'".$advertiser_data["name"]."',
    		'".$advertiser_data["email"]."','".$advertiser_data["phone"]."','".$advertiser_data["fax"]."','".$advertiser_data["address"]."',now(),'
			".$advertiser_data["dfpid"]."','".$advertiser_data["companyname"]."');";
		$query = $this->db->query($sql);
    	$userid = $this->db->insert_id();
    	return $userid;	
    }

    function checklogin($username,$password){
    	$sql = "SELECT * from users where username = ".$this->db->escape($username)." AND password = ".$this->db->escape($password)." limit 1;";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0){
		foreach ($query->result() as $row){	
    		return $row;
    		break;
    		
		}
		} else {
			return false;
		}
		
			

    }

    function getBrands($cat){
    	$sql = "select * from brands";
    	$query = $this->db->query($sql);
    	$brnads = array();
    	foreach ($query->result() as $row){	
    		$brands[] = $row;
    		
		}
		return $brands;
    }

    public function getAdType($brand){
    	$query =  $this->db->query("select * from ad_types where brand_id = $brand;");
		$adtypes = array();
		foreach ($query->result() as $row){	
    		$adtypes[] = $row;
   		}
	return $adtypes;
	}

	public function getAdDetails($ads,$advtid=''){
	 	$sql = "select ad_types.*,brands.brand_name as bname,brands.brand_url as burl,
				brands.id as brandid,creatives.id as creative_id from ad_types
				inner join brands on (brands.id = ad_types.brand_id)
				left join creatives on (ad_types.id = creatives.ad_type_id and creatives.advertiser_id = '".$advtid."')
				where ad_types.id in (".implode(",",$ads).") Group by ad_types.id";
		
		
		$query = $this->db->query($sql);
		$addetails = array();
		foreach ($query->result() as $row){	
    		$addetails[] = $row;
   		}
   		return $addetails;
	}

	public function adCreative($data){
		$creative_data[] = $data;
		$this->db->insert_batch('creatives', $creative_data); 
    	//$this->_db->insert("creatives",$data);	
		
	}
	public function updateCreative($data,$cid) {
		//$where = array("id"=>$cid);
		$this->db->where('id', $cid);
		$this->db->update("creatives",$data);	
	}
	public function getCreativeDetails($creativeid){
		$query = $this->db->query("select * from creatives where id = $creativeid;");
		$creatives = array();
		foreach ($query->result() as $row){	
    		$creatives[] = $row;
   		}
	return $creatives;
		
	}

	public function addOrderItem($orderitem,$orderid){

		$orderitemid = 	$this->db->insert_batch("order_items",$orderitem);	
		$orderitemid = $this->db->affected_rows();
		//update order total
		$sql = "select sum(item_cost) as total from order_items where order_id = '".$orderid."' Group by order_id";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){	
    		$amount = $row->total;
    		break;
   		}
		$query = $this->db->query("update dfp.order set amount = '".$amount."' where orderid = '".$orderid."';");
		return $orderitemid;

	}

	public function addorder($data){
		$order_data[] = $data;
		$this->db->insert_batch('order', $order_data); 
		$orderids = $this->db->affected_rows();
	}

	public function get_advertiser($id){

		$sql= "SELECT * from advertiser where userid = $id";
		$query = $this->db->query($sql);
    	$userdata = array();
    	foreach ($query->result() as $row){	
    		$userdata[] = $row;
    		
		}
		return $userdata[0];
	}

	public function getMyOrders($userid=''){
		if(empty($userid)){
			 $sql= "SELECT * from dfp.order";	
		} else {
			$sql= "SELECT * from dfp.order where advertiser_id = $userid";
		}
		
		$query = $this->db->query($sql);
	    $orderdata = array();
	    foreach ($query->result() as $row){	
	    	$orderdata[] = $row;
	    	
		}
		return $orderdata;

	}

	public function getAdunitDetails($unitid){
		$sql= "SELECT * from dfp.adunits where id = $unitid";
		$query = $this->db->query($sql);
	    $unitdata = array();
	    foreach ($query->result() as $row){	
	    	$unitdata[] = $row;
	    	
		}
		return $unitdata;


	}
}