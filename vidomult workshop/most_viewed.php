<?php 
$con = mysqli_connect('localhost', 'root', '', 'videomulti');
if(!$con){
    die('Database connection failed.');    
} 
session_start();
if(empty($_SESSION['id'])){
  
}else{
$userid=$_SESSION['id'];

$query=mysqli_query($con,"select * from users where user_id='$userid'");
if($query){
  $row=mysqli_fetch_array($query);
  $birthDate=$row['age'];
 
  $dateOfBirth = $birthDate;
  $today = date("Y-m-d");
  $diff = date_diff(date_create($dateOfBirth), date_create($today));
 // echo 'Age is '.$diff->format('%y');
 $age= $diff->format('%y');
}
}



function time_elapsed_string($datetime, $full = false) {
  $now = new DateTime;
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
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
  
  <!--Slider-->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    .mySlides {display:none;}
  </style>

  
  <style>
  
  .round {
  /* Safari 3-4, iOS 1-3.2, Android 1.6- */
  -webkit-border-radius: 12px; 

  /* Firefox 1-3.6 */
  -moz-border-radius: 12px; 
  
  /* Opera 10.5, IE 9, Safari 5, Chrome, Firefox 4, iOS 4, Android 2.1+ */
  border-radius: 12px; 
}

  
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

  <link rel="stylesheet" href="Plugin/owl.carousel.min.css">
   <link rel="stylesheet" href="Plugin/owl.theme.default.min.css">
	
		<!-- AutoViewer Scripts -->
	<script src="src/autoViewerIframe.js" type="text/javascript"></script>
	
</head>


<body>



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
				
		



<img src="123.png" height="300px" width="100%">



				
				
				
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
        <a class="nav-link" href="LatestMixing.php">Latest Mixing</a>
      </li>
     
    </ul>
   <ul class="navbar-nav ml-auto nav-flex-icons">
    <!-- <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sign Up</a>
      </li> -->
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
	
	<?php

   

    
 ?>
<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">2-Split Video</div><div class="col"></div>
  <div class="col"><a href="viewall.php?split=2" class="btn btn-success">View All</a></div></div></h2></div>




  <!--Slider 2-Split Video-->


<div class="w3-content w3-display-container">
  <div class="row" style="  padding: 15px 15px 15px 15px;">
      
    <?php
    if(!empty($_SESSION['id'])){
      
      if($age>=18){
        ?>
        <div class="owl-carousel owl-theme">
             
        <?php
      
    
      $query=mysqli_query($con,"select * from videos where noofvideos='2' and status='public' order by views desc ");
      if($query){
        while($row=mysqli_fetch_array($query)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID1=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);

          }
      
          ?>
           <div class="item border-secondary">
              <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
                
                <div class="card-body">
                <h4 class="card-title"><?php echo $row['title'] ?></h4>
                <p class="card-text"><?php echo $userrow['username']?></p>
                <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
                <p class="card-text"> <span class="time">
          <?php
          if(empty($_SESSION['id'])){
            ?>
            
            <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
            <?php
          } elseif($_SESSION['id']){
          
            ?>
            <form action="" method="POST">
            
            
            </form>
            
            <?php
            
            
          }
          ?>
       <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
            if($likequery){
              $cound=mysqli_num_rows($likequery);
            }   if($cound>0){
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

              <?php
            }else{
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

              <?php
            }
          }else{
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
            <?php
          }
            ?>
            <?php
            if(empty($_SESSION['id'])){
              ?>
              <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
              <?php
            }elseif($_SESSION['id']){

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
            if($dlikequery){
              $coundlike=mysqli_num_rows($dlikequery);
            } if($coundlike>0){
              ?>
                 <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

              <?php
            }else{
              ?>

              <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
            }
             
            }
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
                 
                
            </div>
              </div>
              
    
           
          <?php
        }
        ?>
            </div>
        <?php
        
      }
    }else{
      ?>
        <div class="owl-carousel owl-theme">
             
        <?php
      
    
      $query=mysqli_query($con,"select * from videos where noofvideos='2' and status='public' order by views desc ");
      if($query){
        while($row=mysqli_fetch_array($query)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID1=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);

          }
      
          ?>
           <div class="item border-secondary">
              <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
                
                <div class="card-body">
                <h4 class="card-title"><?php echo $row['title'] ?></h4>
                <p class="card-text"><?php echo $userrow['username']?></p>
                <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
                <p class="card-text"> <span class="time">
          <?php
          if(empty($_SESSION['id'])){
            ?>
            
            <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
            <?php
          } elseif($_SESSION['id']){
          
            ?>
            <form action="" method="POST">
            
            
            </form>
            
            <?php
            
            
          }
          ?>
       <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
            if($likequery){
              $cound=mysqli_num_rows($likequery);
            }   if($cound>0){
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

              <?php
            }else{
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

              <?php
            }
          }else{
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
            <?php
          }
            ?>
            <?php
            if(empty($_SESSION['id'])){
              ?>
              <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
              <?php
            }elseif($_SESSION['id']){

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
            if($dlikequery){
              $coundlike=mysqli_num_rows($dlikequery);
            } if($coundlike>0){
              ?>
                 <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

              <?php
            }else{
              ?>

              <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
            }
             
            }
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
                 
                
            </div>
              </div>
              
    
           
          <?php
        }
        ?>
            </div>
        <?php
        
      }
    }
    }else{
      ?>
      <div class="owl-carousel owl-theme">
           
      <?php
    
  
    $query=mysqli_query($con,"select * from videos where noofvideos='2' and status='public' and restriction='under 18'  order by views desc ");
    if($query){
      while($row=mysqli_fetch_array($query)){
        $thumbnail=$row['thumbnail'];
        $user_id=$row['user_id'];
        $vidID1=$row['video_id'];
        
        $thumbnail=$row['thumbnail'];
        $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
        if($namequery){
         
          $userrow=mysqli_fetch_array($namequery);

        }
    
        ?>
         <div class="item border-secondary">
            <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
              
              <div class="card-body">
              <h4 class="card-title"><?php echo $row['title'] ?></h4>
              <p class="card-text"><?php echo $userrow['username']?></p>
              <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
              <p class="card-text"> <span class="time">
        <?php
        if(empty($_SESSION['id'])){
          ?>
          
          <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
          <?php
        } elseif($_SESSION['id']){
        
          ?>
          <form action="" method="POST">
          
          
          </form>
          
          <?php
          
          
        }
        ?>
     <?php
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
            if($query5){
              
             $count=mysqli_num_rows($query5);

            }
            if(!empty($_SESSION['id'])){
            
            $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
          if($likequery){
            $cound=mysqli_num_rows($likequery);
          }   if($cound>0){
            ?>
                        <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

            <?php
          }else{
            ?>
                        <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

            <?php
          }
        }else{
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
          <?php
        }
          ?>
          <?php
          if(empty($_SESSION['id'])){
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
            <?php
          }elseif($_SESSION['id']){

            
              $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
          if($dlikequery){
            $coundlike=mysqli_num_rows($dlikequery);
          } if($coundlike>0){
            ?>
               <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

            <?php
          }else{
            ?>

            <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
          }
           
          }
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
            if($query5){
              
             $countd=mysqli_num_rows($query5);

            }
          ?>
          &nbsp<?php echo $countd ?></p>
               
              
          </div>
            </div>
            
  
         
        <?php
      }
      ?>
          </div>
      <?php
      
    }
    }
     
      

      if(isset($_POST['login'])){
        $email=$_POST['email'];
        $pass=$_POST['password'];
        $query=mysqli_query($con,"select * from users where email='$email' and password='$pass'");
        $count=mysqli_num_rows($query);
        if($count>0){
          while($row=mysqli_fetch_array($query)){
            $id=$row['user_id'];
            $name=$row['name'];
            $_SESSION['id']=$id;
        
          }
        }
        else{
          echo '<script>alert("Enter Correct Information")</script>';
        }
      }
    
    
    ?>
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email"required  class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="text" name="password"required  class="form-control">
        </div>
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--    
   <div class="col-3 round">
        <div class="card border-secondary mb-3 round" >
          <img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image">
        <div class="card-body">
        <h4 class="card-title"><?php echo $row['title'] ?></h4>
        <p class="card-text">@Luis</p>
	     <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          </div>
        </div>
      </div> -->

      
