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
      <form class="" action="/admin/video_article_update/<?php echo $article['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
         <label for="author">视频作者:</label>
         <input type="text" class="form-control" id="author"  name="author"  value="<?php echo $article['author']; ?>">
       </div>
        <div class="form-group">
         <label for="url">视频播放地址:</label>
         <input type="text" class="form-control" id="url" placeholder="<embed.." name="video_url" value="<?php echo $article['video_url']; ?>" >
       </div>
       <div class="form-group">
          <label for="thumb">视频缩略图:</label>
          <input type="file" id="thumb" name="thumb">
          <!-- <p class="help-block">Example block-level help text here.</p> -->
       </div>
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
