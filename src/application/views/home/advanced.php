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

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/public/css/dashboard.css">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/public/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">出勤记录统计</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/index.php/welcome/logout">退出系统</a></li>
<!--             <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li> -->
          </ul>
          <form class="navbar-form navbar-left">
            <input type="text" class="form-control" placeholder="课号/姓名/学号......">
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar list-group">
            <li class="active list-group-item"><a href="#">整体数据<span class="sr-only">(current)</span></a></li>
            <li class="list-group-item"><a href="#">全校统计</a></li>
            <li class="list-group-item"><a href="#">院系统计</a></li>
            <li class="list-group-item"><a href="#">班级统计</a></li>
          </ul>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">整体统计数据</h1>

          <div class="row placeholders">
            <div class="col-xs-4 col-sm-4 placeholder">
              <div style="height:300px;padding-top:40px">
                <div id="myStat" data-dimension="200" data-text="98.5%" data-info="到课率" data-width="30"
         data-fontsize="38" data-percent="98" data-fgcolor="#61a9dc" data-bgcolor="#eee" data-fill="#ddd" style="margin-left:100px"></div>
              </div>
              <span class="text-muted">本周出勤率</span>
            </div>

            <div class="col-xs-1 col-sm-1 placeholder">
            </div>

            <div class="col-xs-7 col-sm-7 placeholder">
              <div id="main" style="height:300px;width:600px;margin:0px 0px 0px 0px;"></div>
              <span class="text-muted">历史出勤变化</span>
            </div>
          </div>
<script type="text/javascript">
$( document ).ready(function() {
     $('#myStat').circliful();

      // 路径配置
        require.config({
            paths: {
                echarts: '/public/js/echarts/dist'
            }
        });
        
        // 使用
        require(
            [
                'echarts',
                'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main')); 
                
              var  option = {
              title : {
                  text: '过去几周出勤变化',
              },
              tooltip : {
                  trigger: 'axis'
              },
              legend: {
                  data:['出勤率']
              },
              calculable : true,
              xAxis : [
                  {
                      type : 'category',
                      boundaryGap : false,
                      data : ['7','8','9','10','11','12','13']
                  }
              ],
              yAxis : [
                  {
                      type : 'value',
                      axisLabel : {
                          formatter: '{value} ％'
                      }
                  }
              ],
              series : [
                  {
                      name:'出勤率',
                      type:'line',
                      data:[90, 85, 98.4, 93, 94, 93, 89],
                      markPoint : {
                          data : [
                              {type : 'max',
                               name: '最大值',
                               axisLabel : {
                                   formatter: '{value} °C'
                              }
                             },
                              {type : 'min', name: '最小值'}
                          ]
                      },
                      markLine : {
                          data : [
                              {type : 'average', name: '平均值'}
                          ]
                      }
                  }
              ]
          };
                    
        
                // 为echarts对象加载数据 
                myChart.setOption(option); 
            }
        );
 })

</script>
          <h2 class="sub-header">缺勤排名</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>学号</th>
                  <th>姓名</th>
                  <th>累计次数</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($top as $key => $value) {
                  echo '<tr><td>'.$value['指纹号'].'</td><td>'.$value['学号'].'</td><td>'.$value['姓名'].'</td><td>dolor</td><td>dolor</td></tr>';
                }
                 ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
