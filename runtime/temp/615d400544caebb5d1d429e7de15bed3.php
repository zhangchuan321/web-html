<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\phpstudy\PHPTutorial\WWW\ydwxfx\public/../app/index\view\index\login.html";i:1528542221;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0,user-scalable=0"/>
    <script src="/ydwxfx/public/static/js/jquery.min.js"></script>
    <script src="/ydwxfx/public/static/js/login1.js"></script>
    <link type="text/css" rel="stylesheet" href="/ydwxfx/public/static/css/login1.css"/>
    <title></title>
</head>
<body>
<div id="login1">
    <div class="xuanzhe">
        <ul>
            <li class="active">登入</li>
            <li>注册</li>
        </ul>
    </div>
    <div class="con">
        <div class="login-button">
            <div class="dengru">
                <form action="/ydwxfx/public/index.php/index/index/doLogin" method="post">
                    <label>手机号:</label>
                    <input type="text" name="phone" tabindex="1"/>
                    <br/><label>密&nbsp&nbsp&nbsp码:</label>
                    <input type="password" name="password" tabindex="2"/>
                    <br/>
                    <button type="submit" class="flatbtn-blu" tabindex="3">登入</button>
                </form>
            </div>
        </div>
        <div class="login-button">
            <div class="zhuce">
                <form action="/ydwxfx/public/index.php/index/index/doRegister" method="post">
                    <br/><label>手机号码:</label>
                    <input type="text" name="phone" value="" tabindex="2"/>
                    <br/><label>密&nbsp&nbsp&nbsp&nbsp&nbsp码:</label>
                    <input type="password" name="password" value="" tabindex="3"/>
                    <br/><label>确认密码:</label>
                    <input type="password" name="re_password" value="" tabindex="4"/>
                    <br/>
                    <label>推荐人手机号:</label><br>
                    <input type="text" name="referee_phone" value="" tabindex="2"/>
                    <button type="submit" class="flatbtn-blu" tabindex="5">注册</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
