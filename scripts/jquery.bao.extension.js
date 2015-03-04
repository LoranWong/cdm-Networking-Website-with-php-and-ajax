(function($) {

    //定义全局变量
    //config
    //摘要长度
    $.BAO_DETAILS_LENGTH = 80;
    //每次加载帖子个数
    $.BAO_DETAILS_LOAD_COUNT = 3;
    //每次加载评论
    $.BAO_COMMENT_LOAD_COUNT = 3;
    //每次加载可能认识用户个数
    $.BAO_USERS_LOAD_COUNT = 5;
    //背景图片个数
    $.BAO_BACKGROUNDS_COUNT = 12;
    //$.PATH_INTERFACE = 'interfaces/';

    //获取Get参数
    $.baoGetUrlParam = function(name) {
        var reg = new RegExp("(^|&)" +
            name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]);
        return null;
    }

    //提示窗口

    $.showLoadDialog = function(str) {
        $('#dia_load').css('background', 'url(images/loading.gif) no-repeat 20px center')
            .html(str)
            .dialog('open');
    }

    $.showOKDialog = function(str, func) {
        var len = arguments.length;
        $('#dia_load').css('background', 'url(images/success.gif) no-repeat 20px center')
            .html(str)
            .dialog('open');
        setTimeout(function() {
            $('#dia_load').dialog('close');
            if (len == 2) func();
        }, 1000);
    }

    $.showErrorDialog = function(str, func) {
        var len = arguments.length;
        $('#dia_load').css('background', 'url(images/error.png) no-repeat 20px center')
            .html(str)
            .dialog('open');
        setTimeout(function() {
            $('#dia_load').dialog('close');
            if (len == 2) func();
        }, 1000);
    }

    /**加载用户所在小组信息  
    @p1  用户ID  
    @p2  需要appendTo哪个Jquery对象
    **/
    $.showGroupsInfo = function(user_id, appendToWhat) {
        $.ajax({
                url: 'interfaces/getGroupsByUserId.php',
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
                    item.attr('href', "index.php?header_id=1&group_id=" + val.id);
                    item.attr('group_id', val.id);
                    item.html(val.name);
                    item.appendTo(appendToWhat);
                });
            });
    }

    //根据Mysql的DATETIME 计算出距离现在多久
    $.getTimeByDateTime = function(date) {
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
        return time + '前';
    }

    /*
     *显示头像，最后一个参数代表是不是显示小组头像，默认为假
     *@param size  如 256 或者 origin
     */
    $.showAvatar = function(jqimg, user_or_group_id, size, isgroup) {
        //判断有没有参数4,没有则设为假
        if (arguments.length == 3)
            isgroup = false;


        //未登录时随机显示自己头像
        if (!isgroup && user_or_group_id == undefined) {
            r = Math.floor(Math.random() * (40));
            path = "resources/avatars/default/" + r + "_" + size + ".png";
            jqimg.attr('src', path);
        } else {
            //将size拼接成 origin 或者 size x size
            con_size = (size == 'origin') ? 'origin' : size + 'x' + size;
            //根据isgroup 确定路径
            path_prefix = isgroup ? "resources/avatars/group/" : "resources/avatars/user/";
            //传入ID时尝试已经设定的头像
            path = path_prefix + user_or_group_id + "_" + con_size + ".jpg";
            jqimg.attr('src', path);
            //设置其错误回调，显示默认的随即设定好的头像
            jqimg.error(function(event) {
                if (size == "origin") size = 256;
                r = user_or_group_id % 40;
                path = "resources/avatars/default/" + r + "_" + size + ".png";
                //回调中注意用this代替具体对象
                $(this).attr('src', path);
            });
        }

    }

    /**
        显示照片预览裁剪并上传
        note: 本函数选择文件后会将 class 为settings_avatar_img settings_file_box的元素 hide
        @param formData 先创建好并放出其他参数
        @param input_file_eleid 选择文件的input标签的ID，其name 与 class 必为 settings_avatar_file
        @param avatar_new_eleid 新显示的图像元素的ID
        @param submit_btn_eleid 提交按钮的ID
        @uploadURL 上传URL
        @successURL 上传成功后跳转URL
    **/
    $.imageSelectAndUpload = function(formData, input_file_eleid, avatar_new_eleid, submit_btn_eleid, uploadURL, successURL) {

        var jcrop_api;
        var reader = new FileReader(); //新建一个FileReader

        $preview = $('#preview-pane');
        $pcon = $('#preview-pane .preview-container');
        $pimg = $('#preview-pane .preview-container img');

        xsize = $pcon.width();
        ysize = $pcon.height();

        $('#' + input_file_eleid).change(function(event) {
            if (typeof FileReader == 'undefined') {
                alert('放弃IE吧同志,开发人员会疯掉的');
            } else {
                var files = $('#' + input_file_eleid).prop('files'); //获取到文件列表
                if (files.length == 0) {
                    console.log('请选择文件');
                    return;
                } else {

                    reader.readAsDataURL(files[0]);
                    reader.onload = function(evt) { //读取完文件之后会回来这里
                        $('.settings_avatar_img').hide();
                        $('.settings_file_box').hide();

                        $('#' + avatar_new_eleid).show();
                        $('#' + submit_btn_eleid).show();
                        $('#' + avatar_new_eleid + ',#preview-pane img').attr('src', evt.target.result);
                        //这里已经进行了图片的显示
                        $('#' + avatar_new_eleid).Jcrop({
                            onChange: updatePreview,
                            onSelect: updatePreview,
                            aspectRatio: xsize / ysize,
                        }, function() {
                            var bounds = this.getBounds();
                            boundx = bounds[0];
                            boundy = bounds[1];
                            jcrop_api = this;
                            $preview.show();
                            $preview.appendTo(jcrop_api.ui.holder);
                            min = boundx > boundy ? boundy : boundx;
                            jcrop_api.setSelect([0, 0, min, min]);
                        });
                    }
                }
            }
        });

        var g_sel;

        function updatePreview(sel) {
            if (parseInt(sel.w) > 0) {
                var rx = xsize / sel.w;
                var ry = ysize / sel.h;
                $pimg.css({
                    width: Math.round(rx * boundx) + 'px',
                    height: Math.round(ry * boundy) + 'px',
                    marginLeft: '-' + Math.round(rx * sel.x) + 'px',
                    marginTop: '-' + Math.round(ry * sel.y) + 'px'
                });
            }
            //console.log(sel);
            g_sel = sel;
        }

        //点击裁剪上传
        $('#' + submit_btn_eleid).click(function(event) {
            //请用户等待
            jcrop_api.release();
            $.showLoadDialog("请稍候...");
            $('#' + submit_btn_eleid).attr('disabled', 'true');
            //下面代码可以实现有进度的异步上传
            var _file = document.getElementById(input_file_eleid);
            formData.append('settings_avatar_file', _file.files[0]);
            formData.append('x', g_sel.x);
            formData.append('y', g_sel.y);
            formData.append('w', g_sel.w);
            formData.append('h', g_sel.h);
            var request = new XMLHttpRequest();
            request.onreadystatechange = function() {
                $('#' + submit_btn_eleid).attr('disabled', 'false');
                if (request.readyState == 4 && request.response == "true") {
                    //console.log(request.response);
                    $.showOKDialog("修改成功", function() {
                        window.location.replace(successURL);
                    });
                } else if (request.readyState == 4 && request.response == "false") {
                    $.showErrorDialog("文件错误或过大", function() {
                        //window.history.go(0);
                    })
                };

            };

            request.open('POST', uploadURL);
            request.send(formData);
            console.log('图片已经执行发送');
        });

    }


    //初始化ajax
    $.ajaxSetup({
        type: 'POST'
    });

    /**
     *  根据用户是否具有关注关系来显示按钮
     **/
    $.showFollowOrUnfollowBtn = function(follower_id, followee_id, jq_follow_btn, jq_unfollow_btn) {
        //TODO 判断是否关注了
        $.ajax({
                url: 'interfaces/isUserFollow.php',
                data: {
                    follower: follower_id,
                    followee: followee_id,
                },
            })
            .done(function(response) {
                if (response == 'true') {
                    jq_follow_btn.hide();
                    jq_unfollow_btn.show();

                } else {
                    jq_unfollow_btn.hide();
                    jq_follow_btn.show();
                }
            });

    }

    //圈与取消圈的操作
    $.doFollowOrUnfollow = function(follower_id, followee_id, isFollow, jq_followe_btn, jq_unfollow_btn) {
        //如果未登录
        ajaxUrl = isFollow ? "interfaces/addFollower.php" : "interfaces/deleteFollower.php";
        $.ajax({
                url: ajaxUrl,
                data: {
                    follower_id: follower_id,
                    followee_id: followee_id
                },
            })
            .done(function(response) {
                //console.log("response= " + response);
                if (jq_followe_btn != null) jq_followe_btn.toggle();
                if (jq_unfollow_btn != null) jq_unfollow_btn.toggle();
            });
    }

    /* 根据大小更新 toolkit 的显示位置 */
    $.updateToolKitPosition = function(context) {
        //重置位置
        distance_to_top = Math.ceil(context.offset().top) - Math.ceil($(window).scrollTop());
        if (distance_to_top > $('.toolkit_con').outerHeight()) {
            $('.toolkit_con').addClass('top');
            $('.toolkit_con').removeClass('bottom');
            $('.toolkit_con').css({
                left: context.offset().left - 30,
                top: context.offset().top - $('.toolkit_con').outerHeight() - 10,
            });
        } else {
            $('.toolkit_con').addClass('bottom');
            $('.toolkit_con').removeClass('top');
            $('.toolkit_con').css({
                left: context.offset().left - 30,
                top: context.offset().top + context.innerHeight() + 10,
            });
        }
    }



    /* 绑定所有class包含 show_toolkit 的元素mouseenter事件,该元素必须有 toolkit_id */
    $.updateShowToolKit = function() {
        //$('.toolkit_con').show();
        var show_timer;
        var hide_timer;
        $('.show_toolkit').unbind('mouseenter').mouseenter(function(event) {
            var context = $(this);
            show_timer = setTimeout(function() {

                //show 函数
                $('.toolkit_con').show();
                $('.toolkit_con').addClass('animated flipInY');

                //ajax加载显示用户信息
                $('.toolkit_user_con').hide();
                $('#toolkit_spiner').show();
                $.updateToolKitPosition(context);
                //加载用户基本信息
                user_id = context.attr('toolkit_id');
                $.ajax({
                        url: 'interfaces/getUser.php',
                        type: 'POST',
                        data: {
                            id: user_id
                        },
                    })
                    .done(function(response) {
                        $('.toolkit_user_con').show();
                        $('#toolkit_spiner').hide();
                        $.updateToolKitPosition(context);

                        json = eval(response);
                        console.log(json);
                        $('.item_toolkit_avatar').attr('src', '');
                        $.showAvatar($('.item_toolkit_avatar'), user_id, "128");
                        $('.toolit_user_name').text(json[0].user);
                        $('.toolit_user_uni').text(json[0].uni_name);
                        $('.toolit_user_major').text(json[0].major_name);
                        $('.toolit_user_details').text(json[0].details);
                        $('#toolkit_follow_count').text(json[0].follow_count);
                        $('#toolkit_fan_count').text(json[0].fans_count);

                    })
                    .fail(function() {
                        console.log("error");
                    });



            }, 200);

        });
        $('.show_toolkit').unbind('mouseleave').mouseleave(function(event) {
            clearTimeout(show_timer);
            hide_timer = setTimeout(function() {
                $('.toolkit_con').hide();
            }, 250);
        });
        $('.toolkit_con').unbind('mouseenter').mouseenter(function(event) {
            clearTimeout(hide_timer);
        });
        $('.toolkit_con').unbind('mouseleave').mouseleave(function(event) {
            $('.toolkit_con').hide();
        });
    }

    $.getRandomImageUrl = function() {
        return "url(resources/backgrounds/main_bg_" + parseInt((Math.random() * $.BAO_BACKGROUNDS_COUNT)) + ".jpg)";
    }


})(jQuery);
