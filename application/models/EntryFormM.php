<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EntryFormM extends CI_Model {

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
  function get_flats($property_id){

    $query = "SELECT * from property where property_id = '$property_id'";

    $result = $this->db->query($query);
    return $result->result_array();
  }
  public function check_flat_occupied($property_id, $flat_no){

    $query = "SELECT property_id , flat_no FROM tenants where property_id = $property_id and flat_no = $flat_no and status = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }

   public function check_flat_entry($flat_no, $property_id){

    $query = "SELECT * from tenants where flat_no = $flat_no and property_id = $property_id and `status` = 1";

    $result = $this->db->query($query);
    return $result->result_array();
  }
                       
     
}
?>