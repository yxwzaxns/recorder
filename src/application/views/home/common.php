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
	<script type="text/javascript">
	$(document).ready(function() {
		var table=$('#example').DataTable({

			"sScrollX": "1200px",
			"bScrollCollapse": true,
			"language": {
				"search":"搜索关键词",
	    	"paginate": {
	      	"next": "下一页",
					"previous":"上一页"
	    }
	  }
		});
		$('#submit_button').click( function() {
        var data = table.$('input').serialize();
        alert(
            "The following data would have been submitted to the server: \n\n"+
            data.substr( 0, 120 )+'...'
        );
        return false;
    } );
		//$('#myStat').circliful();
	      var info=<?php echo empty($course)?0:1; ?>;
	      if(info=='1')
	        $('#info').show();

	    });
	</script>
	<style media="screen">
	div.dataTables_wrapper {
		width: 1000px;
		margin: 0 auto;
		}
		.cource_item_name {
			width: 100px;
		}
		.bad_info{
			border-radius: 2px;
			display: inline-block;
			padding: 5px;
			background-color:#DB7093;
		}
		.good_info{
			border-radius: 2px;
			display: inline-block;
			padding: 5px;
		}
		.cource_item .input{
			margin-left: 30px;
		}
		.cource_item input{
			width: 30px;
			text-align: center;
		}
	</style>
	<div class="panel-body">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-xs-12 col-md-10">
				<!--  -->
				<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
					<thead>
							<tr>
									<th>学号</th>
									<th>姓名</th>
									<?php if(!empty($course_name))
									for ($i=4; $i < 10; $i++) {
											echo "<th class='cource_item_name'>$course_name[$i]</th>";
									}
									?>

							</tr>
					</thead>
					<tbody>
						<?php if(!empty($course_data))
							foreach ($course_data as $key => $value) {
							echo '<tr><td style="width:70px">'.$value['学号'].'</td>
												<td style="width:100px">'.$value['姓名'].'</td>';
							$course_name_len = count($course_name)-4;
							for($i=0;$i<$course_name_len;$i++) {
								echo '<td class="cource_item" data-cource-date="'.$value[$course_name[4+$i]].'">'.(is_null($value[$course_name[4+$i]])?'<span class="bad_info">未到</span>':'<span class="good_info">已到</span>').'
								<span class="input">评分<input type="text" id="row-57-age" name="row-57-age" value="27"></spqn></td>';
							}
							echo '</tr>';
						}
						 ?>
					</tbody>

					<tfoot>
						<tr>
								<th>学号</th>
								<th>姓名</th>
								<?php if(!empty($course_name))
								for ($i=4; $i < 10; $i++) {
										echo "<th class='cource_item_name'>$course_name[$i]</th>";
								}
								?>

						</tr>
					</tfoot>
				</table>
				<!--  -->
	    </div>
  		<div class="col-xs-6 col-md-2" id="info" style="display:none">
            <div class="panel panel-danger">
                <div class="panel-heading">当前课程信息</div>
                <div class="panel-body">
                    <table class="table">
                        <tbody>
                          <tr>
                            <td>课程名称</td>
                            <td><?php echo urldecode($course); ?></td>
                          </tr>
                          <tr>
                            <td>课号</td>
                            <td>12948823</td>
                          </tr>
													<tr>
														<td>实验名称</td>
														<td><?php echo urldecode($course); ?></td>
													</tr>
                          <tr>
                            <td>时间</td>
                            <td>第4周周四第4大节</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
						<div class="panel panel-primary">
								<div class="panel-heading">历史统计信息</div>
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
														<td>历史应到人数</td>
														<td>259</td>
													</tr>
													<tr>
														<td>实到人数</td>
														<td>258</td>
													</tr>
													<tr>
														<td>未到人数</td>
														<td>1</td>
													</tr>
												</tbody>
										</table>
								</div>
						</div>
  			<!-- <div id="myStat" data-dimension="200" data-text="98.5%" data-info="到课率" data-width="30"
  			 data-fontsize="38" data-percent="98" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-fill="#ddd"></div>
  			<!-- <div id="main" style="height:200px;margin:70px 0px 20px 0px;"></div> -->

				<br>
				<div>
						<button type="button" id="submit_button" class="btn btn-success btn-block">提交修改信息</button>
				</div>
            <br>
						<div>
								<button type="button" class="btn btn-info btn-block">生成excel表格</button>
						</div>


  		</div>
	  </div>
	</div>
	</div>
</div>
