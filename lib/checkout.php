<?php 
    require_once '../include/public.php';
    $result = 0;
    if ($isGet) {
        if (isset($get['uid'])) {
            $uid = $get['uid'];
            $carts_t = query_mysql('cart', array('user_id' => $uid, 'status' => 0), array('order' => array('id', 'ASC'), 'size' => 5));
            if ($carts_t && !isset($carts_t['0']))
                $carts[] = $carts_t;
            else
                $carts = $carts_t;
            if ($carts) {
                $user = query_mysql('user', array('user_id' => $uid));
                $score1 = $user['user_score1'];
                $score2 = $user['user_score2'];
                $result  = 1;
                foreach($carts as $cart) {
                    $product = query_mysql('product', array('pro_id' => $cart['pro_id']));
                    $count = $cart['cart_count'] * $product['pro_score'];
                    if ($score1 + $score2 >= $count) {
                        $res = query_mysql('cart', array('user_id' => $uid, 'status' => 1, 'pro_id' => $cart['pro_id']));
                        if ($res) {
                            update_mysql('cart', array('cart_count' => $res['cart_count'] + $cart['cart_count']), array('id' => $res['id']));
                            delete_mysql('cart', array('id' => $cart['id']));
                        } else
                            update_mysql('cart', array('status' => 1), array('id' => $cart['id']));
                        $score1 = $score2 < $count ? $score2+$score1-$count : $score1;
                        $score2 = $score2 < $count ? 0 : $score2 - $count;
                        update_mysql('user', array('user_score1' => $score1, 'user_score2' => $score2), array('user_id' => $uid));
                    } else {
                        $result = 3;//积分不足
                        continue;
                    }
                }
                fresh_user_session(query_mysql('user', array('user_id' => $uid)));
            } else {
                $result = 2;//购物车空
            }
        }
    }
    echo $result;
?>