<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>管理中心2.0</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <!-- Bootstrap Core CSS -->
<link href="/Public/main/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/Public/main/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="/Public/main/css/lines.css" rel='stylesheet' type='text/css' />
<link href="/Public/main/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="/Public/main/js/jquery.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="/Public/main/js/metisMenu.min.js"></script>
<script src="/Public/main/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="/Public/main/js/d3.v3.js"></script>
<script src="/Public/main/js/rickshaw.js"></script>
<!-- 全（/不）选插件 -->
<script type="text/javascript" src="/Public/main/js/command.js"></script>
<script type="text/javascript" src="/Public/main/js/quanxuan.js"></script>
<script type="text/javascript" src="/Public/main/js/functions.js"></script>

</head>
<body>
<div id="wrapper">
        <div id="page-wrapper">
        <div class="graphs">
         <div class="xs">
           <h3>添加权限组</h3>
             <div class="tab-content">
                        <div class="tab-pane active" id="horizontal-form">
                            <form class="form-horizontal" action="/admin.php/Home/AuthGroup/insert" method="post">
                                <div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">权限组名称</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="title" id="focusedinput" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="radio" class="col-sm-2 control-label">
									<input type="checkbox"> 
									权限列表</label>
                                    <div class="col-sm-8">
                                        <div class="radio-inline">
                                        <label>
                                        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><input type="checkbox" name="rules[]" value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["title"]); ?>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; ?>
                                        </label>
                                        </div>
                                    </div>
                                    
                                </div>
      <div class="panel-footer">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <input class="btn-success btn" type="submit" value="提交">
                <input class="btn-default btn" type="button" onclick="back()" value="返回">
                <input class="btn-inverse btn" type="reset" value="重置">
                <script>
                    function back(){
                        location.href="<?php echo U('Home/AuthGroup/index');?>";
                    }
                </script>
            </div>
        </div>
     </div>
    </form>
  </div>
  </div>
  </div>
      </div>
        </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $("#rxdate").datepicker();
        $("#moneydate").datepicker();
    </script>
</body>
</html>