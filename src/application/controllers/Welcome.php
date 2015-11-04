<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('index');
	}
	public function register(){
		if($_POST){
			$this->load->database();
			$data['tid']=$this->input->post('tid');
			$data['username']=$this->input->post('username');
			$data['password']=md5($this->input->post('password'));
			$data['email']=$this->input->post('email');
			$data['status']=0;
			date_default_timezone_set("Asia/Shanghai");
			$data['createdate']=time();

			$result=$this->db->insert('user',$data);

			if($result){
				header("Content-type: application/json");
				echo json_encode($result);
			}else{
				//返回失败信息
				header("Content-type: application/json");
				$result=null;
				echo json_encode($result);
			}
		}else{
			$this->load->view('register');
		}
	}
	public function login(){
    	$where=array("姓名" => $this->input->post('username'),'密码' => $this->input->post('password'));
    	$this->load->database();
 		$this->db->db_set_charset('utf8');
    	$result=$this->db->select('*')->from('教工用户表')->where($where)->get();
    	$result=$result->row_array();
    	if(!empty($result['工号'])){
    		$this->session->set_userdata("user",$result);
    		// header('location: http://localhost/ci_recorder/index.php/admin/index');
    		header("Content-type: application/json");
			$res['status']=1;
			$res['path']='http://'.$_SERVER['HTTP_HOST'].'/index.php/home/index';
			echo json_encode($res);
    	}else{
			header("Content-type: application/json");
			$res['status']=0;
			//$res['info']=$result;
			echo json_encode($res);
    	}
	}
    public function logout(){
    	$this->session->unset_userdata($this->session->userdata('user'));
    	$this->session->sess_destroy();
		header("location: http://".$_SERVER['HTTP_HOST']."/index.php");
    }
  	public function search($sid){
			if(!empty($sid)){
				$res=$this->db->query("select * from absencelist where sid = ".$sid);
				$res=$res->result_array();
				if($res){
					header("Content-type: application/json");
					$data['status']=1;
					//$data['data']=json_encode($res);
					$data['data']=$res;
					echo json_encode($data);
				}else {
					header("Content-type: application/json");
					$data['status']=1;
					$data['data']="你目前没有缺勤记录";
					echo json_encode($data);
				}
			}
		}
    public function show(){
    	$where['id']=333;
    	$re=$this->db->select('*')->from('ba')->where($where)->get();
    	$re=$re->row_array();
    	var_dump($re);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
