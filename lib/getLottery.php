<?php 
    require_once '../include/public.php';
    $index = $get['index'];
    $user_id = $get['user'];
    $product = query_mysql('product', array('pro_pic' => $index . '.jpg'));
    insert_mysql('lottery', array('user_id' => intval($user_id), 'pro_id' => intval($product['pro_id'])));
    if ($user['user_score2'] >= 10) {
       $score1 =  $user['user_score1'];
       $score2 =  $user['user_score2'] - 10;
    } else {
       $score1 =  $user['user_score1'] + $user['user_score2'] - 10;
       $score2 =  0;
    }
    update_mysql('user', array('user_score1' => $score1, 'user_score2' => $score2), array('user_id' => $user_id));
    $user = fresh_user_session();
    echo $product['pro_name'];
 ?>