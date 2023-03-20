<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
      
                       
      function get_payments($to_date,$from_date,$user){
      $sql = " SELECT entry_form_details.*, tenants.tenant_name,tenants.rent, houses.house_no, houses.flat_no FROM entry_form_details , tenants , houses , users  WHERE entry_form_details.user = '$user' and entry_form_details.user = users.username and tenants.property_id = entry_form_details.property_id AND tenants.flat_no = entry_form_details.flat_no AND houses.id = tenants.flat_no and entry_form_details.timestamp between '$to_date' and '$from_date' order by unix_timestamp(timestamp)  asc";
      $query = $this->db->query($sql);
        return $query->result_array();
      }
      function get_receiver_payments($from_date, $to_date, $receiver){

      $sql = "SELECT amount, reference_id, payment_date, payment_receiver FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and payment_receiver = '$receiver'";

        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flatwise_payments($to_date,$from_date,$property_id,$flat_no){
        $sql = " SELECT entry_form_details.*, tenants.tenant_name,tenants.rent, houses.house_no, houses.flat_no , invoice.invoice, invoice.amount_paid FROM entry_form_details , tenants , houses , invoice  
        WHERE  entry_form_details.property_id = $property_id and entry_form_details.flat_no = $flat_no
         and entry_form_details.property_id =entry_form_details.property_id 
         and entry_form_details.flat_no =entry_form_details.flat_no 
         and tenants.property_id = entry_form_details.property_id 
         AND tenants.flat_no = entry_form_details.flat_no 
         AND houses.id = tenants.flat_no 
        --  and entry_form_details.timestamp between '$to_date' and '$from_date' 
         order by unix_timestamp(entry_form_details.timestamp)  asc";
        // print_r($sql);die();
        $query = $this->db->query($sql);
        return $query->result_array();
      }
      public function get_total_receiver_payments($from_date, $to_date, $receiver){

        $sql = "SELECT SUM(amount) as total FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and payment_receiver = '$receiver'";
  
          $query = $this->db->query($sql);
          return $query->result_array();
        }
    public function getAllHouses(){

    $sql="SELECT * from `property` where `active`= 1";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }  

       function getAllFlats($property_id){

    $sql="SELECT flats from `property` where `property_id`= $property_id";    
    $query = $this->db->query($sql);
    return $query->result_array();

  }    
  
    public function get_report_details_monthwise($month,$property_id){

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

  public function get_tenant_entry_form_details($property_id){

    $query = "SELECT * FROM entry_form_details WHERE property_id = $property_id ORDER BY `month` ";
    
    $result = $this->db->query($query);
    return $result->result_array();
    
  }

  public function insert_receiver_expenditure($date, $receiver, $head, $amount){

    $query = "INSERT INTO `expenditure` (`date`, `receiver`, `head`, `amount`) VALUES ('$date', '$receiver', '$head', '$amount')";

    $result = $this->db->query($query);
    return ;

  }

  public function get_expenditure(){

    $query = "SELECT * FROM expenditure ";
    
    $result = $this->db->query($query);
    return $result->result_array();
    
  }

  public function get_receiver_expenditure($from_date, $to_date, $receiver){

    $query = "SELECT SUM(amount) AS amount FROM expenditure where date BETWEEN '$from_date' AND '$to_date' and receiver = '$receiver'";

    $result = $this->db->query($query);
    return $result->result_array();
  }




}

?>