<style media="screen">
.list{
  margin-top: 30px;
}
.method{
  float: right;
}
</style>
<div class="container-fluid list">
  <ul class="list-group">
    <!--  -->
    <?php
      if(!empty($teach_videos))
      foreach ($teach_videos as $key => $value) {
        echo '<li class="list-group-item">'.$value['title'].
             '<div class="btn-group method" role="group" aria-label="...">'.
             '<a href="/admin/video_article_update/'.$value['id'].'" type="button" class="btn btn-default">修改</a>'.
             '<a href="/admin/article_delete/'.$value['id'].'" type="button" class="btn btn-default">删除</a>'.
            //  '<a type="button" class="btn btn-default">发布</a>'.
             '</div>'.
             '<div class="clearfix"></div>'.
             '</li>';
      }
     ?>
    <!--  -->
    <li class="list-group-item">
      <div class="btn-group method" role="group" aria-label="...">
        <a type="button" href='/admin/article_update/<?php echo $nav_id.'/'.$nav_article_id; ?>' class="btn btn-success disabled" >修改主栏目内容</a>
        <a type="button" class="btn btn-info" data-target="#video_article_create" data-toggle="modal">添加教学视频</a>
      </div>
      <div class="clearfix"></div>
    </li>
  </ul>
</div>
<!-- 弹出层 -->
<div class="modal fade" id="video_article_create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加教学视频</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="title">视频标题:</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title">
          </div>
          <div class="form-group">
            <label for="author">视频作者:</label>
            <input type="text" class="form-control" id="author" placeholder="<embed.." name="author">
          </div>
          <div class="form-group">
            <label for="url">视频播放地址:</label>
            <input type="text" class="form-control" id="url" placeholder="<embed.." name="video_url">
          </div>
          <div class="form-group">
             <label for="thumb">视频缩略图:</label>
             <input type="file" id="thumb" name="thumb">
             <!-- <p class="help-block">Example block-level help text here.</p> -->
          </div>
          <div class="form-group">
            <label for="instra">视频介绍:</label>
            <textarea style="height:160px;" class="form-control" id="instra" name="content"></textarea>
          </div>
          <input type="hidden" name="type" value="2">
          <button type="submit" class="btn btn-default">提交</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end -->
</body>
</html>
