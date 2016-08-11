<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生出勤记录系统</title>
	<link rel="stylesheet" type="text/css" href="/public/source/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/public/source/bootstrap/css/bootstrap-theme.css"/>
	<script type="text/javascript" src="/public/source/jquery/jquery.js"></script>
	<script type="text/javascript" src="/public/source/bootstrap/js/bootstrap.js"></script>
<style type="text/css">
body {
	margin: 0px;
	padding: 0px;
	background:#fff;


}
header{
	background-color: #000;
}
#carousel-example-generic{
	width: 1170px;
	margin: 0 auto;
	padding-bottom: 20px;
}
section{
	padding-top: 20px;

}
.bad_list{
	margin-top: 5px;
}
footer{
	height: 100px;
	width: 100%;
	background-color: #000;
}
footer section span{
	display: block;
	width: 100%;
	font-size: 16px;
	font-weight: 300;
	color: #fff;
	text-align: center;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('.login').click(function(){
			$.post("/func/login",$('#formlogin').serialize(),function(data){
				if(data['status']==1){
					top.location.href=data['path'];
					//alert(top.location.href);
				}
				else
					$('.alert').show();
			});
			return false;
		});
// search
	$(".search").click(function(){
		var sid=$(".search_input").val();
		var re=/^\d{10}$/;
		if(sid!=''){
			if(re.test(sid)){
				$.get("/index.php/welcome/search/"+sid,function(e){
					if(e['status']==1){
						$("#myModal1 ul").html("");
						for(i=0;i<eval(e['data']).length;i++){
							data='<li class="list-group-item list-group-item-danger bad_list">'+e['data'][i]['coursename']+'</li>';
							$("#myModal1 ul").append(data);
							data="";
						}
					}
				})
			}else{
				$("#myModal1 ul").html("");
				$("#myModal1 ul").append('<li class="list-group-item list-group-item-warning bad_list">请输入正确的学号</li>');
			}
		}else{
			$("#myModal1 ul").html("");
			$("#myModal1 ul").append('<li class="list-group-item list-group-item-warning bad_list">请输入学号</li>');
		}
		return false;
	})
	})
	// gotohome
	function gotohome(){
		location.href="/index.php/home/index";
	}
