$(function() {
    //********************************************分割***************************************************
    //Get 传入参数  header_id   tag_id   group_id
    // 1. 全为空  显示所有Tag
    // 2. header_id == 0 或 null  tag_id == a   显示特定Tag
    // 3. header_id == 1 group_id == null 显示所有自己加入的Group
    // 4. header_id == 1 group_id == a  显示特定的Group

    //获取Get参数
    g_header_id = $.baoGetUrlParam('header_id');
    g_group_id = $.baoGetUrlParam('group_id');
    g_tag_id = $.baoGetUrlParam('tag_id');

    g_user_id = $.cookie().id;

    //全局变量items_json  存放当前页面的所有问题数据
    g_items_json = '';
    //摘要长度
    DETAILS_LENGTH = 80;
    //每次加载个数
    DETAILS_LOAD_COUNT = 10;
    //防止异步加载出错
    isLoading = false;
    //当前页面显示的Tag或者Group 的ID
    g_tagOrGroup_id = '';
    //当前显示的是否是GROUP
    isNowShowGroup = false;


    ajaxUrl = "";
    ajaxDataId = "";
    if (g_header_id == 0 || g_header_id == null) {
        $('#home_btn img').css('display', 'inline');
        $('#home_btn').css('color', '#fff');
        //TODO :get Tags and add them to tab   and of course add tag_id attr
        ajaxUrl = 'interfaces/getTags.php';
        ajaxDataId = g_tag_id;
        $('.group_info_con').css('display', 'none');

    } else if (g_header_id == 1) {
        $('#group_btn').css('color', '#fff');
        $('#group_btn img').css('display', 'inline');
        //查看自己所有小组动态 还是  查看URL参数中的特定动态
        ajaxUrl = (g_group_id == null) ? 'interfaces/getGroupsByUserId.php' : 'interfaces/getGroup.php';
        ajaxDataId = (g_group_id == null) ? $.cookie().id : g_group_id;
        isNowShowGroup = true;
    }


    //get Groups Or Tags and add them to tab
    $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                id: ajaxDataId,
            },
        })
        .done(function(response) {
            //console.log(response);
            json = eval(response);
            //console.log(json);
            //遍历Groups  插入Tabs
            $.each(json, function(index, val) {
                item = $('<li tab_index = "' + index + '" tagOrGroup_id ="' + val.id + '""><a href="#tab_content">' + val.name + '</a></li>');
                item.appendTo($('.tabs_con ul'));
            });
            //tabs初始化
            $('.tabs_con').tabs({
                active: 0,
                heightStyle: 'content',
                beforeActivate: loadQuestion,
                create: loadQuestion,
            });
        });



    loadQuestion = function(event, ui) {
        g_tagOrGroup_id = (ui.newTab == undefined) ? ui.tab.attr('tagOrGroup_id') : ui.newTab.attr('tagOrGroup_id');
        //console.log(g_tagOrGroup_id);
        //每次切换Tab清空数据
        g_items_json = "";
        //移除之前加载的内容
        $('.item_con').not(':first').remove();
        //首次加载
        showMoreQuestions(g_header_id, g_tagOrGroup_id);
        //若当前显示的是Group,显示页面右边内容
        if (isNowShowGroup) {
            //加载小组信息
            doInitGroupInfo();
        }
    }

    doInitGroupInfo = function() {

        $.ajax({
                url: 'interfaces/getGroup.php',
                type: 'POST',
                data: {
                    id: g_tagOrGroup_id,
                },
            })
            .done(function(response) {
                json = eval(response);
                //设置当前group
                g_group_id = json[0].id;
                //显示小组信息
                $('.group_info_questions:first strong').text(json[0].questions_count);
                $('.group_info_questions:last strong').text(json[0].users_count);
                $('.group_details').text(json[0].details)
                $('.group_item').text(json[0].name);
                $.showAvatar($('.group_avatar'), json[0].id, 256, true);
                //根据用户是否在小组内显示按钮 (如果是显示我的小组就不用进入此函数,默认显示为退出)
                doInitJoinOrLeaveBtn(g_user_id, g_group_id);
                //点击加入或者退出小组后
                $('.group_join_btn').clearQueue()
                    //绑定点击前先清除之前的事件，以免触发两次
                $('.group_join_btn').unbind("click").click(function(event) {
                    doJoinOrleave(g_user_id, g_group_id, true);
                });
                $('.group_leave_btn').unbind("click").click(function(event) {
                    doJoinOrleave(g_user_id, g_group_id, false);
                });
            });

    }

    doInitJoinOrLeaveBtn = function(user_id, group_id) {
        $.ajax({
                url: 'interfaces/isUserInGroup.php',
                type: 'POST',
                data: {
                    user_id: user_id,
                    group_id: group_id
                },
            })
            .done(function(response) {
                //console.log("response= " + response);
                if (response == 'true') {
                    $('.group_join_btn').hide();
                    $('.group_leave_btn').show();
                }else{
                    $('.group_join_btn').show();
                    $('.group_leave_btn').hide();
                }
            });
    }


    doJoinOrleave = function(user_id, group_id, isJoin) {
        //如果未登录
        if (user_id == null) {
            showLoginDialog();
        } else {
            ajaxUrl = isJoin ? "interfaces/addUser2Group.php" : "interfaces/deleteUserFromGroup.php";
            $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    data: {
                        user_id: user_id,
                        group_id: group_id
                    },
                })
                .done(function(response) {
                    //console.log("response= " + response);
                    //如果是加入
                    if (isJoin) {
                        $.showOKDialog("加入成功");
                        $('.group_join_btn').toggle();
                        $('.group_leave_btn').toggle();
                        //增加人数
                        users_count = parseInt($('.group_info_questions:last strong').text());
                        if ($('.group_join_btn').is(":hidden")) {
                            $('.group_info_questions:last strong').text(users_count + 1);
                        } else {
                            $('.group_info_questions:last strong').text(users_count - 1);
                        }
                    //如果是退出
                    }else{
                        $.showOKDialog("退出成功",function(){
                            window.history.go(0);
                        });
                    }
                });
        }

    }

    $(window).scroll(function(event) {
        if ($(window).scrollTop() + $(window).height() == $(document).height()) {
            showMoreQuestions(g_header_id, g_tagOrGroup_id);
        }
    });



    function showMoreQuestions(header_id, tagOrGroup_id) {

            ajaxDataObj = {};

            if (header_id == 0 || header_id == null) {
                ajaxDataObj = {
                    tag_id: tagOrGroup_id,
                    start: g_items_json.length,
                    count: DETAILS_LOAD_COUNT,
                }
            } else if (header_id == 1) {
                ajaxDataObj = {
                    group_id: tagOrGroup_id,
                    start: g_items_json.length,
                    count: DETAILS_LOAD_COUNT,
                }
            }

            if (!isLoading) {
                isLoading = true;
                //加载页面问题内容
                $.ajax({
                        url: 'interfaces/getQuestions.php',
                        type: 'POST',
                        data: ajaxDataObj,
                    })
                    .done(function(response, status, xhr) {

                        if (response != "[]") {
                            json = eval("(" + response + ")");

                            if (json.length < 3) {
                                //当内容已经被取完时
                                $('#spinner_gray_new').hide();
                                $('#item_more_new').text("没有更多内容~(≧▽≦)~啦");
                            }

                            currentLength = g_items_json.length;
                            if (g_items_json.length == 0) {
                                g_items_json = json;
                            } else {
                                g_items_json = g_items_json.concat(json);
                            }
                            //console.log(json);
                            //console.log(g_items_json);

                            html = '';
                            $.each(json, function(index, val) {

                                time = $.getTimeByDateTime(val.date);

                                html = $("<html>" + val.details_text + "</html>");
                                details = html.text().length > DETAILS_LENGTH ? html.text().slice(0, DETAILS_LENGTH) + '... ' : html.text();

                                item = index == 0 && currentLength == 0 ? $('.item_con').first() : $('.item_con').first().clone();
                                //设置Index时加上前面已经有的
                                //console.log("currentLength--->"+currentLength);
                                //console.log("index--->"+index);
                                item.attr('question_id', val.id);
                                item.find('.item_title').html(val.title);
                                item.find('.item_title').attr('href', 'details.php?id=' + val.id);
                                item.find('.item_user').html(val.user);
                                item.find('.item_user').attr('href', 'home.php?user_id=' + val.user_id);
                                item.find('.item_avatar_a').attr('href', 'home.php?user_id=' + val.user_id);
                                $.showAvatar(item.find('.item_avatar'), val.user_id, 128);
                                item.find('.item_date').html(time);
                                item.find('.item_hot_comment').html(details);
                                item.find('.item_comments_count').html(val.comments_count);
                                //如果没有回复
                                if (val.latest_user == '') {
                                    item.find('.lastest_comment_info').hide();
                                } else {
                                    //$.l(val);
                                    item.find('.lastest_comment_info').show();
                                    item.find('.item_latest_user').html(val.latest_user);
                                    item.find('.item_latest_user').attr('href', 'home.php?user_id=' + val.latest_user_id);
                                }


                                item.find('.item_main').mouseenter(function(event) {
                                    //console.log($(this).find('.item_hot_comment').text().length);
                                    if ($(this).find('.item_hot_comment').text().length > DETAILS_LENGTH) {
                                        $(this).find('.item_hot_comment_scale').css('display', 'inline');
                                    }
                                });

                                item.find('.item_main').mouseleave(function(event) {
                                    $(this).find('.item_hot_comment_scale').css('display', 'none');
                                });
                                item.find('.item_hot_comment_scale').click(function(event) {
                                    //获取所点击条目的下标  从全局数据g_items_json中取得所要显示内容
                                    itemIndex = $(this).parents('.item_con').attr('question_id');
                                    // 遍历json查找ID对应
                                    longDetails = '';
                                    $.each(g_items_json, function(index, val) {
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
                                    shortDetails = html.text().length > DETAILS_LENGTH ? html.text().slice(0, DETAILS_LENGTH) + '... ' : html.text();
                                    details = $(this).text() == "显示全部" ? longDetails : shortDetails;

                                    $(this).parents('.item_con').find('.item_hot_comment').html(details);
                                    if ($(this).text() == "显示全部") {
                                        $(this).text("收起");
                                    } else {
                                        $(this).text("显示全部");
                                    }
                                });
                                item.appendTo('.items_con');
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
        } //showMoreQuestions函数结束
})
