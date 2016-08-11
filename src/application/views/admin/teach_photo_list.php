<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>photo upload</title>
<!-- 引用控制层插件样式 -->
<link rel="stylesheet" href="/public/plug/upload/css/zyUpload.css" type="text/css">
<!-- <script src="/public/source/jquery/jquery.js"></script> -->
<!-- 引用核心层插件 -->
<script src="/public/plug/upload/js/zyFile.js"></script>
<!-- 引用控制层插件 -->
<script src="/public/plug/upload/js/zyUpload.js"></script>
<!-- 引用初始化JS -->
<script src="/public/plug/upload/js/jq22.js"></script>
<style media="screen">
*{
  box-sizing: content-box;
}
.list{
  margin-top: 30px;
}
.modal-content{
  width: 700px;
}
.photo{
  padding-left: 0px;
  padding-right: 0px;
}
</style>
</head>
<body>
<div class="container-fluid list">
  <ul class="list-group">
    <li class="list-group-item">
      <div class="btn-group method" role="group" aria-label="...">
        <a type="button" class="btn btn-info" data-target="#upload" data-toggle="modal">上传图片</a>
      </div>
      <div class="clearfix"></div>
    </li>
    <li class="list-group-item">
      <div class="container-fluid">
        <div class="row">
          <?PHP
            if (!empty($teach_photos)) {
              $i = 0;
              foreach ($teach_photos as $key => $value) {
                if($i == 3) $i=0;
                echo '<div class="col-xs-4 col-md-4 photo" id="'.$i.'">'.
                     '<a href="#" class="thumbnail">'.
                     '<img src="'.$value['path'].'" style="height:300px;" class="delete" data-id="'.$value['id'].'">'.
                     '</a>'.
                     '</div>';
                $i+=1;
              }
            }
          ?>
        </div>
      </div>
    </li>
  </ul>
</div>

<!-- 弹出层 -->
<div class="modal fade" id="upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">上传图片</h4>
      </div>
      <div class="modal-body">
        <div id="demo" class="demo"></div>
        <!-- <form style="margin:0 auto;width:300px;" class="form-inline" action="/admin/subnav_create" method="post">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">子栏目名称</label>
            <div class="input-group">
              <input type="text" class="form-control" id="exampleInputAmount" name="navname" placeholder="子栏目名称">
              <input type="hidden" class="form-control" id="exampleInputAmount" name="sid" value="1">
              <input type="hidden" class="form-control" id="exampleInputAmount" name="pid" value='<?php echo $nav_id; ?>'>
            </div>
          </div>
          <button type="submit" style="margin-left:10px;" class="btn btn-primary nav_btn">提交</button>
        </form> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end -->
<script type="text/javascript">
$('#upload').on('hide.bs.modal',function (e) {
  location.href="/admin/teach_photo_list";
})
$('.delete').each(function(){
  $(this).click(function(){
    if (confirm("确认要删除？")) {
      location.href='/admin/photo_delete/'+$(this).data("id");
     }
  })
})
</script>
</body>
</html>
