<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BillM extends CI_Model {
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

  function getLastWaterBill($year){

    $sql="SELECT *, sum(water_bill) as sum from `extra_charges` where `month` LIKE '$year%' group by `house_no` ";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  function getWaterBill($house_no,$month){

    $sql="SELECT water_bill from `extra_charges` where `house_no`='$house_no' and `month` = '$month'";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  function getWaterBillOfProperty($house_no,$month){

    $sql="SELECT water_bill from `extra_charges` where `house_no`='$house_no' and `month` = '$month'";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }
  function getPropertyName($property_id){

    $sql="SELECT property_name from `property` where `property_id`='$property_id' and `active` = 1";    
    $query = $this->db->query($sql);
    return $query->result_array()[0]['property_name'];

  }

  function insertWaterBill($house_no,$month,$water_bill){

    $sql="INSERT INTO `extra_charges` (`house_no`,`month`,`water_bill`) VALUES ('$house_no','$month','$water_bill')";    
    $query = $this->db->query($sql);
    return 1;

  }

  function updateWaterBill($house_no,$month,$water_bill){

    $sql="UPDATE `extra_charges` SET `water_bill`='$water_bill' WHERE `house_no`='$house_no' and `month` = '$month' ";    
    $query = $this->db->query($sql);
    return 1;

  }

}