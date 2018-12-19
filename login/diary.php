<?php
     session_start();
     $diary=$_POST["diary"];
	 $date=$_POST["date"];
	 $id=$_SESSION["name"];
     $servername = "localhost";
     $username = "root";
     $password = "root";
 
     $conn = mysqli_connect($servername, $username, $password); 
     mysqli_select_db($conn,'ME');  
     mysqli_query($conn,"set names utf8"); 
     $sql = "INSERT INTO diary ".
                     "(diary,username,diary_date) ".
                     "VALUES ".
                     "('$diary','$id','$date')"; 
     $result = mysqli_query($conn,$sql); 
	 if($result){
				echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=showdiary.php">';
			}
	 else{
			   echo "<script>alert('œµÕ≥∑±√¶£¨«Î…‘∫Ú');history.go(-1);</script>";  
			}
			
?>