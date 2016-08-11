<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		// $data['navs'] = $this->nav->get_navs();
		// $data['flinks'] = $this->db->query('select * from flink')->result_array();
		// $data['kcjj'] = $this->article->get_article(23);
		// $data['kcjc'] = $this->article->get_article(34);
		// // 教材图片
		// $data['kctp'] = $this->db->query('select * from ext_teach_photo')->result_array();
		// // 教材视频
		// $data['kcsp'] = $this->db->query('select * from article where type=2')->result_array();
		// var_dump($data['kcsp']);exit;
		$this->load->view('index');
	}
	public function nav_list($nav_id='')
	{

		// 判断是否有子栏目
		if($this->nav->has_node($nav_id) == 0){
			$article_id = $this->article->getIdFromNid($nav_id);
			header('location:http://'.$_SERVER['HTTP_HOST'].'/welcome/page/'.$article_id.'/0');
		}else{
			$first_subnav_id = $this->nav->get_subnavs($nav_id)[0]['id'];
			$first_article_id = $this->article->get_article($this->article->getIdFromNid($first_subnav_id))['id'];
			header('location:http://'.$_SERVER['HTTP_HOST'].'/welcome/page/'.$first_article_id);
		}
	}
	public function page($article_id='',$isNode=1)
	{

		$data['navs'] = $this->nav->get_navs();
		$data['article'] = $this->article->get_article($article_id)['content'];

		if( $isNode == 0){
			$data['subnavs'] = $this->nav->get_nav($this->article->getNidFromId($article_id));
		}else{
			$data['subnavs'] = $this->nav->get_subnavs($this->nav->getPidFromId($this->article->getNidFromId($article_id)));
		}

		$this->load->view('layout_top',$data);
		$this->load->view('layout_body');

	}
	public function test($value='')
	{
		$this->load->view('layout_top');
	}
}