<?php
    
?>


   


      









<!--Script for Slider-->
  <script>
    var slideIndex = 1;
  showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

</script>

</div>
     <!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)" style="opacity: 0.3;">&#10095;</button>
</div>


<!--End of Slider 2-Split Video--> 











<!--3-Split Slider-->


<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">3-Split Video</div><div class="col"></div>
  <div class="col"><a href="viewall.php?split=3"  class="btn btn-success">View All</a></div></div></h2></div>

<div class="w3-content w3-display-container">
<div class="row"  style="  padding: 15px 15px 15px 15px;">
 
<?php
 if(!empty($_SESSION['id'])){
  if($age>=18){
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
  }else{
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' and restriction='under 18'  order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
  }
    }else{
      ?>
        <div class="owl-carousel owl-theme">
             
        <?php
      
    
      $query=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' and restriction='under 18'  order by views desc ");
      if($query){
        while($row=mysqli_fetch_array($query)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID1=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);

          }
      
          ?>
           <div class="item border-secondary">
              <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
                
                <div class="card-body">
                <h4 class="card-title"><?php echo $row['title'] ?></h4>
                <p class="card-text"><?php echo $userrow['username']?></p>
                <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
                <p class="card-text"> <span class="time">
          <?php
          if(empty($_SESSION['id'])){
            ?>
            
            <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
            <?php
          } elseif($_SESSION['id']){
          
            ?>
            <form action="" method="POST">
            
            
            </form>
            
            <?php
            
            
          }
          ?>
       <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
            if($likequery){
              $cound=mysqli_num_rows($likequery);
            }   if($cound>0){
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

              <?php
            }else{
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

              <?php
            }
          }else{
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
            <?php
          }
            ?>
            <?php
            if(empty($_SESSION['id'])){
              ?>
              <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
              <?php
            }elseif($_SESSION['id']){

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
            if($dlikequery){
              $coundlike=mysqli_num_rows($dlikequery);
            } if($coundlike>0){
              ?>
                 <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

              <?php
            }else{
              ?>

              <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
            }
             
            }
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
                 
                
            </div>
              </div>
              
    
           
          <?php
        }
        ?>
            </div>
        <?php
        
      }
    }
    
    ?>


