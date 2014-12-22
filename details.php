<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>

<head>
<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/details.js"></script>


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
                <!-- 页面的主左内容**************** -->
                <div class="main_left">
                    <div id="details_con" class="box_con">
                        <div class="details_top_info">
                            <a class="details_avatar_a">
                                <img class="details_avatar" src="" alt="">
                            </a>

                            <div class="details_groups">
                                来自小组
                                <span class="chevron">&nbsp;›&nbsp;</span>
                                <!-- <a class="group_item">小组名</a> -->
                            </div>
                            <div class="details_info_con">
                                <span class="detalis_info">
                                    <a class="question_user">作者</a>
                                    &nbsp;•&nbsp;
                                    <span class="question_date">3分钟前</span>
                                </span>
                            </div>
                            <a class="item_hot_comment_scale comment_btn">回复</a>
                            <span class="item_comments_count details_comments_count">0</span>

                        </div>
                        <div class="details_title_info">
                            <!-- <a class="tag_item">爱情</a> -->
                            <a class="details_title_content">问题标题</a>
                        </div>
                        <div class="details_question_main">
                            ------正文： 我爸是一个对于同性恋极度反感厌恶的人。我爸听到库克出柜的时候，立马下了命令：家里不准再购买任何的苹果产品（我意见很大），并且让我考虑换掉iPhone（不干涉）。 幸好他不知道我是同性恋。
                        </div>
                    </div>
                    <div class="box_con comment_input_con">
                        <textarea name="comment_content" class="round_textbox comment_content"></textarea>
                        <a class="comment_btn_ok">提交</a>
                        <a class="comment_btn_cancel">取消</a>
                    </div>
                    <div class="box_con comments_and_label__con">
                        <div class="comments_con">
                            <div class="comment_main comment_label">回复列表</div>
                            <div class="comment_con">
                                <div class="details_top_info comments_top_info">
                                    <a class="comment_avatar_a">
                                        <img class="details_avatar comment_avatar" src="" alt="">
                                    </a>
                                    <div class="details_groups comment_info">
                                        <span class="detalis_info">
                                            <a class="item_user">回复用户名</a>
                                            &nbsp;•&nbsp;
                                            <span class="item_date">0分钟</span>
                                            前&nbsp;•&nbsp;
                                        </span>
                                        来自小组
                                        <span class="chevron">&nbsp;›&nbsp;</span>
                                        <!-- <a class="group_item">小组名</a> -->
                                    </div>
                                    <span class="item_comments_count comment_index">1</span>

                                </div>
                                <div class="comment_main">
                                    评论主内容
                                </div>
                            </div>
                        </div>
                        <div id="item_more_new" class="item_more"> <i id="spinner_gray_new" class="spinner_gray"></i>
                            正在加载更多
                        </div>
                    </div>
                </div>
                <!-- 页面的主左内容**************** -->
                <div class="main_right">
                    <!-- 折叠卡 -->
                    <!-- 			<div class="accordion_con">
				<a id="accordion_title1" class="accordion_title">标题1</a>
				<div id="accordion_con1"  class="accordion_con">内容1</div>
				<a id="accordion_title2" class="accordion_title">标题2</a>
				<div id="accordion_con2" class="accordion_con">内容2</div>
				<a id="accordion_title3" class="accordion_title">标题3</a>
				<div id="accordion_con3" class="accordion_con">内容3</div>
			</div> -->
                </div>
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
