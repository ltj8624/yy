
$(function(){

	//选项卡切换
	$(".slidingDoor h1").click(function(){
		$(this).addClass("selected").siblings().removeClass();
		$(".slidingDoor .content").eq($(this).index()).css("display","block").siblings().css("display","none");
	});


	

})
