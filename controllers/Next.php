<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Next extends CI_Controller{
  public function __construct(){
    error_reporting(-1);
    ini_set('display_errors', 1);
    parent::__construct();
    $this->load->library('user_agent');
    $this->load->helper('url','debug');
  }
  public function index(){
    try{
      define('Static_is_one', 'http://static-a-1.hax0r.info/');
      //(?i)msie [5-6]/ 리다이렉트
      if(preg_match('/(?i)msie [5-6]/',$_SERVER['HTTP_USER_AGENT'])){
          header('location: http://blog.hax0r.info');
          die();
      }
      $data = array();
      $data['ua'] = _getBrowser();
      $this->template->title = '칼퇴';
      $q = $this->input->get('num');
      if(!isset($q)){
        throw new Exception('잘못된 요청입니다.');
      }
      if($_SERVER['SERVER_PORT'] == '433' or $this->input->get('q') =='dev'){
          $this->template->content->view('next/one', $data);
      }else{
          switch ($q) {
            case '0':
              $this->template->content->view('next/one', $data);
              break;
            case '1':
              $this->template->content->view('next/two', $data);
              break;
            case '2':
              $this->template->content->view('next/three', $data);
              break;
          }
      }
      $this->template->publish();
    }catch(Exception $e){

    }
  }
}
