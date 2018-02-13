<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// include the base class
require_once("application/core/MXAdmin_Controller.php");

class Report extends MXAdmin_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct() {
     parent::__construct();
     $this->load->model('Report/Report_model', 'report_model');
  }
  public function reportAppoService(){

    if(isset($_GET['search_date_show'])) {
      $search_date_show = $_GET['search_date_show'];
      if($search_date_show  == "") {
        $data = $this->report_model->reportAppoService();
      }else{
        $data = $this->report_model->reportAppoServiceSearch($search_date_show);
      }
    } else {
      $data = $this->report_model->reportAppoService();
    }

    
    $data = array(
        'path' => 'admin/report/report_appo_service',
        'data' => $data,
    );
    self::render($data);
  }
  public function reportPayProduct(){

    if(isset($_GET['search_date_show'])) {
      $search_date_show = $_GET['search_date_show'];
      if($search_date_show  == "") {
         $data = $data = $this->report_model->reportPayProduct();
      }else{
        $data = $this->report_model->reportPayProductSearch($search_date_show);
      }
    } else {
       $data = $data = $this->report_model->reportPayProduct();
    }

    
   
    $data = array(
        'path' => 'admin/report/report_pay_product',
        'data' => $data,
    );
    self::render($data);
  }
  public function reportStoreProduct(){
    $data = $this->report_model->reportStoreProduct();
    $data = array(
        'path' => 'admin/report/report_store_product',
        'data' => $data,
    );
    self::render($data);
  }
  public function reportService(){
    $data = $this->report_model->reportService();
    $data = array(
        'path' => 'admin/report/report_service',
        'data' => $data,
    );
    self::render($data);
  }

  public function reportReceive(){
    $data = $this->report_model->reportReceive();
    $data = array(
        'path' => 'admin/report/report_receive',
        'data' => $data,
    );
    // echo '<pre>';
    // print_r( $data );
    // die;
    self::render($data);
  }
  public function reportPayment(){
    $bb =  $this->report_model->reportMainPayment();
    $data =  $this->report_model->reportPayment();
    $arr = array(
      'product_id' => 0,
      'product_name' => 'อื่นๆ',
      'pp' => $bb
    );
    array_push($data, $arr);
    $data = array(
        'path' => 'admin/report/report_payment',
        'data' => $data,
    );
    self::render($data);
  }
}
