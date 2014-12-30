$(function() {

    /*
     
     */
    //判断cookie
    if ($.cookie().id != undefined && $.cookie().user != undefined) {
        //用cookie缓存 显示信息
        $("#userInfo_btn").html($.cookie().user);
        //ajax获取用户个人信息
        $.ajax({
                url: 'interfaces/getUser.php',
                type: 'POST',
                data: {
                    id: $.cookie().id
                },
            })
            .done(function(response) {
                json = eval(response);
                //待用
            });
        $(".tips_reg_log_con").css("display", "none");
    } else {
        //没有cookie
        $("#userInfo_btn").hide();
        $("#logout_btn").hide();
    }

    //显示头像
    $.showAvatar($('.top_avatar'),$.cookie().id,128);

    //显示个人信息菜单 

    $('#userInfo_btn').mouseenter(function(event) {
        $('.profile_menu').slideDown('fast');

    });
    $('#userInfo_btn').mouseleave(function(event) {
        //$.l($(event.relatedTarget).attr('id') == "home_btn");
        if ($(event.relatedTarget).attr('id') != "home_btn") {
            $('.profile_menu').slideUp('fast');
        }
    });
    $('.profile_menu').mouseleave(function(event) {
        //$.l($(event.relatedTarget).attr('id' == "userInfo_btn"));
        if ($(event.relatedTarget).attr('id') != "userInfo_btn") {
            $('.profile_menu').slideUp('fast');
        }
    });


    //头部主页
    $(".header_logo_title").click(function(event) {
        window.open('index.php', "_parent");
    });

    //button初始化
    $('.dia_submit').button();
    $('.tips_reg_btn').button();
    $('.tips_log_btn').button();

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

    //搜索框tooltip初始化
    $('.search').tooltip({
        show: {
            effect: "blind",
            duration: 200
        },
        position: {
            my: "left top",
            at: "left bottom"
        },
    });


    //accordion初始化
    $('<div class="accordi"></div>on_con').accordion({
        collapsible: true,
        animate: {
            easing: 'easeOutBounce'
        }
    });

    $('#group_btn').click(function(event) {
        if ($.cookie().id == undefined) {
            event.preventDefault();
            showLoginDialog();
        }
    });


    //点击提问
    $('#ask_btn').click(function(event) {
        if ($.cookie().id != undefined) {
            showAskDialog();
        } else {
            //未登录
            showLoginDialog();
        }
    });

    //点击退出
    $('#logout_btn').click(function(event) {
        $.removeCookie("id");
        $.removeCookie("user");
        //重定向到主页
        window.location = 'index.php';
    });

    //点击主页
    $('#home_btn').click(function(event) {
        window.location = 'home.php?user_id=' + $.cookie().id;
    });
    //点击自己头像
    $('#userInfo_btn').click(function(event) {
        window.location = 'home.php?user_id=' + $.cookie().id;
    });

    //点击设置
    $('#settings_btn').click(function(event) {
        window.location = 'settings.php'
    });

    //点击注册
    $('.tips_reg_btn').click(function(event) {
        showSignUpDialog();
    });


    //点击登录
    $('.tips_log_btn').click(function(event) {
        showLoginDialog();
    });



    //弹出提问窗口
    function showAskDialog() {
        //初始化提问对话框
        $('#dia_ask').dialog({
            title: '提问',
            width: 720,
            height: 500,
            resizable: false,
            show: true,
            hide: true,
            modal: true,
        });
        //先不管格式输入
        // $('#ask_details').sceditor({
        //  plugins: "xhtml",
        //  style: "css/editor_themes/square.min.css",
        //  toolbar: "size,bold,underline,font|image,link,emoticon|code,quote,horizontalrule,table|source",
        //  locale: "cn",
        //  resizeEnabled: false,
        // });


    //尝试使用插件  ueditor

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');

        //实现textarea的Tab功能
        // HTMLTextAreaElement.prototype.getCaretPosition = function() { //return the caret position of the textarea
        //     return this.selectionStart;
        // };
        // HTMLTextAreaElement.prototype.setCaretPosition = function(position) { //change the caret position of the textarea
        //     this.selectionStart = position;
        //     this.selectionEnd = position;
        //     this.focus();
        // };
        // HTMLTextAreaElement.prototype.hasSelection = function() { //if the textarea has selection then return true
        //     if (this.selectionStart == this.selectionEnd) {
        //         return false;
        //     } else {
        //         return true;
        //     }
        // };
        // HTMLTextAreaElement.prototype.getSelectedText = function() { //return the selection text
        //     return this.value.substring(this.selectionStart, this.selectionEnd);
        // };
        // HTMLTextAreaElement.prototype.setSelection = function(start, end) { //change the selection area of the textarea
        //     this.selectionStart = start;
        //     this.selectionEnd = end;
        //     this.focus();
        // };

        // var textarea = document.getElementById('ask_details');

        // textarea.onkeydown = function(event) {

        //     //support tab on textarea
        //     if (event.keyCode == 9) { //tab was pressed
        //         var newCaretPosition;
        //         newCaretPosition = textarea.getCaretPosition() + "    ".length;
        //         textarea.value = textarea.value.substring(0, textarea.getCaretPosition()) + "    " + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
        //         textarea.setCaretPosition(newCaretPosition);
        //         return false;
        //     }
        //     if (event.keyCode == 8) { //backspace
        //         if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
        //             var newCaretPosition;
        //             newCaretPosition = textarea.getCaretPosition() - 3;
        //             textarea.value = textarea.value.substring(0, textarea.getCaretPosition() - 3) + textarea.value.substring(textarea.getCaretPosition(), textarea.value.length);
        //             textarea.setCaretPosition(newCaretPosition);
        //         }
        //     }
        //     if (event.keyCode == 37) { //left arrow
        //         var newCaretPosition;
        //         if (textarea.value.substring(textarea.getCaretPosition() - 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
        //             newCaretPosition = textarea.getCaretPosition() - 3;
        //             textarea.setCaretPosition(newCaretPosition);
        //         }
        //     }
        //     if (event.keyCode == 39) { //right arrow
        //         var newCaretPosition;
        //         if (textarea.value.substring(textarea.getCaretPosition() + 4, textarea.getCaretPosition()) == "    ") { //it's a tab space
        //             newCaretPosition = textarea.getCaretPosition() + 3;
        //             textarea.setCaretPosition(newCaretPosition);
        //         }
        //     }
        // }



        //验证提问
        $(".dia_ask_form").validate({
            onkeyup: false,
            success: function(label) {
                label.addClass('input_vaild').text("");
            },
            rules: {
                ask_title: {
                    required: true,
                    rangelength: [1, 200],
                },
                ask_details: {
                    required: true,
                }
            },
            submitHandler: function(formEle) {
                //console.log($('#ask_details').sceditor("instance").getBody());
                $.showLoadDialog('请稍候...');

                console.log($('.ask_title').val());

                $.ajax({
                        url: 'interfaces/addQuestion.php',
                        type: 'POST',
                        data: {
                            user_id: $.cookie().id,
                            title: $('#ask_title').val(),
                            details: $('#ask_details').val(),
                        }
                    })
                    .done(function(response, status, xhr) {
                        if (response == "true") {
                            $.showOKDialog('提问成功',function(){
                                $('#dia_ask').dialog('destroy');
                                window.history.go(0);
                            });
                        } else {
                            $.showErrorDialog('提问失败');
                        }
                    })
                    .fail(function() {
                        $.showErrorDialog('网络错误');
                    });
            }
        });
    }


    // 弹出登录窗口
    function showLoginDialog() {
        //初始化登录对话框
        $('#dia_login').dialog({
            title: '登入CdM',
            width: 350,
            height: 230,
            resizable: false,
            show: true,
            hide: true,
            modal: true,
        });
        //验证登录
        $(".dia_login_form").validate({
            submitHandler: function(formEle) {
                $.showLoadDialog('请稍候...');
                Login2Server($('.dia_login_form').serialize(), $('#dia_login'));
            },
        });
    }


    // 弹出注册窗口
    function showSignUpDialog() {

        //初始化自动补全
        $('#reg_email').autocomplete({
            delay: 0,
            autoFocus: true,
            //邮箱补全筛选
            source: function(request, response) {
                //response是一个方法，该方法改变下拉的补全列表的值
                hosts = ["@gmail.com", "@qq.com", "@163.com", "@126.com",
                    "@yahoo.com", "@yahoo.com.cn", "@sina.com", "@sohu.com"
                ];

                beforeAt = request.term.slice(0, request.term.indexOf("@"));
                afterAt = request.term.slice(request.term.indexOf("@"));

                emails = $.map(hosts, function(value, index) {
                    return beforeAt + value;
                });

                emails = request.term.indexOf("@") == -1 ?
                    $.map(hosts, function(value, index) {
                        return request.term + value;
                    }) :
                    $.grep(emails, function(value, index) {
                        return value.indexOf(afterAt) > -1;
                    });
                emails = [request.term].concat(emails);
                response(emails);
            },
        });


        //初始化注册对话框
        $('#dia_reg').dialog({
            title: '欢迎加入CdM',
            width: 450,
            height: 240,
            resizable: false,
            show: true,
            hide: true,
            modal: true,
            close: function() {
                $('#reg_email').autocomplete('destroy');
            }
        });
        //初始化生日选择框
        var date = new Date(1994, 7, 3);
        $('#reg_birthday').datepicker({
            changeMonth: true,
            changeYear: true,
            defaultDate: date,
            yearRange: "1900:c",
            hideIfNotPrevNext: true,
            maxDate: 0,
        });
        //初始化注册错误信息提示
        $(".dia_reg_form").validate({
            onkeyup: false,
            success: function(label) {
                label.addClass('input_vaild').text("");
            },
            rules: {
                reg_email: {
                    required: true,
                    email: true,
                    remote: 'interfaces/isUserExist.php',
                },
                reg_user: {
                    required: true,
                    rangelength: [2, 10],
                },
                reg_pass: {
                    required: true,
                    rangelength: [6, 20],
                },
                reg_birthday: {
                    required: true,
                }
            },
            messages: {

            },
            submitHandler: function(formEle) {
                $.showLoadDialog('跳转中...');
                $.ajax({
                        url: 'interfaces/addUser.php',
                        type: 'POST',
                        data: $('.dia_reg_form').serialize(),
                    })
                    .done(function(response, status) {
                        //alert('注册返回：'+response);
                        if (response == "true") {
                            Login2Server({
                                login_email: $('#reg_email').val(),
                                login_pass: $('#reg_pass').val(),
                            }, $('#dia_reg'));
                        } else {
                            $.showErrorDialog('注册失败');
                        }
                    })
                    .fail(function() {
                        console.log("error");
                        $.showErrorDialog("网络错误");
                    });
            },
        });
    }

    function Login2Server(data, dialog2Close) {
        $.ajax({
                url: 'interfaces/isPassRight.php',
                type: 'POST',
                data: data,
            })
            .done(function(response, status, xhr) {
                //alert('注册返回：'+response);
                if (response != "[]") {
                    json = eval("(" + response + ")");
                    $.showOKDialog('登录成功');
                    //存储cookie
                    if ($('#login_save_cookie').is(':checked')) {
                        $.cookie("id", json[0].id, {
                            expires: 30
                        });
                        $.cookie("user", json[0].user, {
                            expires: 30
                        });
                    } else {
                        $.cookie("id", json[0].id);
                        $.cookie("user", json[0].user);
                    }
                    setTimeout(function() {
                        $('#dia_load').dialog('close');

                        dialog2Close.dialog('close');

                        //登录
                        $("#userInfo_btn").html(json[0].user);
                        $(".tips_reg_log_con").css("display", "none");
                        $("#userInfo_btn").show();
                        $("#logout_btn").show();

                    }, 700);
                } else {
                    $.showErrorDialog('账号或密码错误');
                }
            })
            .fail(function() {
                console.log("error");
                $.showErrorDialog("网络错误");
            });
    }

    //隐藏头部导航栏
    currentScrollTop = 0;
    $(window).scroll(function(event) {
        if ($(window).scrollTop() > currentScrollTop + 200) {
            //$.l("down!");
            $('.header_con').slideUp('fast');
            currentScrollTop = $(window).scrollTop();
        } else if ($(window).scrollTop() < currentScrollTop) {
            //向上滚动
            $('.header_con').slideDown('fast');
            currentScrollTop = $(window).scrollTop();
        }

    });

})
