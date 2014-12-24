<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>
<head>
<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/settings.js"></script>

<title>CdM | Coder Designer Manager 体验分享的快乐</title>
</head>

<body>
    <div class="con">

       <!-- 头部导航栏 -->
        <div class="header_con">
            <img class="top_avatar" src="" alt="">
            <a id="userInfo_btn" class="top_menu_item">登录中</a>
            <ul class="profile_menu">
                <li id="home_btn"> <i class="iconsfzh home_btn_icon"></i>
                    主页
                </li>
                <li id="settings_btn"> <i class="iconsfzh settings_btn_icon"></i>
                    设置
                </li>
                <li id="logout_btn">
                    <i class="iconsfzh logout_btn_icon"></i>
                    退出
                </li>
            </ul>
            <!-- <img class="top_accordion" src="images/triangle_right.png" alt="">
            -->
            <!-- <div class="top_divide_line"></div>
        -->
            <div class="header_main">
                <a href="index.php">
                    <img id="header_logo" src="images/logo.png">
                </a>

                <div class="header_main_menu">
                    <a id="home_btn" href="index.php?header_id=0" class="top_menu_item">
                    首页
                    <img src="images/triangle_bottom.png"></a>
                    <a id="group_btn" href="index.php?header_id=1" class="top_menu_item">
                    我的小组
                    <img src="images/triangle_bottom.png"></a>
                </div>

                <div class="header_search">
                    <a id="ask_btn" class="gradient_btn_green">发布</a>
                    <input id="search_input" type="text" name="search" class="round_textbox search" title="问题 用户 分享 ...">
                    <img id="search_btn" src="images/search.png" alt="">
                </div>
            </div>

            <div class="white_bar"></div>

        </div>
        <!-- 头部导航栏 -->


        <!-- 提示登录注册 -->
        <div class="tips_reg_log_con box_con">
            <div class="tips_main">
                <a class="tips_join">成为CdM居民，体验分享的快乐</a>
                <div class="tips_btns">
                    <a class="tips_reg_btn">现在注册</a>
                    <a class="tips_log_btn">问友登录</a>
                </div>
            </div>
        </div>

        <!-- 页面的主内容 -->
        <div class="main_con">
            <div class="main_con_inner">

                <div class="box_con settings_left ">

                    <div class="settings_label">设置</div>

                    <!-- <img class="home_user_avatar" src="images/sample.png" alt=""> -->
                    <ul class="settings_ul">
                        <li class="settings_profile_li"><a href="settings.php?settings=profile">基本资料</a></li>
                        <li class="settings_avatar_li"><a href="settings.php?settings=avatar">修改头像</a></li>
                        <li class="settings_creategroup_li"><a href="settings.php?settings=creategroup">创建小组</a></li>
                        <li class="settings_group_li"><a href="settings.php?settings=group">小组设置</a></li>
                    </ul>


                </div>

                <div class="box_con settings_right settings_profile">
                    <div class="settings_profile_label">修改基本资料</div>
                    <form class="settings_form" id="settings_profile_form">
                        <p>
                            <lable for="settings_user">昵 称 ：</lable>
                            <input type="text" id="settings_user" name="settings_user" class="round_textbox dia_textbox setting_textbox" value="" required>
                        </p>
                        <p>
                            <lable for="settings_birthday">生 日 ：</lable>
                            <input type="text" id="settings_birthday" name="settings_birthday" class="round_textbox dia_textbox setting_textbox" readonly placeholder="点击选择生辰" required>
                        </p>

                        <p>
                            <lable for="settings_details">描 述 ：</lable>
                            <input type="text" id="settings_details" name="settings_details" class="round_textbox dia_textbox setting_textbox" style="width:340px;" value="现在的年轻人,所谓的座右铭都懒得写" required>
                        </p>
                        <p>
                            <lable for="settings_gender">性 别 ：</lable>
                            <select id="settings_gender" name="settings_gender" style="width:350px;" data-placeholder="请选择性别.." required>
                                <option value="1"></option>
                                <!-- <option value="2">男</option> -->
                            </select>
                        </p>

                        <p>
                            <lable for="settings_uni">学 校 ：</lable>
                            <select id="settings_uni" name="settings_uni" style="width:350px;" data-placeholder="请选择学校.." required>
                                <option value="1"></option>
                                <!-- <option value="2">华男理工大学</option> -->
                            </select>
                        </p>
                        <p>
                            <lable for="settings_major">专 业 ：</lable>
                            <select id="settings_major" name="settings_major" style="width:350px;" data-placeholder="请选择专业.." required>
                                <option value="1"></option>
                                <!-- <option value="2">软件工程</option> -->
                            </select>
                        </p>
                        <p>
                            <input type="submit" class="dia_submit settings_submit" value="更新资料">
                        </p>


                    </form>

                </div>

                <div class="box_con settings_right settings_me_avatar">
                    <div class="settings_profile_label">修改头像</div>


                    <div id='settings_me_file_box' class="settings_file_box">
                            <input type='button' class='settings_avatar_file_btn' value='选择文件' />
                            <input type="file" accept="image/*" name="settings_avatar_file" class="settings_avatar_file" id="settings_me_avatar_file" >
                     </div>
                            <img class="settings_avatar_img" src="" alt="">
                            <img id="settings_me_avatar_new" class="settings_avatar_new" alt="">
                            <div id="preview-pane">
                                <div class="preview-container">
                                    <img src="" class="jcrop-preview" alt="Preview">
                                </div>
                            </div>
                            <input type="button" id='settings_avatar_submit' class="dia_submit " value="裁剪并上传">




                </div>


                <div class="box_con settings_right settings_creategroup">
                    <div class="settings_profile_label">创建小组</div>
                    <form class="settings_form" id="settings_creatgroup_form">
                        <p>
                            <lable for="settings_groupname">组 名 ：</lable>
                            <input type="text" id="settings_groupname" name="settings_groupname" class="round_textbox dia_textbox setting_textbox" value="" required>
                        </p>
                        <p>
                            <lable for="settings_group_details">描 述 ：</lable>
                            <input type="text" id="settings_group_details" name="settings_group_details" class="round_textbox dia_textbox setting_textbox" style="width:340px;" value="这个组长很懒,什么都不肯写.." required>
                        </p>
                        <p>
                        <input type="submit"  class="dia_submit settings_submit" value="提交">

                        </p>
                    </form>

                </div>


                <div class="box_con settings_right settings_group">
                    <div class="settings_profile_label">小组设置</div>
                    <form class="settings_form" id="settings_creatgroup_form">
                        <p>
                            <lable for="settings_groupname">组 名 ：</lable>
                            <input type="text" id="settings_groupname" name="settings_groupname" class="round_textbox dia_textbox setting_textbox" value="" required>
                        </p>
                        <p>
                            <lable for="settings_group_details">描 述 ：</lable>
                            <input type="text" id="settings_group_details" name="settings_group_details" class="round_textbox dia_textbox setting_textbox" style="width:340px;" value="这个组长很懒,什么都不肯写.." required>
                        </p>
                        <div id='settings_group_file_box' class="settings_file_box">
                        <lable for="settings_avatar_file_btn">头 像 ：</lable>
                        <input type='button' class='settings_avatar_file_btn' value='选择文件' />
                        <input type="file" accept="image/*" name="settings_avatar_file" class="settings_avatar_file" id="settings_group_avatar_file" >
                        </div>

                        <img class="settings_avatar_img" src="" alt="">
                        <img id="settings_group_avatar_new" class="settings_avatar_new" alt="">
                        <div id="preview-pane">
                            <div class="preview-container">
                                <img src="" class="jcrop-preview" alt="Preview">
                            </div>
                        </div>
                        <input type="submit" id='settings_group_submit' class="dia_submit" value="提交">
                    </form>

                </div>
                <!-- 页面右边浮动内容 -->

                <!-- 页面右边浮动内容 -->
            </div>
        </div>
    </div>
    <!-- 提问窗口 -->
    <div id="dia_ask">
        <form class="dia_ask_form">
            <p>
                <lable for="ask_title">标 题 ：</lable>
                <input type="text" id="ask_title" name="ask_title" class="round_textbox" placeholder="请输入标题" required>
            </p>
            <lable>描 述 ：</lable>
            <div class="details_textarea_div">
                <textarea id="ask_details" name="ask_details" class="round_textbox"></textarea>
            </div>
            <input type="submit" class="dia_submit" value="提交">
        </form>
    </div>

    <!-- 登录对话窗口 -->
    <div id="dia_login" title="问友登录">
        <form class="dia_login_form">
            <p>
                <lable for="login_email">账 号 ：</lable>
                <input type="text" id="login_email" name="login_email" class="round_textbox dia_textbox" placeholder="请输入注册邮箱" required>
            </p>
            <p>
                <lable for="login_pass">密 码 ：</lable>
                <input type="password" id="login_pass" name="login_pass" class="round_textbox dia_textbox" placeholder="请输入密码" required>
            </p>
            <p>
                <input type="checkbox" name="login_save_cookie" id="login_save_cookie" checked/>
                <label for="login_save_cookie">一个月内自动登录</label>
            </p>
            <input type="submit" class="dia_submit" value="登录">
        </form>
    </div>

    <!-- 注册对话窗口 -->
    <div id="dia_reg">
        <form class="dia_reg_form">
            <p>
                <lable for="reg_email">邮 箱 ：</lable>
                <input type="text" id="reg_email" name="reg_email" class="round_textbox dia_textbox" placeholder="将作为账号以及安全邮箱">
            </p>
            <p>
                <lable for="reg_user">昵 称 ：</lable>
                <input type="text" id="reg_user" name="reg_user" class="round_textbox dia_textbox" placeholder="请输入您的昵称">
            </p>
            <p>
                <lable for="reg_pass">密 码 ：</lable>
                <input type="password" id="reg_pass" name="reg_pass" class="round_textbox dia_textbox" placeholder="密码至少6位">
            </p>
            <input type="submit" class="dia_submit" value="加入我们">
        </form>
    </div>

    <!-- loading窗口 -->
    <div id="dia_load">请稍候...</div>

</body>

</html>
