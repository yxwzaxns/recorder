<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生出勤记录系统</title>
  <link href="/public/own/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
  <link href="/public/own/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="/public/source/bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/public/source/bootstrap/css/bootstrap-theme.css"/>
	<!-- <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script> -->
	<script type="text/javascript" src="/public/source/jquery/jquery.js"></script>
	<script type="text/javascript" src="/public/source/bootstrap/js/bootstrap.js"></script>


	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="/public/own/source/DataTable/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="/public/own/source/DataTable/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="/public/own/source/DataTable/resources/demo.css">

	<script type="text/javascript" language="javascript" src="/public/own/source/DataTable/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="/public/own/source/DataTable/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="/public/own/source/DataTable/resources/demo.js"></script>

	<!-- loading -->

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
      <a class="navbar-brand" href="/home">教师操作后台</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">个人信息<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">选择课程<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          	<?php foreach ($courses as $row){
				echo '<li class="course" data="'.$row['tid'].'"><a href="/index.php/home/index/'.replace_base64_char(base64_encode($row['course_name'])).'">'.$row['course_name'].'</a></li>';
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
				<li><a href="/">回到首页</a></li>
        <li><a href="/func/logout">退出系统</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
