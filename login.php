<?php 
    $tip = isset($_GET['tip']) ? $_GET['tip'] : null;
?>
<html>
    <head>
        <link rel="stylesheet" href="css/login.css" type="text/css"/>
        <title>电子书城 —— 登陆</title>
    </head>
    <body>
        <div id="top">
	       <div id="title">
		      <h1>电子书城 —— 登录</h1>
	       </div>
        </div>
        <div id="main">
        	<div id="form">
                <form action="lib/loginHandle.php" method="POST">
                    <div id="tip"><?php echo $tip;?></div>
        			<div class="input" id="user">
        				<label class="label" style="margin-right:15px">用户</label>
        				<input type="text" name="user"  style="width:150"/>
        			</div>
        			<div class="input">
        				<label class="label" style="margin-right:15px;">密码</label>
        				<input type="password" name="passwd" style="width:150"/>
        			</div>
        			<div class="input" style="text-align:center; margin-top:10px">
        				<input type="submit" value="登录" style="margin-right:20px; height:32; width:40"/>
        				<input type="reset" value="重置"  style="margin-left:20px; height:32; width:40"/>
        			</div>
        		</form>
        	</div>
        </div>
    </body>
</html>