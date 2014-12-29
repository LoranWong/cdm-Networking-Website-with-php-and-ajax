<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>
<head>

<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/index.js"></script>
<title>CdM | Coder Designer Manager 体验分享的快乐</title>

</head>

<body>
    <div class="con">
<?php require_once 'header.php';?>
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
                <div class="main_left main_left_index box_con">
                    <!-- 选项卡 -->
                    <div class="tabs_con">
                        <ul>
                            <!--                <li tag_id = "1">
                    <a href="#tab_content">新的发布</a>
                </li>
                -->
                        </ul>

                        <div id="tab_content">
                            <div class="items_con" id="items_con_new">
                                <!-- 单条信息的示例内容 -->
                                <table class="item_con" cellpadding="0" cellspacing="0" border="0" width="100%" item-index="0">
                                    <tbody>
                                        <tr>
                                            <td class="item_left" valign="top">
                                                <a class="item_avatar_a">
                                                    <img class="item_avatar" src="" alt="">
                                                </a>
                                            </td>

                                            <td class="item_main">
                                                <a class="item_title" target="_blank">该小组还没有主题哦~</a>
                                                <div class="item_hot_comment_div">
                                                    <div class="item_hot_comment">快发布主题吧</div>
                                                    <span class="item_hot_comment_scale">显示全部</span>
                                                </div>
                                                <span class="item_info">
                                                    <a class="item_user" id="item_user">指标啦啦</a>
                                                    &nbsp;•&nbsp;
                                                    <span class="item_date">0分钟前</span>
                                                    <span class="lastest_comment_info">
                                                        &nbsp;•&nbsp; 最新回复来自
                                                        <a class="item_latest_user" id="item_latest_user">Duanqu~</a>
                                                    </span>

                                                </span>
                                            </td>
                                            <td class="item_right">
                                                <span href="" class="item_comments_count">0</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="item_more_new" class="item_more">
                                <i id="spinner_gray_new" class="spinner_gray"></i>
                                正在加载更多
                            </div>
                        </div>
                    </div>

                </div>

                <!-- 页面右边浮动内容 -->

                <div class="main_right">

                    <div class="box_con group_info_con">
                        <img class="group_avatar" src="" alt="">
                        <span class="group_item">戴政粉丝团</span>
                        <div class="group_details">
                            加载中..
                        </div>
                        <div class="gradient_btn_green group_join_btn">加入这群逗比</div>
                        <div class="gradient_btn_white group_leave_btn">离开这群逗比</div>
                        <div class="group_info_bottom_con">


                            <div class="group_info_questions">
                                <span>&nbsp;&nbsp;发布</span>
                                <br>
                                <strong>28</strong>
                                <label>篇</label>
                            </div>
                            <div class="group_info_questions group_info_members">
                                <span>&nbsp;&nbsp;成员</span>
                                <br>
                                <strong>384</strong>
                                <label>人</label>
                            </div>


                        </div>
                    </div>
                </div>

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