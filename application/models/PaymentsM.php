<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaymentsM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }

      function get_payment(){

        $sql = "SELECT p.*,concat(t.lastname,', ',t.firstname,' ',t.middlename) as name FROM payments p inner join tenants t on t.id = p.tenant_id where t.status = 1 order by date(p.date_created) desc "; 
                  
        $query =$this->db->query($sql);
        return $query->result_array();
      }

      function insert_new_payment($tenant_id,$invoice,$amount){

        $sql = "INSERT INTO payments (tenant_id,invoice,amount) VALUES ('$tenant_id', '$invoice', '$amount')";

        $query = $this->db->query($sql);
        return;
      }

      function get_tenant_name_dropdown(){
        
        $sql ="SELECT *,concat(lastname,', ',firstname,' ',middlename) as name FROM tenants where status = 1 order by name asc"; 
        $query = $this->db->query($sql);
        return $query->result_array();
      }
                
                         
}

?>