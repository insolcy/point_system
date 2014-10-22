<?php 
require_once("../include/request.php");
require_once("../include/function.php");

if ($isPost) {
    if (isset($post['mobile']) && isset($post['passwd'])&& isset($post['score']) && isset($post['appid']) && isset($post['appkey'])) {
        if (check_oauth($post['appid'],$post['appkey'])) {
            $user = query_mysql('user', array('user_id' => $post['mobile']));
            if ($user) {
                if (md5($post['passwd']) == $user['user_passwd']) {
                    $score = intval($post['score']);
                    if($score < 0){
                        $result = array('status' => 6, 'data' => 'score is invalid');
                    } else {
                        update_mysql('user', array('user_score1' => $score + $user['user_score1']), array('user_id' => $user['user_id']));
                        $result = array(
                            'status' => 0,
                            'data' => array(
                                'id' => $user['id'],
                                'mobile' => $user['user_id'],
                                'score_before' => $user['user_score1'],
                                'score_after' => $score + $user['user_score1']
                            )
                        );
                    }
                } else {
                    $result = array('status' => 5, 'data' => 'user passwd is wrong');
                }
            } else {
                $result = array('status' => 4, 'data' => 'query fail or no user!');
            }
        } else {
            $result = array('status' => 3, 'data' => 'oauth fail');
        }
    } else {
        $result = array('status' => 2, 'data' => 'paramter is not complete');
    }
} else {
    $result = array('status' => 1, 'data' => 'wrong method!');
}
echo json_encode($result);
?>