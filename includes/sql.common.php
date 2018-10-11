<?php
    header('Content-Type:application/json');
    //执行数据库操作
    $conn = mysqli_connect('localhost','root','','kaifanla');
    $sql = 'SET NAMES UTF8';
    mysqli_query($conn,$sql);
?>