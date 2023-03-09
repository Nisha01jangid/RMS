<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class EntryForm extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('EntryFormM');
	}

	public function index(){

		$data['property'] = $this->EntryFormM->getAllHouses();
		$this->load->view('EntryForm/select_property',$data);
	}	


	public function flats($property_id){

		$property_id = $property_id;
		$data['flat'] = $this->EntryFormM->get_flats($property_id);
		$data['property_id'] = $property_id;

		$data['flats'] = array();

		for($i=1; $i<=$data['flat'][0]['flats']; $i++){

			$flat_status = $this->EntryFormM->check_flat_occupied($property_id, $i);
			if(!empty($flat_status)){
				$data['flats'][$i] = 1;
			} else {
				$data['flats'][$i] = 0;
			}

		}

		// echo "<pre>";
		// print_r($data['flats']);
		// die();

		$this->load->view('EntryForm/select_flat', $data);
	}

	public function entry_form($flat_no,$property_id){

		$data['flat_no'] = $flat_no;
		$data['property_id'] = $property_id;

		$data['flat_entry'] = $this->EntryFormM->check_flat_entry($flat_no, $property_id);

		// echo "<pre>";
		// print_r($flat_no);
		// print_r($property_id);
		// die();

		$this->load->view('EntryForm/entry_form_view', $data);


	}
	
}

?>