<?php
   header('Content-type:text/html;charset=utf-8');
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       if (empty($_POST['username'])){
           echo "<script>alert('用户名不能为空！');location.href='login.html';</script>";
       }else {
           $username=$_POST['username'];
       }
       if (empty($_POST['password'])){
           echo "<script>alert('密码不能为空！');location.href='login.html';</script>";
       }else{
           $password=$_POST['password'];
       }
   }
   $mysqli = new mysqli('localhost', '链接库名', '链接库的密码', '库名');
   $result = $mysqli->query("SELECT password FROM user WHERE username = "."'$username'"); //执行sql语句
   $rs=$result->fetch_row();//去遍历循环，就是没找到这个名字
   if (!empty($rs)){  //如果变量不为空
        if ($password != $rs[0]) { //0 就是password
           echo "<script>alert('密码错误！');location.href='login.html';</script>";
        }
       else{
           $expire=1800;
           ini_set('session.gc_maxlifetime', $expire);//保存0.5小时
           if (empty($_COOKIE['PHPSESSID'])) {
               session_set_cookie_params($expire);
               session_start();
           }else{
               session_start();
               setcookie('PHPSESSID', session_id(), time() + $expire);
           }
           
           if(isset($_SESSION['username'])){
               exit("您已经登入了，请不要重新登入！用户名：{$_SESSION['username']}---<a href='logout.php'>注销</a>");
           }else{
               $_SESSION['username']=$_POST['username'];
           }
           $_SESSION['username']=$_POST['username'];
           echo "<script>alert('登录成功！');location.href='insertliuyan.php'</script><br>";
           
       }
   }
   else{
       echo "<script>alert('没有此用户！');location.href='login.html';</script>";
   }
    
?>