<?php 
    require_once '../include/public.php';
    $pid = $get['pid'];
    $uid = $get['uid'];
    $result = query_mysql('cart', array('user_id' => $uid, 'pro_id' => $pid, 'status' => 0));
    if ($result) {
        $res = update_mysql('cart', array('cart_count' => $result['cart_count'] +1), array('user_id' => $uid, 'pro_id' => $pid));
    } else {
        $res = insert_mysql('cart', array('user_id' => $uid, 'pro_id' => intval($pid), 'cart_count' => 1));
    }
    if ($res && !is_null($res))
        echo 1;
    else
        echo 0;
?>