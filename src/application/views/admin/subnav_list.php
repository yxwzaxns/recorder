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
      foreach ($subnav as $key => $value) {
        echo '<li class="list-group-item">'.$value['navname'].
             '<div class="btn-group method" role="group" aria-label="...">'.
             '<a href="/admin/subnav_update/'.$nav_id.'/'.$value['article_id'].'" type="button" class="btn btn-default">修改</a>'.
             '<a href="/admin/nav_delete/'.$nav_id.'/'.$value['id'].'" type="button" class="btn btn-default">删除</a>'.
            //  '<a type="button" class="btn btn-default">发布</a>'.
             '</div>'.
             '<div class="clearfix"></div>'.
             '</li>';
      }
     ?>
    <!--  -->
    <li class="list-group-item">
      <div class="btn-group method" role="group" aria-label="...">
        <a type="button" href='/admin/article_update/<?php echo $nav_id.'/'.$nav_article_id; ?>' class="btn btn-success" >修改主栏目内容</a>
        <a type="button" class="btn btn-info" data-target="#subnav_create" data-toggle="modal">增加子栏目</a>
      </div>
      <div class="clearfix"></div>
    </li>
  </ul>
</div>
<!-- 弹出层 -->
<div class="modal fade" id="subnav_create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">增加子栏目</h4>
      </div>
      <div class="modal-body">
        <form style="margin:0 auto;width:300px;" class="form-inline" action="/admin/subnav_create" method="post">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">子栏目名称</label>
            <div class="input-group">
              <input type="text" class="form-control" id="exampleInputAmount" name="navname" placeholder="子栏目名称">
              <input type="hidden" class="form-control" id="exampleInputAmount" name="sid" value="1">
              <input type="hidden" class="form-control" id="exampleInputAmount" name="pid" value='<?php echo $nav_id; ?>'>
            </div>
          </div>
          <button type="submit" style="margin-left:10px;" class="btn btn-primary nav_btn">提交</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end -->
</body>
</html>
