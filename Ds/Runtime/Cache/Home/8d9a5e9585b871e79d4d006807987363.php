<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加</title>
<link rel="stylesheet" type="text/css" href="/Public/css/css.css" />
<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<!-- 图片文件上传 -->
<link rel="stylesheet" type="text/css" href="/Public/jquery/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/Public/jquery/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/Public/jquery/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/Public/jquery/diyUpload/js/diyUpload.js"></script>
<style>
    *{ margin:0; padding:0;}
    .goods_add_table{border-collapse: collapse;width: 98%;font-size: 12px;margin: 10px;}
    .goods_add_table tr td{border:1px solid #D0D0D0;color: #4D4D4D;font-size: 12px;padding: 5px 10px;}
    .goods_add_table .td_left{width:100px;}
</style>

<!-- 点击图片放大插件 -->
<link rel="stylesheet" type="text/css" href="/Public/image-zooming/css/lightbox.css" />
<script type="text/javascript" src="/Public/image-zooming/js/lightbox-2.6.min.js"></script>
<style>
	.del{
		background: 
	}
</style>
</head>
<body>
	<div id="pageAll">
		<div class="pageTop">
			
		</div>
		<div class="page ">
			<div class="showList">
				<h1>添加图片</h1>
				<a href="javascript:history.go(-1);">返回</a>
				<div class="styleDiv">
				
                <div id="default_image" ></div>
                <div id="Img"  class="clearfix">
                	<ul>
                	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="Remove_<?php echo ($vo["id"]); ?>" >
                				<a href="/Public/<?php echo ($vo["photo"]); ?>"  class="example-image-link"  data-lightbox="group" img_id="<?php echo ($vo["id"]); ?>">
	                				<img class="example-image hoverClose"  src="/Public/<?php echo ($vo["photo_thumb"]); ?>" alt="" />
	                			</a>
	                			<a href="javascript:;" class="del" onclick="del_style('<?php echo ($vo["id"]); ?>')"></a>
                			</li><?php endforeach; endif; else: echo "" ;endif; ?>
                	</ul>
                	
                </div>
	              
<script>
	$(function(){
		// 默认图片上传
		$('#default_image').diyUpload({
		    url:'/admin.php/Home/Goods/upload/pic_name/default_image/id/<?php echo ($cid); ?>',  // 上传处理程序
		    success:function( data ) {
		    	
		        $("#default_image_src").text(data.image_src);
		        var src = $("#default_image_data").val();
		        $("#default_image_data").val(src+";"+data.image_src);
		    },
		    error:function( err ) {
		        console.info( err );    
		    }
		});

		$(".del").hide();

		$(".hoverClose").mouseover(function(){
			$(this).parent().next('.del').show("slow");
		}).mouseout(function(){
			$(this).parent().next('.del').hide("slow");
		});
			
	});

	function del_style(id) {
			
		if (confirm('确认删除吗?')) {
				
				$.ajax({
					url:"/admin.php/Home/Goods/style_del",
					data:{'id':id},
					type:'POST',
					dataType:'json',
					success:function(data) {
				  		var list = eval(data);
				  		if (list.sta) {

				  			$("#Remove_"+id).remove();
				  			alert(list.msg);
				  		} else {
				  			alert(list.msg);
				  		}
					},
				});
		} 
			
	}
	</script>	
							
				
				</div>
			</div>
		</div>
	</div>
</body>
</html>