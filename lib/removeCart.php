<?php 
    require_once '../include/public.php';
    $result = 0;
    if($isGet) {
        if(isset($get['cid'])) {
            $cid = $get['cid'];
            $cart = query_mysql('cart', array('id' => $cid, 'status' => 0));
            if ($cart) {
                delete_mysql('cart', array('id' => $cid));
                $result = 1;
            }
        }
    }
    echo $result;
?>