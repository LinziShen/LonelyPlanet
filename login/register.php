<?php  
ini_set("error_reporting","E_ALL & ~E_NOTICE");
    if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册")  
    {  
        $user = $_POST["username"];  
        $psw = $_POST["password"];  
        $psw_confirm = $_POST["confirm"];  
        if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        }  
        else 
        {  
            if($psw == $psw_confirm)  
            {  
                $servername = "localhost";
                $username = "root";
                $password = "root";
 
               // 创建连接
                $conn = mysqli_connect($servername, $username, $password); 
                mysqli_select_db($conn,'ME');  //选择数据库  
                mysqli_query($conn,"set names 'gdk'"); //设定字符集  
                $sql = "SELECT login_username from login where login_username = '$_POST[username]'"; //SQL语句  
                $result = mysqli_query($conn,$sql);    //执行SQL语句  
                $num = mysqli_num_rows($result); //统计执行结果影响的行数  
                if($num)    //如果已经存在该用户  
                {  
                    echo "<script>alert('用户名已存在'); history.go(-1);</script>";  
                }  
                else    //不存在当前注册用户名称  
                {  
                    $sql_insert = "INSERT INTO login ".
                                  "(login_username,login_password) ".
                                  "VALUES ".
                                  "('$user','$psw')"; 
                    $res_insert = mysqli_query($conn,$sql_insert);  
                    //$num_insert = mysql_num_rows($res_insert);  
                    if($res_insert)  
                    {  
                        echo "<script>alert('注册成功！'); history.go(-1);</script>";  
                    }  
                    else 
                    {  
                        echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";  
                    }  
                }  
            }  
            else 
            {  
                echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
            }  
        }  
    }  
    else 
    {  
        echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
    }  
?>