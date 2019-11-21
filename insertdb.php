<?php
session_start();
$user1=$_SESSION['username'];

$servername = "localhost";
$username = "链接库名";
$password = "链接库的密码";
$DBNAME="库名";
// 创建连接
$conn = new mysqli($servername, $username, $password,$DBNAME);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

header('Content-type:text/html;charset=utf-8');
$tit=$_POST["title"];
$con=$_POST["content"];
$sql="insert into message(username,title,content) values('$user1','$tit','$con')";
if($conn->query($sql))
{
    echo "留言成功,2秒后跳转原页面";
}else{
    echo "留言失败,2秒后跳转原页面";
}
header("Refresh:2;url=ckly1.php");

?>