(function($) {
	//获取Get参数
	$.baoGetUrlParam = function(name) {
		var reg = new RegExp("(^|&)" +
			name + "=([^&]*)(&|$)");
		var r = window.location.search.substr(1).match(reg);
		if (r != null) return unescape(r[2]);
		return null;
	}

	//提示窗口

	$.showLoadDialog = function (str){
		$('#dia_load').css('background', 'url(images/loading.gif) no-repeat 20px center')
					.html(str)
					.dialog('open');
	}

	$.showOKDialog = function(str){
		$('#dia_load').css('background', 'url(images/success.gif) no-repeat 20px center')
					.html(str)
					.dialog('open');
		setTimeout(function(){
			$('#dia_load').dialog('close');
		},700);
	}

	$.showErrorDialog = function(str){
		$('#dia_load').css('background', 'url(images/error.png) no-repeat 20px center')
					.html(str)
					.dialog('open');
		setTimeout(function(){
			$('#dia_load').dialog('close');
		},700);
	}

	//输出调试的简写
	$.l = function(object){
		console.log(object);
	}


})(jQuery);