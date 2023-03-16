<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('HomeM');
    }	
	
	public function index()
	{
		$data['property'] = $this->HomeM->getAllHouses();
		$this->load->view('Home/Home',$data);
	}

	public function add_property(){

		$this->load->view('Home/add_property');
	}

	public function insert_new_property(){

		$property_name = $_POST['property_name'];
		$property_address = $_POST['property_address'];
		$flats = $_POST['flats'];

		$this->HomeM->insert_new_property($property_name, $property_address, $flats);

		$this->session->set_flashdata('property_inserted', 'Property Inserted Successfully :)');
		redirect("Home/index");

	}

	public function flats($property_id){

		$property_id = $property_id;
		$data['flat'] = $this->HomeM->get_flats($property_id);
		$data['property_id'] = $property_id;

		$data['flats'] = array();

		for($i=1; $i<=$data['flat'][0]['flats']; $i++){

			$flat_status = $this->HomeM->check_flat_occupied($property_id, $i);
			if(!empty($flat_status)){
				$data['flats'][$i] = 1;
			} else {
				$data['flats'][$i] = 0;
			}

		}


		$this->load->view('Home/flats', $data);
	}

	public function delete_property($property_id){

		$property_id = $property_id;
		$this->HomeM->delete_property($property_id);
		
		$this->session->set_flashdata('Property_deleted', 'Property Deleted Successfully :)');
		redirect("Home/index");
	}
	
	public function delete_flat_tenant($flat_no, $property_id){

		$property_id = $property_id;
		$flat_no = $flat_no;
		$this->HomeM->delete_flat_tenant($property_id, $flat_no);
		
		$this->session->set_flashdata('tenant_deleted', 'Tenant Deleted Successfully :)');
		redirect("Home/index");
	}

	public function tenant_details($flat_no, $property_id){

		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->HomeM->check_flat_entry($flat_no, $property_id);

		if(!empty($data['flat_entry'])){
			$month = date('Y-m');
			$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
			$reading = $this->HomeM->getElectricityReading($property_id,$flat_no,$month);
			if(!empty($reading)){
				$data['reading'] = $reading[0]['reading'];
			}else{
				$data['reading'] = "";
			}
			$data['month_name'] = $month_name;
			$data['month'] = $month;
			$this->load->view('Home/tenant_details_view', $data);
		} else{
			$this->load->view('Home/tenant_details', $data);
         }
	}

	public function insert_tenant_details(){

		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$dob = $_POST['dob'];
		$email = $_POST['email'];
		$rent = $_POST['rent'];
		$mobile = $_POST['mobile'];
		$Aadhaar = $_POST['Aadhaar'];
		$joining_date = $_POST['joining_date'];
		$members = $_POST['members'];
		$flat_no = $_POST['flat_no'];
		$property_id = $_POST['property_id'];

		$this->HomeM->insert_tenant_details($name, $father_name, $dob, $email, $rent, $mobile, $Aadhaar, $joining_date, $members, $property_id, $flat_no);

		$this->session->set_flashdata('tenant_inserted', 'Tenant Inserted Successfully :)');
		redirect("Home/index");

	}

	public function month_wise_report($flat_no,$property_id)
	{
		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		// echo "<pre>";
		// print_r($data['flat_no']);
		
		$data['tenant_entry_form_details'] = $this->HomeM->get_tenant_entry_form_details($data['flat_no'],$data['property_id']);

		$month = $data['tenant_entry_form_details'][0]['month'];
		// $data = explode('-', $month);
	    // $month_only = $data[1];
	

		// $data['paid_amount'] = $this->HomeM->get_tenant_amount($data['flat_no'], $data['property_id'], $month_only);
		// echo "<pre>";
		// print_r($data['paid_amount']);
		// die();

		$previous_month =  date('Y-m', strtotime('-1 month'));
		$data['previous_reading'] = $this->HomeM->previousReading($property_id,$flat_no,$previous_month);

		$this->load->view('Home/month_wise_reportv',$data);
	}

	public function getFlatElectricityReading()
	{
		$month = $_GET['month'];
		$property_id = $_GET['property_id'];
		$flat_no = $_GET['flat_no'];
        $data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->HomeM->check_flat_entry($flat_no, $property_id);

		if(!empty($data['flat_entry'])){
			$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
			$reading = $this->HomeM->getElectricityReading($property_id,$flat_no,$month);
			if(!empty($reading)){
				$data['reading'] = $reading[0]['reading'];
			}else{
				$data['reading'] = "";
			}
			$data['month_name'] = $month_name;
			$data['month'] = $month;
			$this->load->view('Home/tenant_details_view', $data);
		} else{
			$this->load->view('Home/tenant_details', $data);
         }
	}

    public function addElectricityReading($property_id, $flat_no, $month){

		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->HomeM->check_flat_entry($flat_no, $property_id);

		$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		$reading = $this->HomeM->getElectricityReading($property_id,$flat_no,$month);
		if(!empty($reading)){
			$data['reading'] = $reading[0]['reading'];
		}else{
			$data['reading'] = "";
		}
		$data['month_name'] = $month_name;
		$data['month'] = $month;
			
		$this->load->view('Home/AddFlatElectricityReading',$data);
	}

    public function insertFlatElectricityReading(){
		$property_id = $_POST['property_id'];
		$flat_no = $_POST['flat_no'];
		$month = $_POST['month'];
		$reading = $_POST['reading'];
		$check = $this->HomeM->getElectricityReading($property_id, $flat_no, $month);
		if(empty($check)){
			$this->HomeM->insertElectricityReading($property_id, $flat_no, $month,$reading);
		}else{
			$this->HomeM->updateElectricityReading($property_id, $flat_no, $month,$reading);
		}
		
		redirect(base_url("Home/getFlatElectricityReading?property_id=").$property_id."&flat_no=".$flat_no."&month=".$month);
	}

	public function pay_bill($property_id, $flat_no){

		$data['property_id'] = $property_id;
		$data['flat_no'] = $flat_no;

		$this->load->view('Home/Pay_bill', $data);

	}

	public function payment_mode(){

		$data['mode'] = 0;
		$data['property_id'] = $_POST['property_id'];
	    $data['flat_no'] = $_POST['flat_no'];
		if($_POST['payment_mode'] == 'online'){
		 $data['mode'] = 1;
		$this->load->view('Home/payment_mode', $data);
	    } else {
		$data['mode'] = 2;
		$this->load->view('Home/payment_mode', $data);
	    }
} 

public function insert_payment(){

	// echo "<pre>";
	// print_r($_POST);
	// die();

	if($_POST['mode'] == 1){

	$mode = "online";
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$reference_id = $_POST['ref_id'];
	$payment_mode = $_POST['payment_mode'];
	$property_id = $_POST['property_id'];
	$flat_no = $_POST['flat_no'];
	$description = $_POST['description'];

	$data = explode('-', $date);
	$month = $data[1];
	// echo $month;
	// die();
	
	 $this->HomeM->insert_payment_online($mode, $date, $amount, $reference_id, $payment_mode, $property_id, $flat_no, $description, $month);	
	} else {

	$mode = "offline";
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];
	$property_id = $_POST['property_id'];
	$flat_no = $_POST['flat_no'];
	$payment_mode = "offline";
	$data = explode('-', $date);
	$month = $data[1];
	
	
	 $this->HomeM->insert_payment_offline($mode, $date, $amount, $description, $property_id, $flat_no, $payment_mode, $month);
	}

	$this->session->set_flashdata('Payment_inserted', 'Payment Inserted Successfully :)');
	redirect("Home/index");

}

	public function police_verification_form($flat_no, $property_id){

		$this->load->view('Home/police_verification_form');
	}


}
?>