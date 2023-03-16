<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReportM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
                       
      function get_payments($to_date,$from_date){

      // $sql = " SELECT payments.*, tenants.tenant_name,tenants.rent, houses.house_no, houses.flat_no FROM payments inner join tenants on tenants.id = payments.tenant_id inner join houses on houses.id = tenants.flat_no WHERE payments.date_created between '$to_date' and '$from_date' order by unix_timestamp(date_created)  asc";

      $sql = " SELECT entry_form_details.*, tenants.tenant_name,tenants.rent, houses.house_no, houses.flat_no FROM entry_form_details , tenants , houses  WHERE tenants.property_id = entry_form_details.property_id AND tenants.flat_no = entry_form_details.flat_no AND houses.id = tenants.flat_no and entry_form_details.timestamp between '$to_date' and '$from_date' order by unix_timestamp(timestamp)  asc";

        $query = $this->db->query($sql);
        return $query->result_array();
      }

}

?>