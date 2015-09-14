<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网站登录</title>
	<link rel="stylesheet" type="text/css" href="/ci_recorder/public/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/ci_recorder/public/bootstrap/css/bootstrap-theme.css"/>
	<script type="text/javascript" src="/ci_recorder/public/js/jquery.js"></script>
	<script type="text/javascript" src="/ci_recorder/public/bootstrap/js/bootstrap.js"></script>
<style type="text/css">
body{
	padding-top: 50px;
	background-color: #ccc;
	margin: 0 auto;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('#submit').click(function(){
		$.post("/ci_recorder/index.php/welcome/register",$("#form").serialize(),function(data){
			if(data){
				$('#form').hide();
				$('#success_info').show();
	
			}else{
				$('#form').hide();
				$('#error_info').show();

			}
		},"json");
		return false;
	});
})
</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-success">
		            <div class="panel-heading">
		              <h3 class="panel-title">注册</h3>
		            </div>
		            <div class="panel-body">
		              <form id="form">
		              	<div class="form-group">
		              		<div class="row">
		              			<div class="col-md-8 col-md-offset-2">
				              		<label for="username">姓名：</label>
				              		<input type="text" class="form-control" id="id" name="username" required autocomplete="on">		              				
		              			</div>
		              		</div>
		              	</div>		              	
		              	<div class="form-group">
		              		<div class="row">
		              			<div class="col-md-8 col-md-offset-2">		              		
				              		<label for="tid">职工号：</label>
				              		<input type="number" class="form-control" id="tid" name="tid" required autocomplete="on">
				              	</div>
				            </div>
		              	</div>
		              	<div class="form-group">
		              		<div class="row">
		              			<div class="col-md-8 col-md-offset-2">
				              		<label for="password">密码：</label>
				              		<input type="password" class="form-control" id="password" name="password" required>
				              	</div>
				            </div>
		              	</div>
		              	<div class="form-group">
		              		<div class="row">
		              			<div class="col-md-8 col-md-offset-2">
				              		<label for="repassword">确认密码：</label>
				              		<input type="password" class="form-control" id="repassword" name="repassword" required>
				              	</div>
				            </div>
		              	</div>
		              	<div class="form-group">
		              		<div class="row">
		              			<div class="col-md-8 col-md-offset-2">
				              		<label for="email">邮箱：</label>
				              		<input type="email" class="form-control" id="email" name="email" required autocomplete="on">
				              	</div>
				            </div>
		              	</div>
	              		<div class="row">
	              			<div class="col-md-2 col-md-offset-2">
	              				<button type="submit" class="btn btn-default" id="submit">提交</button>
	              			</div>
	              			<div class="col-md-2">
	              				<button type="reset" class="btn btn-default">重置</button>
	              			</div>
	              			<div class="col-md-2">
	              				<a href="javascript:window.history.go(-1);" class="btn btn-default">返回</a>
	              			</div>
	              		</div>
		              </form>
		              <a href="/" class="btn btn-success btn-lg active" role="button" id="success_info" style="display: none">注册成功，点击返回登录！</a>
		              <a href="javascript:window.history.go(-1);" class="btn btn-danger btn-lg active" role="button" id="error_info" style="display: none">注册失败，点击返回重新注册！</a>
		            </div>
		        </div>
			</div>
		</div>
	</div>
</body>
</html>