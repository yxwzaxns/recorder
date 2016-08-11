<script type="text/javascript" src="/public/js/nav/nav.js"></script>
<link rel="stylesheet" href="/public/css/nav/nav.css" media="screen" title="no title" charset="utf-8">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style media="screen">
.op{
  display: inline-block !important;
  width: 48%;
  padding: 15px 2px !important;
  position: relative;
  left: 2px;
  text-align: center;
}
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">操作选项</h3>
        </div>
        <div class="panel-body">
          <ul id="accordion" class="accordion">
        		<li>
        			<div class="link"><i class="fa fa-paint-brush"></i>栏目管理<i class="fa fa-chevron-down"></i></div>
        			<ul class="submenu">
                <li><a href="#">首页</a></li>
                <?php
                if(!empty($navs))
                foreach ($navs as $key => $value) {
                  echo '<li><a href="/admin/subnav_list/'.$value['id'].'" target="iframe">'.$value['navname'].'</a></li>';
                }
                 ?>
                <li style="background-color:gray;border-bottom: 0px">
                  <a href="#nav_create" data-toggle="modal" class="op" >
                    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true" style="margin-right:10px;"></span>添加
                  </a>
                  <a href="#nav_delete" data-toggle="modal" class="op" >
                    <span class="glyphicon glyphicon-minus-sign" aria-hidden="true" style="margin-right:10px;"></span>删除
                  </a>
                </li>
        			</ul>
        		</li>
        		<li>
        			<div class="link"><i class="fa fa-code"></i>首页内容管理<i class="fa fa-chevron-down"></i></div>
        			<ul class="submenu">
        				<li><a href="/admin/teach_photo_list" target="iframe">教材图片管理</a></li>
        				<li><a href="/admin/teach_video_list" target="iframe">教学视频管理</a></li>
        				<!-- <li><a href="#">Frameworks javascript</a></li> -->
        			</ul>
        		</li>
        		<li><div class="link"><i class="fa fa-globe"></i>系统设置<i class="fa fa-chevron-down"></i></div>
        			<ul class="submenu">
                <li><a href="/admin/flink_list" target="iframe">友情链接管理</a></li>
        				<li><a href="/admin/reset_password" target="iframe">更改管理密码</a></li>
        			</ul>
        		</li>
        	</ul>
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">内容管理</h3>
        </div>
        <div class="panel-body">
          <iframe id="frame_content" src="/admin/subnav_list/42" frameborder="0" width="100%" onload="this.height=600" scrolling="no" name="iframe" >
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  -->
<script type="text/javascript">
function reinitIframe(){
    var iframe = document.getElementById("frame_content");
    try{
        var bHeight = iframe.contentWindow.document.body.scrollHeight;
        var dHeight = iframe.contentWindow.document.documentElement.scrollHeight;
        var height = Math.max(bHeight, dHeight);
        iframe.height =  height;
        console.log("aa");
    }catch (ex){}
}
window.setInterval("reinitIframe()", 200);
</script>
<!--  -->
<!-- 弹出层 -->
<div class="modal fade" id="nav_create">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加主目录</h4>
      </div>
      <div class="modal-body">
        <form style="margin:0 auto;width:300px;" class="form-inline" action="/admin/nav_create" method="post">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">目录名称</label>
            <div class="input-group">
              <input type="text" class="form-control" id="exampleInputAmount" name="navname" placeholder="目录名称">
            </div>
              <input type="hidden" class="form-control" id="exampleInputAmount" name="sid" value="0">
              <input type="hidden" class="form-control" id="exampleInputAmount" name="pid" value="0">
          </div>
          <button type="submit" style="margin-left:10px;" class="btn btn-primary nav_btn">提交</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--  -->
<div class="modal fade" id="nav_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">删除目录</h4>
      </div>
      <div class="modal-body">
        <form style="margin:0 auto;width:300px;" class="form-inline" action="/admin/nav_delete" method="post">
          <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">目录名称</label>
            <div class="input-group">
              <input type="text" class="form-control" id="exampleInputAmount" name="navname" placeholder="目录名称">
            </div>
          </div>
          <button type="submit" style="margin-left:10px;" class="btn btn-primary nav_btn">确认删除</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>
