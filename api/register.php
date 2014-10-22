<?php 
require_once("../include/request.php");
require_once("../include/function.php");

if ($isPost) {
    if (isset($post['mobile']) && isset($post['passwd']) && isset($post['appid']) && isset($post['appkey'])) {
        if (check_oauth($post['appid'],$post['appkey'])) {
            $user = query_mysql('user', array('user_id' => $post['mobile']));
            if (!$user) {
                $res = insert_mysql('user', array('user_id' => $post['mobile'], 'user_passwd' => md5($post['passwd'])));
                if ($res) {
                    $id = mysql_insert_id();
                    $result = array(
                        'status' => 0,
                        'data' => array(
                            'uid' => $id,
                            'mobile' => $post['mobile']
                        )
                    );
                } else {
                    $result = array('status' => 4, 'data' => 'apply fail!');
                }
            } else {
                $result = array('status' => 3, 'data' => 'the given mobile is token');
            }
        } else {
            $result = array('status' => 5, 'data' => 'oauth fail');
        }
    } else {
        $result = array('status' => 2, 'data' => 'paramter is not complete');
    }
} else {
    $result = array('status' => 1, 'data' => 'wrong method!');
}
echo json_encode($result);
?>