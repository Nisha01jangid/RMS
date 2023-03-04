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
		// echo "<pre>";
		// print_r($_POST);
		// die();
		$this->HomeM->insert_new_property($property_name, $property_address, $flats);

		$this->session->set_flashdata('property_inserted', 'Property Inserted Successfully :)');
		redirect("Home/index");

	}

	public function flats($property_id){

		$property_id = $property_id;
		$data['flats'] = $this->HomeM->get_flats($property_id);
		$data['property_id'] = $property_id;
		// echo "<pre>";
		// print_r($data['flats']);
		// die();
		$this->load->view('Home/flats', $data);
	}

	public function tenant_details($flat_number){

		$this->load->view('Home/tenant_details');
	}


}
