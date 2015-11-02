<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('user')){
        	header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php');
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
			$where=array('tid' => $user['工号']);
			$courses=$this->db->select('*')->from('courses')->where($where)->get();
			$courses=$courses->result_array();

			if(!empty($course)){
				//把当前课程写入cession
				$this->session->set_userdata('current_course',$course);
				$data=array();
				//查询cid课号的学生
				//$result=$this->db->select('*')->from('表_1120139周海燕_'.urldecode($course))->get();
				$result=$this->db->query('select * from 表_1120139周海燕_'.urldecode($course).' limit 50');
				$result=$result->result_array();
				if($result){
					foreach ($result as $key => $value) {
						$_data[$value['学号']]=$value;
					}
					//查询这个课程的分数
					$grade=$this->db->query('select * from 表_1120139周海燕_'.urldecode($course).'_grade limit 50');
					$grade=$grade->result_array();
					foreach ($grade as $key => $value) {
						$_data[$value['sid']]['grade']=$value;
					}
					//var_dump($_data);exit;

					$this->load->vars('course',$course);
					$this->load->vars('course_data',$_data);
				}else{
					$data=0;
					$this->load->vars('course',$data);
				}
				//查询已经上过试验课程
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
		$_key=$this->db->escape(1000220628);
		$_value=$this->db->escape("时域均衡");
		$rs=$this->db->query('update 表_1120139周海燕_通信原理_grade set '.$_value.'=23'.' where sid='.$_key);
		echo $rs;
	}
	function retroactive(){
		$sid=$this->input->post('sid');
		$item_name=$this->input->post('item_name');

		$courseName=$this->session->userdata('current_course');
		$user=$this->session->userdata('user');
		$courseTable='表_'.$user['工号'].$user['姓名'].'_'.urldecode($courseName);

		$rs=$this->db->query('update '.$courseTable.' set '.$item_name.'=1 where 学号='.$sid);
		if($rs){
			header("Content-type: application/json");
			$res['status']=1;
			$res['path']='http://'.$_SERVER['HTTP_HOST'].'/index.php/home/index/'.$this->session->userdata('current_course');
			$res['rs']=$rs;
			echo json_encode($res);
		}
	}
	function update_grade(){
		$data = $this->input->post();
		 if ($data) {
			$courseName=$this->session->userdata('current_course');
			$user=$this->session->userdata('user');
			$courseTable='表_'.$user['工号'].$user['姓名'].'_'.urldecode($courseName);

			$_items=$this->db->query('show columns from '.$courseTable);
			$_items=$_items->result_array();
			foreach ($_items as $key => $value) {
				$items[]=$value['Field'];
			}

			if ($this->db->table_exists($courseTable.'_grade')){
				$this->db->trans_start();
			    foreach ($data as $key => $value) {
						$d=explode("-",$key);
						$_key=$this->db->escape($d[0]);
						$_value=$d[1];
			    	$this->db->query('update '.$courseTable.'_grade set '.$_value.'='.$value.' where sid='.$_key);
			    }
				$this->db->trans_complete();
				header("Content-type: application/json");
				$res['status']=1;
				echo json_encode($res);
			}else{
					echo 'the table not exist';
			}

			//$result=$this->db->query('select * from '.$courseTable.' limit 1');
			//$result=$result->result_array();
		}

	}
	function dump_excel(){
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/Writer/Excel2007');

		$objPHPExcel= new PHPExcel();
		//$excel= new Excel2007($excel);

		// Set document properties
        $objPHPExcel->getProperties()
				->setCreator("标多网")
       	->setLastModifiedBy("标多网")
       	->setTitle("采购数据库")
       	->setSubject("采购数据库")
       	->setDescription("采购数据库")
       	->setKeywords("采购数据库")
       	->setCategory("Test result file");
			 // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', '序号')
                    ->setCellValue('B1', '学号')
                    ->setCellValue('C1', '姓名')

                    ->setCellValue('D1', '局域网实验')
                    ->setCellValue('D2', '考勤')
                    ->setCellValue('E2', '实验成绩')

                    ->setCellValue('F1', 'SDH实验')
                    ->setCellValue('F2', '考勤')
                    ->setCellValue('G2', '实验成绩')

                    ->setCellValue('H1', '接入网实验')
                    ->setCellValue('H2', '考勤')
                    ->setCellValue('I2', '实验成绩');

			$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
			$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
			$objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
			$objPHPExcel->getActiveSheet()->mergeCells('D1:E1');
			$objPHPExcel->getActiveSheet()->mergeCells('F1:G1');
			$objPHPExcel->getActiveSheet()->mergeCells('H1:I1');

			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);//水平方向上两端对齐
			$objPHPExcel->getActiveSheet()->getStyle( 'A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);//水平方向上两端对齐
			$objPHPExcel->getActiveSheet()->getStyle( 'B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);//水平方向上两端对齐
			$objPHPExcel->getActiveSheet()->getStyle( 'C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


			$objPHPExcel->getActiveSheet()->setCellValue('A3', '1');
			$objPHPExcel->getActiveSheet()->setCellValue('B3', '1300230323');
			$objPHPExcel->getActiveSheet()->setCellValue('C3', '许文毅');
			$objPHPExcel->getActiveSheet()->setCellValue('D3', '已到');
			$objPHPExcel->getActiveSheet()->setCellValue('E3', '43');

			 header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment;filename="采购数据库.xls"');
       header('Cache-Control: max-age=0');
			 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
       $objWriter->save('php://output');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
