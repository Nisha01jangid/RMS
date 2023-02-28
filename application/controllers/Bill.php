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
		$data['houses'] = $this->BillM->getLastWaterBill();
		$i=0;
		foreach($data['houses'] as $h){
			$data['houses'][$i]['month_name'] = date("F", strtotime($h['month']))." ".date("Y", strtotime($h['month']));
			$i++;
		}
		$this->load->view('Bill/WaterBill', $data);
	}

	public function getBill()
	{
		$month = $_GET['month'];
        $month_name = date("F", strtotime($month))." ".date("Y", strtotime($month)); 
		$data['houses'] = $this->BillM->getAllHouses();
		$i=0;
		foreach($data['houses'] as $h){
			$water_bill = $this->BillM->getWaterBill($h['house_no'],$month);
			if(!empty($water_bill)){
				$data['houses'][$i]['water_bill'] = $water_bill[0]['water_bill'];
			}else{
				$data['houses'][$i]['water_bill'] = "";
			}
			$data['houses'][$i]['month_name'] = $month_name;
			$data['houses'][$i]['month'] = $month;
			$i++;
		}

		$this->load->view('Bill/WaterBill',$data);
	}

    public function addWaterBill($house_no,$month){
		$data['house_no'] = $house_no;
		$data['month'] = $month;
		$this->load->view('Bill/addWaterBill',$data);
	}

    public function insertWaterBill(){
		$house_no = $_POST['house_no'];
		$month = $_POST['month'];
		$water_bill = $_POST['water_bill'];
		$check = $this->BillM->getWaterBill($house_no,$month);
		if(empty($check)){
			$this->BillM->insertWaterBill($house_no,$month,$water_bill);
		}else{
			$this->BillM->updateWaterBill($house_no,$month,$water_bill);
		}
		
		redirect(base_url("Bill/getBill/?month=").$month);
	}

}
