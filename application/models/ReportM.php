<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
      
                       
      function get_receiver_payments($from_date, $to_date, $receiver){

      $sql = "SELECT amount, reference_id, payment_date, payment_receiver FROM payment where payment_date BETWEEN '$from_date' AND '$to_date' and payment_receiver = '$receiver'";

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