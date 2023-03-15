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

	$data['from_date'] = $_POST['from_date'];
	$data['to_date'] = $_POST['to_date'];
	$data['payments']= $this->ReportM->get_payments($data['from_date'],$data['to_date']);
	$this->load->view('Report/payment_report',$data);
}



public function balance_report(){
	$this->load->view('Report/balance_report');
}


}

?>