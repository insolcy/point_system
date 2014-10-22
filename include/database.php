<?php 
connect_mysql();
mysql_query("set names utf8");
function connect_mysql()
{
	$host="localhost";
	$username="root";
	$password="102435";
	$database="point_system";
	$link=mysql_connect($host,$username,$password)or die("连接失败：".mysql_error());
	mysql_select_db($database)or die('选定数据库失败：'.mysql_error());
	return $link;
}
function query_mysql($table, $data = null , $opt = null) {
    $query_str = '';
    if ($data) {
        $query_str =  " where "; 
        foreach($data as $key => $value) {
            if (is_string($value))
                $query_str .= $key . " = '" . $value . "' and ";
            else
                $query_str .= $key . " = " . $value . " and ";
        }
        $query_str = substr($query_str,0,-5);
    }
    $opt_str = '';
    if ($opt) {
        if (isset($opt['order'])) {
            $opt_str .= " order by " . $opt['order'][0] . " " . $opt['order'][1];
        } 
        if (isset($opt['size'])) {
            $from = isset($opt['from']) ? $opt['from'] : 0;
            $opt_str .= " limit " . $from . " , " . $opt['size'];
        }
    }
    $sql = "select * from " . $table . $query_str . $opt_str;
    $query_result = mysql_query($sql);
    while ($row = mysql_fetch_assoc($query_result)) {
        $result [] = $row; 
    }
    if (count($result) == 1)
        $result = $result[0];
    return $result;
}
function insert_mysql($table, $data) {
    $query_str = "";
    foreach($data as $key => $value) {
            if (is_string($value))
                $query_str .= $key . " = '" . $value . "' , ";
            else
                $query_str .= $key . " = " . $value . " , ";
    }
    $sql = "insert into " . $table . " set " . substr($query_str,0,-3);
    $result = mysql_query($sql);
    return $result;
}

function update_mysql($table, $data, $where) {
    $query_str = "";
    foreach($data as $key => $value) {
        if (is_string($value))
            $query_str .= $key . " = '" . $value . "' , ";
        else
            $query_str .= $key . " = " . $value . " , ";
    }
    $query_str = substr($query_str,0,-3) . ' where ';
    foreach($where as $key => $value) {
        if (is_string($value))
            $query_str .= $key . " = '" . $value . "' and ";
        else
            $query_str .= $key . " = " . $value . " and ";        
    }
    $sql = "update " . $table . " set " . substr($query_str,0,-5);
    $result = mysql_query($sql);
    return $result;    
}

function delete_mysql($table, $data) {
    $query_str = "";
    foreach($data as  $key => $value) {
        if (is_string($value))
            $query_str .= $key . " = '" . $value . "' and ";
        else
            $query_str .= $key . " = " . $value . " and ";        
    }
    $sql = "delete from " . $table . " where " . substr($query_str,0,-5);
    $result = mysql_query($sql);
    return $result;    
}
?>