</script>
</head>
<body>
	<!-- header -->
	<header>
		<nav class="navbar navbar-inverse">
	        <div class="container">
	          <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	              <span class="sr-only">Toggle navigation</span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/">学生出勤记录系统</a>
	          </div>
	          <div class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	              <li class="active"><a href="/">首页</a></li>
	              <li><a href="#about">新闻</a></li>
	              <li><a href="#contact">通告</a></li>
	              <li class="dropdown">
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">常用下载<span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="http://metc.guet.edu.cn/upfiles/download/ipclient.exe">IpClient出校器下载</a></li>
	                </ul>
	              </li>
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div>
      	</nav>
	</header>
	<!-- //header -->
	<!-- banner -->
	<section>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="/public/own/images/1.jpg" alt="First slide">
				</div>
				<div class="item">
					<img src="/public/own/images/2.jpg" alt="Second slide">
				</div>
				<div class="item">
					<img src="/public/own/images/3.jpg" alt="Third slide">
				</div>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
	<!-- //banner -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="panel panel-primary">
			            <div class="panel-heading">
			              <h3 class="panel-title">选择操作</h3>
			            </div>
	            <div class="panel-body">
								<!-- <button type="button" id="myModal" class="btn btn-success btn-block">登陆</button> -->
								<?php
								if($this->session->has_userdata('user'))
									echo '<button type="button" class="btn btn-info btn-block" onclick="gotohome()">个人中心</button>';
								else
								  echo '<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">登&emsp;&emsp;陆</button>';
								?>
								<br>
								<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal1">学生自主查询</button>
	              	<!-- <form action="#" id="form">
										用户名：<input type="text" name="username" required="required"/><br><br>
										密&emsp;码：<input type="password" name="password" required="required"/>
										<br>

										<div style="margin-left: 20px;padding-left: 60px;padding-top: 10px">
											<p class="text-danger" style="position: relative;left:-25px;display:none;" id="error_info">用户名或密码错误！</p>
											<a href="/index.php/welcome/register" style="padding-right: 20px"><h5 style="display: inline-block">注册</h5></a>
											<button type="submit" class="btn btn-sm btn-success" id="submit">登录</button>
										</div>
									</form> -->
	            </div>
		    </div>
				</div>
				<div class="col-sm-7">
		          	<div class="panel panel-info">
			            <div class="panel-heading">
			              <h3 class="panel-title">新闻</h3>
			            </div>
			            <div class="panel-body">
							 <a href="#" class="list-group-item">
				              <h4 class="list-group-item-heading">普通测试帐号</h4>
				              <p class="list-group-item-text">用户名：周海燕 </p>
				              <p class="list-group-item-text">密码：gliet</p>
				            </a>
				            <a href="#" class="list-group-item">
				              <h4 class="list-group-item-heading">高级测试帐号</h4>
				              <p class="list-group-item-text">admin</p>
				              <p class="list-group-item-text">1234</p>
				            </a>
				            <a href="#" class="list-group-item">
				              <h4 class="list-group-item-heading">Warining</h4>
				              <p class="list-group-item-text">本系统只支持chrome,firefox,IE9及以上浏览器</p>
				            </a>
			            </div>
		          	</div>
				</div>
				<div class="col-sm-3">
					<div class="panel panel-warning">
			            <div class="panel-heading">
			              <h3 class="panel-title">通告</h3>
			            </div>
			            <div class="panel-body">
			              	<ul class="list-group">
					            <li class="list-group-item">Cras justo odio</li>
					            <li class="list-group-item">Dapibus ac facilisis in</li>
					            <li class="list-group-item">Morbi leo risus</li>
					            <li class="list-group-item">Porta ac consectetur ac</li>
					            <li class="list-group-item">Vestibulum at eros</li>
					         </ul>
			            </div>
		          	</div>
				</div>
			</div>
		</div>
	</section>
<!-- footer -->
<footer>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<span>&copy 2016 版权所有 桂林电子科技大学</span>
					<span>友情链接: <a href="http://www.guet.edu.cn">桂林电子科技大学</a> <a href="3">桂林电子科技大学信息与通信学院</a></span>
				</div>
				</div>
			</div>
		</div>
	</section>
</footer>
<!-- //footer -->
	<!-- jq pop -->
	<!-- pop login -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">用户登陆</h4>
				</div>
				<div class="modal-body">
				<form id="formlogin">
					<div class="form-group">
						<label for="name" class="control-label">姓名</label>
						<input type="text" class="form-control" id="name" name="username" value="">
					</div>
					<div class="form-group">
						<label for="password" class="control-label">密码</label>
						<input type="password" class="form-control" id="password" name="password"></input>
					</div>

						<div class="alert alert-danger" role="alert" style="display:none">用户名或者密码不正确，请重新输入</div>

					<!-- <div class="form-group">
						<label for=cource_name class="control-label">实验</label>
						<input class="form-control" id="course_name"></input>
					</div>
					<p class="text-danger">确定补签此实验？</p> -->
				</form>
			</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary login">登陆</button>
				</div>
			</div>
		</div>
	</div>
<!--  pop -->
<!-- myModel1-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">出勤记录查询</h4>
			</div>
			<div class="modal-body">
			<form>
				<div class="form-group">
					<label for="name" class="control-label">学号</label>
					<input type="text" class="form-control search_input" id="name" name="sid">
				</div>
				<div class="form-group">

						<ul class="list-group">


						</ul>
				<!-- <div class="form-group">
					<label for=cource_name class="control-label">实验</label>
					<input class="form-control" id="course_name"></input>
				</div>
				<p class="text-danger">确定补签此实验？</p> -->
			</form>
		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary search">查询</button>
			</div>
		</div>
	</div>
</div>
<!-- mydel1 -->
</body>
</html>
