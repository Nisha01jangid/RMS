<?php
defined('BASEPATH') OR exit('No direct script allowed');

class Report extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->library('session');
	$this->load->model('ReportM');
	if(!isset($_SESSION['user'])){
		redirect(base_url());
	}
}

public function reportv(){
	$this->load->view('Report/report_front_page');
}

public function receiver_report(){

	$this->load->view('Report/receiver_report');
}

public function receiver_payment_report(){

	$data['from_date'] = $_POST['from_date'];
	$data['to_date'] = $_POST['to_date'];
	$receiver = $_POST['receiver'];

	if($receiver == 1){
		$receiver = "Mr. Ram Kripal Shah";
	} else if($receiver == 2){

		$receiver = "Mr. Manoj Kumar Shah";
	}else if($receiver == 3){
		$receiver = "Dr. Indra Kumar Shah";
	}
	else if($receiver == 4){

		$receiver = "Mr. MG";
	}
	else if($receiver == 6){

		$receiver = "Mr. Vivek Kumar Shah";
	}
	else {

			$receiver = "Mr. AG";
	}
	
	$data['payments']= $this->ReportM->get_receiver_payments($data['from_date'], $data['to_date'], $receiver);

	for ($i=0; $i < sizeof($data['payments']); $i++) { 
		// code...
	$property_id = $data['payments'][$i]['property_id'];
	$flat_no = $data['payments'][$i]['flat_no'];

	$data['tenant'] = $this->ReportM->get_tenant($property_id, $flat_no);
	$data['payments'][$i]['tenant_name'] = 	$data['tenant'][0]['tenant_name'];
	$data['payments'][$i]['flat_name'] = 	$data['tenant'][0]['flat_name'];
	// echo "<pre>";
	// print_r($data['tenant']);
	}
	// die();
	$data['total'] = $this->ReportM->get_total_receiver_payments($data['from_date'], $data['to_date'], $receiver);
	$data['receiver_expenditure'] = $this->ReportM->get_receiver_expenditure($data['from_date'], $data['to_date'], $receiver);
	
	
	
	$this->load->view('Report/payment_report',$data);
}



