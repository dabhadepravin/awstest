<?php
class Administrator_Model extends CI_Model{

	function __construct() {
        parent::__construct();
    }

  	public function save_settings($settings){
  		if(count($settings)>0){
  			foreach ($settings as $key => $value) {
  				$sql = "UPDATE settings set setting_value = '".$this->db->escape_str($value)."'  where setting_name = '".$key."'";
  				$this->db->query($sql);
  			}

  		}

  	}

  	public function get_settings(){
  		$sql = "SELECT * from settings";
  		$query = $this->db->query($sql);
  		if($query->num_rows() > 0){
  		$array_settings = array();
		foreach ($query->result() as $row){	
    		$array_settings[] = $row;
    		
    		
		}
		return $array_settings;
		}
  	}

  	public function get_setting($setting_name){
  		$sql = "SELECT * from settings where setting_name = '".$this->db->escape_str($setting_name)."'";
  		$query = $this->db->query($sql);
  		if($query->num_rows() > 0){
  		$array_settings = array();

		foreach ($query->result() as $row){	
    		
    		return   $row->setting_value;
    		
		}
		
		}
  	}
}