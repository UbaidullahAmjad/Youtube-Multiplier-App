
<?php

$con = mysqli_connect('localhost', 'root', '', 'videomulti');
if(!$con){
    die('Database connection failed.');
  
}  
session_start();
$userID=$_SESSION['id'];
$vidID=$_GET['vidID'];


$query=mysqli_query($con,"select video_urls from videos where user_id='$userID' and video_id='$vidID'");
if($query){
  $row=mysqli_fetch_array($query);
  $url=$row['video_urls'];

   $urll=explode("$",$url);
   $length=count($urll);
  
}

if(isset($_POST['update'])){

  $url=$_POST['url'];
  $url2=$_POST['url2'];
  $url3=$_POST['url3'];
  $url4=$_POST['url4'];
  $url5=$_POST['url5'];
  $url6=$_POST['url6'];
  $url7=$_POST['url7'];
  $url8=$_POST['url8'];

  
    $_SESSION['eurl1']=$url;
    $_SESSION['eurl2']=$url2;
    $_SESSION['eurl3']=$url3;
    $_SESSION['eurl4']=$url4;
    $_SESSION['eurl5']=$url5;
    $_SESSION['eurl6']=$url6;
    $_SESSION['eurl7']=$url7;
    $_SESSION['eurl8']=$url8;

    header('location:videoupdate.php?vidID='.$vidID.'');
    

}
?>
      
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--Slider------------------>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="slider/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="Slider/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="Slider/plugins/bootstrap-slider/slider.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Slider/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="Slider/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!--Slider--------------->
  
  
<style>


.qty {
    width: 40px;
    height: 25px;
	
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}

