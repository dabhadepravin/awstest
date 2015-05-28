<?php
class Order_Model extends CI_Model{

	function __construct() {
        parent::__construct();
    }

  public function getOrderitemsDetailsprem($orderid){
	 $sql = "select oi.id as liid,oi.order_id as liorderid,oi.creative_id as li_creativeid,
  				oi.brand_id as li_brandid, oi.ad_type_id as li_adtypeid, oi.qty as li_qty,oi.item_value as li_itemvalue,
  				oi.item_cost as li_itemcost,oi.datecreated as li_datecreated,oi.advertiser_id as li_advertiser_id,
  				oi.startdate as li_startdate, oi.enddate as li_enddate,oi.status as li_status,
  				b.brand_name as li_brandname, b.brand_url as li_brand_url, b.brand_logo_url as li_brandlogourl,
  				c.file_name as li_creativefilename,c.width as li_creativewidth, c.height  as li_creativeheight,
  				c.url as licreativeurl,c.alt_text as li_creativealttext,
  				adt.ad_type as li_adtype,adt.position as li_adtposition,adt.costperk as li_adtcost
				from order_items as oi 
			inner join brands b on (b.id = oi.brand_id)
			inner join creatives c on (c.id = oi.creative_id)
			inner join ad_types  adt on (adt.id = oi.ad_type_id)
			where order_id = '".$orderid."'";
	
   	$query = $this->db->query($sql);
	$orders = array();
		foreach ($query->result() as $row){	
    		$orders[] = $row;
   		}

   	return $orders;

   }
   public function getOrderitemsDetails($orderid){
	 $sql = "select oi.id as liid,oi.order_id as liorderid,oi.creative_id as li_creativeid,
  				 oi.ad_type_id as li_adtypeid, oi.qty as li_qty,oi.item_value as li_itemvalue,
  				oi.item_cost as li_itemcost,oi.datecreated as li_datecreated,
  				oi.startdate as li_startdate, oi.enddate as li_enddate,oi.status as li_status,
  				c.file_name as li_creativefilename,c.width as li_creativewidth, c.height  as li_creativeheight,
  				c.url as licreativeurl,c.alt_text as li_creativealttext,
  				adt.name as li_adunitname,adt.costperk as li_adtcost
				from order_items as oi 
			
			inner join creatives c on (c.id = oi.creative_id)
			inner join adunits  adt on (adt.id = oi.ad_type_id)
			where order_id = '".$orderid."'";
	
   	$query = $this->db->query($sql);
	$orders = array();
		foreach ($query->result() as $row){	
    		$orders[] = $row;
   		}

   	return $orders;

   }  

   public function getOderDetails($orderid){
   	$sql="Select * from dfp.order where orderid = '".$orderid."' ";
 	$query = $this->db->query($sql);
	$orders = array();
		foreach ($query->result() as $row){	
    		$orders[] = $row;
   		}

   	return $orders;

   }

   public function updateOrder($dfpid,$orderid){
   	$sql = "UPDATE dfp.order set dfpid = '".$dfpid."' where orderid = '".$orderid."';" ;
   	$query = $this->db->query($sql);

   }
   	public function insertOrder($data){
		$order_data[] = $data;
		$this->db->insert_batch('order', $order_data); 
		$orderids =  $this->db->insert_id();
		return $orderids;
	}
	public function getAdunitDetils($unitid,$type=''){
		if(empty($type))
			$sql="select * from adunits where id = $unitid";
		else
			$sql = "SELECT * FROM dfp.ad_types where id = $unitid";	
		$query = $this->db->query($sql);
		$units = array();
		foreach ($query->result() as $row){	
    		$units[] = $row;
   		}
   		return $units[0];
	}
	public function insertOrderItem($orderitems,$orderid,$type=''){
		$item_ids = array();
		foreach ($orderitems as $item) {
			$adunitid = $item['unitid'];
			$daterange = $item['daterange'];
			$datearr = explode("-",$daterange);
			$date0 = trim($datearr[0]);
			$date1 = trim($datearr[1]);
			$startdate =  date("Y-m-d H:i:s",strtotime($date0));
			$enddate =  date("Y-m-d H:i:s",strtotime($date1));
			$unitDetails = $this->getAdunitDetils($adunitid,$type);
			$item_cost = $item['tcost'];
			$adunit_width = $unitDetails->width;
			$adunit_height = $unitDetails->height;
			$adunit_perk_cost = $unitDetails->costperk;
			$item_qty = $item['qty'];
			$alt_text = $item['alt_text'];
			$url = $item['link'];
			$filename='';
			if(isset($item['filename'])){
				$filename = $item['filename'];
			}
			$sql = "insert into creatives (ad_type_id,file_name,width,height,url,dateadded,active) values(
			'".$adunitid."','".$filename."','".$adunit_width."','".$adunit_height."','".$url."',now(),1)";
			$this->db->query($sql);
			$creative_id =  $this->db->insert_id();

			//insert orderitem
			$sql ="insert into order_items (order_id,ad_type_id,qty,item_value,item_cost,datecreated,startdate,enddate,status,creative_id) values 
			('".$orderid."','".$adunitid."','".$item_qty."','".$adunit_perk_cost."','".$item_cost."',now(),'".$startdate."','".$enddate."',1,'".$creative_id."')";
			$this->db->query($sql);
			$item_id =  $this->db->insert_id();
			//insertcreative
			$item_ids[]=$item_id;
		}

		return $item_ids;
	}

	public function updateOrderDetails($orderid,$orderdata){

		$orderStatus = $orderdata->status;
		if($orderStatus == "APPROVED")
			$status = 1;
		else
			$status = 0;	
		 $sql = "UPDATE dfp.order set status = '".$status."' where orderid = '".$orderid."';" ;
  	 	 $query = $this->db->query($sql);


	}
}