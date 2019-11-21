<?php
header('Content-type:text/html;charset=utf-8');
    session_start();
   $servername = "localhost";
   $username = "链接库名";
   $password = "链接库的密码";
   $DBNAME="库名";
   // 创建连接
   $conn = new mysqli($servername, $username, $password,$DBNAME);

   if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}



$sql="select username,title,content from message";
$result=$conn->query($sql);
echo "<table border=1>";
echo"<tr><td>用户名</td><td>标题</td><td>内容</td></tr>";
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "<tr><td>".$row["username"]."</td><td>".$row["title"]."</td><td>".$row["content"]."</td></tr>";
    }
}
else{
    echo "没有数据";
}
echo "</table>";
echo '<br><a href="insertliuyan.php">返回留言</a><br>';
$conn->close();

    
?>