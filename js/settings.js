$(function() {

    //从数据库设置学校以及专业列表  看来这两个要先加载
    $('#settings_uni,#settings_major,#settings_gender').chosen({
        no_results_text: '(*^__^*)没有找到..'
    });

    var g_user_id = $.cookie().id;

    //加载用户基本信息
    $.ajax({
            url: 'php/getUser',
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
        .fail(function() {
            console.log("error");
        });


    //获取Get参数
    g_settings = $.baoGetUrlParam('settings');
    //$.l(g_settings);
    if (g_settings == 'profile' || g_settings == null) {
        $('.settings_avatar').hide();
    } else if (g_settings == 'avatar') {
        $('.settings_profile').hide();
    }

    $('.settings_profile_li').click(function(event) {
        $('.settings_avatar').hide();
        $('.settings_profile').show();
    });

    $('.settings_avatar_li').click(function(event) {
        $('.settings_profile').hide();
        $('.settings_avatar').show();
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
    $(".settings_profile_form").validate({
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
                    url: 'php/updateUser.php',
                    type: 'POST',
                    data: $('.settings_profile_form').serialize() + "&settings_id=" + g_user_id
                })
                .done(function(response, status) {
                    //alert('注册返回：'+response);
                    if (response == "true") {
                        $.showOKDialog("修改成功");
                        setTimeout(function() {
                            window.location = "home.html";
                        }, 700);
                    } else {
                        $.showErrorDialog("错误,可能有非法字符");
                    }
                })
                .fail(function() {
                    console.log("error");
                    $.showErrorDialog("网络错误");
                });
        },
    });

    //头像的设置

    $.showAvatar($('.settings_avatar_img'), g_user_id, 256);

    var jcrop_api;
    var reader = new FileReader(); //新建一个FileReader

    $preview = $('#preview-pane'),
        $pcon = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcon.width(),
        ysize = $pcon.height();

    $('.settings_avatar_file').change(function(event) {
        if (typeof FileReader == 'undefined') {
            alert('放弃IE吧同志,开发人员会疯掉的');
        } else {
            var files = $('.settings_avatar_file').prop('files'); //获取到文件列表
            if (files.length == 0) {
                console.log('请选择文件');
                return;
            } else {

                reader.readAsDataURL(files[0]);
                reader.onload = function(evt) { //读取完文件之后会回来这里
                    $('.settings_avatar_img').hide();
                    $('.settings_avatar_form').hide();
                    $('.settings_avatar_new').show();
                    $('.settings_avatar_submit').show();
                    $('.settings_avatar_new,#preview-pane img').attr('src', evt.target.result);
                    //这里已经进行了图片的显示
                    $('.settings_avatar_new').Jcrop({
                        onChange: updatePreview,
                        onSelect: updatePreview,
                        aspectRatio: xsize / ysize,
                    }, function() {
                        // Use the API to get the real image size
                        var bounds = this.getBounds();
                        boundx = bounds[0];
                        boundy = bounds[1];
                        // $.l('boundx=' + boundx);
                        // $.l('boundy=' + boundy);
                        // Store the API in the jcrop_api variable
                        jcrop_api = this;
                        // Move the preview into the jcrop container for css positioning
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
    $('.settings_avatar_submit').click(function(event) {
        //请用户等待
        jcrop_api.release();
        $.showLoadDialog("请稍候...");
        $('.settings_avatar_submit').attr('disabled', 'true');
        //下面代码可以实现有进度的异步上传
        var _file = document.getElementById('settings_avatar_file');
        var formData = new FormData();
        formData.append('settings_avatar_file', _file.files[0]);
        formData.append('x', g_sel.x);
        formData.append('y', g_sel.y);
        formData.append('w', g_sel.w);
        formData.append('h', g_sel.h);
        formData.append('id', g_user_id);
        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            $('.settings_avatar_submit').attr('disabled', 'false');
            if (request.readyState == 4 && request.response == "true") {
                //console.log(request.response);
                $.showOKDialog("修改成功", function() {
                    window.location.replace("home.html");
                });
            }else if (request.readyState == 4 && request.response == "false") {
                $.showErrorDialog("文件错误或过大",function(){
                    window.location.replace("settings.html?settings=avatar&");
                })
            };
            
        };

        request.open('POST', 'php/addAvatar.php');
        request.send(formData);
    });



})
