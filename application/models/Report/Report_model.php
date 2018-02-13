<?php

class Report_model extends CI_Model {

    public function reportStoreProduct(){
       $sql = " select * from clinic_product
              ";
       $query = $this->db->query($sql);
       $result = $query->result_array();
       return $result;
    }
    public function reportReceive() {
      $sql = "
        select c.appo_animal, a.service_detail, a.service_bath, b.product_amt_sum , b.product_amt ,a.created_dt , d.product_name from clinic_service a left JOIN clinic_service_detail b on a.id = b.service_id LEFT JOIN clinic_appointment c on a.appo_id = c.id left join clinic_product d on b.product_id = d.id WHERE b.product_amt_sum <> 0
      ";
      $query = $this->db->query($sql);
       $result = $query->result_array();
       return $result;
    }
    public function reportPayProductSearch($search_date_show){
       $sql = " 
              SELECT a.*,b.*,a.created_dt as created_dt_detail
              FROM clinic_service_detail a 
              LEFT JOIN clinic_product b on a.product_id = b.id 
              WHERE a.order_type = 'o'
              and a.created_dt like '%$search_date_show%'
              and a.product_amt <> '0'
              order by a.created_dt desc
              limit 100
              ";
       $query = $this->db->query($sql);
       $result = $query->result_array();
       return $result;
    }
    public function reportPayProduct(){
       $sql = " 
              SELECT a.*,b.*,a.created_dt as created_dt_detail
              FROM clinic_service_detail a 
              LEFT JOIN clinic_product b on a.product_id = b.id 
              WHERE a.order_type = 'o'
              and a.product_amt <> '0'
              order by a.created_dt desc
              limit 100
              ";
       $query = $this->db->query($sql);
       $result = $query->result_array();
       return $result;
    }
    public function reportAppoServiceSearch($search_date_show){
          $sql = " 
            SELECT a.*, b.* FROM clinic_appointment a
            LEFT JOIN clinic_member b on a.member_id = b.id
            where a.appo_date = '$search_date_show'
            order by a.id desc
          ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function reportAppoService(){
         $sql = " 
            SELECT a.*, b.* FROM clinic_appointment a
            LEFT JOIN clinic_member b on a.member_id = b.id
            order by a.id desc
          ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function reportService(){
         $sql = " 
           SELECT * FROM clinic_service a
           left join clinic_appointment b on a.appo_id = b.id
           left join clinic_member c on b.member_id = c.id
           order by a.id desc
          ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }
    public function reportMainPayment(){
         $sql = " 
            SELECT sum(service_bath) as bb FROM clinic_service where order_status = 1
          ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result[0]['bb'];    
    }
    public function reportPayment(){
             $sql = " 
              SELECT a.product_id ,b.product_name,sum(a.product_amt_sum) as pp
              FROM clinic_service_detail a 
              LEFT JOIN clinic_product b on a.product_id = b.id 
              WHERE a.order_type = 'o'
              and a.product_amt <> '0'
              group by a.product_id
              ";
       $query = $this->db->query($sql);
       $result = $query->result_array();
       return $result;
    }


}