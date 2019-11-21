
<?php
   header('Content-type:text/html;charset=utf-8');//这一段是防止页面乱码
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username'])){
    echo "<script>alert('用户名不能为空！');location.href='login.html';</script>";
    }
    else {
    $username = trim($_POST['username']);
    }
    if (empty($_POST['password'])){
    echo "<script>alert('密码不能为空！');location.href='login.html';</script>";
    }
    else{
    $password = $_POST['password'];
    }
}



   // 创建连接
   $conn = new mysqli('localhost','你的链接名','你的密码','库名');
   if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
   }
   $result=$conn->query("select * from user where username='$username'");
   $rs=$result->fetch_row();
   var_dump($rs);
   if(!empty($rs))//empty检测变量是否为空 
   { 
      echo "<script>alert('用户已存在！');location.href='login.html';</script>";
   }
   else{
      $sql = "INSERT INTO user (username,password) VALUES ('$_POST[username]', '$_POST[password]')";
      $rs = $conn->query($sql);
      if (!$rs) {
         echo "<script>alert('注册失败！');location.href='zhuce.html';</script>";
      } else {
         echo "<script>alert('注册成功！返回登录页面');location.href='zhuce.html';</script>";
      }
   }

   $conn->close();
?>