<!--Script for Slider-->
  <script>
    var slideIndex = 1;
  showDiv(slideIndex);

function plusDiv(n) {
  showDiv(slideIndex += n);
}

function showDiv(n) {
  var i;
  var x = document.getElementsByClassName("mySlides1");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

</script>

</div>
     <!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDiv(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDiv(1)" style="opacity: 0.3;">&#10095;</button>

</div>


<!--End of 3-Split Slider-->


<!--4-Split Slider-->

<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">4-Split Video</div>
  <div class="col"><a href="viewall.php?split=4"  class="btn btn-success">View All</a></div></div></h2></div>
<div class="w3-content w3-display-container">
<div class="row"  style="  padding: 15px 15px 15px 15px;">
 
<?php
if(!empty($_SESSION['id'])){
  if($age>=18){

    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='4' and status='public' order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
    }else{
      ?>
      <div class="owl-carousel owl-theme">
           
      <?php
    
  
    $query=mysqli_query($con,"select * from videos where noofvideos='4' and status='public' and restriction='under 18'  order by views desc ");
    if($query){
      while($row=mysqli_fetch_array($query)){
        $thumbnail=$row['thumbnail'];
        $user_id=$row['user_id'];
        $vidID1=$row['video_id'];
        
        $thumbnail=$row['thumbnail'];
        $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
        if($namequery){
         
          $userrow=mysqli_fetch_array($namequery);
  
        }
    
        ?>
         <div class="item border-secondary">
            <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
              
              <div class="card-body">
              <h4 class="card-title"><?php echo $row['title'] ?></h4>
              <p class="card-text"><?php echo $userrow['username']?></p>
              <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
              <p class="card-text"> <span class="time">
        <?php
        if(empty($_SESSION['id'])){
          ?>
          
          <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
          <?php
        } elseif($_SESSION['id']){
        
          ?>
          <form action="" method="POST">
          
          
          </form>
          
          <?php
          
          
        }
        ?>
     <?php
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
            if($query5){
              
             $count=mysqli_num_rows($query5);
  
            }
            if(!empty($_SESSION['id'])){
            
            $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
          if($likequery){
            $cound=mysqli_num_rows($likequery);
          }   if($cound>0){
            ?>
                        <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
  
            <?php
          }else{
            ?>
                        <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
  
            <?php
          }
        }else{
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
          <?php
        }
          ?>
          <?php
          if(empty($_SESSION['id'])){
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
            <?php
          }elseif($_SESSION['id']){
  
            
              $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
          if($dlikequery){
            $coundlike=mysqli_num_rows($dlikequery);
          } if($coundlike>0){
            ?>
               <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 
  
            <?php
          }else{
            ?>
  
            <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
  <?php
          }
           
          }
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
            if($query5){
              
             $countd=mysqli_num_rows($query5);
  
            }
          ?>
          &nbsp<?php echo $countd ?></p>
               
              
          </div>
            </div>
            
  
         
        <?php
      }
      ?>
          </div>
      <?php
      
    }
    }
        
}else{
  ?>
  <div class="owl-carousel owl-theme">
       
  <?php


$query=mysqli_query($con,"select * from videos where noofvideos='4' and status='public' and restriction='under 18'  order by views desc ");
if($query){
  while($row=mysqli_fetch_array($query)){
    $thumbnail=$row['thumbnail'];
    $user_id=$row['user_id'];
    $vidID1=$row['video_id'];
    
    $thumbnail=$row['thumbnail'];
    $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
    if($namequery){
     
      $userrow=mysqli_fetch_array($namequery);

    }

    ?>
     <div class="item border-secondary">
        <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
          
          <div class="card-body">
          <h4 class="card-title"><?php echo $row['title'] ?></h4>
          <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          <p class="card-text"> <span class="time">
    <?php
    if(empty($_SESSION['id'])){
      ?>
      
      <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
      <?php
    } elseif($_SESSION['id']){
    
      ?>
      <form action="" method="POST">
      
      
      </form>
      
      <?php
      
      
    }
    ?>
 <?php
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
        if($query5){
          
         $count=mysqli_num_rows($query5);

        }
        if(!empty($_SESSION['id'])){
        
        $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
      if($likequery){
        $cound=mysqli_num_rows($likequery);
      }   if($cound>0){
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }else{
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }
    }else{
      ?>
      <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
      <?php
    }
      ?>
      <?php
      if(empty($_SESSION['id'])){
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
        <?php
      }elseif($_SESSION['id']){

        
          $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
      if($dlikequery){
        $coundlike=mysqli_num_rows($dlikequery);
      } if($coundlike>0){
        ?>
           <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

        <?php
      }else{
        ?>

        <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
      }
       
      }
      $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
        if($query5){
          
         $countd=mysqli_num_rows($query5);

        }
      ?>
      &nbsp<?php echo $countd ?></p>
           
          
      </div>
        </div>
        

     
    <?php
  }
  ?>
      </div>
  <?php
  
}
}
    
    ?>


<script>
var slideIndex = 1;
showDiv1(slideIndex);

function plusDiv1(n) {
  showDiv1(slideIndex += n);
}

function showDiv1(n) {
  var i;
  var x = document.getElementsByClassName("mySlides2");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</div>

 <!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDiv1(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDiv1(1)" style="opacity: 0.3;">&#10095;</button>


</div>

<!--End of 4 Split Slider-->





<!--5 split slider-->

<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">5-Split Video</div>
  <div class="col"><a href="viewall.php?split=5"  class="btn btn-success">View All</a></div></div></h2></div>

<div class="w3-content w3-display-container">
<div class="row"  style="  padding: 15px 15px 15px 15px;">
<?php
if(!empty($_SESSION['id'])){
  if($age>=18){
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
  }else{
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' and restriction='under 18'  order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
  
}
}else{
  ?>
  <div class="owl-carousel owl-theme">
       
  <?php


$query=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' and restriction='under 18'  order by views desc ");
if($query){
  while($row=mysqli_fetch_array($query)){
    $thumbnail=$row['thumbnail'];
    $user_id=$row['user_id'];
    $vidID1=$row['video_id'];
    
    $thumbnail=$row['thumbnail'];
    $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
    if($namequery){
     
      $userrow=mysqli_fetch_array($namequery);

    }

    ?>
     <div class="item border-secondary">
        <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
          
          <div class="card-body">
          <h4 class="card-title"><?php echo $row['title'] ?></h4>
          <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          <p class="card-text"> <span class="time">
    <?php
    if(empty($_SESSION['id'])){
      ?>
      
      <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
      <?php
    } elseif($_SESSION['id']){
    
      ?>
      <form action="" method="POST">
      
      
      </form>
      
      <?php
      
      
    }
    ?>
 <?php
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
        if($query5){
          
         $count=mysqli_num_rows($query5);

        }
        if(!empty($_SESSION['id'])){
        
        $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
      if($likequery){
        $cound=mysqli_num_rows($likequery);
      }   if($cound>0){
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }else{
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }
    }else{
      ?>
      <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
      <?php
    }
      ?>
      <?php
      if(empty($_SESSION['id'])){
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
        <?php
      }elseif($_SESSION['id']){

        
          $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
      if($dlikequery){
        $coundlike=mysqli_num_rows($dlikequery);
      } if($coundlike>0){
        ?>
           <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

        <?php
      }else{
        ?>

        <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
      }
       
      }
      $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
        if($query5){
          
         $countd=mysqli_num_rows($query5);

        }
      ?>
      &nbsp<?php echo $countd ?></p>
           
          
      </div>
        </div>
        

     
    <?php
  }
  ?>
      </div>
  <?php
  
}
    
}
    
    ?>


<script>
var slideIndex = 1;
showDiv2(slideIndex);

function plusDiv2(n) {
  showDiv2(slideIndex += n);
}

function showDiv2(n) {
  var i;
  var x = document.getElementsByClassName("mySlides3");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
</div>
 <!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDiv2(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDiv2(1)" style="opacity: 0.3;">&#10095;</button>




</div>

<!--End of 5 split sider-->



<!--6 split slider-->
<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">6-Split Video</div>
  <div class="col"><a href="viewall.php?split=6"  class="btn btn-success">View All</a></div></div></h2></div><div class="w3-content w3-display-container">
<div class="row"  style="  padding: 15px 15px 15px 15px;">
<?php
if(!empty($_SESSION['id'])){
  if($age>=18){
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='6' and status='public' order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
        
  }else{
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='6' and status='public' and restriction='under 18'  order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
  
}
}else{
  ?>
  <div class="owl-carousel owl-theme">
       
  <?php


$query=mysqli_query($con,"select * from videos where noofvideos='6' and status='public' and restriction='under 18'  order by views desc ");
if($query){
  while($row=mysqli_fetch_array($query)){
    $thumbnail=$row['thumbnail'];
    $user_id=$row['user_id'];
    $vidID1=$row['video_id'];
    
    $thumbnail=$row['thumbnail'];
    $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
    if($namequery){
     
      $userrow=mysqli_fetch_array($namequery);

    }

    ?>
     <div class="item border-secondary">
        <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
          
          <div class="card-body">
          <h4 class="card-title"><?php echo $row['title'] ?></h4>
          <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          <p class="card-text"> <span class="time">
    <?php
    if(empty($_SESSION['id'])){
      ?>
      
      <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
      <?php
    } elseif($_SESSION['id']){
    
      ?>
      <form action="" method="POST">
      
      
      </form>
      
      <?php
      
      
    }
    ?>
 <?php
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
        if($query5){
          
         $count=mysqli_num_rows($query5);

        }
        if(!empty($_SESSION['id'])){
        
        $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
      if($likequery){
        $cound=mysqli_num_rows($likequery);
      }   if($cound>0){
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }else{
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }
    }else{
      ?>
      <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
      <?php
    }
      ?>
      <?php
      if(empty($_SESSION['id'])){
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
        <?php
      }elseif($_SESSION['id']){

        
          $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
      if($dlikequery){
        $coundlike=mysqli_num_rows($dlikequery);
      } if($coundlike>0){
        ?>
           <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

        <?php
      }else{
        ?>

        <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
      }
       
      }
      $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
        if($query5){
          
         $countd=mysqli_num_rows($query5);

        }
      ?>
      &nbsp<?php echo $countd ?></p>
           
          
      </div>
        </div>
        

     
    <?php
  }
  ?>
      </div>
  <?php
  
}

}
    
    
    ?>

<script>
var slideIndex = 1;
showDiv3(slideIndex);

function plusDiv3(n) {
  showDiv3(slideIndex += n);
}

function showDiv3(n) {
  var i;
  var x = document.getElementsByClassName("mySlides4");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</div>

<!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDiv3(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDiv3(1)" style="opacity: 0.3;">&#10095;</button>


</div>

<!--End of 6 split slider-->





<!--7 Split Slider-->
<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">7-Split Video</div>
  <div class="col"><a href="viewall.php?split=7"  class="btn btn-success">View All</a></div></div></h2></div>
<div class="w3-content w3-display-container">
<div class="row"  style="  padding: 15px 15px 15px 15px;">
<?php
    if(!empty($_SESSION['id'])){
      if($age>=18){

        ?>
        <div class="owl-carousel owl-theme">
             
        <?php
      
    
      $query=mysqli_query($con,"select * from videos where noofvideos='7' and status='public'  order by views desc ");
      if($query){
        while($row=mysqli_fetch_array($query)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID1=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);
    
          }
      
          ?>
           <div class="item border-secondary">
              <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
                
                <div class="card-body">
                <h4 class="card-title"><?php echo $row['title'] ?></h4>
                <p class="card-text"><?php echo $userrow['username']?></p>
                <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
                <p class="card-text"> <span class="time">
          <?php
          if(empty($_SESSION['id'])){
            ?>
            
            <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
            <?php
          } elseif($_SESSION['id']){
          
            ?>
            <form action="" method="POST">
            
            
            </form>
            
            <?php
            
            
          }
          ?>
       <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);
    
              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
            if($likequery){
              $cound=mysqli_num_rows($likequery);
            }   if($cound>0){
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
    
              <?php
            }else{
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
    
              <?php
            }
          }else{
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
            <?php
          }
            ?>
            <?php
            if(empty($_SESSION['id'])){
              ?>
              <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
              <?php
            }elseif($_SESSION['id']){
    
              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
            if($dlikequery){
              $coundlike=mysqli_num_rows($dlikequery);
            } if($coundlike>0){
              ?>
                 <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 
    
              <?php
            }else{
              ?>
    
              <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
    <?php
            }
             
            }
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);
    
              }
            ?>
            &nbsp<?php echo $countd ?></p>
                 
                
            </div>
              </div>
              
    
           
          <?php
        }
        ?>
            </div>
        <?php
        
      }
    
      }else{
  
        ?>
        <div class="owl-carousel owl-theme">
             
        <?php
      
    
      $query=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' and restriction='under 18'  order by views desc ");
      if($query){
        while($row=mysqli_fetch_array($query)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID1=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);
    
          }
      
          ?>
           <div class="item border-secondary">
              <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
                
                <div class="card-body">
                <h4 class="card-title"><?php echo $row['title'] ?></h4>
                <p class="card-text"><?php echo $userrow['username']?></p>
                <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
                <p class="card-text"> <span class="time">
          <?php
          if(empty($_SESSION['id'])){
            ?>
            
            <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
            <?php
          } elseif($_SESSION['id']){
          
            ?>
            <form action="" method="POST">
            
            
            </form>
            
            <?php
            
            
          }
          ?>
       <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);
    
              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
            if($likequery){
              $cound=mysqli_num_rows($likequery);
            }   if($cound>0){
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
    
              <?php
            }else{
              ?>
                          <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
    
              <?php
            }
          }else{
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
            <?php
          }
            ?>
            <?php
            if(empty($_SESSION['id'])){
              ?>
              <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
              <?php
            }elseif($_SESSION['id']){
    
              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
            if($dlikequery){
              $coundlike=mysqli_num_rows($dlikequery);
            } if($coundlike>0){
              ?>
                 <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 
    
              <?php
            }else{
              ?>
    
              <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
    <?php
            }
             
            }
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);
    
              }
            ?>
            &nbsp<?php echo $countd ?></p>
                 
                
            </div>
              </div>
              
    
           
          <?php
        }
        ?>
            </div>
        <?php
        
      }
  }
    }else{
  
      ?>
      <div class="owl-carousel owl-theme">
           
      <?php
    
  
    $query=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' and restriction='under 18'  order by views desc ");
    if($query){
      while($row=mysqli_fetch_array($query)){
        $thumbnail=$row['thumbnail'];
        $user_id=$row['user_id'];
        $vidID1=$row['video_id'];
        
        $thumbnail=$row['thumbnail'];
        $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
        if($namequery){
         
          $userrow=mysqli_fetch_array($namequery);
  
        }
    
        ?>
         <div class="item border-secondary">
            <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
              
              <div class="card-body">
              <h4 class="card-title"><?php echo $row['title'] ?></h4>
              <p class="card-text"><?php echo $userrow['username']?></p>
              <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
              <p class="card-text"> <span class="time">
        <?php
        if(empty($_SESSION['id'])){
          ?>
          
          <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
          <?php
        } elseif($_SESSION['id']){
        
          ?>
          <form action="" method="POST">
          
          
          </form>
          
          <?php
          
          
        }
        ?>
     <?php
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
            if($query5){
              
             $count=mysqli_num_rows($query5);
  
            }
            if(!empty($_SESSION['id'])){
            
            $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
          if($likequery){
            $cound=mysqli_num_rows($likequery);
          }   if($cound>0){
            ?>
                        <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
  
            <?php
          }else{
            ?>
                        <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 
  
            <?php
          }
        }else{
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
          <?php
        }
          ?>
          <?php
          if(empty($_SESSION['id'])){
            ?>
            <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
            <?php
          }elseif($_SESSION['id']){
  
            
              $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
          if($dlikequery){
            $coundlike=mysqli_num_rows($dlikequery);
          } if($coundlike>0){
            ?>
               <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 
  
            <?php
          }else{
            ?>
  
            <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
  <?php
          }
           
          }
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
            if($query5){
              
             $countd=mysqli_num_rows($query5);
  
            }
          ?>
          &nbsp<?php echo $countd ?></p>
               
              
          </div>
            </div>
            
  
         
        <?php
      }
      ?>
          </div>
      <?php
      
    }
}
    
    ?>

