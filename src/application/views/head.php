<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生出勤记录系统</title>
  <link href="/public/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
  <link href="/public/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/public/bootstrap/css/bootstrap-theme.css"/>
	<script type="text/javascript" src="/public/js/jquery.js"></script>
	<script type="text/javascript" src="/public/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="/public/js/jquery.circliful.min.js"></script>
  <script type="text/javascript" src="/public/js/echarts/echarts.js"></script>

<style type="text/css">
*{
	margin: 0px;
	padding: 0px;
}
.clear{
  border: 0px;
  clear: both;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">教师操作后台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">个人信息<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">选择课程<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          	<?php foreach ($courses as $row){
				echo '<li class="course" data="'.$row['工号'].'"><a href="/index.php/home/index/'.$row['课程名称'].'">'.$row['课程名称'].'</a></li>';
			}
			?>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="课号搜索	">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/index.php/welcome/logout">退出系统</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>
</html>