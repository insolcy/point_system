<?php
    require_once('../include/request.php');
    require_once("../include/function.php"); 
    if ($isPost) { //��¼������ת
        if(isset($post['user']) && isset($post['passwd']) && $post['user'] && $post['passwd']) {
            $user = query_mysql('user', array('user_id' => $post['user']));
            if ($user) {
                if(md5($post['passwd']) == $user['user_passwd']) {
                    set_user_session($user);
                    header("location: ../index.php");
                } else {
                    header("location: ../login.php?tip=��¼ʧ�ܣ����벻��ȷ��");
                }
            } else {
                header("location: ../login.php?tip=��¼ʧ�ܣ��û������ڣ�");
            }
        } else {
            header("location: ../login.php?tip=��¼ʧ�ܣ�������������");
        }
    } else if ($isGet) {
        header("location: ../login.php?tip=����ʧ�ܣ�����е�¼��");
    } else {
        header("location: ../login.php?tip=��¼ʧ�ܣ����Ϸ�������");
    }
?>