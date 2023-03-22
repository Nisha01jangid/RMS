<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('InvoiceM');
    }	
	
	public function index()
	{
        if(isset($_POST['month'])){
            $data['month'] = $_POST['month'];
        }else{
            $data['month'] = date("Y-m");
        }
        $data['property'] = $this->InvoiceM->get_property();
        $i=0;
        foreach($data['property'] as $p){
            $check = $this->InvoiceM->get_invoice_status($p['property_id'],$data['month']);
            if(!empty($check)){
                $data['property'][$i]['timestamp'] = $check[0]['timestamp'];
            }else{
                $data['property'][$i]['timestamp']="";
            }
            $i++;
        }
		$this->load->view('Invoice/Property_list', $data);
	}

    public function generate_invoice($property_id,$month){
        
        $flats = $this->InvoiceM->get_flats($property_id);
        foreach($flats as $f){
            $flat_details = $this->InvoiceM->getFlatDetails($property_id,$f['flat_no'],$month);
            if(!empty($flat_details)){
                $invoice = $month."/".$f['flat_no'];
                $current_reading = $flat_details[0]['current_meter_reading'];
                $previous_month = date("Y-m", strtotime ( '-1 month' , strtotime ( $month ) )); 
                $previous_reading = $this->InvoiceM->getFlatDetails($property_id,$f['flat_no'],$previous_month);
                $units = $previous_reading[0]['current_meter_reading'];
                $check = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $month);

                if(!empty($check)){
                    $this->InvoiceM->update_invoice($invoice, $property_id, $f['flat_no'], $month, $f['tenant_name'], $f['members'], $f['rent'], $flat_details[0]['electricity_rate'], $flat_details[0]['water_rate'], $units, $flat_details[0]['duedate']);    
                }else{
                    $this->InvoiceM->insert_invoice($invoice, $property_id, $f['flat_no'], $month, $f['tenant_name'], $f['members'], $f['rent'], $flat_details[0]['electricity_rate'], $flat_details[0]['water_rate'], $units, $flat_details[0]['duedate']);
                }
                
            }       
        }

        $check_status = $this->InvoiceM->get_invoice_status($property_id,$month);
        $date = date("Y-m-d");
        if(!empty($check_status)){
            $this->InvoiceM->update_status($property_id,$month, $date);
        }else{
            $this->InvoiceM->insert_status($property_id,$month, $date);
        }
        $this->session->set_flashdata('invoice', 'Invoice Generated Successfully :)');
		redirect("Invoice");
    }

    public function view_invoice($property_id, $month){
        if(isset($_POST['month'])){
            $month = $_POST['month'];
        }
        $data['flats'] = $this->InvoiceM->get_flats($property_id);
        
        $i=0;
        foreach($data['flats'] as $f){
            $check = $this->InvoiceM->check_invoice($property_id, $f['flat_no'], $month);
            if(!empty($check)){
                $data['flats'][$i] = $check[0];
            }
            $i++;
        }
        $data['property_id']=$property_id;
        $data['month']=$month;
        $this->load->view('Invoice/ViewInvoice',$data);
    }

    public function view_flat_invoice($property_id, $flat_no, $month){
        
        $data = $this->InvoiceM->check_invoice($property_id, $flat_no, $month);
        if(!empty($data)){
            $data['data'] = $data[0];
        }
        $check_payments = $this->InvoiceM->get_payments($property_id, $flat_no, $month);
        if(!empty($check_payments)){
            $data['data']['amount_paid']=$check_payments[0]['amount'];
            $data['data']['payment_date']=$check_payments[0]['payment_date'];
        }else{
            $data['data']['amount_paid'] = 0;
            $data['data']['payment_date'] = "";
        }
        
        $data['property_id']=$property_id;
        $data['month']=$month;
        // echo "<pre>";
        // print_r($data);
        // die();
        $this->load->view('Invoice/ViewFlatInvoice',$data);
    }

    public function print_invoice($property_id, $month){
        $data['flats'] = $this->InvoiceM->get_flats_invoice($property_id, $month);
        $i=0;
        foreach($data['flats'] as $f){
            $check_payments = $this->InvoiceM->get_payments($property_id, $f['flat_no'], $month);
            if(!empty($check_payments)){
                $data['flats'][$i]['amount_paid']=$check_payments[0]['amount'];
                $data['flats'][$i]['payment_date']=$check_payments[0]['payment_date'];
            }else{
                $data['flats'][$i]['amount_paid'] = 0;
                $data['flats'][$i]['payment_date'] = "";
            }
            $i++;
        }
        
        $data['property_id']=$property_id;
        $data['month']=$month;
        // echo "<pre>";
        // print_r($data);
        // die();
        $this->load->view('Invoice/PrintInvoice',$data);
    }
}
