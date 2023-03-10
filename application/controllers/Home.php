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

		// echo "<pre>";
		// print_r($data['flats']);
		// die();

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
}
?>