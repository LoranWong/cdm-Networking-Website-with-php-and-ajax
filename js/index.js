$(function() {
	//********************************************分割***************************************************
	//全局变量items_json  存放当前页面的所有问题数据
	items_json = '';
	//摘要长度
	DETAILS_LENGTH = 80;
	//每次加载个数
	DETAILS_LOAD_COUNT = 3;
	isLoading = false;
	//首次加载 
	showMoreQuestions();
	$(window).scroll(function(event) {
		// console.log($(window).scrollTop());
		// console.log($(window).height());
		// console.log($(document).height());
		if ($(window).scrollTop() + $(window).height() == $(document).height()) {
			showMoreQuestions();
		}
	});

	function showMoreQuestions(json) {
		if (!isLoading) {
			isLoading = true;
			//加载页面问题内容
			$.ajax({
				url: 'php/getQuestions.php',
				type: 'POST',
				data: {
					kind: 0,
					start: items_json.length,
					count: DETAILS_LOAD_COUNT,
				}
			})
				.done(function(response, status, xhr) {
					if (response != "[]") {
						json = eval("(" + response + ")");
						currentLength = items_json.length;
						if (items_json.length == 0) {
							items_json = json;
						} else {
							items_json = items_json.concat(json);
						}
						//console.log(json);
						//console.log(items_json);

						html = '';
						$.each(json, function(index, val) {
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
							html = $("<html>" + val.details + "</html>");
							details = html.text().length > DETAILS_LENGTH ? html.text().slice(0, DETAILS_LENGTH)+'... ' : html.text();

							item = index == 0 && currentLength == 0 ? $('.item_container').first() : $('.item_container').first().clone();
							//设置Index时加上前面已经有的
							//console.log("currentLength--->"+currentLength);
							//console.log("index--->"+index);
							item.attr('question_id', val.id);
							item.find('.item_title').html(val.title);
							item.find('.item_title').attr('href', 'details.html?id=' + val.id);
							item.find('.item_user').html(val.user);
							item.find('.item_date').html(time);
							item.find('.item_hot_comment').html(details);
							item.find('.item_comment_counts').html(Math.floor(Math.random() * (100)));
							item.find('.item_main').mouseenter(function(event) {
								console.log($(this).find('.item_hot_comment').text().length);
								if($(this).find('.item_hot_comment').text().length > DETAILS_LENGTH){
									$(this).find('.item_hot_comment_scale').css('display', 'inline');
								}

							});
							item.find('.item_main').mouseleave(function(event) {
									$(this).find('.item_hot_comment_scale').css('display', 'none');
							});
							item.find('.item_hot_comment_scale').click(function(event) {
								//获取所点击条目的下标  从全局数据items_json中取得所要显示内容
								itemIndex = $(this).parents('.item_container').attr('question_id');
								// 遍历json查找ID对应
								longDetails = '';
								$.each(items_json, function(index, val) {
									console.log(index);
									console.log(itemIndex);
									console.log(val);
									if (val.id == itemIndex) {
										longDetails = val.details;
										//跳出循环
										return false;
									}
								});

								html = $("<html>" + longDetails + "</html>");
								shortDetails = html.text().length > DETAILS_LENGTH ? html.text().slice(0, DETAILS_LENGTH)+'... ' : html.text();
								details = $(this).text() == "显示全部" ? longDetails : shortDetails;

								$(this).parents('.item_container').find('.item_hot_comment').html(details);
								if ($(this).text() == "显示全部") {
									$(this).text("收起");
								} else {
									$(this).text("显示全部");
								}
							});
							item.find('.item_hot_comment_scale').click(function(event) {
								//获取所点击条目的下标  从全局数据items_json中取得所要显示内容
								itemIndex = $(this).parents('.item_container').attr('question_id');
								// 遍历json查找ID对应
								longDetails = '';
								$.each(items_json, function(index, val) {
									console.log(index);
									console.log(itemIndex);
									console.log(val);
									if (val.id == itemIndex) {
										longDetails = val.details;
										//跳出循环
										return false;
									}
								});

								html = $("<html>" + longDetails + "</html>");
								shortDetails = html.text().length > DETAILS_LENGTH ? html.text().slice(0, DETAILS_LENGTH) : html.text();
								shortDetails += "...  ";
								details = $(this).text() == "显示全部" ? longDetails : shortDetails;

								$(this).parents('.item_container').find('.item_hot_comment').html(details);
								if ($(this).text() == "显示全部") {
									$(this).text("收起");
								} else {
									$(this).text("显示全部");
								}



							});

							item.appendTo('.items_container');
						});
					} else {
						//当内容已经被取完时
						$('#spinner_gray_new').hide();
						$('#item_more_new').text("没有更多内容~(≧▽≦)~啦");
					}
				}).always(function() {
					isLoading = false;
				});
		};
	}
})