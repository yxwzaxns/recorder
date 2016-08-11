<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>通信原理精品课程 - 桂林电子科技大学通信工程学院</title>
<link href="/public/css/cssreset-min.css" rel="stylesheet" type="text/css">
<link href="/public/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- 整页容器 -->
<div class="container">
    <div class="banner">
        <!-- <div class="language"><b>中文版</b> | <a href="###" onclick="alert('Sorry…\nEnglish version is under construction.');">Engligh</a></div> -->
    </div>

    <!-- 导航 -->
    <div class="navi">
        <div class="menu">
            <ul>
              <li><a href="/">首页</a></li>
                <?php
                  if(!empty($navs))
                    foreach ($navs as $key => $value) {
                      echo '<li><a href="/welcome/nav_list/'.$value['id'].'">'.$value['navname'].'</a>';
                      if (!empty($value['subnav'])) {
                        echo '<ul>';
                        foreach ($value['subnav'] as $key1 => $value1) {
                          echo '<li><a href="/welcome/page/'.$this->article->getIdFromNid($value1['id']).'">'.$value1['navname'].'</a></li>';
                        }
                        echo '</ul>';
                      }
                    }
                 ?>

            </ul>
        </div>
    </div>
