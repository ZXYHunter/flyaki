<?php
    $name = $_GET[num];
    $time = date('y-m-d H:i:s',time());
    $mysql_server_name = "localhost";
    $mysql_username = 'root';
    $mysql_password = '7b91f1fee2';
    $link = mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
        mysql_select_db('testlaravel',$link);
        mysql_query("set names 'UTF8'");
    $sql = "insert into Reserve(consultant,time) values('".$name."','".$time."')";
    $result = mysql_query($sql);
    header("location: http://www.liuxuego.org/wechatCustomer");
?>