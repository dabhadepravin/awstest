<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

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
         $this->load->model('order_model');
       
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('orders/order_details');
		$this->load->view('footer');
		
	}
	public function details()
	{
		$oid = $_GET['oid'];
		$ut = $_GET['ut'];
		//get order detail
		$orders = $this->order_model->getOderDetails($oid);
		
		$data['order'] = $orders;

		//get order items 
		if($orders[0]->ordertype == "bulk")
			$orders_items = $this->order_model->getOrderitemsDetails($oid);
		else
			$orders_items = $this->order_model->getOrderitemsDetailsprem($oid);

		$data['orderitems'] = $orders_items;
		$data['userType'] = $ut;
		$this->load->view('header');
		$this->load->view('orders/order_details',$data);
		$this->load->view('footer');
		
	}
	public function register()
	{
		$this->load->view('header');
		$this->load->view('advertiser/register');	
		$this->load->view('footer');
		
	}
	public function register_advertiser(){
		$error = '';
		$error_flag = false;
		$this->load->library('gahelper');
		$advertdata = array();
		$advertdata["username"] = $_POST['username'];
		$advertdata["email"] = $_POST['email'];
		$advertdata["name"] = $_POST['name'];
		$advertdata["email"] = $_POST['email'];
		$advertdata["phone"] = $_POST['phone'];
		$advertdata["fax"] = $_POST['fax'];
		$advertdata["companyname"] = $_POST['companyname'];
		$advertdata["address"] = $_POST['address'];
		//check if companyname is exits 
		
		
		//$this->gahelper->createAdvertiser($data);
		$this->gahelper->createServiceObject("CompanyService");
		if($this->gahelper->checkAdvertiserExists("PravinDabhade1111")){
			$error = "Company name already exits, Please choose another name";
			$error_flag = true;

		} else {
			if(empty($advertdata["username"]) || empty($advertdata["email"]) || empty($advertdata["name"]) || empty($advertdata["companyname"])){
				$error = "Please fill required data.";
				$error_flag = true;

			}else {
			//insert data in DFP
			$internal_id = $this->advertiser_model->insertAdvertiser($advertdata);
			$advertdata['adveriser_internal_id'] = $internal_id ;
			$dfp_id = $this->gahelper->createAdvertiser($advertdata);
			$data['error'] = "Record Created";
		}

		}
		$data['error'] = $error;
		$this->load->view('header');
		if($error_flag == true)
			$this->load->view('advertiser/register',$data);	
		else 
			$this->load->view('advertiser/register_success',$data);		
		$this->load->view('footer');
	}

	public function login(){

		$username = $this->security->xss_clean($_POST['username']);
		$password = $this->security->xss_clean($_POST['password']);
		$res =  $this->advertiser_model->checklogin($username,$password);
		if($res === false){
			$data['error'] = "Login Failed, Please try again";
			$this->load->view('header');
			$this->load->view('advertiser/welcome_message',$data);
			$this->load->view('footer');
			
		} else {
			$this->session->set_userdata('advtid',$res);
			redirect(site_url().'advertiser/dashboard',"refresh");
			exit;
		}


	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */