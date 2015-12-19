<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{
    function __construct(){
        parent::__construct();
        // $this->load->helper('url','debug');
        // $this->load->model('users');
    }
    //리스트
    public function index($m){
      try{
        if(isset($m)){
          $data = array();
          $uuid = $this->input->post('uuid');//uuid
          if(!$this->input->get('is') == 'dev'){
            if(!$uuid){
              throw new Exception('uuid는 필수입력값입니다.');
            }
          }
          switch ($m) {
            case 'insert'://insert
              break;
            case 'get' ://get
              break;
            case 'test':
              echo 'test';
              break;
          }
        }
      }catch (Exception $e) {
      echo $e->getMessage();
      }
    }
}
