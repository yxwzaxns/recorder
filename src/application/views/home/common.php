<div class="panel panel-default">
	<div class="panel-heading">
		<h2 id="abc" style="float:left;margin-top: 0px;"><span class="label label-info"><?php echo empty($course)?'选择课程':$course; ?></span></h2>
        <!-- <div class="dropdown" style="float:left;margin-left:20px;margin-top:4px">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            选择内容
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="#">全部记录</a></li>
            <li><a href="#">全勤记录</a></li>
            <li><a href="#">缺勤记录</a></li>
          </ul>
        </div> -->
        <div class="clear"></div>
	</div>
	<script type="text/javascript">
	$(document).ready(function() {
		var table=$('#example').DataTable({

			"sScrollX": "1200px",
			stateSave: true,
			"pageLength": 10,
			"bScrollCollapse": true,
			"language": {
				"search":"搜索关键词",
	    	"paginate": {
	      	"next": "下一页",
					"previous":"上一页"
	    }
	  }
		});
		// submit data
		$('#submit_button').click( function() {
        var data = table.$('input').serialize();
				$('.waitting').html("等待服务器处理......");
				$.ajax({
					url:'/home/update_grade',
					type:'post',
					data:data,
					success:function(e){
							if(e.status == 1){
							alert("信息更新完成");
							$('.waitting').html("提交修改信息");
						}
					}
			})
				// alert(data);
        return false;
    } );
		//callback
		$('#example').on( 'order.dt', function () {
			aa();
		} );
		$('#example').on( 'length.dt', function () {
			aa();
		} );
		$('#example').on( 'page.dt', function () {
			aa();
		} );
		//$('#myStat').circliful();
	  var info=<?php echo empty($course)?0:1; ?>;
	  if(info=='1'){
			$('.main_body').show();
	    $('#info').show();
		}else{
			$('.main_body').hide();
			$('#info').hide();
		}
		// download excel
		<?php if(! empty($course)) { ?>
		$('#dump_excel').click(function(){
			// data = {
			// 	course_name: "<?php echo $course; ?>"
			// }
			// $.ajax({
			// 	url:'/index.php/home/dump_excel',
			// 	type:'post',
			// 	data:data,
			// 	success:function(e){
			// 			if(e.status == 1){
			// 			alert("信息更新完成");
			// 		}
			// 	}
			// })
			location.href="/home/dump_excel?course_name=<?php echo $this->session->userdata['current_course']; ?>"
		})
		<?php } ?>
		//alert info of date
		function aa(){
			$(".bad_info").click(function(){
					sid=$(this).data('sid');
					name=$('#'+sid).html();
					courcName=$(this).parent(".cource_item").data("cource-name");

					 $('#myModal #name').val(name);
					 $('#myModal #sid').val(sid);
					 $('#myModal #course_name').val(courcName);

					 $('#myModal').modal();
				})
		}
		aa();
		//补签
		$(".retroactive").click(function(){
			var retroactiveData = $('.retroactive_form').serialize();

			$.post("/index.php/home/retroactive",retroactiveData,function(data){
				if(data['status']==1){
					top.location.href=data['path'];
					console.log(data);
					//alert(top.location.href);
				}
				else
					$('.alert').show();
			})
		})
	});
	</script>
	<!-- pop -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">补签实验</h4>
	      </div>
				<div class="modal-body">
        <form class="retroactive_form">
          <div class="form-group">
            <label for="name" class="control-label">姓名</label>
            <input type="text" class="form-control" id="name" name="username">
          </div>
          <div class="form-group">
            <label for="sid" class="control-label">学号</label>
            <input class="form-control" id="sid" name="sid"></input>
          </div>
					<div class="form-group">
						<label for=item_name class="control-label">实验</label>
						<input class="form-control" id="course_name" name="item_name"></input>
					</div>
					<p class="text-danger">确定补签此实验？</p>
        </form>
      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
	        <button type="button" class="btn btn-primary retroactive">提交补签</button>
	      </div>
	    </div>
	  </div>
	</div>
<!--  pop -->
	<style media="screen">
		div.dataTables_wrapper {
			/*width: 1000px;*/
			margin: 0 auto;
		}
		.cource_item_name {
			/*width: 100px;*/
		}
		.bad_info{
			cursor: pointer;
			border-radius: 2px;
			display: inline-block;
			padding: 5px;
			background-color:#DB7093;
		}
		.good_info{
			cursor: pointer;
			background-color: #90EE90;
			border-radius: 2px;
			display: inline-block;
			padding: 5px;
		}
		.mid_info{
			cursor: pointer;
			background-color: #F4A460;
			border-radius: 2px;
			display: inline-block;
			padding: 5px;
		}
		.cource_item{
			white-space:nowrap;
		}
		.cource_item .input{
			margin-left: 30px;
		}
		.cource_item input{
			width: 30px;
			text-align: center;
		}

	</style>
	<div class="panel-body main_body">
	<div class="container-fluid">
	  <div class="row">
	    <div class="col-xs-12 col-md-10">
				<!--  -->
				<table id="example" class="display table table-bordered" cellspacing="0" width="100%">
					<thead>
							<tr>
									<th>学号</th>
									<th>姓名</th>
									<?php if(!empty($coursed_name))
									for ($i=4; $i < count($coursed_name); $i++) {
											echo "<th class='cource_item_name'>$coursed_name[$i]</th>";
									}
									?>

							</tr>
					</thead>
					<tbody>
						<?php if(!empty($course_data))
							foreach ($course_data as $key => $value) {
							echo '<tr>
										<td style="width:70px">'.$value['学号'].'</td>
										<td id="'.$value['学号'].'" style="width:100px">'.$value['姓名'].'</td>';
							$course_name_len = count($coursed_name)-4;
							for($i=0;$i<$course_name_len;$i++) {
								echo '<td class="cource_item" data-id="'.$value['学号'].'" data-cource-name="'.$coursed_name[4+$i].'">'.
								(is_null($value[$coursed_name[4+$i]])?'<span class="bad_info" data-sid="'.$value['学号'].'">未到</span>':($value[$coursed_name[4+$i]]!=1?'<span class="good_info" data-toggle="tooltip" data-placement="top" title="'.$value[$coursed_name[4+$i]].'">已到</span>':'<span class="mid_info" data-toggle="tooltip" data-placement="top" title="补签">补签</span>')).
								'<span class="input">评分<input type="text" id="row-57-age" name="'.$value['学号'].'-'.$coursed_name[4+$i].'" value="'.$value['grade'][$coursed_name[4+$i]].'"></span></td>';
							}
							echo '</tr>';
						}
						 ?>
					</tbody>

					<tfoot>
						<tr>
								<th>学号</th>
								<th>姓名</th>
								<?php if(!empty($coursed_name))
								for ($i=4; $i < count($coursed_name); $i++) {
										echo "<th class='cource_item_name'>$coursed_name[$i]</th>";
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
														<td>69</td>
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
  			<!-- <div id="myStat" data-dimension="200" data-text="98.5%" data-info="到课率" data-width="30"
  			 data-fontsize="38" data-percent="98" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-fill="#ddd"></div>
  			<!-- <div id="main" style="height:200px;margin:70px 0px 20px 0px;"></div> -->

				<br>
				<div>
						<button type="button" id="submit_button" class="btn btn-success btn-block"><div  class="waitting">提交修改信息</div></button>
				</div>
            <br>
						<div>
								<button type="button" id="dump_excel" class="btn btn-info btn-block">生成excel表格</button>
						</div>


  		</div>
	  </div>
	</div>
	</div>
</div>
</body>
</html>
