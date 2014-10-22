<?php
    require_once 'request.php';
    require_once 'function.php';
    $user = check_user();
    $score = $user['user_score1'] + $user['user_score2'];
?>