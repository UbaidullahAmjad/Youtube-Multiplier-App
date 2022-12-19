<?php 
$con = mysqli_connect('localhost', 'root', '', 'videomulti');
if(!$con){
    die('Database connection failed.');    
} 
session_start();
$userid=$_SESSION['id'];
$vidID=$_GET['vidID'];
$query=mysqli_query($con,"select name from users where user_id='$userid'");
if($query){
    $row=mysqli_fetch_array($query);
    $name=$row['name'];
}

if(isset($_POST['delete'])){
    //$deletequery=mysqli_query($con,"delete from videos where video_id='.$vidID.' and user_id='.$userid.'");

     $deletequery=mysqli_query($con,"delete  from videos   where video_id='$vidID' and user_id='$userid'");

    if($deletequery){
        
        header('location:examples/User-profile.php');
    }else{
        echo "no";
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
            <div class="jumbotron">
  <h1 class="display-4">Hello, <?php echo $name ?></h1>
  <p class="lead"></p>
  <hr class="my-4">
  <h2>You sure you want to delete this playlist.</h2>
  <p class="lead">
    <form class="mt-5" method="POST">
    <input type="submit" name="delete" value="YES" class="btn btn-primary btn-lg" role="button">
    <a  class="btn btn-primary btn-lg" href="examples/User-profile.php" role="button"> NO</a>
    </form>
  </p>
</div>
            </div>
        </div>
    </div>
</body>
</html>