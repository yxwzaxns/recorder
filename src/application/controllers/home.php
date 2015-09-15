<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('user')){
        	header('location:http://'.$_SERVER['HTTP_HOST'].'/	index.php');
        }
    }
	public function index($course=''){
		$user=$this->session->userdata('user');
		if($user['level']==1){
			
			$result=$this->db->query('select * from 表_1120139周海燕_通信原理 limit 20');
			$top=$result->result_array();

			$this->load->vars('top',$top);
			$this->load->view('home/advanced');
		}else{
			$where=array('工号' => $user['工号']);
			$courses=$this->db->select('*')->from('实验课程安排表')->where($where)->get();
			$courses=$courses->result_array();
			
			if(!empty($course)){
				$data=array();
				//查询cid课号的学生
				$result=$this->db->select('*')->from('表_1120139周海燕_'.urldecode($course))->get();
				$result=$result->result_array();
				//var_dump($result);exit;
				if($result){
					$data=$result;
					$this->load->vars('course',$course);
					$this->load->vars('course_data',$data);			
				}else{
					$data=0;
					$this->load->vars('course',$data);				
				}
				//查询试验课程
				$result=$this->db->query('show columns from 表_1120139周海燕_'.urldecode($course));
				$result=$result->result_array();
				foreach ($result as $key => $value) {
					$course_name[]=$value['Field'];
				}
				$this->load->vars('course_name',$course_name);	

			}else{
				$this->load->vars('data','');
			}

			if(!empty($courses)){

				$this->load->vars('courses',$courses);			
			}else{
				$courses='';
				$this->load->vars('courses',$courses);
			}

			$this->load->view('head');
			$this->load->view('home/common');
		}
		
	}
	function test(){
		echo "aaa";
		var_dump($_GET);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */