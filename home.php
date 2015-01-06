<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>

<head>
<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/home.js"></script>


    <title>CdM | Coder Designer Manager 体验分享的快乐</title>
</head>

<body class="mybody">
    <div class="con">
<?php require_once 'header.php';?>
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
                    <div class="home_follow_con">
                        <a class="home_follow_item">
                            <span>我圈</span>
                            <br>
                            <strong>15</strong>
                            <label>人</label>
                        </a>
                        <a class="home_follow_item">
                            <span>圈我</span>
                            <br>
                            <strong>28</strong>
                            <label>人</label>
                        </a>
                    </div>
                    <a id="home_follow_btn" class="gradient_btn_green home_follow_unfollow_btn">圈他</a>
                    <a id="home_unfollow_btn" class="gradient_btn_white home_follow_unfollow_btn">怒取圈</a>
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
                                        <a href="" class="item_comments_count home_comments_count">0</a>
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

</body>

</html>
