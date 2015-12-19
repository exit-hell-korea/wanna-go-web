<?php defined('BASEPATH') OR exit('No direct script access allowed');

class U extends CI_Controller{
  public function index(){
    try{
      $this->load->library('user_agent');
      if(!$this->user_agent->is_mobile()){
        throw new Exception('모바일만 접근 가능해요.');
      }
      $this->template->title = '퇴근한다고 전해라';
      if($_SERVER['SERVER_PORT'] == '433' or $this->input->get('q') =='dev'){
          $this->template->content->view('index/dev_content', $data); // 개발 서버 뷰
          exit;
      }else{
          $this->template->content->view('index/content', $data);
      }
      exit;// 기본
    }catch(Exception $e){

    }
  }
}