public function balance_report(){
	$this->load->view('Report/balance_report');
}
	public function select_property_for_report_monthwise()
	{
		$data['property'] = $this->ReportM->getAllHouses();

		$this->load->view('Report_Monthwise/select_property_for_report_monthwise',$data);
	}

	public function select_month_for_report_monthwise($property_id, $flats)
	{
		$data['property_id'] = $property_id;
		$data['flats'] = $flats;
		$this->load->view('Report_Monthwise/select_month_for_report_monthwise',$data);
	}
    
    public function Report_Monthwise()
    {
    	$data['month'] = $_POST['month'];
    	$data['property_id'] =$_POST['property_id'];
    	$property_id = $data['property_id'];

    	$data['report_monthwise_details'] = $this->ReportM->get_report_details_monthwise($data['month'],$data['property_id']);
    	
		for($i=0; $i<sizeof($data['report_monthwise_details']); $i++){
			$property_id = $data['report_monthwise_details'][$i]['property_id'];
			$flat_no = $data['report_monthwise_details'][$i]['flat_no'];
		$data['tenant_name'] = $this->ReportM->get_tenant_name($flat_no, $property_id,$data['month']);
		// echo "<pre>";
		// print_r($data['tenant_name']);
		// die();
		$data['report_monthwise_details'][$i]['tenant_name'] = 	$data['tenant_name'][0]['tenant_name'];
		$data['report_monthwise_details'][$i]['contact'] = 	$data['tenant_name'][0]['contact'];
		
	}

		$month = $data['report_monthwise_details'][0]['month'];

	    $data['invoice_status'] = $this->ReportM->get_invoive_status($data['property_id'],$month);

		if(!empty($data['invoice_status'])){

			
			for($i=0; $i<sizeof($data['report_monthwise_details']); $i++){

			$month = $data['report_monthwise_details'][$i]['month'];
			$flat_no = $data['report_monthwise_details'][$i]['flat_no'];


			$data['invoice_number'] = $this->ReportM->get_invoive_number($data['property_id'],$month, $flat_no);
			$data['report_monthwise_details'][$i]['invoice_number'] = 	$data['invoice_number'][0]['invoice'];


			$previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
			// echo $previous_month;
			// die();
			$previous_outstanding = $this->ReportM->get_previous_outstanding($property_id,$flat_no,$previous_month);
			// print_r($previous_outstanding);
			// echo "<br>";
			if(!empty($previous_outstanding)){
				$data['previous_outstanding'] = $previous_outstanding[0]['outstanding_amount'];
			}else{
				$data['previous_outstanding'] = 0;
			}
			$data['paid_amount'] = $this->ReportM->get_tenant_amount($flat_no, $data['property_id'], $month);
			$data['report_monthwise_details'][$i]['previous_reading'] = $data['report_monthwise_details'][$i]['previous_meter_reading'];

			$rent = $data['report_monthwise_details'][$i]['rent'];
			$waste = $data['report_monthwise_details'][$i]['waste'];
			$miscellaneous = $data['report_monthwise_details'][$i]['miscellaneous'];
			$water = $data['report_monthwise_details'][$i]['no_of_members'] * $data['report_monthwise_details'][$i]['water_rate']*$data['report_monthwise_details'][$i]['electricity_rate'];
			// echo $water;
			// die();
			$electricity = $data['report_monthwise_details'][$i]['electricity_rate'] * ($data['report_monthwise_details'][$i]['current_meter_reading'] - $data['report_monthwise_details'][$i]['previous_meter_reading']);
			$total = round($rent + $waste + $miscellaneous + $water + $electricity + $data['previous_outstanding']);
			$data['report_monthwise_details'][$i]['total'] = $total;
			$data['report_monthwise_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];
			$outstanding_amount = $total - $data['report_monthwise_details'][$i]['amount_paid'];
			$data['report_monthwise_details'][$i]['outstanding_amount'] = $outstanding_amount;
			$check = $this->ReportM->check_outstanding_exist($data['property_id'], $flat_no, $month);
			if(!empty($check)){
			$this->ReportM->update_oustanding_amount($data['property_id'], $flat_no, $month, $total, $data['report_monthwise_details'][$i]['amount_paid'], $outstanding_amount);

			}else {
			$this->ReportM->insert_oustanding_amount($data['property_id'], $data['flat_no'], $month, $total, $data['report_monthwise_details'][$i]['amount_paid'], $outstanding_amount);
			}


			}


		}
    	for($i = 0; $i < sizeof($data['report_monthwise_details']); $i++){

			$month = $data['report_monthwise_details'][$i]['month'];
			$flat_no = $data['report_monthwise_details'][$i]['flat_no'];

			$data['paid_amount'] = $this->ReportM->get_tenant_amount($flat_no, $data['property_id'], $month);

			$data['report_monthwise_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];

			
		}
		$month = $data['report_monthwise_details'][0]['month'];
    	$flat_no = $data['report_monthwise_details'][0]['flat_no'];
    	
		$last_invoice = $this->ReportM->get_last_invoice($property_id,$flat_no);
		if(!empty($last_invoice)){
			$data['last_invoice'] = $last_invoice[0]['invoice'];
		}else{
			$data['last_invoice'] = "";
		}
// echo "<pre>";print_r($data);die();
    	
    	$this->load->view('Report_Monthwise/Report_monthwise',$data);
    }

	public function Report_flatwise()
    {
		$data['flats'] =$_POST['flats'];
    	$flats = $data['flats'];
		$data['from_date'] = $_POST['from_date'];
		$data['to_date'] = $_POST['to_date'];
		$data['property_id'] =$_POST['property_id'];
		// echo $data['flats'];
		// die();
    	$data['report_flatwise_details'] = $this->ReportM->get_flatwise_payments($data['to_date'],$data['from_date'],$data['property_id'],$flats);
    	// echo "ehllo";
		// die();
		// echo "<pre>";
    	// print_r($data['report_flatwise_details']);
		// die();
		for($i=0; $i<sizeof($data['report_flatwise_details']); $i++){
			$property_id = $data['report_flatwise_details'][$i]['property_id'];
			$flat_no = $data['report_flatwise_details'][$i]['flat_no'];
		$data['tenant_name'] = $this->ReportM->get_tenant_name($flat_no, $property_id,$data['report_flatwise_details'][0]['month']);
		$data['report_flatwise_details'][$i]['tenant_name'] = 	$data['tenant_name'][0]['tenant_name'];
		$data['report_flatwise_details'][$i]['contact'] = 	$data['tenant_name'][0]['contact'];
		
	}
// echo"<pre>";	print_r($data);die();


		$month = $data['report_flatwise_details'][0]['month'];

	    $data['invoice_status'] = $this->ReportM->get_invoive_status($data['property_id'],$month);

		if(!empty($data['invoice_status'])){

			
			for($i=0; $i<sizeof($data['report_flatwise_details']); $i++){

			$month = $data['report_flatwise_details'][$i]['month'];
			$flat_no = $data['report_flatwise_details'][$i]['flat_no'];


			// print_r($data);die();
			$data['invoice_number'] = $this->ReportM->get_invoive_number($data['property_id'],$month, $flat_no);
			$data['report_flatwise_details'][$i]['invoice_number'] = 	$data['invoice_number'][0]['invoice'];


			$previous_month =  date('Y-m', strtotime($month. ' -1 months')); 
			// echo $previous_month;
			// die();
			$previous_outstanding = $this->ReportM->get_previous_outstanding($property_id,$flat_no,$previous_month);
			// print_r($previous_outstanding);
			// echo "<br>";
			if(!empty($previous_outstanding)){
				$data['previous_outstanding'] = $previous_outstanding[0]['outstanding_amount'];
			}else{
				$data['previous_outstanding'] = 0;
			}
			$data['paid_amount'] = $this->ReportM->get_tenant_amount($flat_no, $data['property_id'], $month);
			$data['report_flatwise_details'][$i]['previous_reading'] = $data['report_flatwise_details'][$i]['previous_meter_reading'];

			$rent = $data['report_flatwise_details'][$i]['rent'];
			$waste = $data['report_flatwise_details'][$i]['waste'];
			$miscellaneous = $data['report_flatwise_details'][$i]['miscellaneous'];
			$water = $data['report_flatwise_details'][$i]['no_of_members'] * $data['report_flatwise_details'][$i]['water_rate']*$data['report_flatwise_details'][$i]['electricity_rate'];
			// echo $water;
			// die();
			$electricity = $data['report_flatwise_details'][$i]['electricity_rate'] * ($data['report_flatwise_details'][$i]['current_meter_reading'] - $data['report_flatwise_details'][$i]['previous_meter_reading']);
			$total = round($rent + $waste + $miscellaneous + $water + $electricity + $data['previous_outstanding']);
			$data['report_flatwise_details'][$i]['total'] = $total;
			$data['report_flatwise_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];
			$outstanding_amount = $total - $data['report_flatwise_details'][$i]['amount_paid'];
			$data['report_flatwise_details'][$i]['outstanding_amount'] = $outstanding_amount;
			$check = $this->ReportM->check_outstanding_exist($data['property_id'], $flat_no, $month);
			if(!empty($check)){
			$this->ReportM->update_oustanding_amount($data['property_id'], $flat_no, $month, $total, $data['report_flatwise_details'][$i]['amount_paid'], $outstanding_amount);

			}else {
			$this->ReportM->insert_oustanding_amount($data['property_id'], $flat_no, $month, $total, $data['report_flatwise_details'][$i]['amount_paid'], $outstanding_amount);
			}


			}


		}
    	for($i = 0; $i < sizeof($data['report_flatwise_details']); $i++){

			$month = $data['report_flatwise_details'][$i]['month'];
			$flat_no = $data['report_flatwise_details'][$i]['flat_no'];

			$data['paid_amount'] = $this->ReportM->get_tenant_amount($flat_no, $data['property_id'], $month);

			$data['report_flatwise_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];

			
		}
		$month = $data['report_flatwise_details'][0]['month'];
    	$flat_no = $data['report_flatwise_details'][0]['flat_no'];
    	// echo "<pre>";print_r($data);die();
		$last_invoice = $this->ReportM->get_last_invoice($property_id,$flat_no);
		if(!empty($last_invoice)){
			$data['last_invoice'] = $last_invoice[0]['invoice'];
		}else{
			$data['last_invoice'] = "";
		}
    	$this->load->view('Report_Monthwise/Report_flatwise',$data);
    }

    public function User_Wise_Report()
    {
    	$this->load->view('User_Wise_Report/select_user');
    }

     public function User_Wise_Report_detail()
    {
    	$data['user_name'] = $_POST['user_name'];
    	$this->load->view('User_Wise_Report/user_wise_report',$data);
    }
	public function outstanding_amount(){

		$data['property'] = $this->ReportM->getAllHouses();
		$this->load->view('Report_Monthwise/outstanding_amount_report', $data);
	}

	public function outstanding_report_view($property_id){

		$data['property_id'] = $property_id;
		$data['property_name'] = $this->ReportM->get_property_name($data['property_id']);
        
		$data['outstanding_report_details'] = $this->ReportM->get_outstanding_report_details($data['property_id']);
		// echo "<pre>";
		// print_r($data['outstanding_report_details']);
		// die();
		
		for($i = 0; $i < sizeof($data['outstanding_report_details']); $i++){

			$property_id = $data['outstanding_report_details'][$i]['property_id'];
			$flat_no = $data['outstanding_report_details'][$i]['flat_no'];
			$month = $data['outstanding_report_details'][$i]['month'];
			$data['flat_name'] = $this->ReportM->get_flat_name($property_id, $flat_no);
			$data['outstanding_report_details'][$i]['flat_name'] = $data['flat_name'][0]['flat_name'];
			// $tenant_name = $this->ReportM->get_tenant_name($property_id,$flat_no,$month);
			// if(!empty($tenant_name)){
			// 	$data['outstanding_report_details'][$i]['tenant_name'] = $tenant_name[0]['tenant_name'];
			// }else{
			// 	$data['outstanding_report_details'][$i]['tenant_name'] = "";
			// }
		// 	echo "<pre>";
		// print_r($tenant_name);
		}
		
		
		// die();

		$this->load->view('Report_Monthwise/outstanding_amount_report_view', $data);
	}

	public function receiver_expenditure(){

		$this->load->view('Report_Monthwise/receiver_expenditure');
	}

	public function insert_receiver_expenditure(){
		
		$date = $_POST['date'];
		$receiver = $_POST['pay_user'];
		$head = $_POST['head'];
		$amount = $_POST['amount'];

		if($receiver == 1){
			$receiver = "Mr. Ram Kripal Shah";
		} else if($receiver == 2){
	
			$receiver = "Mr. Manoj Kumar Shah";
		}else if($receiver == 3){
			$receiver = "Dr. Indra Kumar Shah";
		}
		else if($receiver == 4){
	
			$receiver = "Mr. MG";
		}
		else if($receiver == 6){

		$receiver = "Mr. Vivek Kumar Shah";
	}
		else {
	
				$receiver = "Mr. AG";
		}
	    if($head == 1){
		$head = "Waste";
	    } else if($head == 2){

		$head = "Maintenance";
	    }
	    else if($head == 4){

		$head = "Electricity";
	    }

	    else{
		$head = "Other";
	    }

		$this->ReportM->insert_receiver_expenditure($date, $receiver, $head, $amount);
		$this->session->set_flashdata('Expenditure_inserted', 'Expenditure Inserted Successfully :)');
	    redirect("Report/receiver_expenditure");

		}

		public function view_expenditure(){

			$data['expenditure'] = $this->ReportM->get_expenditure();
			// print_r($data['expenditure']);
			// die();

		    $this->load->view('Report_Monthwise/view_expenditure', $data);	
		}

public function TR_Report()
    {	
    	$data['property'] = $this->ReportM->get_property_tr_report();
    		
    	$this->load->view('TR_Report/select_property_for_tr_report',$data);

    }
    public function TR_Report_FROM_TO($property_id)
    {	
    	$data['property_id'] = $property_id;
    	$no_of_flats= $this->ReportM->get_no_of_flats($data['property_id']);

    	$data['flats'] = $no_of_flats[0]['flats'];

    	
    		
    	$this->load->view('TR_Report/select_from_to_date',$data);

    }

		public function TR_Report_details()
		{
			
			// $data['month'] = $_POST['month'];
			
		

			$data['property_id'] = $_POST['property_id'];
			$data['flat_no'] = $_POST['flats'];
			$data['from_date'] = $_POST['from_date'];
			$data['to_date'] = $_POST['to_date'];
			$property_id = $data['property_id'];
			
			$data['payment_details'] = $this->ReportM->get_payment_details($data['from_date'], $data['to_date'],$data['flat_no'], $data['property_id']);

			
			for ($i=0; $i < sizeof($data['payment_details']); $i++) { 

				$data['month'] = $data['payment_details'][$i]['month'];

				$data['payment_details'][$i]['payments'] = $this->ReportM->get_payment($data['month'], $data['flat_no'], $data['property_id']);
				
				
			}

			// echo "<pre>";
		    // print_r($data['payment_details']);
			// die();

			
		// foreach($flats as $f){

		// 		$property_id = $f[0]['property_id'];
		// 		$flat_no = $f[0]['flat_no'];

		// 		echo "<pre>";
		//     	print_r($data['property_id']);
		    	// echo "<br>";
		    	// print_r($data['flat_no']);
		// 		die();

	    // 	$data['tr_report_details'] = $this->ReportM->get_tr_report_details($data['month'], $property_id, $flat_no);

		// 	}

		

				$this->load->view('TR_Report/TR_Report',$data);
			}

}



?>