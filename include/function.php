<?php
require_once 'database.php';
function set_user_session($user) {
    session_start();
    $_SESSION['user'] = $user;
    
}
function fresh_user_session($user) {
    $user = $_SESSION['user'];
    $_SESSION['user'] = query_mysql('user', array('user_id' => $user['user_id']));
    return $_SESSION['user'];
}
function destroy_user_session() {
    unset($_SESSION['user']);
}

function check_oauth($id, $key) {
    $result = query_mysql('oauth' , array('id' => $id));
    if ($result) {
        if ($key == md5(md5($result['source']) . $id))
        return true;
    }
    return false;
}

function check_user(){
    session_start();
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        header("location: login.php");
    }
}

function check_score($data) {
    $counter = 0;
    foreach($data as $value) {
        if($value && !is_null($value))
            $counter ++;
    }
    return $counter > 0 ? $counter-1 : 0;
}
?>