.qtys {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtypluss { width:25px; height:25px;}
input.qtyminuss { width:25px; height:25px;}

</style>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/bootstrap.css">
		<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/_variables.scss">
			<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="src/_bootswatch.scss">
	
		<!-- AutoViewer Scripts -->
	<script src="src/autoViewerIframe.js" type="text/javascript"></script>
    <script src="src/autoViewerIframe1.js" type="text/javascript"></script>
      <script src="src/autoViewerIframe2.js" type="text/javascript"></script>
        <script src="src/autoViewerIframe3.js" type="text/javascript"></script>
          <script src="src/autoViewerIframe4.js" type="text/javascript"></script>
            <script src="src/autoViewerIframe5.js" type="text/javascript"></script>
              <script src="src/autoViewerIframe6.js" type="text/javascript"></script>
                <script src="src/autoViewerIframe7.js" type="text/javascript"></script>
                  <script src="src/autoViewerIframe8.js" type="text/javascript"></script>






                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
                  <script src="js/login.js"></script>
                  <link rel="stylesheet" href="css/loginstyle.css" />
	
</head>


<body onload="hideDiv()">

	<div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
      <?php
        if(!empty($_SESSION['id'])){
        if($_SESSION['id']==true){
          
        $id=$_SESSION['id'];
        $mysqli=mysqli_query($con,"select name,image from users where user_id='$id'");
          $row=mysqli_fetch_array($mysqli);
          $name=$row['name'];
          $img=$row['image'];
          
          $image=substr("$img",3);
          
        ?>
        
    <div class=" row float-right" style="margin-right:0px;">
        <div class="col">
        
          <p style="font-size:20px; color:white; padding: 5px 0px 0px 0px; padding: 8px 0px 0px 0px;"><div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $name ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="examples/User-profile.php">Dashboard</a>
    <a class="dropdown-item" href="examples/user.php">View Profile</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div></p>
         </div>
         <div class="col"> 
           <img src="<?php echo $image ?>" alt="ava.png" style="width:48px; height=48px; border-radius: 100%;">
          </div>
        </div><br>
        <?php
        }
      }
        ?>
			<div class="wrap-contact100">
				
		



<img src="123.png" height="500px" width="100%">



				
				
				
				<nav class="navbar navbar-expand-lg navbar-dark bg-primary">


  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="most_viewed.php">Most Viewed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Latest Mixing</a>
      </li>
     
    </ul>
   <ul class="navbar-nav ml-auto nav-flex-icons">
    <li class="nav-item">
        <!--<a class="nav-link" href="#">Login</a>-->
         <!-- Login Starts Here -->
         <?php
         if(empty($_SESSION['id'])){
         // if(!$_SESSION['id']){

          

?>
            <div id="loginContainer">
                <a href="#" id="loginButton"><span>Login</span><em></em></a>
                <div style="clear:both"></div>
                <div id="loginBox">                
                    <form id="loginForm" method="POST">
                        <fieldset id="body" >
                            <fieldset>
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="login" name="signin" value="Sign in" />
                            <label for="checkbox"><input type="checkbox" id="checkbox" />Remember me</label>
                        </fieldset>
                        <span><a href="#">Forgot your password?</a></span>
                    </form>
                </div>
            </div>
            <?php
          }

?>
            <!-- Login Ends Here -->

      </li>
      
      &nbsp&nbsp
      <li class="nav-item">
        <!--<a class="nav-link" href="#">Sign Up</a>-->
                 <!-- Login Starts Here -->
                 <?php
          if(empty($_SESSION['id'])){

          

?>
            <div id="SignUpContainer">
                <a href="#" id="SignUpButton"><span>Sign Up</span><em></em></a>
                <div style="clear:both"></div>
                <div id="SignUpBox">                
                    <form id="SignUpForm" method="POST">
                        <fieldset id="body">
                            <fieldset>
                                <label for="email">UserID</label>
                                <input type="text" name="userId" id="email" placeholder="@abc" />
                            </fieldset>
                            <fieldset>
                                <label for="email">Name</label>
                                <input type="text" name="name" id="email" />
                            </fieldset>
                               <fieldset>
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" />
                            </fieldset>
                               <fieldset>
                                <label for="email">Phone</label>
                                <input type="text" name="phone" id="email" />
                            </fieldset>
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" />
                            </fieldset>
                            <input type="submit" id="SignUp" name="signup" value="Sign Up" />
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php
          }
            ?>
            <!-- Login Ends Here -->
      </li>
      
 &nbsp 
 &nbsp&nbsp
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-twitter-square fa-stack-2x"></i> </div>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
           <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-facebook-square fa-stack-2x"></i></div>
        </a>
      </li>
	   <li class="nav-item">
        <a class="nav-link waves-effect waves-light">
          <div class="col-md-3 col-sm-4"><i class="fa fa-fw fa-google-plus-square fa-stack-2x"></i></div>
         </a>
      </li>

    </ul>
  </div>
</nav>
	
	





<div class="card border-secondary mb-3" >
  <div class="card-header"><center><h1>YouTube Multipler </h1> </center></div>
 
  <form method="POST">
  <?php
  if($length==2){
   
  ?>
  
  <div class="card-body">

    <center>
    <div class="form-group has-success col-8">
    <label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
    
      <?php
      //echo '<iframe src="https://www.youtube.com/watch?v=ktf4y-sYboE" width="188" height="258" scrolling="no" style="overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"></iframe>';

        //echo '<iframe ... src="'.urldecode($urll[0]).'"></iframe>';
      ?>
      <input type="text" id="input_example" value="<?php echo $urll[0]?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >

    

    
    <div id="container_view_id"></div>
  </div>
  </center>


  <!--slider-->
  <div id="myBar">
  <center>
  <div class="col-8">
  
  <input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
  </div>
  </center>
  </div>
  <!--slider-->
  <br>
  <!--<div class="row" id="myloopsBar">-->

  <div class="row">
  <div class="col-3">   
  <div class="row">
  <div class="col-6">       
  <label class="form-control-label" for="inputSuccess1">Number of Loops</label>

  </div>
  <div class="col-1">
    <input type='button' value='-' class='qtyminus' field='quantity' />
  </div>
  <div class="col-2">
    <input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
  </div>
  <div class="col-1">
    <input type='button' value='+' class='qtyplus' field='quantity' />
  </div>
  </div>
  </div>
  <div class="col-3">
  <div class="row">
  <div class="col-5">
  <label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
  </div>
  <div class="col-1">
    <input type='button' value='-' class='qtyminuss' field='quantitys' />
    </div>
  <div class="col-2">
    <input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
    </div>
  <div class="col-1">
    <input type='button' value='+' class='qtypluss' field='quantitys' />
    </div>
  </div>

  </div>
  <div class="col-3">
   <button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
  </div>
  <div class="col-3">
  <button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
  </div>  
  </div>
  <br>
  <hr>
  <div class="card-body">

    <center>
    <div class="form-group has-success col-8">
    <label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
    <input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
    <div id="container_view_id"></div>
  </div>
  </center>


  <!--slider-->
  <div id="myBar">
  <center>
  <div class="col-8">
  
  <input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
  </div>
  </center>
  </div>
  <!--slider-->
  <br>
  <!--<div class="row" id="myloopsBar">-->

  <div class="row">
  <div class="col-3">   
  <div class="row">
  <div class="col-6">       
  <label class="form-control-label" for="inputSuccess1">Number of Loops</label>

  </div>
  <div class="col-1">
    <input type='button' value='-' class='qtyminus' field='quantity' />
  </div>
  <div class="col-2">
    <input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
  </div>
  <div class="col-1">
    <input type='button' value='+' class='qtyplus' field='quantity' />
  </div>
  </div>
  </div>
  <div class="col-3">
  <div class="row">
  <div class="col-5">
  <label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
  </div>
  <div class="col-1">
    <input type='button' value='-' class='qtyminuss' field='quantitys' />
    </div>
  <div class="col-2">
    <input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
    </div>
  <div class="col-1">
    <input type='button' value='+' class='qtypluss' field='quantitys' />
    </div>
  </div>

  </div>
  <div class="col-3">
   <button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
  </div>
  <div class="col-3">
  <button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
  </div>  
  </div>
  <br>
  <hr>
<?php
  }elseif($length==3){
    ?>
    <div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[0] ?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[2] ?>" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
    <?php
  }elseif($length==4){
    ?>
    <div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[0] ?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[2] ?>" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[3] ?>" required name="url4" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
    <?php
  }elseif($length==5){
    ?>
      <div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[0] ?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[2] ?>" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[3] ?>" required name="url4" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[4] ?>" required name="url5" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
    <?php
  }elseif($length==6){
    ?>
         <div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[0] ?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[2] ?>" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[3] ?>" required name="url4" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[4] ?>" required name="url5" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[5] ?>" required name="url6" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
    <?php
  }elseif($length==7){
    ?>
        <div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[0] ?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[2] ?>" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[3] ?>" required name="url4" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[4] ?>" required name="url5" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[5] ?>" required name="url6" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[6] ?>" required name="url7" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
  <?php
  }elseif($length==8){
    ?>
        <div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[0] ?>" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[1] ?>" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[2] ?>" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>

<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[3] ?>" required name="url4" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[4] ?>" required name="url5" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>


<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[5] ?>" required name="url6" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[6] ?>" required name="url7" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" id="input_example" value="<?php echo $urll[7] ?>" required name="url8" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
<div id="container_view_id"></div>
</div>
</center>


<!--slider-->
<div id="myBar">
<center>
<div class="col-8">

<input type="text"  value="" class="slider form-control" data-slider-min="-100" data-slider-max="100" data-slider-step="1" data-slider-value="[-100,100]" data-slider-orientation="horizontal"data-slider-selection="before" data-slider-tooltip="show" data-slider-id="purple">
</div>
</center>
</div>
<!--slider-->
<br>
<!--<div class="row" id="myloopsBar">-->

<div class="row">
<div class="col-3">   
<div class="row">
<div class="col-6">       
<label class="form-control-label" for="inputSuccess1">Number of Loops</label>

</div>
<div class="col-1">
<input type='button' value='-' class='qtyminus' field='quantity' />
</div>
<div class="col-2">
<input type='text' name='quantity' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtyplus' field='quantity' />
</div>
</div>
</div>
<div class="col-3">
<div class="row">
<div class="col-5">
<label class="form-control-label" for="inputSuccess1">Delay Seconds</label>
</div>
<div class="col-1">
<input type='button' value='-' class='qtyminuss' field='quantitys' />
</div>
<div class="col-2">
<input type='text' name='quantitys' value='0' style=" height: 25px; width: 40px; "  class='form-control' />
</div>
<div class="col-1">
<input type='button' value='+' class='qtypluss' field='quantitys' />
</div>
</div>

</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-warning btn-sm">Preview</button>
</div>
<div class="col-3">
<button type="button" class="btn btn-block btn-success btn-sm">Ready</button>
</div>  
</div>
<br>
<hr>
    <?php
  }
?>
<!-- <script type="text/javascript">
   function hideDiv() {
      document.getElementById("testdiv").style.display = 'none';
      document.getElementById("testdiv1").style.display='none';
      document.getElementById("testdiv2").style.display = 'none';
      document.getElementById("testdiv3").style.display='none';
      document.getElementById("testdiv4").style.display = 'none';
      document.getElementById("testdiv5").style.display='none';
      document.getElementById("testdiv6").style.display = 'none';    
    } 
</script> -->











































<div class="field_wrapper col-12" style="margin-left: 40px;width: 90%;">
  
</div>



<!--</center>-->

  </div>

  <div class="card-header">
    <div class="row">
            <div class="col-3 offset-md-9">
              
                <input type="submit" name="update" class="btn bg-purple btn-lg btn-flat margin" value="Update">
            </div>
      </div>  
    </div>
  </div>

</form>

<?php
 
?>
		

	

				
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>


<!--Slider-->

<!-- jQuery 3 -->
<script src="Slider/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="Slider/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="Slider/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="Slider/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Slider/dist/js/demo.js"></script>
<!-- Bootstrap slider -->
<script src="Slider/plugins/bootstrap-slider/bootstrap-slider.js"></script>
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').slider()
  })
</script>
<!--Slider-->

<script>
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});

</script>


<script>
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtypluss').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminuss").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});

</script>
<script type="text/javascript">
		document.addEventListener("DOMContentLoaded", function(event) { 
  			//Example
  			$autoViewerYoutube.bind(document.getElementById("input_example"));
		});
	</script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube1.bind(document.getElementById("input_example1"));
    });
  </script>
  <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube2.bind(document.getElementById("input_example2"));
    });
  </script>
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube3.bind(document.getElementById("input_example3"));
    });
  </script>

    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube4.bind(document.getElementById("input_example4"));
    });
  </script>
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube5.bind(document.getElementById("input_example5"));
    });
  </script>
    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube6.bind(document.getElementById("input_example6"));
    });
  </script>
   <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { 
        //Example
        $autoViewerYoutube7.bind(document.getElementById("input_example7"));
    });
  </script>


<script type="text/javascript">
  $(".add_button").click(function(){
  $(this).parent('.content').next('.hiddencontent').slideToggle(500).toggleClass("active");
});
</script>

</script>


</body>
</html>
