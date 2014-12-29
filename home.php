<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>

<head>
<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/home.js"></script>


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

                <div class="home_left">

                    <div class="home_user_name">JackWong</div>

                    <img class="home_user_avatar" src="" alt="">

                    <div class="home_details">加载中</div>

                    <ul class="home_ul">
                        <li>
                            <img src="images/home_uni.png" alt="">
                            <a class="home_uni_a">加载中</a>
                        </li>
                        <li>
                            <img src="images/home_major.png" alt="">
                            <a class="home_major_a">加载中</a>
                        </li>
                        <li>
                            <img src="images/home_email.png" alt="">
                            <a class="home_email_a">加载中</a>
                        </li>
                    </ul>

                </div>

                <div class="home_middle">
                    <div class="home_fllow_con">
                        <a class="home_fllow_item">
                            <span>关注了</span>
                            <br>
                            <strong>15</strong>
                            <label>人</label>
                        </a>
                        <a class="home_fllow_item">
                            <span>关注者</span>
                            <br>
                            <strong>28</strong>
                            <label>人</label>
                        </a>
                    </div>
                    <div class="home_groups">
                        <span class="home_groups_label">加入的小组</span>
                        <span class="chevron">&nbsp;›&nbsp;</span>
                        <!-- <a class="group_item">小组名</a> -->
                    </div>
                    <div class="home_items_label">主题　　<strong id="home_items_count">0</strong>　个</div>

                    <div class="home_items_con">
                        <table class="item_con" cellpadding="0" cellspacing="0" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td class="item_main">
                                        <a class="item_title home_title" target="_blank">该用户还没有发布主题哦~</a>
                                    </td>
                                    <td class="home_item_date_td">
                                        <span class="item_date home_item_date">
                                            <!-- 时间 -->
                                        </span>
                                    </td>
                                    <td class="item_right home_item_right">
                                        <span href="" class="item_comments_count home_comments_count">0</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
