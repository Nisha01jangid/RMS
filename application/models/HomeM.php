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

  function countFlats($property_id){

    $sql="SELECT count(flat_no) as count from `houses` where `property_id`='$property_id'";    
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

  public function check_flat_entry($flat_no, $property_id){

    $query = "SELECT * from tenants where flat_no = $flat_no and property_id = $property_id and `status` = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function insert_tenant_details($name, $father_name, $dob, $email, $rent, $mobile, $Aadhaar, $joining_date, $members, $property_id, $flat_no){

    $query = "INSERT INTO `tenants` (`tenant_name`, `father_name`, `email`, `aadhaar_no`, `contact`, `members`, `rent`, `birth_date`, `property_id`, `flat_no`, `status`, `joining_date`) VALUES ('$name', '$father_name', '$email', '$Aadhaar', '$mobile', '$members', '$rent', '$dob', '$property_id', '$flat_no', 1, '$joining_date')";

    $result = $this->db->query($query);
    return ;

  }

  public function insertElectricityReading($property_id, $flat_no, $month, $reading){

    $query = "INSERT INTO `flats_electricity_reading` (`property_id`, `flat_no`, `month`, `reading`) VALUES ('$property_id', '$flat_no', '$month', '$reading')";

    $result = $this->db->query($query);
    return ;

  }

  public function updateElectricityReading($property_id, $flat_no, $month, $reading){

    $query = "UPDATE `flats_electricity_reading` SET `reading` = $reading WHERE property_id = $property_id and flat_no = $flat_no and `month`='$month' ";

    $result = $this->db->query($query);
    return ;

  }

  public function check_flat_occupied($property_id, $flat_no){

    $query = "SELECT property_id , flat_no FROM tenants where property_id = $property_id and flat_no = $flat_no and status = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

  public function getElectricityReading($property_id, $flat_no, $month){

    $query = "SELECT reading FROM flats_electricity_reading where property_id = $property_id and flat_no = $flat_no and `month`='$month'";

    $result = $this->db->query($query);
    return $result->result_array();
  }

}