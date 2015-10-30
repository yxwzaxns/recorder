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
			$where=array('工号' => $user['工号']);
			$courses=$this->db->select('*')->from('实验课程安排表')->where($where)->get();
			$courses=$courses->result_array();

			if(!empty($course)){
				$data=array();
				//查询cid课号的学生
				//$result=$this->db->select('*')->from('表_1120139周海燕_'.urldecode($course))->get();
				$result=$this->db->query('select * from 表_1120139周海燕_'.urldecode($course).' limit 40');
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
		var_dump($_GET);
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
