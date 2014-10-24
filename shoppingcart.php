<?php 
   require_once('include/public.php'); 
   $lotterys_t = query_mysql('lottery', array('user_id' => $user['user_id']), array('order' => array('id', 'DESC'), 'size' => 5));
   $shops_t = query_mysql('cart', array('user_id' => $user['user_id'], 'status' => 1), array('order' => array('id', 'DESC'), 'size' => 5));
   $carts_t = query_mysql('cart', array('user_id' => $user['user_id'], 'status' => 0), array('order' => array('id', 'ASC'), 'size' => 5));
   if ($carts_t && !isset($carts_t['0']))
        $carts[] = $carts_t;
   else
        $carts = $carts_t;
   if ($lotterys_t && !isset($lotterys_t['0']))
        $lotterys[] = $lotterys_t;
   else
        $lotterys = $lotterys_t;
   if ($shops_t && !isset($shops_t['0']))
        $shops[] = $shops_t;
   else
        $shops = $shops_t;
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电子书城 - 购物车</title>
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript">
    function removeCart(cid) {
        $.get('lib/removeCart.php', {cid:cid}, function(data){
            if (data) {
                alert('删除成功！');
                location.reload();
            }
        });
    }
    function checkout(uid) {
        $.get('lib/checkout.php', {uid:uid}, function(data) {
            if (data == 0) {
                alert('系统错误，结算失败');
            } else if (data == 1) {
                alert('全部商品结算成功');
                
            } else if (data == 2) {
                alert('结算失败，购物车为空');
            } else {
                alert('部分结算成功，余额不足结算剩余商品');
            }
            location.reload();
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
               
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
    </div> <!-- END of templatemo_menubar -->
    
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
        	
        	<h2>已结算商品</h2>
            <table width="680px" cellspacing="0" cellpadding="5"  style="padding-bottom: 30px;">
                <tr bgcolor="#ddd">
                	<th width="220" align="left">图片 </th> 
                	<th width="180" align="left">描述 </th> 
                  	<th width="100" align="center">商品个数 </th> 
                   	<th width="60" align="right">余额 </th> 
                   	<th width="60" align="right">总计 </th>
                    <th width="90"> </th>   
                </tr>
                  <?php foreach($shops as $shop):?>
                    <?php 
                        $product = query_mysql('product', array('pro_id' => $shop['pro_id']));
                    ?>
  	                 <tr>
                    	<td><img width="60" height="60" src="images/product/<?php echo $product['pro_pic'];?>.jpg" alt="image 1" /></td> 
                    	<td><?php echo $product['pro_name'];?></td> 
                        <td align="center"><?php echo $shop['cart_count'];?></td>
                        <td align="right"><?php echo $product['pro_score'];?></td> 
                        <td align="right" class='stotal'><?php echo $product['pro_score'] * $shop['cart_count'];?></td>
				    </tr>
                  <?php endforeach;?>
            </table>
            <h1>我的购物车</h1>
			<table width="680px" cellspacing="0" cellpadding="5">
               	  <tr bgcolor="#ddd">
                    	<th width="220" align="left">图片 </th> 
                    	<th width="180" align="left">描述 </th> 
                   	  	<th width="100" align="center">商品个数 </th> 
                    	<th width="60" align="right">余额 </th> 
                    	<th width="60" align="right">总计 </th> 
                    	<th width="90"> </th>                        
                  </tr>
                  <?php foreach($carts as $cart):?>
                    <?php 
                        $product = query_mysql('product', array('pro_id' => $cart['pro_id']));
                    ?>
  	                 <tr>
                    	<td><img width="60" height="60" src="images/product/<?php echo $product['pro_pic'];?>.jpg" alt="image 1" /></td> 
                    	<td><?php echo $product['pro_name'];?></td> 
                        <td align="center"><?php echo $cart['cart_count'];?></td>
                        <td align="right"><?php echo $product['pro_score'];?></td> 
                        <td align="right" class='stotal'><?php echo $product['pro_score'] * $cart['cart_count'];?></td>
                        <td align="center"> <a href="#" onclick="removeCart(<?php echo $cart['id'];?>)"><img height="15" src="images/remove_x.gif" alt="remove" /><br />移除</a> </td>
				    </tr>
                  <?php endforeach;?>
			</table>
            <div style="float:right; width: 215px; margin-top: 20px;">                
			<p style="float:left;"><a href="#" onclick="checkout(<?php echo $user['user_id'];?>)">立即结算</a></p>
            <p style="float:left; margin-left:50px;"><a href="index.php">继续购物</a></p>                	
            </div>
			</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
     
    <div id="templatemo_footer">
        <p><a href="#">主页</a> | <a href="#">关于</a> | <a href="#">FAQs</a> | <a href="#">联系我们</a>
        </p>
        Designed By Siyu Lu.Copyright &copy; 2014. Xian Jiaotong University All rights reserved.
    </div> 
    
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>
