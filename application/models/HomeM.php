<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeM extends CI_Model {
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
  }
  
  function getAllHouses(){

    $sql="SELECT * from `property` where `active`= 1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }

  function countFlats($house_no){

    $sql="SELECT count(flat_no) as count from `houses` where `house_no`='$house_no'";    
    $query = $this->db->query($sql);
    return $query->result_array()[0]['count'];

  }

  function get_flats($property_id){

    $query = "SELECT * from property where property_id = '$property_id'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_new_property($property_name, $property_address, $flats){

    $query = "INSERT INTO `property` (`property_name`, `property_address`, `flats`, `active`) VALUES ('$property_name', '$property_address', '$flats', 1)";

    $result = $this->db->query($query);
    return ;

  }

  public function check_flat_entry($flat_number, $property_id){

    $query = "SELECT * from tenants where flat_number = $flat_number and property_id = $property_id and `status` = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_tenant_details($name, $father_name, $dob, $email, $rent, $mobile, $Aadhaar, $joining_date, $members, $property_id, $flat_number){

    $query = "INSERT INTO `tenants` (`tenant_name`, `father_name`, `email`, `aadhaar_no`, `contact`, `members`, `rent`, `birth_date`, `property_id`, `flat_number`, `status`, `joining_date`) VALUES ('$name', '$father_name', '$email', '$Aadhaar', '$mobile', '$members', '$rent', '$dob', '$property_id', '$flat_number', 1, '$joining_date')";

    $result = $this->db->query($query);
    return ;

  }

}