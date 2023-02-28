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
		$data['houses'] = $this->HomeM->getAllHouses();
		$i=0;
		foreach($data['houses'] as $house){
			$data['houses'][$i]['count'] = $this->HomeM->countFlats($house['house_no']);
			$i++;
		}
		$this->load->view('Home/Home',$data);
	}

	public function flats($house_name){

		$house_name = base64_decode($house_name);

		$data['flats'] = $this->HomeM->get_flats($house_name);
		// echo "<pre>";
		// print_r($data['flats']);
		// die();
		$this->load->view('Home/flats', $data);
	}


}
