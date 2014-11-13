$(function() {

    //从数据库设置学校以及专业列表  看来这两个要先加载
    $('#settings_uni,#settings_major,#settings_gender').chosen({
        no_results_text: '(*^__^*)没有找到..'
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
            // $.showLoadDialog('跳转中...');
            // $.ajax({
            //         url: 'php/signUp_addUser.php',
            //         type: 'POST',
            //         data: $('.dia_reg_form').serialize(),
            //     })
            //     .done(function(response, status) {
            //         //alert('注册返回：'+response);
            //         if (response == "true") {
            //             Login2Server({
            //                 login_email: $('#reg_email').val(),
            //                 login_pass: $('#reg_pass').val(),
            //             }, $('#dia_reg'));
            //         } else {
            //             $.showErrorDialog('注册失败');
            //         }
            //     })
            //     .fail(function() {
            //         console.log("error");
            //         $.showErrorDialog("网络错误");
            //     });
        },
    });

    //头像的设置

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
                    $('.settings_avatar_img').remove();
                    //$('.settings_avatar_form').hide();
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
                        $.l('boundx=' + boundx);
                        $.l('boundy=' + boundy);
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
        console.log(sel);
    }

    //点击裁剪上传
    $('.settings_avatar_submit').click(function(event) {
        // $.ajaxFileUpload({
        //     url: 'php/addAvatar.php', //用于文件上传的服务器端请求地址
        //     secureuri: false, //是否需要安全协议，一般设置为false
        //     fileElementId: 'settings_avatar_file', //文件上传域的ID
        //     dataType: 'json', //返回值类型 一般设置为json
        //     success: function(data, status) //服务器成功响应处理函数
        //         {
        //             // $("#img1").attr("src", data.imgurl);
        //             // if (typeof(data.error) != 'undefined') {
        //             //     if (data.error != '') {
        //             //         alert(data.error);
        //             //     } else {
        //             //         alert(data.msg);
        //             //     }
        //             // }
        //         },
        //     error: function(data, status, e) //服务器响应失败处理函数
        //         {
        //             alert(e);
        //         }
        // });
    });



})
