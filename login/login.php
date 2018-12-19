<?php  
    session_start();
    if(isset($_POST["submit"]) && $_POST["submit"] == "登陆")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        if($user == "" || $psw == "")  
        {  
            echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
        }  
        else 
        {  
            $servername = "localhost";
            $username = "root";
            $password = "root";
 
               // 创建连接
            $conn = mysqli_connect($servername, $username, $password); 
            mysqli_select_db($conn,'ME');  
            mysqli_query($conn,"set names utf8");  
            $sql = "SELECT login_username,login_password from login where login_username = '$_POST[username]' and login_password = '$_POST[password]'";  
            $result = mysqli_query($conn,$sql);  
            $num = mysqli_num_rows($result);  
            if($num)  
            {    
			      $_SESSION["name"]=$user;
                  include('diary.html');
            }  
            else 
            {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
            }  
        }  
    }  
    else 
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
   
?>