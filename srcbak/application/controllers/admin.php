<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class welcome extends CI_Controller {

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
    	$where=array("username" => $this->input->post('username'),"password" => md5($this->input->post('password')));
    	$this->load->database();
    	$result=$this->db->select('*')->from('user')->where($where)->get();

    	if(!empty($result->row_array())){
    		$this->load->library('session');
    		$this->session->set_userdata("user",$result);
    		// header('location: http://localhost/ci_recorder/index.php/admin/index');
    		header("Content-type: application/json");
			$result=1;
			echo json_encode($result);
    	}else{
			header("Content-type: application/json");
			$result=0;
			echo json_encode($result);    		
    	}		
	}
    public function logout(){
    	$_SESSION=array();
		if(isset($_COOKIE[session_name()])){
			setcookie(session_name(),'',time()-1,'/');
		}
		session_destroy();
		header("location: http://localhost/ci_recorder/index.php");
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */