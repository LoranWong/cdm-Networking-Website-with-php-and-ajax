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

    <!-- 提问窗口 -->
    <div id="dia_ask">
        <form class="dia_ask_form">
            <p>
                <lable for="ask_title">标 题 ：</lable>
                <input type="text" id="ask_title" name="ask_title" class="round_textbox" placeholder="请输入标题" required>
            </p>
            <lable>描 述 ：</lable>
            <div class="details_textarea_div">
                <!-- <textarea id="ask_details" name="ask_details" class="round_textbox"></textarea> -->
                <script id="editor" type="text/plain" style="width:600px;height:300px;"></script>
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