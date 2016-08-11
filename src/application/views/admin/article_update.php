<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
  <div class="panel panel-default" style="margin-bottom:0px;">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $article['title']; ?></h3>
    </div>
    <div class="panel-body">
      <form class="" action="/admin/article_update/<?php echo $nav_id.'/'.$article_id; ?>" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">内容:</label>
            <!-- 加载编辑器的容器 -->
            <script id="container" name="content" type="text/plain">
                <?php echo $article['content']; ?>
            </script>
          <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> -->
        </div>
        <!-- <div class="form-group">
          <label for="exampleInputEmail1">视频地址</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="URL">
        </div> -->
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <!-- 配置文件 -->
      <script type="text/javascript" src="/public/plug/uedit/ueditor.config.js"></script>
      <!-- 编辑器源码文件 -->
      <script type="text/javascript" src="/public/plug/uedit/ueditor.all.js"></script>
      <!-- 实例化编辑器 -->
      <script type="text/javascript">
          var ue = UE.getEditor('container',{

            initialFrameHeight:500,
          });
      </script>
    </div>
  </div>
</body>
</html>
