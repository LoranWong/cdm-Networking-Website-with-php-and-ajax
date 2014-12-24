$(function() {

    var g_user_id = $.cookie().id;

    //获取Get参数
    g_settings = $.baoGetUrlParam('settings');
    //如果是设置小组信息  则这个存放小组ID
    g_group_id = $.baoGetUrlParam('group_id');
    //$.l(g_settings);
    if (g_group_id != null) {
        console.log(g_group_id);
    } else if (g_settings == 'profile' || g_settings == null) {
        $('.settings_profile').show();
        initProfile();
    } else if (g_settings == 'avatar') {
        $('.settings_me_avatar').show();
        initAvatar();
    } else if (g_settings == 'creategroup') {
        $('.settings_creategroup').show();
        initCreategroup();
    } else if (g_settings == 'group'){
        $('.settings_group').show();
        initGroup();
    }

    //初始化设置个人信息
    function initProfile() {
        //加载用户基本信息
        $.ajax({
                url: 'interfaces/getUser',
                type: 'POST',
                data: {
                    id: g_user_id,
                },
            })
            .done(function(response) {
                json = eval(response);
                //$.l(json);
                $('#settings_user').val(json[0].user);
                $('#settings_birthday').val(json[0].birthday);
                $('#settings_details').val(json[0].details);

            })
        //从数据库设置学校以及专业列表  看来这两个要先加载
        $('#settings_uni,#settings_major,#settings_gender').chosen({
            no_results_text: '(*^__^*)没有找到..'
        });


        //初始化生日选择框
        var date = new Date(1994, 7, 3);
        $('#settings_birthday').datepicker({
            changeMonth: true,
            changeYear: true,
            defaultDate: date,
            yearRange: "1900:c",
            hideIfNotPrevNext: true,
            maxDate: 0,
        });


        //初始化修改资料错误信息提示
        $("#settings_profile_form").validate({
            onkeyup: false,
            success: function(label) {
                label.addClass('input_vaild').text("");
            },
            rules: {
                settings_user: {
                    required: true,
                    rangelength: [2, 10],
                },
                settings_details: {
                    required: true,
                    rangelength: [2, 20],
                },
                settings_birthday: {
                    required: true,
                },
            },
            messages: {

            },
            submitHandler: function(formEle) {
                //$.showLoadDialog('跳转中...');
                $.ajax({
                        url: 'interfaces/updateUser.php',
                        type: 'POST',
                        data: $('.settings_profile_form').serialize() + "&settings_id=" + g_user_id
                    })
                    .done(function(response, status) {
                        //alert('注册返回：'+response);
                        if (response == "true") {
                            $.showOKDialog("修改成功");
                            setTimeout(function() {
                                window.location = "home.php";
                            }, 700);
                        } else {
                            $.showErrorDialog("操作失败");
                        }
                    })
                    .fail(function() {
                        console.log("error");
                        $.showErrorDialog("网络错误");
                    });
            },
        });


    }

    //头像的设置
    function initAvatar() {
        $.showAvatar($('.settings_avatar_img'), g_user_id, "origin");

        var formData = new FormData();
        formData.append('type', 'avatar');
        formData.append('id', g_user_id);
        $.imageSelectAndUpload(formData, 'settings_me_avatar_file', 'settings_me_avatar_new', 'settings_avatar_submit', 'interfaces/addImage.php', 'home.php');

    }


    //创建小组
    function initCreategroup() {
        //var formData = new FormData();
        //formData.append('type', 'avatar');
        //formData.append('id', g_user_id);
        //$.imageSelectAndUpload(formData, 'settings_group_avatar_file', 'settings_group_avatar_new', 'settings_hidden_submit', $.PATH_INTERFACE + 'addImage.php', 'home.php');

        //输入错误提示
        $('#settings_creatgroup_form').validate({
            onkeyup: false,
            success: function(label) {
                label.addClass('input_vaild').text("");
            },
            rules: {
                settings_groupname: {
                    required: true,
                    rangelength: [2, 6],
                },
                settings_group_details: {
                    required: true,
                    rangelength: [0, 150],
                }
            },
            submitHandler: function(formEle) {

                group_name = $('#settings_groupname').val();
                group_details =$('#settings_group_details').val();

                //先提交创建小组再上传头像
                $.ajax({
                    url: 'interfaces/addGroup.php',
                    type: 'POST',
                    data: {
                        user_id:g_user_id,
                        name:group_name,
                        details:group_details
                    },
                })
                .done(function(response) {
                    if(response != 'false'){
                        //返回了创建成功的id
                        $.showOKDialog("组团成功!",function (){
                            window.location = 'index.php?header_id=1&group_id='+response;
                        });
                    }else{
                        $.showErrorDialog("创建失败");
                    }
                });
            }
        });
    }

    //小组设置
    function initGroup(){
        //TODO



    }

})
