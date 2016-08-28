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
		if($user['level']!=1){

			// $result=$this->db->query('select * from 表_1120139周海燕_通信原理 limit 20');
			// $top=$result->result_array();
      //
			// $this->load->vars('top',$top);
			// $this->load->view('home/advanced');
		}else{

      $this->db->db_select("recorder");
			$where=array('tid' => $user['tid']);
			$courses=$this->db->select('*')->from('courses')->where($where)->get();
			$courses=$courses->result_array();
      $this->db->db_select("sakura");

			if(!empty($course)){
        // var_dump(base64_decode("a"));exit();
				//把当前课程写入cession
				$this->session->set_userdata('current_course',$course);
        $course = base64_decode(replace_base64_char($course,$flag='0'));
				$data=array();
				//查询cid课号的学生
				//$result=$this->db->select('*')->from('表_1120139周海燕_'.urldecode($course))->get();
        $this->db->db_select("recorder");
				$result=$this->db->query('select * from 表_1120139周海燕_'.$course);
				$result=$result->result_array();
				if($result){
					foreach ($result as $key => $value) {
						$_data[$value['学号']]=$value;
					}
					//查询这个课程的分数
					$grade=$this->db->query('select * from 表_1120139周海燕_'.$course.'_grade');
					$grade=$grade->result_array();
					foreach ($grade as $key => $value) {
						$_data[$value['sid']]['grade']=$value;
					}
					//var_dump($_data);exit;

					$this->load->vars('course',$course);
					$this->load->vars('course_data',$_data);
				}else{
					$data=0;
					$this->load->vars('data',$data);
				}
				//查询已经上过试验课程
				$result=$this->db->query('show columns from 表_1120139周海燕_'.$course);
				$result=$result->result_array();
				foreach ($result as $key => $value) {
					$coursed_name[]=$value['Field'];
				}
				$this->load->vars('coursed_name',$coursed_name);

			}else{
				$this->load->vars('data','');
			}

			if(!empty($courses)){

				$this->load->vars('courses',$courses);
			}else{
				$courses='';
				$this->load->vars('courses',$courses);
			}

			$this->load->view('home/head');
			$this->load->view('home/common');
      $this->db->db_select("sakura");
		}

	}
	function test(){

	}
	function retroactive(){
		$sid=$this->input->post('sid');
		$item_name=$this->input->post('item_name');

		$courseName=base64_decode(replace_base64_char($this->session->userdata('current_course'),$a='0'));
		$user=$this->session->userdata('user');
		$courseTable='表_'.$user['tid'].$user['username'].'_'.$courseName;
    // echo $courseTable;
    $this->db->db_select("recorder");
		$rs=$this->db->query('update '.$courseTable.' set '.$item_name.'=1 where 学号='.$sid);
    $this->db->db_select("sakura");
		if($rs){
			header("Content-type: application/json");
			$res['status']=1;
			$res['path']='http://'.$_SERVER['HTTP_HOST'].'/index.php/home/index/'.$this->session->userdata('current_course');
			$res['rs']=$rs;
			echo json_encode($res);
		}
	}
	function update_grade(){
		$post_data = $this->input->post();
		 if ($post_data) {
      //
      unset($post_data[0]);
      // 去重
      $_data=array();
      $update_data=array();
      $current_course = base64_decode(replace_base64_char($this->session->userdata('current_course'),$a='0'));
      //查询cid课号的学生
      //$result=$this->db->select('*')->from('表_1120139周海燕_'.urldecode($course))->get();
      $this->db->db_select("recorder");
      $user=$this->session->userdata('user');
			$courseTable='表_'.$user['tid'].$user['username'].'_'.$current_course;

      $result=$this->db->query('select * from 表_1120139周海燕_'.$current_course.'_grade');
      $result=$result->result_array();

      // echo json_encode($result);
      if($result){
        foreach ($result as $key => $value) {
          $_data[$value['sid']]=$value;
        }
      }

      foreach ($post_data as $key => $value){
        $d=explode("-",$key);
        if($_data[$d[0]][$d[1]] != $value){
          $update_data[$key]=$value;
        }
      }

			// $_items=$this->db->query('show columns from '.$courseTable);
			// $_items=$_items->result_array();
			// foreach ($_items as $key => $value) {
			// 	$items[]=$value['Field'];
			// }

			if ($this->db->table_exists($courseTable.'_grade')){
				$this->db->trans_start();
			    foreach ($update_data as $key => $value) {
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
      $this->db->db_select("sakura");
			//$result=$this->db->query('select * from '.$courseTable.' limit 1');
			//$result=$result->result_array();

    }
	}
  function test1()
  {
    var_dump($_GET['a']);
    var_dump($this->input->get('a'));
  }
	function dump_excel(){
    $current_course = base64_decode(replace_base64_char($this->input->get('course_name'),$a='0'));
    // get class name
    $this->db->db_select('recorder');
    $class=$this->db->query('show columns from 表_1120139周海燕_'.$current_course);
    $class=$class->result_array();
    foreach ($class as $key => $value) {
      $class_name[]=$value['Field'];
    }
    // query student info and grade
    // $tables = $this->db->query('select a.*,b.姓名 from 表_1120139周海燕_'.$current_course.'_grade as a,表_1120139周海燕_'.$current_course.' as b where a.sid=b.学号 limit 2');
    // $tables_info = $tables->result_array();
    $tables = $this->db->query('select * from 表_1120139周海燕_'.$current_course.' where 学号 = 1000220628 ');
    $tables_info = $tables->result_array();
    $tables = $this->db->query('select * from 表_1120139周海燕_'.$current_course.'_grade where sid = 1000220628');
    $tables_grade = $tables->result_array();
    //
    $table_data=array();
    //查询cid课号的学生
    //$result=$this->db->select('*')->from('表_1120139周海燕_'.urldecode($course))->get();
    $result=$this->db->query('select * from 表_1120139周海燕_'.$current_course);
    $result=$result->result_array();
    if($result){
      foreach ($result as $key => $value) {
        $table_data[$value['学号']]=$value;
      }
      //查询这个课程的分数
      $grade=$this->db->query('select * from 表_1120139周海燕_'.$current_course.'_grade');
      $grade=$grade->result_array();
      foreach ($grade as $key => $value) {
        $table_data[$value['sid']]['grade']=$value;
      }
    }
    //
    $this->db->db_select('sakura');
    // var_dump($table_data);exit;


		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/Writer/Excel2007');

		$objPHPExcel= new PHPExcel();
        $char = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		//$excel= new Excel2007($excel);
		// Set document properties
        $objPHPExcel->getProperties()
				->setCreator("admin")
       	->setLastModifiedBy("admin")
       	->setTitle($current_course.'实验课程登记表')
       	->setSubject($current_course)
       	->setDescription($current_course.'实验课程登记表.xls')
       	->setKeywords($current_course)
       	->setCategory("Test result file");
			 // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', '序号')
                    ->setCellValue('B1', '学号')
                    ->setCellValue('C1', '姓名');
        $tmp_index = '3';
        for($i=4;$i<count($class_name);$i++){
          // var_dump($class_name[$i]);
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index].'1',$class_name[$i]);

          $objPHPExcel->setActiveSheetIndex(0)
          ->setCellValue($char[$tmp_index].'2', '批次')
          ->setCellValue($char[$tmp_index+1].'2', '考勤')
          ->setCellValue($char[$tmp_index+2].'2', '实验成绩');

          $objPHPExcel->getActiveSheet()->mergeCells($char[$tmp_index].'1:'.$char[$tmp_index+2].'1');
          $tmp_index += 3;
        }
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index].'1','平均成绩')
                                            ->setCellValue($char[$tmp_index+1].'1','考核成绩')
                                            ->setCellValue($char[$tmp_index+2].'1','总评成绩');
        $objPHPExcel->getActiveSheet()->mergeCells($char[$tmp_index].'1:'.$char[$tmp_index].'2');
        $objPHPExcel->getActiveSheet()->mergeCells($char[$tmp_index+1].'1:'.$char[$tmp_index+1].'2');
        $objPHPExcel->getActiveSheet()->mergeCells($char[$tmp_index+2].'1:'.$char[$tmp_index+2].'2');
        unset($tmp_index);

        //

                    // ->setCellValue('D1', '局域网实验')
                    // ->setCellValue('D2', '批次')
                    // ->setCellValue('E2', '考勤')
                    // ->setCellValue('F2', '实验成绩');

			$objPHPExcel->getActiveSheet()->mergeCells('A1:A2');
			$objPHPExcel->getActiveSheet()->mergeCells('B1:B2');
			$objPHPExcel->getActiveSheet()->mergeCells('C1:C2');
			// $objPHPExcel->getActiveSheet()->mergeCells('D1:F1');


			$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);//水平方向上两端对齐
			$objPHPExcel->getActiveSheet()->getStyle( 'A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);//水平方向上两端对齐
			$objPHPExcel->getActiveSheet()->getStyle( 'B1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);//水平方向上两端对齐
			$objPHPExcel->getActiveSheet()->getStyle( 'C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);


      $i = 1;
      foreach ($table_data as $key => $value) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.($i+2), $i);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.($i+2), $value['学号']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.($i+2), $value['姓名']);

        // insert grade data
        $tmp_index = 3;
        for ($j=4; $j < count($class_name) ; $j++) {
          if ($value[$class_name[$j]] == '1') {
            # 补签
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index].($i+2), '补签');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index+1].($i+2), '补签');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index+2].($i+2), $value['grade'][$class_name[$j]]);
          }elseif (is_null($value[$class_name[$j]])) {
            # 缺勤
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index].($i+2), '缺勤');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index+1].($i+2), '缺勤');
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index+2].($i+2), $value['grade'][$class_name[$j]]);
          }else {
            # 正常
            preg_match_all('/(.*)第(.*)批/iu',$value[$class_name[$j]],$res);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index].($i+2), $res[2][0]);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index+1].($i+2), $res[1][0]);
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($char[$tmp_index+2].($i+2), $value['grade'][$class_name[$j]]);
          }
          $tmp_index +=3;
        }

        $i ++;
      }

      // var_dump($tables_info);exit;
			// $objPHPExcel->getActiveSheet()->setCellValue('A3', '1');
			// $objPHPExcel->getActiveSheet()->setCellValue('B3', '1300230323');
			// $objPHPExcel->getActiveSheet()->setCellValue('C3', '许文毅');
      // $objPHPExcel->getActiveSheet()->setCellValue('D3', '4');
			// $objPHPExcel->getActiveSheet()->setCellValue('E3', '已到');
			// $objPHPExcel->getActiveSheet()->setCellValue('F3', '43');

			 header('Content-Type: application/vnd.ms-excel');
       header('Content-Disposition: attachment;filename='.$current_course.'-实验课程登记表.xls');
       header('Cache-Control: max-age=0');
			 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
       $objWriter->save('php://output');

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
