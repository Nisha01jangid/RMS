<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Payments extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('PaymentsM');
	}

	public function index(){

		$data['payment_details'] = $this->PaymentsM->get_payment();
		$data['tenants'] = $this->PaymentsM->get_tenant_name();
		echo "<pre>";
		print_r($data['tenants']);
		die();
		// $this->load->view('Home/Home');
		$this->load->view('Payments/paymentview',$data);
	}

	public function new_entry(){

		$data['tenants'] = $this->PaymentsM->get_tenant_name_dropdown();
		$this->load->view('Payments/manage_payment',$data);
		
	}

	public function add_new_entry(){

		$tenant_id = $_POST['tenant_id'];
		// $tenant_id = $this->input->post('tenant_id');
		$invoice = $_POST['invoice'];
		$amount = $_POST['amount'];

		$this->PaymentsM->insert_new_payment($tenant_id,$invoice,$amount);

		// $tenant_option_details = $this->PaymentsM->get_tenant_details($tenant_id);

		redirect(base_url('Payments'));
		// echo "<pre>";
		// print_r($tenant_id);
		// print_r($invoice);
		// print_r($amount);
		// die();

	}
}

?>