<?php
   session_start();
     $servername = "localhost";
     $username = "root";
     $password = "root";
	 $id=$_SESSION["name"];

	 $conn = mysqli_connect($servername, $username, $password); 
     mysqli_select_db($conn,'ME');  
     mysqli_query($conn,"set names utf8"); 
	 $sql = "SELECT diary_date,diary from diary where username = '$id' order by diary_id desc";  
	 $result=mysqli_query($conn,$sql);
	 $data=[];
	 while($row=mysqli_fetch_assoc($result)){
	     $data[]=$row;
	 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>LONELY PLANET</title>
    <style type="text/css">
        body{
            background-color:black;
            color:#ffffff;
			font-family: 'Times New Roman', Times, serif;
        }
		.div1{
			background-color:rgba(255,255,255,0.2);
			width:60%;
                        height:100%;
                        position:absolute;
                        left:20%;
                        
		}

                     
    </style>
    </head>
<body>
<h1 align="center">MY DIARIES</h1><hr />
<div class="div1">
    <br /><br /><br />
    <table width="60%" border="1" align="center">
	<tr><td>Date</td>
	    <td>Diary</td>
	</tr>
    <?php foreach($data as $value){ ?>
	<tr>
         <td><?php echo $value['diary_date']?></td>
		 <td><?php echo $value['diary']?></td>
    </tr>
	<?php }?>
	</table>
</div>
</body>
</html>
