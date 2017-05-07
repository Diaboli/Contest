$(document).ready(function(){
	$("#checkAll").click(function() {
	      $('input[name="subBox"]').prop("checked",this.checked); 
	});
	
	var $subBox = $("input[name='subBox']");
	$subBox.click(function(){
		$("#checkAll").prop("checked",$subBox.length == $("input[name='subBox']:checked").length ? true : false);
	});
	
	$(".skimArticle").click(function(){
		var way = $(this).attr("btnWay");
		var checkedBox = $("input[name='subBox']:checked");
		for(var i = 0, len = checkedBox.length; i < len; i++){
			window.open('/contest/index.php?s=/Home/Index/article/id/' + checkedBox[i].value + ".html");
		}
	});
	
	$(".addClazz").click(function(){
		var obj = '<tr><form method="post" role="form" action="' + addWay + '"><td></td><td><input type="text" name="class" class="classInput"/></td><td><input type="text" name="meaning" class="classInput"/><input type="submit" value="提交"/></td></form></tr>';
		$("#classTable").append(obj);
	});
	
	$(".btnFunction").click(function(){
		var way = $(this).attr("btnWay");
		var checkedBox = $("input[name='subBox']:checked");
		var ID = new Array();
		for(var i = 0, len = checkedBox.length; i < len; i++){
			ID[i] = checkedBox[i].value;
		}
		$.post(way,{uid:ID},function(data){
			if(data){
				alert("操作成功");
				location.reload();
			}else{
				alert("操作失败");
			}
		});
	});
	
});