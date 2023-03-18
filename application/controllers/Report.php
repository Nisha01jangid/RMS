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
	// $data['user']=$_SESSION['user'];
	// print_r($data['user']);die();
	$data['payments']= $this->ReportM->get_payments($data['from_date'],$data['to_date'],$_SESSION['user']);
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

	public function select_month_for_report_monthwise($property_id)
	{
		
		$data['property_id'] = $property_id;
		$i=0;
        foreach($data as $p){
            $check = $data['flats'] = $this->ReportM->getAllFlats($property_id);
            if(!empty($check)){
                $data['flats'][$i]['flats'] = $check[$i]['flats'];
            }else{
                $data['flats'][$i]['flats']="";
            }
            $i++;
        }
		$this->load->view('Report_Monthwise/select_month_for_report_monthwise',$data);
	}
    
    public function Report_Monthwise()
    {
    	$data['month'] = $_POST['month'];
    	$data['property_id'] =$_POST['property_id'];
    	$property_id = $data['property_id'];

    	

    	$data['report_monthwise_details'] = $this->ReportM->get_report_details_montwise($data['month'],$data['property_id']);
    	// echo "<pre>";
    	
    	// print_r($data['report_monthwise_details']);
		// die();

    	$month = $data['report_monthwise_details'][0]['month'];
    	$flat_no = $data['report_monthwise_details'][0]['flat_no'];
		// echo $month;
		// die();
		$previous_month =  date('Y-m', strtotime('-1 month'));
		$data['previous_reading'] = $this->ReportM->previousReading($property_id,$flat_no,$previous_month);
    	$this->load->view('Report_Monthwise/Report_monthwise',$data);
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
		
		$data['tenant_entry_form_details'] = $this->ReportM->get_tenant_entry_form_details($data['property_id']);
	
		// for($i = 0; $i < sizeof($data['tenant_entry_form_details']); $i++){

		// 	$month = $data['tenant_entry_form_details'][$i]['month'];
		// 	$data1 = explode('-', $month);
	    //     $month_only = $data1[1];

		// 	$data['paid_amount'] = $this->ReportM->get_tenant_amount($data['property_id'], $month_only);

		// 	$data['tenant_entry_form_details'][$i]['amount_paid'] = $data['paid_amount'][0]['amount'];

		// }
		// echo "<pre>";
		// print_r($tenant_entry);
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
		$receiver = "Dr. Indra Kumar Shah";
	    } else if($receiver == 2){

		$receiver = "Sirs Father";
	    }else{
		$receiver = "Nisha";
	    }

	    if($head == 1){
		$head = "Waste";
	    } else if($head == 2){

		$head = "Maintenance";
	    }else{
		$head = "Other";
	    }

		$this->ReportM->insert_receiver_expenditure($date, $receiver, $head, $amount);
		$this->session->set_flashdata('Expenditure_inserted', 'Expenditure Inserted Successfully :)');
	    redirect("Report/receiver_expenditure");

		}


}


?>