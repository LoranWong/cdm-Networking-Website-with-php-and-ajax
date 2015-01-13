$(function() {

    //获取Get参数
    g_user_id = $.baoGetUrlParam('user_id');
    //当前是自己页面还是他人页面
    g_user_id = (g_user_id == null) ? $.cookie().id : g_user_id;

    isOthers = (g_user_id == $.cookie().id) ? false : true;


    //$.l(g_user_id);

    //加载用户基本信息
    $.ajax({
            url: 'interfaces/getUser.php',
            type: 'POST',
            data: {
                id: g_user_id
            },
        })
        .done(function(response) {
            json = eval(response);
            $.l(json);
            $('.home_user_name').text(json[0].user);
            $('#home_uni_a').text(json[0].uni_name);
            $('#home_major_a').text(json[0].major_name);
            $('#home_email_a').text(json[0].email);
            $('#home_email_a').attr('href', 'mailto:'+json[0].email);
            $('.home_details').text(json[0].details);
            $('#follow_count').text(json[0].follow_count);
            $('#fans_count').text(json[0].fans_count);

        })
        .fail(function() {
            $.l("error");
        });

    $.showAvatar($('.home_user_avatar'), g_user_id, "origin");

    //加载用户加入的小组
    $.showGroupsInfo(g_user_id, $('.home_groups'));

    //加载用户发布的主题
    $.ajax({
            url: 'interfaces/getQuestions.php',
            type: 'POST',
            data: {
                user_id: g_user_id
            },
        })
        .done(function(response) {
            json = eval(response);
            //$.l(json);
            $('#home_items_count').html(json.length);
            $.each(json, function(index, val) {
                time = $.getTimeByDateTime(val.date);
                item = (index == 0) ? $('.item_con').first() : $('.item_con').first().clone();
                item.find('.home_item_date').html(time);
                item.find('.item_title').html(val.title);
                item.find('.home_comments_count').html(val.comments_count);
                item.find('.item_title,.home_comments_count').attr('href', 'details.php?id=' + val.id);
                item.appendTo('.home_items_con');
            });
            if (json.length == 0) {
                $('.item_con').remove();
            }


        })
        .fail(function() {
            $.l("error");
        });

    //如果是显示他人页面,且已经登录
    if (isOthers && $.cookie().id != null) {
        //显示按钮
        $.showFollowOrUnfollowBtn($.cookie().id, g_user_id, $('#home_follow_btn'), $('#home_unfollow_btn'));

        $('#home_follow_btn').click(function(event) {
            $.doFollowOrUnfollow($.cookie().id, g_user_id , true ,  $('#home_follow_btn'), $('#home_unfollow_btn'));
            users_count = parseInt($('.home_follow_item:last strong').text());
            $.l(users_count);
            $('.home_follow_item:last strong').text(users_count + 1);
            $('.home_follow_item:last strong').effect('highlight','1500');
        });

		$('#home_unfollow_btn').click(function(event) {
            $.doFollowOrUnfollow($.cookie().id, g_user_id , false ,  $('#home_follow_btn'), $('#home_unfollow_btn'));
            users_count = parseInt($('.home_follow_item:last strong').text());
            $.l(users_count);
            $('.home_follow_item:last strong').text(users_count - 1);
            $('.home_follow_item:last strong').effect('highlight','1500');
            
        });

    }



})
