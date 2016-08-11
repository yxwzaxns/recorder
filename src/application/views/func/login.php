<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">
.login{
	margin-top: 200px;
}
</style>
<body>
	<div class="container">
		<div class="row">
		  <div class="col-md-3"></div>
		  <div class="col-md-6">
				<div class="panel panel-default login">
					<div class="panel-heading">
              <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">
							<form class="form-inline" action="/func/admin_login" method="post" >
								<div class="form-group">
									<label class="sr-only" for="exampleInputEmail3">用户名</label>
									<input type="text" class="form-control" id="exampleInputEmail3" name="username" placeholder="用户名">
								</div>
								<div class="form-group">
									<label class="sr-only" for="exampleInputPassword3">密码</label>
									<input type="password" class="form-control" id="exampleInputPassword3" name="password" placeholder="密码">
								</div>
								<button type="submit" class="btn btn-default">Sign in</button>
							</form>
            </div>
				</div>
			</div>
		  <div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>
