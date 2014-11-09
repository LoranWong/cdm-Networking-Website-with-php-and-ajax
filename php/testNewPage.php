<?php 

echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<script src="jquery-ui/external/jquery/jquery.js"></script>
	<script src="jquery-ui/jquery-ui.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/jquery.sceditor.xhtml.min.js"></script>
	<script src="js/index.js"></script>
	<link rel="stylesheet" href="jquery-ui/jquery-ui-zhiwen.css">
	<link rel="stylesheet" href="css/editor_themes/square.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="index.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">


	<title>CdM | Coder Designer Manager 体验分享的快乐</title>
</head>
<body>
	<div class="container">
		
		<div class="header_container">
			<div class="top_bar"></div>
			<div class="header_main">
				<div class="header_logo_title">
					<img class="header_logo" src="images/zhiwen_64.png" alt="知问">
					<a class="header_title">CdM</a>
				</div>
				<div class="header_search">
					<input type="text" name="search" class="round_textbox search" title="问题 用户 分享 ...">
					<a class="search_btn">提问</a>
				</div>
			</div>
			<div class="header_logout">
				<a class="logout_btn">退出</a>
			</div>
			<div class="header_userInfo">
				<a class="userInfo_btn">用户名</a>
			</div>
		</div>

		<!-- 提示登录注册 -->
		<div class="tips_reg_log_container">
			<div class="tips_main">
				<a class="tips_join">成为CdM居民，体验分享的快乐</a>
				<div class="tips_btns">
					<a class="tips_reg_btn">现在注册</a>
					<a class="tips_log_btn">问友登录</a>
				</div>
			</div>
		</div>

	<!-- 页面的主内容 -->
		<div class="main_container">
			<div class="main_left">
				<!-- 选项卡 -->
				<div class="tabs_container">
					<ul>
						<li><a href="tab1.html">tab_nav1</a></li>
						<li><a href="tab2.html">tab_nav2</a></li>
						<li><a href="tab3.html">tab_nav3</a></li>
					</ul>
				</div>

				<div class="items_container">
					<!-- 单条信息的示例内容 -->
					 <table class="item_container" cellpadding="0" cellspacing="0" border="0" width="100%" item-index="0">
						<tbody>
							<tr>
								<td class="item_left" valign="top">
									<img class="item_avatar" src="images/sample.png" 
									alt="">
								</td>
								<td class="item_main">
								<a class="item_title" href="index.html">
									百度搜索为什么会对一个被墙掉的网址不离不弃 3 年不删?
								</a>
								<div class="item_hot_comment_div">
									<div class="item_hot_comment">这种人一般水平不高，说“水平不高”可能太笼统，可以称之为“生活境界不高”。在他们眼里，成功＝有钱。当然，子非鱼焉知鱼之乐，也许真正境界高的是他们...</div>
									<a class="item_hot_comment_scale">显示全部</a>
								</div>
								<span class="item_info">
									<a class="item_user">
										指标啦啦
									</a>
									&nbsp;•&nbsp;
									<span class="item_date">
										3分钟
									</span>
									前&nbsp;•&nbsp; 最热回复来自 
									<a class="item_hot_user">
										Duanqu~
									</a>									
								</span>
								</td>
								<td class="item_right">
									<a href="" class="item_comment_counts">
										23
									</a>
								</td>
							</tr>
						</tbody>
					</table>

				</div>

			</div>
			<div class="main_right">
				<!-- 折叠卡 -->
				<div class="accordion_container">
					<h2 class="accordion_title1">标题1</h2>
					<div class="accordion_con1">内容1</div>
					<h2 class="accordion_title2">标题2</h2>
					<div class="accordion_con2">内容2</div>
					<h2 class="accordion_title3">标题3</h2>
					<div class="accordion_con3">内容3</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 提问窗口 -->
	<div id="dia_ask">
		<form class="dia_ask_form">
			<p>
				<lable for="ask_title">标 题 ：</lable>
				<input type="text" id = "ask_title" name="ask_title" class="round_textbox" placeholder="请输入标题" required>
			</p>
			<lable>描 述 ：</lable>
			<div class="details_textarea_div">
				<textarea id = "ask_details" name="ask_details" class="round_textbox">
					
				</textarea>
			</div>
			<input type="submit" class="dia_submit" value="提交">
		</form>
	</div>

	<!-- 登录对话窗口 -->
	<div id="dia_login" title="问友登录">
		<form class="dia_login_form">
			<p>
				<lable for="login_email">账 号 ：</lable>
				<input type="text" id = "login_email" name="login_email" class="round_textbox dia_textbox" placeholder="请输入注册邮箱" required>
			</p>
			<p>
				<lable for="login_pass">密 码 ：</lable>
				<input type="password" id = "login_pass" name="login_pass" class="round_textbox dia_textbox" placeholder="请输入密码" required>
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
				<input type="text" id = "reg_email" name="reg_email" class="round_textbox dia_textbox" placeholder="将作为账号以及安全邮箱">
			</p>
			<p>
				<lable for="reg_user">昵 称 ：</lable>
				<input type="text" id = "reg_user" name="reg_user" class="round_textbox dia_textbox" placeholder="请输入您的昵称">
			</p>
			<p>
				<lable for="reg_pass">密 码 ：</lable>
				<input type="password" id = "reg_pass" name="reg_pass" class="round_textbox dia_textbox" placeholder="密码至少6位">
			</p>
			<p>
				<lable for="reg_birthday">生 日 ：</lable>
				<input type="text" id = "reg_birthday" name="reg_birthday" class="round_textbox dia_textbox" readonly placeholder="点击选择生辰">
			</p>
			<p class="dia_reg_gender">
				<p>性 别 :　<span><input type="radio" name="reg_gender" id="male" value="1" checked>客观定义的男性</span></p>
				<!-- 下方全角缩进 -->
				<p>　　　　<input type="radio" name="reg_gender" id="female" value="0">客观定义的女性</p>
				<p>　　　　<input type="radio" name="reg_gender" id="gender_others" value="2">其他</p>
			</p>
			<p class="dia_reg_field">
				<p>性 致 ：</p>
				<!-- 下方全角缩进 -->
				　　<input type="checkbox" name="reg_field" id="programmer" value="0" checked>程序猿
				<input type="checkbox" name="reg_field" id="designer" value="1">设计狮
				<input type="checkbox" name="reg_field" id="manager" value="2">项目鲸鲤
				<input type="checkbox" name="reg_field" id="field_others" value="3">凑热闹的
			</p>
			<hr>
			<input type="submit" class="dia_submit" value="加入我们">
		</form>
	</div>

	<!-- loading窗口 -->
	<div id="dia_load">
		请稍候...
	</div>


</body>
</html>';


 ?>