$(function() {

	//获取Get参数
	g_user_id = $.baoGetUrlParam('user_id');

	g_user_id = g_user_id == null ? $.cookie().id:g_user_id ;

	//$.l(g_user_id);

	//加载用户基本信息
	$.ajax({
		url: 'php/getUser',
		type: 'POST',
		data: {
			id: g_user_id
		},
	})
	.done(function(response) {
		json = eval(response);
		//$.l(json);
		$('.home_user_name').html(json[0].user);
		$('.home_uni_a').html(json[0].uni_name);
		$('.home_major_a').html(json[0].major_name);
		$('.home_email_a').html(json[0].email);
		$('.home_details').html(json[0].details);

	})
	.fail(function() {
		console.log("error");
	});

	$.showAvatar($('.home_user_avatar'),g_user_id,256);
	
	//加载用户加入的小组
	$.showGroupsInfo(g_user_id,$('.home_groups'));

	//加载用户发布的主题
	$.ajax({
		url: 'php/getQuestions',
		type: 'POST',
		data: {user_id: g_user_id},
	})
	.done(function(response) {
		json = eval(response);
		//$.l(json);
		$.each(json, function(index, val) {
			time = $.getTimeByDateTime(val.date);
			item = (index == 0) ? $('.item_con').first() : $('.item_con').first().clone();
			item.find('.item_date').html(time);
			item.find('.item_title').html(val.title);
			item.find('.item_title').attr('href', 'details.html?id=' + val.id);
			item.appendTo('.home_items_con');
		});
	})
	.fail(function() {
		console.log("error");
	});
	



})