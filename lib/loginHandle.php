<?php
    require_once('../include/request.php');
    require_once("../include/function.php"); 
    if ($isPost) { //登录界面跳转
        if(isset($post['user']) && isset($post['passwd']) && $post['user'] && $post['passwd']) {
            $user = query_mysql('user', array('user_id' => $post['user']));
            if ($user) {
                if(md5($post['passwd']) == $user['user_passwd']) {
                    set_user_session($user);
                    header("location: ../index.php");
                } else {
                    header("location: ../login.php?tip=登录失败，密码不正确！");
                }
            } else {
                header("location: ../login.php?tip=登录失败，用户不存在！");
            }
        } else {
            header("location: ../login.php?tip=登录失败，参数不完整！");
        }
    } else if ($isGet) {
        header("location: ../login.php?tip=接入失败，请进行登录！");
    } else {
        header("location: ../login.php?tip=登录失败，不合法的请求！");
    }
?>