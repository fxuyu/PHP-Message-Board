<?php
header('Content-type:text/html;charset=utf-8');
    session_start();
   if(isset($_SESSION['username'])){
    echo "您好！{$_SESSION['username']},欢迎回来！";
           echo "<a href='logout.php'>注销</a><br>";
           echo '<body>
           <div><h1>留言板</h1></div>
           <div>
               <form action="insertdb.php" method="post">
               标题:<input type="text" id="title" name="title"><br>
                   内容:<br><span><textarea name="content" rows="13" cols="80" id="content"></textarea>
                   </span>
                   <input type="submit" name="dosub" id="btn" value="上传留言"><br>
                   <a href="ckly1.php">查看留言</a><br>
               </form>
           </div>
       </body>';

   }
   else{
    echo "<script>alert('没有登陆！');location.href='login.html';</script>";

   }



    
?>