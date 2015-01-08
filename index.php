<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>
<head>

<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/index.js"></script>
<title>CdM | Coder Designer Manager 体验分享的快乐</title>

</head>

<body class="mybody">
    <div class="con">
<?php require_once 'header.php';?>

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
                                                <a class="item_comments_count item_comments_count_a" href="">0</a>
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

                    <div id="group_info_con_id" class="box_con group_info_con">
                        <div class="box_title">小组信息</div>
                        <img class="group_avatar" src="" alt="">
                        <span class="group_item">加载中..</span>
                        <div class="group_details">
                            加载中..
                        </div>
                        <div class="gradient_btn_green group_join_btn">加入这群逗比</div>
                        <div class="gradient_btn_white group_leave_btn">离开这群逗比</div>
                        <div class="group_info_bottom_con">
                            <div class="group_info_questions">
                                <span>&nbsp;&nbsp;发布</span>
                                <br>
                                <strong>0</strong>
                                <label>篇</label>
                            </div>
                            <div class="group_info_questions group_info_members">
                                <span>&nbsp;&nbsp;成员</span>
                                <br>
                                <strong>0</strong>
                                <label>人</label>
                            </div>
                        </div>
                    </div>

                    <div id="youmaykonw_box_id" class="box_con group_info_con">
                        <div class="box_title">可能认识</div>
                        <div class="user_items_con">
                            <div class="user_item_con">
                                <div class="item_uin_major_con">
                                    <span class="item_user_uni_major uni_name">华南理工大学</span>
                                    <span class="item_user_uni_major"> • </span>
                                    <span class="item_user_uni_major major_name">软件工程</span>
                                </div>
                                <div class="item_avatar_name_con">
                                    <a class="item_avatar_a">
                                        <img class="item_avatar item_list_avatar" src="resources/avatars/default/7_128.png" alt="">
                                    </a>
                                    <a class="item_user item_user_list_name" href="">男神赵红学长</a>
                                    <a id="item_user_follow_btn" class="gradient_btn_green item_list_follow_btn" user_id="">圈他</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- 页面右边浮动内容 -->
            </div>
        </div>
    </div>

</body>

</html>