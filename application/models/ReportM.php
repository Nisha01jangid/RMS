<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
                       
      function get_payments($to_date,$from_date,$user){

      // $sql = " SELECT payments.*, tenants.tenant_name,tenants.rent, houses.house_no, houses.flat_no FROM payments inner join tenants on tenants.id = payments.tenant_id inner join houses on houses.id = tenants.flat_no WHERE payments.date_created between '$to_date' and '$from_date' order by unix_timestamp(date_created)  asc";

      $sql = " SELECT entry_form_details.*, tenants.tenant_name,tenants.rent, houses.house_no, houses.flat_no FROM entry_form_details , tenants , houses , users  WHERE entry_form_details.user = '$user' and entry_form_details.user = users.username and tenants.property_id = entry_form_details.property_id AND tenants.flat_no = entry_form_details.flat_no AND houses.id = tenants.flat_no and entry_form_details.timestamp between '$to_date' and '$from_date' order by unix_timestamp(timestamp)  asc";
        $query = $this->db->query($sql);
        return $query->result_array();
      }
       function getAllHouses(){

    $sql="SELECT * from `property` where `active`= 1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }  

       function getAllFlats($property_id){

    $sql="SELECT flats from `property` where `property_id`= $property_id";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }    
  
    public function get_report_details_montwise($month,$property_id){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND `month` = '$month' AND status=1 ORDER BY `month` ";
 
    $result = $this->db->query($query);
    return $result->result_array();
    }
     public function previousReading($property_id,$flat_no,$month){

    $query = "SELECT * FROM entry_form_details WHERE property_id =$property_id AND flat_no = $flat_no AND month = '$month'";
    // print_r($query);
    // die();
    $result = $this->db->query($query);
    return $result->result_array()[0]['current_meter_reading'];
  }

}

?>