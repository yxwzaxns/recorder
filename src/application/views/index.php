<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生出勤记录系统</title>
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap-theme.css"/>
	<script type="text/javascript" src="/public/js/jquery.js"></script>
	<script type="text/javascript" src="/public/bootstrap/js/bootstrap.js"></script>
<style type="text/css">
body {
	margin: 0px;
	padding: 0px;
	background:#fff;


}
#carousel-example-generic{
	width: 1170px;
	margin: 0 auto;
	padding-bottom: 20px;
}
section{
	padding-top: 20px;

}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(){
			$.post("/index.php/welcome/login",$('#form').serialize(),function(data){
				if(data['status']==1){
					location.href="/index.php/home/index";

				}else{
					$('#error_info').show();
				}
			},"json");
			return false;
		});
	})
</script>
</head>
<body>
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
	                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	                <ul class="dropdown-menu">
	                  <li><a href="#">Action</a></li>
	                  <li><a href="#">Another action</a></li>
	                  <li><a href="#">Something else here</a></li>
	                  <li role="separator" class="divider"></li>
	                  <li class="dropdown-header">Nav header</li>
	                  <li><a href="#">Separated link</a></li>
	                  <li><a href="#">One more separated link</a></li>
	                </ul>
	              </li>
	            </ul>
	          </div><!--/.nav-collapse -->
	        </div>
      	</nav>

      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="/public/images/1.jpg" alt="First slide">
          </div>
          <div class="item">
            <img src="/public/images/2.jpg" alt="Second slide">
          </div>
          <div class="item">
            <img src="/public/images/3.jpg" alt="Third slide">
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
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="panel panel-primary">
			            <div class="panel-heading">
			              <h3 class="panel-title">登录</h3>
			            </div>
			            <div class="panel-body">
			              	<form action="#" id="form">
								用户名：<input type="text" name="username" required="required"/><br><br>
								密&nbsp&nbsp&nbsp&nbsp码：<input type="password" name="password" required="required"/>
								<br>

								<div style="margin-left: 20px;padding-left: 60px;padding-top: 10px">
									<p class="text-danger" style="position: relative;left:-25px;display:none;" id="error_info">用户名或密码错误！</p>
									<a href="/index.php/welcome/register" style="padding-right: 20px"><h5 style="display: inline-block">注册</h5></a>
									<button type="submit" class="btn btn-sm btn-success" id="submit">登录</button>
								</div>
							</form>
			            </div>
		          	</div>
				</div>
				<div class="col-sm-6">
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
				              <h4 class="list-group-item-heading">List group item heading</h4>
				              <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
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
	<footer>
		
	</footer>
</body>
</html>