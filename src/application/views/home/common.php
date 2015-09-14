<div class="panel panel-default">
	<div class="panel-heading">
		<h2 style="float:left;margin-top: 0px;"><span class="label label-info"><?php echo empty($course)?'选择课程':urldecode($course); ?></span></h2>
        <div class="dropdown" style="float:left;margin-left:20px;margin-top:4px">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            选择内容
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">全部记录</a></li>
            <li><a href="#">全勤记录</a></li>
            <li><a href="#">缺勤记录</a></li>
          </ul>
        </div>
        <div class="clear"></div>
	</div>
	<div class="panel-body">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-xs-12 col-md-10">
	    	<table class="table table-bordered">
                <thead>
                    <tr>
                        <th>学号</th>
                        <th>姓名</th>
                        <?php
                        for ($i=4; $i < 10; $i++) { 
                            echo "<th>$course_name[$i]</th>";
                        }
                        ?>

                    </tr>
                </thead>
                <tbody>
				<?php if(!empty($course_data))
				 	foreach ($course_data as $key => $value) {
					echo '<tr><td>'.$value['学号'].'</td>
                    <td>'.$value['姓名'].'</td>
                    <td>'.(is_null($value[$course_name[4]])?'未到':$value[$course_name[4]]).'</td>
                    <td>'.(is_null($value[$course_name[5]])?'未到':$value[$course_name[5]]).'</td>
                    <td>'.(is_null($value[$course_name[6]])?'未到':$value[$course_name[6]]).'</td>
                    <td>'.(is_null($value[$course_name[7]])?'未到':$value[$course_name[7]]).'</td>
                    <td>'.(is_null($value[$course_name[8]])?'未到':$value[$course_name[8]]).'</td>
                    <td>'.(is_null($value[$course_name[9]])?'未到':$value[$course_name[9]]).'</td>
                    </tr>';
				}
         ?>
                </tbody>
			</table>
	    </div>
  		<div class="col-xs-6 col-md-2" id="info" style="display:none">
            <div class="panel panel-primary">
                <div class="panel-heading">统计信息</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>项目</th>
                            <th>数据</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>应到人数</td>
                            <td>59</td>
                          </tr>
                          <tr>
                            <td>实到人数</td>
                            <td>58</td>
                          </tr>
                          <tr>
                            <td>未到人数</td>
                            <td>1</td>
                          </tr>
                        </tbody>                       
                    </table>
                </div>
            </div>
  			<div id="myStat" data-dimension="200" data-text="98.5%" data-info="到课率" data-width="30"
  			 data-fontsize="38" data-percent="98" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-fill="#ddd"></div>
  			<!-- <div id="main" style="height:200px;margin:70px 0px 20px 0px;"></div> -->
  			<br>
            <br>
            <br>
            <div>
                <button type="button" class="btn btn-success btn-block">更多统计信息...</button>
            </div>

  		</div>
	  </div>
	</div>
	</div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
		  $('#myStat').circliful();
      var info=<?php echo empty($course)?0:1; ?>;
      if(info=='1')
        $('#info').show();

  //       // 路径配置
  //       require.config({
  //           paths: {
  //               echarts: 'http://echarts.baidu.com/build/dist'
  //           }
  //       });
        
  //       // 使用
  //       require(
  //           [
  //               'echarts',
  //               'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
  //           ],
  //           function (ec) {
  //               // 基于准备好的dom，初始化echarts图表
  //               var myChart = ec.init(document.getElementById('main')); 
                
  //               var option = {
  //                   tooltip: {
  //                       show: true
  //                   },
  //                   legend: {
  //                       data:['到课率']
  //                   },
  //                   xAxis : [
  //                       {
  //                           type : 'category',
  //                           data : [1,2,3,4,5,6,7]
  //                       }
  //                   ],
  //                   yAxis : [
  //                       {
  //                           type : 'value'
  //                       }
  //                   ],
  //                   series : [
  //                       {
  //                           "name":"到课率",
  //                           "type":"line",
  //                           "data":[5, 20, 40, 10, 10, 20,15]
  //                       }
  //                   ],
  //                   grid : 
  //                   	{
  //                   		x:20,
  //                   		y:20,
  //                   		x2:10,
  //                   		y2:20

  //                   	}
                    
  //               };
        
  //               // 为echarts对象加载数据 
  //               myChart.setOption(option); 
  //           }
  //       );
    });
</script>
