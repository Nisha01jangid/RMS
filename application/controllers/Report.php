<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Report extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->library('session');
	$this->load->model('ReportM');
}

public function reportv(){
	
		
		$this->load->view('Report/report_front_page');
}

public function month_of_payment(){

	$this->load->view('Report/month_of_payment');
}

public function payment_report(){

	$data['month_of_payment'] = $_POST['month_of'];
	$data['payments']= $this->ReportM->get_payments($data['month_of_payment']);

	// echo "<pre>";
	// print_r($data['payments']);
	// die();
	
	$this->load->view('Report/payment_report',$data);
}



public function balance_report(){
	$this->load->view('Report/balance_report');
}


}

?>