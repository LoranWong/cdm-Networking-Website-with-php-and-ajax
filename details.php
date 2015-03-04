<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>

<head>
<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/details.js"></script>
</head>

<body class="mybody">
    <div class="con">

<?php require_once 'header.php';?>
<!-- 页面的主内容 -->
        <div class="main_con">
            <div class="main_con_inner">
                <!-- 页面的主左内容**************** -->
                <div class="main_left">
                    <div id="details_con" class="box_con">
                        <div class="details_top_info">
                            <a class="show_toolkit details_avatar_a">
                                <img class="details_avatar" src="" alt="">
                            </a>

                            <div class="details_groups">
                                来自小组
                                <span class="chevron">&nbsp;›&nbsp;</span>
                                <!-- <a class="group_item">小组名</a> -->
                            </div>
                            <div class="details_info_con">
                                <span class="detalis_info">
                                    <a class="show_toolkit question_user">作者</a>
                                    &nbsp;•&nbsp;
                                    <span class="question_date">0分钟前</span>
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
                                <span class="item_comments_count comment_index">1</span>
                                <div class=" details_top_info comments_top_info">
                                <div class="show_toolkit comment_avatar_and_user" >
                                    <a class="comment_avatar_a">
                                        <img class="details_avatar comment_avatar" src="" alt="">
                                    </a>
                                    <a class="item_user"><!-- 回复用户名 --></a>
                                </div>


                                    <div class="details_groups comment_info">
                                        <span class="detalis_info">

                                            &nbsp;•&nbsp;
                                            <span class="item_date"><!-- 回复时间 --></span>
                                            前&nbsp;•&nbsp;
                                        </span>
                                        来自小组
                                        <span class="chevron">&nbsp;›&nbsp;</span>
                                        <!-- <a class="group_item">小组名</a> -->
                                    </div>
                                </div>
                                <div class="comment_main">
                                    评论主内容
                                </div>
                            </div>
                        </div>
                        <div id="item_more_new" class="hvr-bubble-float-top item_more">
                            <i id="spinner_gray_new" class="spinner_gray"></i>
                            <span>嘿咻~嘿咻 ↖(^ω^)↗</span>
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

</body>

</html>
