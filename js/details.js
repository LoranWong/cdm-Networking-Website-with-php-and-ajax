$(function() {
	//Git JackWong025
	//全局变量
	//接收Get参数  显示文章内容
	g_question_id = $.baoGetUrlParam('id');
	comments_json = '';
	hasQuestionShow = false;
	isLoading = false;
	//每次加载回复个数
	COMMENT_LOAD_COUNT = 3;
	//初始化按钮
	$('.comment_btn_ok').button();
	$('.comment_btn_cancel').button();

	$('.comment_btn').click(function(event) {
		/* Act on the event */
		$('.comment_input_container').slideDown();
		$('.comment_btn').hide('400');
	});
	$('.comment_btn_cancel').click(function(event) {
		/* Act on the event */
		$('.comment_input_container').slideUp();
		$('.comment_btn').show('400');
	});


	//初始化load对话框
	$('#dia_load').dialog({
		autoOpen: false,
		modal: true,
		closeOnEscape: false,
		resizable: false,
		draggable: false,
		width: 180,
		height: 50,
	}).dialog('widget').find('.ui-widget-header').hide();



	//提交评论
	$('.comment_btn_ok').click(function(event) {
		$.showLoadDialog('提交中...');
		$.ajax({
			url: 'php/addComment',
			type: 'POST',
			data: {
				question_id: g_question_id,
				user_id: $.cookie().id,
				details: $(".comment_content").val(),
			},
		})
			.done(function(response) {
				if (response == "true") {
					$.showOKDialog('回复成功');
					setTimeout(function() {
						$('.comment_input_container').slideUp();
						$('.comment_btn').show('400');
						window.history.go(0);
					}, 700);
				} else {
					$.showErrorDialog('网络错误');
				}
			})
			.fail(function() {
				$.showErrorDialog('网络错误');
			});

	});


	//首次加载 
	showMoreComment();
	$(window).scroll(function(event) {
		if ($(window).scrollTop() + $(window).height() == $(document).height()) {
			showMoreComment();
		}
	});

	function showMoreComment() {
		//console.log(id);
		if (!isLoading) {
			//防止异步加载出错
			isLoading = true;
			$.ajax({
				url: 'php/getQuestions.php',
				type: 'POST',
				data: {
					kind: 1,
					id: g_question_id,
					start: comments_json.length,
					count: COMMENT_LOAD_COUNT,
				},
			})
				.done(function(response, status, xhr) {
					if (response != "[]") {
						json = eval("(" + response + ")");
						//console.log(json);
						//防止重复加载
						if (!hasQuestionShow) {
							//加载问题内容
							//处理距离现在日期
							date = new Date(json.question[0].date);
							now = new Date();
							time = '';
							if ((now - date) / 60000 < 60) {
								time = Math.floor((now - date) / 60000) + '分钟';
							} else if ((now - date) / (60000 * 60) < 24) {
								time = Math.floor((now - date) / (60000 * 60)) + '小时';
							} else {
								time = Math.floor((now - date) / (60000 * 60 * 24)) + '天';
							}
							$('title').html(json.question[0].title);
							$('.details_title_content').html(json.question[0].title);
							$('.question_user').html(json.question[0].user);
							$('.question_date').html(time);
							$('.details_question_main').html(json.question[0].details);
							$('.details_comment_counts').html(Math.floor(Math.random() * (100)));
							hasQuestionShow = true;
						}

						//加载评论内容
						currentLength = comments_json.length;
						if (comments_json.length == 0) {
							comments_json = json.comments;
						} else {
							comments_json = comments_json.concat(json.comments);
						}
						$.each(json.comments, function(index, val) {
							//处理距离现在日期
							date = new Date(val.date);
							now = new Date();
							time = '';
							if ((now - date) / 60000 < 60) {
								time = Math.floor((now - date) / 60000) + '分钟';
							} else if ((now - date) / (60000 * 60) < 24) {
								time = Math.floor((now - date) / (60000 * 60)) + '小时';
							} else {
								time = Math.floor((now - date) / (60000 * 60 * 24)) + '天';
							}

							item = index == 0 && currentLength == 0 ? $('.comment_container').first() : $('.comment_container').first().clone();
							//console.log("currentLength--->"+currentLength);
							//console.log("index--->"+index);
							item.attr('comment_id', val.id);
							item.find('.comment_main').html(val.details);
							item.find('.item_user').html(val.user);
							item.find('.item_date').html(time);
							item.find('.comment_index').html(currentLength + index + 1);

							item.appendTo('.comments_container');

						});

						if (json.comments.length == 0) {
							if (comments_json.length == 0) {
								//当未有评论时
								$('.comment_container').remove();
							}
							//当内容已经被取完时
							$('#spinner_gray_new').hide();
							$('#item_more_new').text("没有更多内容~(≧▽≦)~啦");
						}
					}


				})
				.fail(function() {
					console.log("error");
				}).always(function(){
						isLoading = false;

				})
		}
	}
})