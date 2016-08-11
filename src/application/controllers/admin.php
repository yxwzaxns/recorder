<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function __construct()
	 {
	     parent::__construct();
	     if(!$this->session->has_userdata('user')){
	     	header('location:http://'.$_SERVER['HTTP_HOST'].'/func/admin_login');
	     }
	 }

	public function index()
	{
		// get nav and subnav
		$navs=$this->nav->get_navs();
		// get article

		// get user_info
			// user_info d u c
		//
		$data['navs']=$navs;
		$this->load->view('head');
		$this->load->view('admin/nav');
		$this->load->view('admin/index',$data);
	}
	public function info($value='')
	{

		$this->load->view('admin/info');
	}
	// public function nav_list($value='')
	// {
	// 	$this->load->view('head');
	// 	$this->load->view('admin/');
	// }
	public function nav_create($value='')
	{
		if($_POST){
			if($id=$this->nav->insert()){
				if($this->article->create_nav_article($id))
					show_message("创建主栏目成功","/admin/",302);
				else
					show_error("出问题了..");
			}else{
				show_error("出问题了");
			}
		}else{
			$this->load->view('head');
			$this->load->view('admin/nav_create');
		}
	}
	public function subnav_create($value='')
	{
		if($_POST)
			if($id=$this->nav->insert())
				if($this->article->create_nav_article($id))
					show_message("子栏目创建成功",'/admin/subnav_list/'.$this->input->post('pid'),302);
				else
					show_error("出问题了..");
			else
				show_error("出问题了");
	}
	public function subnav_update($nav_id='',$article_id='')
	{
		if($_POST){
			if($this->article->update($article_id))
				show_message("子栏目内容更新成功",'/admin/subnav_list/'.$nav_id,302);
			else
				show_error("出问题了..");
		}else{
			$data['article'] = $this->article->get_article($article_id);
			$data['nav_id'] = $nav_id;
			$data['article_id'] = $article_id;
			$this->load->view('head');
			$this->load->view('admin/article_update',$data);
		}
	}
	public function nav_delete($nav_id='',$subnav_id='')
	{
		if(!empty($nav_id) && !empty($subnav_id)){
			if($this->nav->delete($subnav_id) && $this->article->delete($this->article->getIdFromNid($subnav_id)))
				show_message("栏目删除成功",'/admin/subnav_list/'.$nav_id,302);
			else
				show_error("出问题了");
		}elseif(!empty($_POST['navname'])){
			if($this->article->delete($this->article->getIdFromNid($this->nav->getIdFromNavname($_POST['navname']))) && $this->nav->delete($this->nav->getIdFromNavname($_POST['navname'])))
				show_message("栏目删除成功",'/admin/',302);
			else
				show_error("出问题了");
		}
	}
	public function article($value='')
	{
		if($_POST){

		}
	}
	public function article_create($nid='')
	{
		$this->article->insert($nid);
	}
	public function article_delete($article_id='')
	{
		// var_dump($_SERVER);exit;
		if( $this->article->delete($article_id))
			show_message("删除成功",$_SERVER['HTTP_REFERER'],302);
		else
			show_error("出问题了");
	}
	public function article_update($nav_id='',$article_id='')
	{
		if($_POST){
			if($this->article->update($article_id))
				show_message("子栏目内容更新成功",$_SERVER['HTTP_REFERER'],302);
			else
				show_error("出问题了..");
		}else{
			$data['article'] = $this->article->get_article($article_id);
			$data['nav_id'] = $nav_id;
			$data['article_id'] = $article_id;
			$this->load->view('head');
			$this->load->view('admin/article_update',$data);
		}
	}
	public function video_article_update($article_id='')
	{
		if($_POST){
			if($this->article->update($article_id))
				show_message("子栏目内容更新成功",'/admin/teach_video_list/',302);
			else
				show_error("出问题了..");
		}else{
			$data['article'] = $this->article->get_article($article_id);
			$data['article_id'] = $article_id;
			$this->load->view('head');
			$this->load->view('admin/video_article_update',$data);
		}
	}
	public function subnav_list($nav_id='')
	{
		$data['subnav']=$this->nav->get_subnavs($nav_id);
		foreach ($data['subnav'] as $key => $value) {
			$data['subnav'][$key]['article_id'] = $this->article->getIdFromNid($value['id']);
		}
		$data['nav_id'] = $nav_id;
		$data['nav_article_id'] = $this->article->getIdFromNid($nav_id);
		// var_dump($data);exit;
		$this->load->view('head');
		$this->load->view('admin/subnav_list',$data);
	}
	// **
	public function teach_video_list($value='')
	{
		if($_POST){
			if($this->article->insert()){
				show_message("教学视频添加成功",'/admin/teach_video_list/',302);
			}else {
				show_error("出问题了..");
			}
		}else {
			// $data['']
			$data['teach_videos'] = $this->article->get_articles_where(array("type" => 2));
			$this->load->view('head');
			$this->load->view('admin/teach_video_list',$data);
		}
	}
	// **
	public function flink_list($value='')
	{
		$data['flinks']=$this->db->query('select * from flink')->result_array();
		// var_dump($data);exit;
		$this->load->view('head');
		$this->load->view('admin/flink_list',$data);
	}
	public function flink_create($value='')
	{
		if($_POST){
			$data['name']=$this->input->post('name');
			$data['url']=$this->input->post('url');

			if($this->db->insert('flink',$data))
				show_message("友链添加成功",'/admin/flink_list',302);
			else
				show_error("出问题了..");
		}
	}
	public function flink_delete($id='')
	{
		if($this->db->delete('flink',array("id" => $id)))
			show_message("友链删除成功",'/admin/flink_list',302);
		else
			show_error("出问题了..");
	}
	public function reset_password($value='')
	{
		if($_POST){
			if($this->user->reset_password())
				show_message("密码修改成功",'/admin/reset_password',302);
			else
				show_error("出问题了..");
		}else{
			$this->load->view('head');
			$this->load->view('admin/reset_password');
		}
	}
	public function teach_photo_list($value='')
	{
		if($_FILES){
			$config['upload_path']      = 'public/upload/images/';
  		$config['allowed_types']    = 'gif|jpg|png';
  		$config['max_size']     = '0';
  		$config['max_width']        = 3000;
  		$config['max_height']       = 3000;
      $config['encrypt_name']     = true;

  		$this->load->library('upload', $config);

  		if ( ! $this->upload->do_upload('fileList'))
  		{
  				$photo = $this->upload->display_errors();
					echo $photo;
  		}
  		else
  		{
  				$photo = '/public/upload/images/'.$this->upload->data('file_name');
					$this->db->insert('ext_teach_photo',array( "path" => $photo ));
					echo $this->upload->data('file_name');
  		}
		}else{
			$data['teach_photos'] = $this->db->query('select * from ext_teach_photo')->result_array();
			$this->load->view('head');
			$this->load->view('admin/teach_photo_list',$data);
		}
	}
	public function photo_delete($id='')
	{
		$this->db->where('id', $id);
		if( $this->db->delete('ext_teach_photo'))
			show_message("删除成功",'/admin/teach_photo_list',302);
		else
			show_error("出问题了..");
	}
	public function test($value='')
	{
		if ($_POST) {
			var_dump($_POST);
		}else{
			var_dump($_POST);
		}
	}
}
