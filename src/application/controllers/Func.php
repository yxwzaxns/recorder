<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Func extends CI_Controller {

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
		// echo "func/index";
		// $this->load->view('welcome_message');
	}
	public function login($value='')
	{
		$where=array("username" => $this->input->post('username'),'password' => md5($this->input->post('password')));
		$result=$this->db->select('*')->from('user')->where($where)->get();
		$result=$result->row_array();
		if(!empty($result['id'])){
			$this->session->set_userdata("user",$result);
			// header('location: http://localhost/ci_recorder/index.php/admin/index');
			header("Content-type: application/json");
			$res['status']=1;
			$res['path']='http://'.$_SERVER['HTTP_HOST'].'/home/index';
			echo json_encode($res);
		}else{
			header("Content-type: application/json");
			$res['status']=0;
			//$res['info']=$result;
			echo json_encode($res);
		}

		// if($_POST){
		// 	// if ( 1 == $this->input->post('position') && 'admin'!=$this->input->post('username')) {
		// 	$where=array("username" => $this->input->post('username'),'password' => md5($this->input->post('password')));
		// 	$this->db->db_set_charset('utf8');
		// 	$result=$this->db->select('*')->from('admin')->where($where)->get();
		// 	$result=$result->row_array();
		//
		// 	if(!empty($result['sid'])){
		// 		$this->session->set_userdata("user",$result);
		// 		header('location:http://'.$_SERVER['HTTP_HOST'].'/dede/bishe/index.php/home/student');
		// 	}else{
		// 		// header("Content-type: application/json");
		// 		// $res['status']=0;
		// 		// //$res['info']=$result;
		// 		// echo json_encode($res);
		// 		show_error("用户名或密码错误",403);
		// 	}
		// }else{
		// 	$this->load->view('head');
		// 	$this->load->view('func/login');
		// }
	}
	public function admin_login($value='')
	{
		if($_POST){
			// if ( 1 == $this->input->post('position') && 'admin'!=$this->input->post('username')) {
			$where=array("username" => $this->input->post('username'),'password' => md5($this->input->post('password')));
			$this->load->database();
			$this->db->db_set_charset('utf8');
			$result=$this->db->select('*')->from('admin')->where($where)->get();
			$result=$result->row_array();
			if(!empty($result['id'])){

				$this->session->set_userdata("user",$result);
				show_message("登录成功",'/admin/');
				// header('location:http://'.$_SERVER['HTTP_HOST'].'/dede/bishe/index.php/home/student');
			}else{
				// header("Content-type: application/json");
				// $res['status']=0;
				// //$res['info']=$result;
				// echo json_encode($res);
				show_error("用户名或密码错误",403);
			}
		}else{
			$this->load->view('head');
			$this->load->view('func/login');
		}
	}
	public function logout($value='')
	{
		$this->session->unset_userdata($this->session->userdata('user'));
		$this->session->sess_destroy();
		show_message("已退出登录。","/",302);
		// header("location: http://".$_SERVER['HTTP_HOST']."/dede/bishe/index.php");
	}
	public function register($value='')
	{
		if($_POST){
			$this->load->database();
			$data['sid']=$this->input->post('sid');
			$data['username']=$this->input->post('username');
			$data['password']=md5($this->input->post('password'));
			$data['major']=$this->input->post('major');
			$data['grade']=$this->input->post('grade');
			$data['qq']=$this->input->post('qq');
			$data['phone']=$this->input->post('phone');
			$data['email']=$this->input->post('email');
			$data['status']=0;
			// date_default_timezone_set("Asia/Shanghai");
			// $data['createdate']=time();

			$result=$this->db->insert('student',$data);

			if($result){
				// header("Content-type: application/json");
				// echo json_encode($result);
				header('location:http://'.$_SERVER['HTTP_HOST'].'/dede/bishe');
			}else{
				//返回失败信息
				// header("Content-type: application/json");
				// $result=null;
				// echo json_encode($result);
				var_dump("no");
			}
		}else{
			$this->load->view('register');
		}
	}
	public function destroy($value='')
	{
		# code...
	}
}
