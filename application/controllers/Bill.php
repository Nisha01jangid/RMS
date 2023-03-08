<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bill extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('BillM');
    }	
	
	public function index()
	{

	}
	public function WaterBill()
	{
		$year = date('Y');
		$data['houses'] = $this->BillM->getLastWaterBill($year);
		$this->load->view('Bill/WaterBill', $data);
	}
	public function WaterBillOfPoperty($property_id)
	{
		$month = date('Y-m');
		$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		$data['property_name'] = $this->BillM->getPropertyName($property_id);
		$water_bill = $this->BillM->getWaterBillOfProperty($property_id,$month);
		if(!empty($water_bill)){
			$data['water_bill'] = $water_bill[0]['water_bill'];
		}else{
			$data['water_bill'] = "";
		}
		$data['month_name'] = $month_name;
		$data['month'] = $month;
		$data['property_id'] = $property_id;

		$this->load->view('Bill/WaterBillOfProperty',$data);
	}

	public function getBill()
	{
		$month = $_GET['month'];
		$property_id = $_GET['property_id'];
        $month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		$data['property_name'] = $this->BillM->getPropertyName($property_id);
		$water_bill = $this->BillM->getWaterBillOfProperty($property_id,$month);
		if(!empty($water_bill)){
			$data['water_bill'] = $water_bill[0]['water_bill'];
		}else{
			$data['water_bill'] = "";
		}
		$data['month_name'] = $month_name;
		$data['month'] = $month;
		$data['property_id'] = $property_id;

		$this->load->view('Bill/WaterBillOfProperty',$data);
	}

    public function addWaterBill($property_id,$month){

		$water_bill = $this->BillM->getWaterBillOfProperty($property_id,$month);
		if(!empty($water_bill)){
			$data['water_bill'] = $water_bill[0]['water_bill'];
		}else{
			$data['water_bill'] = "";
		}
		$data['property_id'] = $property_id;
		$data['property_name'] = $this->BillM->getPropertyName($property_id);
		$data['month'] = $month;
		$this->load->view('Bill/AddWaterBillOfProperty',$data);
	}

    public function insertWaterBill(){
		$property_id = $_POST['property_id'];
		$month = $_POST['month'];
		$water_bill = $_POST['water_bill'];
		$check = $this->BillM->getWaterBill($property_id,$month);
		if(empty($check)){
			$this->BillM->insertWaterBill($property_id,$month,$water_bill);
		}else{
			$this->BillM->updateWaterBill($property_id,$month,$water_bill);
		}
		
		redirect(base_url("Bill/getBill?property_id=").$property_id."&month=".$month);
	}


	public function ElectricityBill()
	{
		$year = date('Y');
		$data['houses'] = $this->BillM->getLastElectricityBill($year);
		$this->load->view('Bill/ElectricityBill', $data);
	}
	public function ElectricityBillOfProperty($property_id)
	{
		$month = date('Y-m');
		$month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		$data['property_name'] = $this->BillM->getPropertyName($property_id);
		$electricity_charges = $this->BillM->getElectricityBillOfProperty($property_id,$month);
		if(!empty($electricity_charges)){
			$data['electricity_charges'] = $electricity_charges[0]['electricity_charges'];
		}else{
			$data['electricity_charges'] = "";
		}
		$data['month_name'] = $month_name;
		$data['month'] = $month;
		$data['property_id'] = $property_id;
		$this->load->view('Bill/ElectricityBillOfProperty',$data);
	}

	public function getElectricityBill()
	{
		$month = $_GET['month'];
		$property_id = $_GET['property_id'];
        $month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		$data['property_name'] = $this->BillM->getPropertyName($property_id);
		$electricity_charges = $this->BillM->getElectricityBillOfProperty($property_id,$month);
		if(!empty($electricity_charges)){
			$data['electricity_charges'] = $electricity_charges[0]['electricity_charges'];
		}else{
			$data['electricity_charges'] = "";
		}
		$data['month_name'] = $month_name;
		$data['month'] = $month;
		$data['property_id'] = $property_id;
		// print_r($electricity_charges);die();
		$this->load->view('Bill/ElectricityBillOfProperty',$data);
	}

    public function addElectricityBill($property_id,$month){

		$electricity_charges = $this->BillM->getElectricityBillOfProperty($property_id,$month);
		if(!empty($electricity_charges)){
			$data['electricity_charges'] = $electricity_charges[0]['electricity_charges'];
		}else{
			$data['electricity_charges'] = "";
		}
		$data['property_id'] = $property_id;
		$data['property_name'] = $this->BillM->getPropertyName($property_id);
		$data['month'] = $month;
		$this->load->view('Bill/AddElectricityBillOfProperty',$data);
	}

    public function insertElectricityBill(){
		$property_id = $_POST['property_id'];
		$month = $_POST['month'];
		$electricity_charges = $_POST['electricity_charges'];
		$check = $this->BillM->getElectricityBill($property_id,$month);
		if(empty($check)){
			$this->BillM->insertElectricityBill($property_id,$month,$electricity_charges);
		}else{
			$this->BillM->updateElectricityBill($property_id,$month,$electricity_charges);
		}
		redirect(base_url("Bill/getElectricityBill?property_id=").$property_id."&month=".$month);
	}

}
