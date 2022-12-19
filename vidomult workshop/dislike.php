<?php 
$con = mysqli_connect('localhost', 'root', '', 'videomulti');
if(!$con){
    die('Database connection failed.');    
} 
session_start();
if(empty($_SESSION['id'])){
  ('location:index.php');
}else{
//$userid=$_SESSION['id'];
}

$userid=$_GET['userid'];

$vidID=$_GET['vidID'];
$allquery=mysqli_query($con,"select * from likesdislikes where user_id='$userid' and video_id='$vidID'");
if($allquery){
  $count=mysqli_num_rows($allquery);
  if($count>0){
    $update=mysqli_query($con,"update likesdislikes set likes=0 where user_id='$userid' and video_id='$vidID'");
    header('location:videoview.php?vidID='.$vidID.'');
  }else{
    $query=mysqli_query($con,"insert into likesdislikes values (null,$userid,$vidID,0)");
    header('location:videoview.php?vidID='.$vidID.'');
}
  }

         




?>