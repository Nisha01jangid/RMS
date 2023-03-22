<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InvoiceM extends CI_Model {

      function __construct()
      {
          // Call the Model constructor
          parent::__construct();
      }
                       
      function get_property(){
        $sql = " SELECT * from property where `active`=1";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_invoice($property_id,$month){
        $sql = " SELECT * from invoice where `property_id`=$property_id and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function check_invoice($property_id, $flat_no, $month){
        $sql = " SELECT * from invoice where `property_id`=$property_id and flat_no = $flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function getFlatDetails($property_id, $flat_no, $month){
        $sql = " SELECT * from entry_form_details where `property_id`=$property_id and flat_no=$flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      // function get_payments($property_id, $flat_no, $month){
      //   $sql = " SELECT sum(payments.amount) as amount, payments.date_created from payments, tenants where tenants.`property_id`=$property_id and tenants.flat_no=$flat_no and tenants.status = 1 and tenants.id = payments.tenant_id and payments.`date_created` LIKE '$month%'";
      //   $query = $this->db->query($sql);
      //   return $query->result_array();
      // }

      function get_payments($property_id, $flat_no, $month){
        $sql = " SELECT sum(payment.amount) as amount, payment.payment_date from payment, tenants where tenants.`property_id`=$property_id and tenants.flat_no=$flat_no and tenants.status = 1 and payment.`property_id`=$property_id and payment.flat_no=$flat_no and payment.status = 1 and payment.`payment_date` LIKE '$month%'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flats($property_id){
        $sql = " SELECT * from tenants where `property_id`=$property_id and `status`=1 order by flat_no";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function get_flats_invoice($property_id, $month){
        $sql = " SELECT * from invoice where `property_id`=$property_id and `month`='$month' order by flat_no";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function insert_invoice($invoice, $property_id, $flat_no, $month, $tenant_name, $members, $rent, $electricity_rate, $water_rate, $units, $due_date){
        $sql = " INSERT INTO `invoice` (`invoice`,`property_id`,`flat_no`,`month`,`tenant_name`,`no_of_members`,`rent`,`electricity_rate`, `water_rate`, `electricity_units`, `due_date`) VALUES ('$invoice', $property_id, $flat_no, '$month','$tenant_name', $members, $rent, $electricity_rate, $water_rate, $units, '$due_date') ";
        $query = $this->db->query($sql);
        return ;
      }

      function update_invoice($invoice, $property_id, $flat_no, $month, $tenant_name, $members, $rent, $electricity_rate, $water_rate, $units, $due_date){
        $sql = " UPDATE `invoice` SET `tenant_name`='$tenant_name' and `no_of_members`=$members and `rent`=$rent and `electricity_rate`=$electricity_rate and `water_rate`=$water_rate and `electricity_units`=$units and `due_date`='$due_date' WHERE `invoice`='$invoice' and `property_id`=$property_id and `flat_no`=$flat_no and `month`='$month'";
        $query = $this->db->query($sql);
        return ;
      }

      function get_invoice_status($property_id,$month){
        $sql = " SELECT * from invoice_status where `property_id`=$property_id and `month`='$month'";
        $query = $this->db->query($sql);
        return $query->result_array();
      }

      function insert_status($property_id,$month,$date){
        $sql = " INSERT INTO `invoice_status` (`property_id`,`month`,`date`) VALUES ($property_id,'$month','$date')";
        $query = $this->db->query($sql);
        return;
      }

      function update_status($property_id,$month, $date){
        $sql = "UPDATE `invoice_status` SET `date`= '$date' WHERE `property_id`=$property_id and `month`='$month' ";
        $query = $this->db->query($sql);
        return;
      }
}

?>