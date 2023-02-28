<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function getAllHouses(){

    $sql="SELECT * from `house_address` where `active`=1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }

  function countFlats($house_no){

    $sql="SELECT count(flat_no) as count from `houses` where `house_no`='$house_no'";    
    $query = $this->db->query($sql);
    return $query->result_array()[0]['count'];

  }

  function get_flats($house_no){

    $query = "SELECT * from houses where house_no = '$house_no'";

    $result = $this->db->query($query);
    return $result->return_array();
  }

}