<?php defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller{
  public function __construct(){
    error_reporting(-1);
    ini_set('display_errors', 1);
    parent::__construct();
    $this->load->library('user_agent');
  }
  public function index(){
    try{
      $data = array();
      $this->template->title = '칼퇴';
      if($_SERVER['SERVER_PORT'] == '433' or $this->input->get('q') =='dev'){
          $this->template->content->view('default/content', $data);
          exit;
      }else{
          $this->template->content->view('default/content', $data);
      }

      exit;// 기본
    }catch(Exception $e){

    }
  }
}
