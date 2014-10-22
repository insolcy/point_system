<?php 
require('../include/public.php');
if($isPost) {
    $score = check_score($post) * 10;
    insert_mysql('answer', array('user_id' => $user['user_id'], 'score' => $score));
    if($score) {
        update_mysql('user', array('user_score2' => $score + $user['user_score2']), array('user_id' => $user['user_id']));
        $user = fresh_user_session();
    }
}
header("location: ../index.php");
?>