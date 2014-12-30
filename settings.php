<?php require_once 'require.php';?>
<!DOCTYPE html>
<html>
<head>
<?php require_once 'includeBeforeTitle.php';?>
<script src="scripts/settings.js"></script>

<title>CdM | Coder Designer Manager 体验分享的快乐</title>
</head>

<body class="mybody">
    <div class="con">

<?php require_once 'header.php';?>
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

                    <div id="settings_manage_groups"class="home_groups settings_groups displaynone">
                        <span class="home_groups_label settings_group_label">选择小组</span>
                        <span class="chevron">&nbsp;›&nbsp;</span>
                        <!-- <a class="group_item">小组名</a> -->
                    </div>

                    <div id="settings_manage_actions" class="home_groups settings_groups displaynone">
                        <span class="home_groups_label settings_group_label">选择操作</span>
                        <span class="chevron">&nbsp;›&nbsp;</span>
                        <a id='settings_group_basic_btn' class="group_item">修改基本资料</a>
                        <a id='settings_group_avatar_btn' class="group_item">修改小组头像</a>
                    </div>

                    <form class="settings_form displaynone" id="settings_group_basic_form">
                        <div id='settings_groupname_and_details'>
                            <p>
                                <lable for="settings_groupname">组 名 ：</lable>
                                <input type="text" id="settings_basic_groupname" name="settings_groupname" class="round_textbox dia_textbox setting_textbox" value="" required>
                            </p>
                            <p>
                                <lable for="settings_group_details">描 述 ：</lable>
                                <input type="text" id="settings_basic_group_details" name="settings_group_details" class="round_textbox dia_textbox setting_textbox" style="width:340px;" value="这个组长很懒,什么都不肯写.." required>
                            </p>
                            <input type="submit" id='settings_group_basic_submit' class="dia_submit settings_submit" value="提交">
                        </div>
                    </form>

                    <form class="settings_form displaynone" id="settings_group_avatar_form">
                        <div>
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
                            <input type="submit" id='settings_group_avatar_submit' class="dia_submit settings_submit" value="裁剪并上传">

                        </div>
                    </form>

                </div>
                <!-- 页面右边浮动内容 -->

                <!-- 页面右边浮动内容 -->
            </div>
        </div>
    </div>

</body>

</html>
