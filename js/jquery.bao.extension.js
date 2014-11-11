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

	//加载用户所在小组信息  @p1  用户ID  @p2 需要appendTo哪个Jquery对象
		$.showGroupsInfo=function(user_id,appendToWhat) {
		$.ajax({
			url: 'php/getGroupsByUserId.php',
			type: 'POST',
			data: {
				id: user_id
			},
		})
			.done(function(response) {
				json = eval("(" + response + ")");
				//console.log(json);
				$.each(json, function(index, val) {
					item = $('<a class="group_item"></a>');
					item.attr('group_id', val.id);
					item.attr('href', "index.html?header_id=1&group_id="+val.id);
					item.attr('group_id', val.id);
					item.html(val.name);
					item.appendTo(appendToWhat);
				});
			});
	}

	//根据Mysql的DATETIME 计算出距离现在多久
	$.getTimeByDateTime = function(date){
		date = new Date(date);
		now = new Date();
		time = '';
		if ((now - date) / 60000 < 60) {
			time = Math.floor((now - date) / 60000) + '分钟';
		} else if ((now - date) / (60000 * 60) < 24) {
			time = Math.floor((now - date) / (60000 * 60)) + '小时';
		} else {
			time = Math.floor((now - date) / (60000 * 60 * 24)) + '天';
		}
		return time+'前';
	}

	//输出调试的简写
	$.l = function(object){
		console.log(object);
	}


})(jQuery);