<script>
var slideIndex = 1;
showDiv4(slideIndex);

function plusDiv4(n) {
  showDiv4(slideIndex += n);
}

function showDiv4(n) {
  var i;
  var x = document.getElementsByClassName("mySlides5");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</div>

<!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDiv4(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDiv4(1)" style="opacity: 0.3;">&#10095;</button>


</div>


<!--End of 7 slider-->




<!--8 slider-->

<div class="card border-primary">
  <div class="card-header"><h2><div class="row"><div class="col-9">8-Split Video</div>
  <div class="col"><a href="viewall.php?split=8"  class="btn btn-success">View All</a></div></div></h2></div>
<div class="w3-content w3-display-container">
<div class="row"  style="  padding: 15px 15px 15px 15px;">
<?php
if(!empty($_SESSION['id'])){
  if($age>=18){

    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
    
  }else{
  
    ?>
    <div class="owl-carousel owl-theme">
         
    <?php
  

  $query=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' and restriction='under 18'  order by views desc ");
  if($query){
    while($row=mysqli_fetch_array($query)){
      $thumbnail=$row['thumbnail'];
      $user_id=$row['user_id'];
      $vidID1=$row['video_id'];
      
      $thumbnail=$row['thumbnail'];
      $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
      if($namequery){
       
        $userrow=mysqli_fetch_array($namequery);

      }
  
      ?>
       <div class="item border-secondary">
          <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
            
            <div class="card-body">
            <h4 class="card-title"><?php echo $row['title'] ?></h4>
            <p class="card-text"><?php echo $userrow['username']?></p>
            <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
            <p class="card-text"> <span class="time">
      <?php
      if(empty($_SESSION['id'])){
        ?>
        
        <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
        <?php
      } elseif($_SESSION['id']){
      
        ?>
        <form action="" method="POST">
        
        
        </form>
        
        <?php
        
        
      }
      ?>
   <?php
          $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
          if($query5){
            
           $count=mysqli_num_rows($query5);

          }
          if(!empty($_SESSION['id'])){
          
          $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
        if($likequery){
          $cound=mysqli_num_rows($likequery);
        }   if($cound>0){
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }else{
          ?>
                      <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

          <?php
        }
      }else{
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
        <?php
      }
        ?>
        <?php
        if(empty($_SESSION['id'])){
          ?>
          <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
          <?php
        }elseif($_SESSION['id']){

          
            $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
        if($dlikequery){
          $coundlike=mysqli_num_rows($dlikequery);
        } if($coundlike>0){
          ?>
             <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

          <?php
        }else{
          ?>

          <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
        }
         
        }
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
          if($query5){
            
           $countd=mysqli_num_rows($query5);

          }
        ?>
        &nbsp<?php echo $countd ?></p>
             
            
        </div>
          </div>
          

       
      <?php
    }
    ?>
        </div>
    <?php
    
  }
}
}else{
  
  ?>
  <div class="owl-carousel owl-theme">
       
  <?php


$query=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' and restriction='under 18'  order by views desc ");
if($query){
  while($row=mysqli_fetch_array($query)){
    $thumbnail=$row['thumbnail'];
    $user_id=$row['user_id'];
    $vidID1=$row['video_id'];
    
    $thumbnail=$row['thumbnail'];
    $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
    if($namequery){
     
      $userrow=mysqli_fetch_array($namequery);

    }

    ?>
     <div class="item border-secondary">
        <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>"></a>
          
          <div class="card-body">
          <h4 class="card-title"><?php echo $row['title'] ?></h4>
          <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']);?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          <p class="card-text"> <span class="time">
    <?php
    if(empty($_SESSION['id'])){
      ?>
      
      <!-- <input type="submit" name="like" value="Like" data-toggle="modal" data-target="#exampleModal"> -->
      <?php
    } elseif($_SESSION['id']){
    
      ?>
      <form action="" method="POST">
      
      
      </form>
      
      <?php
      
      
    }
    ?>
 <?php
        $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=1");
        if($query5){
          
         $count=mysqli_num_rows($query5);

        }
        if(!empty($_SESSION['id'])){
        
        $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=1");
      if($likequery){
        $cound=mysqli_num_rows($likequery);
      }   if($cound>0){
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:blue; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }else{
        ?>
                    <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i> &nbsp<?php echo $count ?></span> | 

        <?php
      }
    }else{
      ?>
      <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-up" style="font-size:25px; color:black; " aria-hidden="true"></i></a> &nbsp<?php echo $count ?></span> | 
      <?php
    }
      ?>
      <?php
      if(empty($_SESSION['id'])){
        ?>
        <a data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i></a>
        <?php
      }elseif($_SESSION['id']){

        
          $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID1' and user_id='$userid' and likes=0");
      if($dlikequery){
        $coundlike=mysqli_num_rows($dlikequery);
      } if($coundlike>0){
        ?>
           <i class="fa fa-thumbs-down" style="font-size:25px; color:blue; " aria-hidden="true"></i> </span> 

        <?php
      }else{
        ?>

        <i class="fa fa-thumbs-down" style="font-size:25px; color:black; " aria-hidden="true"></i> </span> 
<?php
      }
       
      }
      $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID1' and likes=0");
        if($query5){
          
         $countd=mysqli_num_rows($query5);

        }
      ?>
      &nbsp<?php echo $countd ?></p>
           
          
      </div>
        </div>
        

     
    <?php
  }
  ?>
      </div>
  <?php
  
}

}
    
    ?>

<script>
var slideIndex = 1;
showDiv5(slideIndex);

function plusDiv5(n) {
  showDiv5(slideIndex += n);
}

function showDiv5(n) {
  var i;
  var x = document.getElementsByClassName("mySlides6");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

</div>

<!--buttons-->
       <button class="w3-button w3-black w3-display-left" onclick="plusDiv5(-1)" style="opacity: 0.3;">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDiv5(1)" style="opacity: 0.3;">&#10095;</button>
</div>

</div>










  <div class="card-header">
  

  
  
  </div>
</div>



		

	

				
			</div>
		</div>
	</div>



 

<!--===============================================================================================-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="Plugin/owl.carousel.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
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
<
<!-- Bootstrap 3.3.7 -->

<!-- FastClick -->
<script src="Slider/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="Slider/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Slider/dist/js/demo.js"></script>
<!-- Bootstrap slider -->
<script src="Slider/plugins/bootstrap-slider/bootstrap-slider.js"></script>


</body>
</html>



