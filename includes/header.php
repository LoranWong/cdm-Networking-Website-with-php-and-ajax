<!-- 头部导航栏 -->
        <div class="header_con">
            <img class="top_avatar" src="" alt="">
            <a id="userInfo_btn" class="top_menu_item">登录中</a>
            <ul class="profile_menu">
                <li id="home_btn" class="hvr-wobble-horizontal"> <i class="fa fa-home fa-lg icon-padding"></i>
                    主页
                </li>
                <li id="settings_btn" class="hvr-wobble-horizontal"> <i class="fa fa-cog fa-lg icon-padding"></i>
                    设置
                </li>
                <li id="logout_btn" class="hvr-wobble-horizontal"><i class="fa fa-sign-out fa-lg icon-padding"></i>
                    退出
                </li>
            </ul>
            <!-- <img class="top_accordion" src="images/triangle_right.png" alt="">
            -->
            <!-- <div class="top_divide_line"></div>
        -->
            <div class="header_main">
                <a href="index.php">
                    <div class="header_logo_box">
                        <!-- <img id="header_logo_over" class="header_logo" src="images/logo_over.png"> -->
                        <img id="header_logo_nor" class="hvr-buzz-out header_logo " src="images/logo_nor.png">
                    </div>
                </a>

                <div class="header_main_menu">
                    <a id="home_btn" href="index.php?header_id=0" class="top_menu_item">
                    首页
                    <img src="images/triangle_bottom.png"></a>
                    <a id="group_btn" href="index.php?header_id=1" class="top_menu_item">
                    小组动态
                    <img src="images/triangle_bottom.png"></a>
                </div>

                <div class="header_search">
                    <a id="ask_btn" class="gradient_btn_green"><i class="fa fa-pencil-square-o"></i> 发布</a>
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
                <a class="tips_join">圈耳,我们在小谷围的四年时光。</a>
                <div class="tips_btns">
                    <a class="button button-rounded button-flat-action tips_reg_btn"><i class="fa fa-users"></i> 加入我们</a>
                    <a class="button button-rounded button-flat-action tips_log_btn"><i class="fa fa-sign-in"></i> 岛民登录</a>
                </div>
            </div>
        </div>

    <!-- 提问窗口 -->
    <div id="dia_ask">
        <form class="dia_ask_form">
            <p>
                <lable for="ask_tag">分 类 ：</lable>
                <select id="ask_tag" name="ask_tag" style="width:100px;" data-placeholder="请选择.." required>
                        <option value="0"></option>
                        <!-- <option value="2">杂谈</option> -->
                </select>
            </p>
            <p>
                <lable for="ask_title">标 题 ：</lable>
                <input type="text" id="ask_title" style="margin-top:5px;" name="ask_title" class="round_textbox" placeholder="标题好才是真的好\(^o^)/~" required>
            </p>
            <div class="details_textarea_div">
                <!-- <textarea id="ask_details" name="ask_details" class="round_textbox"></textarea> -->
                <script id="editor" type="text/plain" style="width:832px;height:330px;"></script>
            </div>
            <input type="submit" class="button button-rounded button-flat-action dia_submit" value="提交">
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
            <input type="submit" class="button button-rounded button-flat-action dia_submit" value="登录">
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
            <input type="submit" class="button button-rounded button-flat-action dia_submit" value="加入我们">
        </form>
    </div>

    <!-- loading窗口 -->
    <div id="dia_load">请稍候...</div>


    <!-- 自定义toolkit -->
    <div class="toolkit_con bottom">
        <div class="toolkit_in_con">
            <div class="toolkit_user_con">
                    <img class="item_toolkit_avatar" src="resources/avatars/user/17_128x128.jpg" alt="">

                <div class="toolkit_con_right">
                    <a class="toolit_user_name">JackWong</a>
                    <p class="toolit_user_details">非典型文艺程序猿的一生</p>
                    <a class="fa fa-institution toolit_user_uni" style="font-size: 12px;padding-left: 10px;"> 华南理工大学</a>
                    <a class="fa fa-wrench toolit_user_major" style="font-size: 12px;"> 软件工程</a>

                </div>



            </div>
        </div>
        <div class="arrow"></div>
        <div class="arrow"></div>
    </div>

