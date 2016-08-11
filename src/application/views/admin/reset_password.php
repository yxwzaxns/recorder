<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
    <div class="panel-body">
      <div class="container-fluid">
    		<div class="row">
    		  <div class="col-md-3"></div>
    		  <div class="col-md-6">
    				<div class="panel panel-default login">
    					<div class="panel-heading">
                  <h3 class="panel-title">管理员密码修改</h3>
                </div>
                <div class="panel-body">
    							<form class="form" action="/admin/reset_password" method="post" >
    								<div class="form-group">
    									<label for="exampleInputEmail3">旧密码</label>
    									<input type="password" class="form-control" id="exampleInputEmail3" name="old_password" >
    								</div>
    								<div class="form-group">
    									<label  for="exampleInputPassword3">新密码</label>
    									<input type="password" class="form-control" id="exampleInputPassword3" name="new_password">
    								</div>
    								<button type="submit" class="btn btn-default">确认修改</button>
    							</form>
                </div>
    				</div>
    			</div>
    		  <div class="col-md-3"></div>
    		</div>
    	</div>
    </div>
</body>
</html>
