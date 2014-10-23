<?php
    require('include/public.php');
    $products = query_mysql('product', null, array('order' => array('pro_id', 'ASC'), 'size' => 9));
?>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>电子书城</title>
    <meta name="keywords" content="电子 网络 书城" />
    <meta name="description" content="电子书城" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />    
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />   
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js">    
    </script>    
    <script type="text/javascript">    
    ddsmoothmenu.init({
    	mainmenuid: "top_nav", //menu DIV id
    	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    	classname: 'ddsmoothmenu', //class added to menu's outer DIV
    	//customtheme: ["#1c5a80", "#18374a"],
    	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
    }) 
    function buy(pid,uid){
        jQuery.get('lib/inCart.php', {pid : pid, uid : uid}, function(data) {
            if(data) {
                alert('添加成功，商品已在您购物车！')
            } else {
                alert('添加失败，请检查网络，或者联系管理人员查看商品存量！')
            }
        });
    }
    function logout(){
        $.post('lib/logoutHandle.php', function(data){
            if(data) {
                alert('退出成功！')
                location.replace('login.php')
            }
        });
    }
   
    </script>

    </head>

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="#">&nbsp;&nbsp;&nbsp;电子书城</a></h1></div>
        <div id="header_right">
            <p>
	        <a href="index.php"><?php echo $user['user_id']?></a> | <a href="shoppingcart.php">我的购物车</a> | <a href="#" onclick="logout()">退出</a> | <a href="#">我的余额：<?php echo $score?></a></p>
			</p>
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" class="selected">书城首页</a></li>
                <li><a href="products.php">电子书城</a>
                    <ul>
                        <li><a href="products.php?c=riyongbaihuo">科教人文</a></li>
                        <li><a href="products.php?c=shumadianzi">电子技术</a></li>
                        <li><a href="products.php?c=shenghuodianqi">文学著作</a></li>
                        <li><a href="products.php?c=bangongyongpin">流行小说</a></li>
                        <li><a href="products.php?c=yundongqicai">散文诗集</a></li>
                  </ul>
                </li>
           
            </ul>
            <br style="clear: left" />
        </div> 
    </div>
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>电子书城</h3>   
                <div class="content"> 
                	<ul class="sidebar_list">
                    	<li class="first"><a href="products.php?c=riyongbaihuo">科教人文</a></li>
                        <li><a href="products.php?c=shumadianzi">电子技术</a></li>
                        <li><a href="products.php?c=shenghuodianqi">文学著作</a></li>
                        <li><a href="products.php?c=bangongyongpin">流行小说</a></li>
                        <li class="last"><a href="products.php?c=yundongqicai">散文诗集</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <img src="images/slider/222.jpg" alt="" />
                    <a href="#"><img src="images/slider/111.jpg" alt="" title="这是我们这里的精品书籍" /></a>
                    <img src="images/slider/333.jpg" alt="" />
                    <img src="images/slider/444.jpg" alt="" title="#htmlcaption" />
                </div>
                <div id="htmlcaption" class="nivo-html-caption">
                    <strong>这</strong>是一个<em>推广</em> 商品.
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
        	<h1>新书上架</h1>
            <?php foreach ($products as $product):?>
                <?php ?>
                <div class="product_box">
    				<h3><?php echo $product['pro_name']?></h3>
                	<a href="#"><img src="images/product/<?php echo $product['pro_pic'] . '.jpg';?>" alt="Shoes 1" /></a>
                    <p><?php echo $product['pro_content']?></p>
                    <p class="product_price">价格 <?php echo $product['pro_score']?></p>
                    <a href="#" class="addtocart" onclick="buy(<?php echo $product['pro_id'] . ',' . $user['user_id'];?>);"></a>
                </div>        	
            <?php endforeach;?>
            <div class="cleaner"></div>       	
        </div> 
        <div class="cleaner"></div>
    </div>   
    <div id="templatemo_footer">
    	<p><a href="#">主页</a> | <a href="#">关于</a> | <a href="#">FAQs</a> | <a href="#">联系我们</a>
		</p>
    	Designed By Siyu Lu.Copyright &copy; 2014. Xian Jiaotong University All rights reserved.
    </div> 
    
</div> 
</div> 

</body>

</html>
