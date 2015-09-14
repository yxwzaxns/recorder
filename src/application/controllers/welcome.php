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
    	$where=array("姓名" => $this->input->post('username'),'密码' => $this->input->post('password'));
    	$this->load->database();
 		$this->db->db_set_charset('utf8');
    	$result=$this->db->select('*')->from('教工用户表')->where($where)->get();
    	$result=$result->row_array();
    	if(!empty($result['工号'])){
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
    	$this->session->unset_userdata($this->session->userdata('user'));
    	$this->session->sess_destroy();
		header("location: http://".$_SERVER['HTTP_HOST']."/index.php");
    }
    public function deal(){
			$c=0;
			//3265
			for ($k=2800; $k < 3270; $k++) { 
				$file='/Users/ruby/yoooooou/www/recorder/src/sm/jpg3/38030302_baofeng_'.$k.'.jpg';
				$img=imagecreatefromjpeg($file);

				//$imgSize=getimagesize($file);
				//var_dump($imgSize);exit;
				$imgX=320;
				$imgY=240;

				$line=' ';
				$data=array();
				$page='';

				for ($h=0; $h < 320; $h++) { 
					$line[$h]='0';
				}
				

				for ($j=15; $j < $imgY;) { 

					for ($i=0; $i < strlen($line); $i++) { 
						$color=imagecolorat($img, $i, $j);
						//var_dump($color);exit;
					if     ((($color >> 16) & 0xFF) >= 200){
								$line[$i]='0';
							}elseif((($color >>  8) & 0xFF) >= 200) {
								$line[$i]='0';
							}elseif(($color & 0xFF) >= 200) {
								$line[$i]='0';
							}else
								$line[$i]='1';		
					}
						for ($t=0; $t < strlen($line);) { 
							$line[$t]='';
							//$line[$t+2]='';
							$line[$t+3]='';
							$line[$t+4]='';
							$t+=5;
						}
					$line1=$line."<br>";
					$page.=$line1;
					
					$j+=5;
					}
				
				$data['data']=$page;
				$data['id']=$k;
				$result=$this->db->insert('ba',$data);
				if($result)
				$c+=1;
				echo $c;
				echo "<br>";
			}
			echo 'all'.$c;
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