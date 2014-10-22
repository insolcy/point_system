<?php
    require_once("../include/request.php");
    require_once("../include/function.php");
    if ($isPost) {
        if (isset($post['source'])) {
            $oauth = query_mysql('oauth', array('source' => $post['source']));
            if ($oauth) {
                $result = array('status' => 3, 'data' => 'the given source is token');
            } else {
                $res = insert_mysql('oauth', array('source' => $post['source']));
                if ($res) {
                    $id = mysql_insert_id();
                    $key = md5(md5($post['source']) . $id);
                    $result = array(
                        'status' => 0,
                        'data' => array(
                            'appid' => $id,
                            'appkey' => $key,
                            'source' => $post['source']
                        )
                    );
                } else {
                    $result = array('status' => 4, 'data' => 'apply fail!');
                }
            }
        } else {
            $result = array('status' => 2, 'data' => 'paramter source is needed');
        }
    } else {
        $result = array('status' => 1, 'data' => 'wrong method!');
    }
    echo json_encode($result);
?>