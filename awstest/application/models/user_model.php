<?php
class User_Model extends CI_Model{

	function __construct() {
        parent::__construct();
    }

  public function getAdvertisers($advt_id=null){
  	if($advt_id!=null)
  		$sql = "SELECT * from users u , advertiser ad where u.usertype = 1  and u.id = ad.userid and ad.id=".$this->db->escape($advt_id);
  	else
  		$sql = "SELECT * from users u , advertiser ad where u.usertype = 1  and u.id = ad.userid";
  	$query = $this->db->query($sql);
	$users = array();
		foreach ($query->result() as $row){	
    		$users[] = $row;
   		}

   	return $users;

  }

  public function getuerinfo($userid){
  	$sql = "SELECT * from users u , advertiser ad where u.usertype = 1  and u.id = ad.userid and u.id = ".$userid;
  	$query = $this->db->query($sql);
	$users = array();
		foreach ($query->result() as $row){	
    		$users[] = $row;
   		}

   	return $users;

  }
}