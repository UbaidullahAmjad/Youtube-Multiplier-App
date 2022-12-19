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

$split=$_GET['split'];

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
div.pagination {
	padding: 4px;
	margin: 4px;
}

div.pagination a {
	padding: 5px 11px 5px 11px;
	margin: 2px;
	border: 1px solid #ddd;
	
	text-decoration: none; /* no underline */
	color: #154a9a;
}
div.pagination a:hover, div.pagination a:active {
	border: 1px solid #154a9a;

	color: #000;
}
div.pagination span.current {
	padding: 5px 10px 5px 10px;
	margin: 2px;
		border: 1px solid #ddd;
		
		font-weight: bold;
		background-color: #154a9a;
		color: #FFF;
	}
div.pagination span.disabled {
	padding: 2px 5px 2px 5px;
	margin: 2px;
	border: 1px solid #EEE;

	color: #DDD;
}
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

   if($split==2){
       ?>
       <div class="row">
      <div class="col-3 offset-md-4">
        <h1>2 Split MashUps</h1>
      </div>
</div>
<div class="row">
       <?php
       if(!empty($_SESSION['id'])){
         if($age>=18){
          $result_per_page=10 ;
          $query=mysqli_query($con,"select * from videos where noofvideos='2' and status='public' order by views desc");
       
          $number_of_result=mysqli_num_rows($query);
            $number_of_pages=ceil($number_of_result/$result_per_page);
       
            if(!isset($_GET['page'])){
              $page=1;
          }else{
              $page=$_GET['page'];
          }
        
          $this_page_first_result=($page-1)*$result_per_page;
          $result=mysqli_query($con,"select * from videos where noofvideos='2' and status='public' order by views desc limit ".$this_page_first_result.','.$result_per_page);
          if($result){
           while($row=mysqli_fetch_array($result)){
           $thumbnail=$row['thumbnail'];
           $user_id=$row['user_id'];
           $vidID1=$row['video_id'];
           
           $thumbnail=$row['thumbnail'];
           $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
           if($namequery){
            
             $userrow=mysqli_fetch_array($namequery);
   
           }
              ?>
      
   
   
   
   <div class="col-3 round">
           <div class="card border-secondary mb-3 round" >
           <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
           <div class="card-body">
           <h4 class="card-title"><?php echo $row['title'] ?></h4>
           <h4 class="card-title"><?php //echo $vidID3 ?></h4>
           <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
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
         </div>
             <?php
          }
      } $prev = $page - 1;
      $next = $page + 1; 
      $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
   $lpm1 = $lastpage - 1;
   $adjacents = 8;
   $targetpage = "/";
   $pagestring = "?page=";
   $pagination = "";
   if($lastpage > 1)
   {	
   $pagination .= "<div class=\"pagination\">";
   
   //previous button
   if ($page > 1){ 
    $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
   }else{
    $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
   }
   //pages	
   if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
   {	
    for ($counter = 1; $counter <= $lastpage; $counter++)
    {
      if ($counter == $page)
        $pagination.= "<span class=\"current\">$counter</span>";
      else
        $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
    }
   }
   elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
   {
    //close to beginning; only hide later pages
    if($page < 1 + ($adjacents * 2))		
    {
      for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
      }
      $pagination .= "<span class=\"elipses\">...</span>";
      $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
      $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
    
    }
    //in middle; hide some front and some back
    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    {
      $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
      $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
      $pagination .= "<span class=\"elipses\">...</span>";
      for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current active\">$counter</span>";
        else
          $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
      }
      $pagination .= "<span class=\"elipses\">...</span>";
      $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
      $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
    }
    //close to end; only hide early pages
    else
    {
      $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
      $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
      $pagination .= "<span class=\"elipses\">...</span>";
      for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
      }
    }
   }
   
   //next button
   if ($page < $counter - 1) 
    $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
   else
    $pagination.= "<span class=\"disabled\">next &raquo;</span>";
   $pagination.= "</div>\n";		
   }
   ?><div class="text-center"><?php echo $pagination; ?></div>
   <?php
         }else{
          $result_per_page=10 ;
          $query=mysqli_query($con,"select * from videos where noofvideos='2' and status='public'  and restriction='under 18'  order by views desc");
       
          $number_of_result=mysqli_num_rows($query);
            $number_of_pages=ceil($number_of_result/$result_per_page);
       
            if(!isset($_GET['page'])){
              $page=1;
          }else{
              $page=$_GET['page'];
          }
        
          $this_page_first_result=($page-1)*$result_per_page;
          $result=mysqli_query($con,"select * from videos where noofvideos='2' and status='public'  and restriction='under 18'  order by views desc limit ".$this_page_first_result.','.$result_per_page);
          if($result){
           while($row=mysqli_fetch_array($result)){
           $thumbnail=$row['thumbnail'];
           $user_id=$row['user_id'];
           $vidID1=$row['video_id'];
           
           $thumbnail=$row['thumbnail'];
           $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
           if($namequery){
            
             $userrow=mysqli_fetch_array($namequery);
   
           }
              ?>
      
   
   
   
   <div class="col-3 round">
           <div class="card border-secondary mb-3 round" >
           <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
           <div class="card-body">
           <h4 class="card-title"><?php echo $row['title'] ?></h4>
           <h4 class="card-title"><?php //echo $vidID3 ?></h4>
           <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
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
         </div>
             <?php
          }
      } $prev = $page - 1;
      $next = $page + 1; 
      $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
   $lpm1 = $lastpage - 1;
   $adjacents = 8;
   $targetpage = "/";
   $pagestring = "?page=";
   $pagination = "";
   if($lastpage > 1)
   {	
   $pagination .= "<div class=\"pagination\">";
   
   //previous button
   if ($page > 1){ 
    $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
   }else{
    $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
   }
   //pages	
   if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
   {	
    for ($counter = 1; $counter <= $lastpage; $counter++)
    {
      if ($counter == $page)
        $pagination.= "<span class=\"current\">$counter</span>";
      else
        $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
    }
   }
   elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
   {
    //close to beginning; only hide later pages
    if($page < 1 + ($adjacents * 2))		
    {
      for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
      }
      $pagination .= "<span class=\"elipses\">...</span>";
      $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
      $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
    
    }
    //in middle; hide some front and some back
    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    {
      $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
      $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
      $pagination .= "<span class=\"elipses\">...</span>";
      for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current active\">$counter</span>";
        else
          $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
      }
      $pagination .= "<span class=\"elipses\">...</span>";
      $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
      $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
    }
    //close to end; only hide early pages
    else
    {
      $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
      $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
      $pagination .= "<span class=\"elipses\">...</span>";
      for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
      {
        if ($counter == $page)
          $pagination.= "<span class=\"current\">$counter</span>";
        else
          $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
      }
    }
   }
   
   //next button
   if ($page < $counter - 1) 
    $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
   else
    $pagination.= "<span class=\"disabled\">next &raquo;</span>";
   $pagination.= "</div>\n";		
   }
   ?><div class="text-center"><?php echo $pagination; ?></div>
   <?php
         }
       }else{
        $result_per_page=10 ;
        $query=mysqli_query($con,"select * from videos where noofvideos='2' and status='public' and restriction='under 18'  order by views desc");
     
        $number_of_result=mysqli_num_rows($query);
          $number_of_pages=ceil($number_of_result/$result_per_page);
     
          if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
      
        $this_page_first_result=($page-1)*$result_per_page;
        $result=mysqli_query($con,"select * from videos where noofvideos='2' and status='public'  and restriction='under 18'  order by views desc limit ".$this_page_first_result.','.$result_per_page);
        if($result){
         while($row=mysqli_fetch_array($result)){
         $thumbnail=$row['thumbnail'];
         $user_id=$row['user_id'];
         $vidID1=$row['video_id'];
         
         $thumbnail=$row['thumbnail'];
         $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
         if($namequery){
          
           $userrow=mysqli_fetch_array($namequery);
 
         }
            ?>
    
 
 
 
 <div class="col-3 round">
         <div class="card border-secondary mb-3 round" >
         <a href="videoview.php?vidID=<?php echo $vidID1 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
         <div class="card-body">
         <h4 class="card-title"><?php echo $row['title'] ?></h4>
         <h4 class="card-title"><?php //echo $vidID3 ?></h4>
         <p class="card-text"><?php echo $userrow['username']?></p>
        <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
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
       </div>
           <?php
        }
    } $prev = $page - 1;
    $next = $page + 1; 
    $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
 $lpm1 = $lastpage - 1;
 $adjacents = 8;
 $targetpage = "/";
 $pagestring = "?page=";
 $pagination = "";
 if($lastpage > 1)
 {	
 $pagination .= "<div class=\"pagination\">";
 
 //previous button
 if ($page > 1){ 
  $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
 }else{
  $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
 }
 //pages	
 if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
 {	
  for ($counter = 1; $counter <= $lastpage; $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
 }
 elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
 {
  //close to beginning; only hide later pages
  if($page < 1 + ($adjacents * 2))		
  {
    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    {
      if ($counter == $page)
        $pagination.= "<span class=\"current\">$counter</span>";
      else
        $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
    }
    $pagination .= "<span class=\"elipses\">...</span>";
    $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
    $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
  
  }
  //in middle; hide some front and some back
  elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
  {
    $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
    $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
    $pagination .= "<span class=\"elipses\">...</span>";
    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    {
      if ($counter == $page)
        $pagination.= "<span class=\"current active\">$counter</span>";
      else
        $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
    }
    $pagination .= "<span class=\"elipses\">...</span>";
    $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
    $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
  }
  //close to end; only hide early pages
  else
  {
    $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
    $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
    $pagination .= "<span class=\"elipses\">...</span>";
    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    {
      if ($counter == $page)
        $pagination.= "<span class=\"current\">$counter</span>";
      else
        $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
    }
  }
 }
 
 //next button
 if ($page < $counter - 1) 
  $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
 else
  $pagination.= "<span class=\"disabled\">next &raquo;</span>";
 $pagination.= "</div>\n";		
 }
 ?><div class="text-center"><?php echo $pagination; ?></div>
 <?php
       }
      



}
elseif($split==3){
    ?>
    <div class="row">
   <div class="col-3 offset-md-4">
     <h1>3 Split MashUps</h1>
   </div>
</div>
<div class="row">
    <?php
    if(!empty($_SESSION['id'])){
      if($age>=18){
        
    
    $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;

    $result=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    if($result){
     while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID3=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID3 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID3' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID3' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID3' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID3' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
} $prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
      }else{
        $result_per_page=10;
      $query=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' and restriction='under 18'  order by views desc");
   
      $number_of_result=mysqli_num_rows($query);
        $number_of_pages=ceil($number_of_result/$result_per_page);
   
        if(!isset($_GET['page'])){
          $page=1;
      }else{
          $page=$_GET['page'];
      }
    
      $this_page_first_result=($page-1)*$result_per_page;
  
      $result=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' and restriction='under 18'  order by views desc limit ".$this_page_first_result.','.$result_per_page);
      if($result){
       while($row=mysqli_fetch_array($result)){
       $thumbnail=$row['thumbnail'];
       $user_id=$row['user_id'];
       $vidID3=$row['video_id'];
       
       $thumbnail=$row['thumbnail'];
       $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
       if($namequery){
        
         $userrow=mysqli_fetch_array($namequery);
  
       }
          ?>
  
  
  
  
  <div class="col-3 round">
       <div class="card border-secondary mb-3 round" >
       <a href="videoview.php?vidID=<?php echo $vidID3 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
       <div class="card-body">
       <h4 class="card-title"><?php echo $row['title'] ?></h4>
       <h4 class="card-title"><?php //echo $vidID3 ?></h4>
       <p class="card-text"><?php echo $userrow['username']?></p>
        <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
        <?php
                $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID3' and likes=1");
                if($query5){
                  
                 $count=mysqli_num_rows($query5);
  
                }
                if(!empty($_SESSION['id'])){
                
                $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID3' and user_id='$userid' and likes=1");
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
  
                
                  $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID3' and user_id='$userid' and likes=0");
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
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID3' and likes=0");
                if($query5){
                  
                 $countd=mysqli_num_rows($query5);
  
                }
              ?>
              &nbsp<?php echo $countd ?></p>
             
  
        </div>
          </div>
        </div>
            <?php
      }
  } $prev = $page - 1;
  $next = $page + 1; 
  $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;
  $adjacents = 8;
  $targetpage = "/";
  $pagestring = "?page=";
  $pagination = "";
  if($lastpage > 1)
  {	
  $pagination .= "<div class=\"pagination\">";
  
  //previous button
  if ($page > 1){ 
  $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
  }else{
  $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
  }
  //pages	
  if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
  {	
  for ($counter = 1; $counter <= $lastpage; $counter++)
  {
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  }
  elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
  {
  //close to beginning; only hide later pages
  if($page < 1 + ($adjacents * 2))		
  {
  for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  $pagination .= "<span class=\"elipses\">...</span>";
  $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
  $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
  
  }
  //in middle; hide some front and some back
  elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
  {
  $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
  $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
  $pagination .= "<span class=\"elipses\">...</span>";
  for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current active\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  $pagination .= "<span class=\"elipses\">...</span>";
  $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
  $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
  }
  //close to end; only hide early pages
  else
  {
  $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
  $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
  $pagination .= "<span class=\"elipses\">...</span>";
  for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  }
  }
  
  //next button
  if ($page < $counter - 1) 
  $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
  else
  $pagination.= "<span class=\"disabled\">next &raquo;</span>";
  $pagination.= "</div>\n";		
  }
  ?>
  
  <div class="text-center"><?php echo $pagination; ?></div>
  <?php
      }
    }else{
      $result_per_page=10;
      $query=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' and restriction='under 18'  order by views desc");
   
      $number_of_result=mysqli_num_rows($query);
        $number_of_pages=ceil($number_of_result/$result_per_page);
   
        if(!isset($_GET['page'])){
          $page=1;
      }else{
          $page=$_GET['page'];
      }
    
      $this_page_first_result=($page-1)*$result_per_page;
  
      $result=mysqli_query($con,"select * from videos where noofvideos='3' and status='public' and restriction='under 18'  order by views desc limit ".$this_page_first_result.','.$result_per_page);
      if($result){
       while($row=mysqli_fetch_array($result)){
       $thumbnail=$row['thumbnail'];
       $user_id=$row['user_id'];
       $vidID3=$row['video_id'];
       
       $thumbnail=$row['thumbnail'];
       $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
       if($namequery){
        
         $userrow=mysqli_fetch_array($namequery);
  
       }
          ?>
  
  
  
  
  <div class="col-3 round">
       <div class="card border-secondary mb-3 round" >
       <a href="videoview.php?vidID=<?php echo $vidID3 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
       <div class="card-body">
       <h4 class="card-title"><?php echo $row['title'] ?></h4>
       <h4 class="card-title"><?php //echo $vidID3 ?></h4>
       <p class="card-text"><?php echo $userrow['username']?></p>
        <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
        <?php
                $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID3' and likes=1");
                if($query5){
                  
                 $count=mysqli_num_rows($query5);
  
                }
                if(!empty($_SESSION['id'])){
                
                $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID3' and user_id='$userid' and likes=1");
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
  
                
                  $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID3' and user_id='$userid' and likes=0");
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
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID3' and likes=0");
                if($query5){
                  
                 $countd=mysqli_num_rows($query5);
  
                }
              ?>
              &nbsp<?php echo $countd ?></p>
             
  
        </div>
          </div>
        </div>
            <?php
      }
  } $prev = $page - 1;
  $next = $page + 1; 
  $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
  $lpm1 = $lastpage - 1;
  $adjacents = 8;
  $targetpage = "/";
  $pagestring = "?page=";
  $pagination = "";
  if($lastpage > 1)
  {	
  $pagination .= "<div class=\"pagination\">";
  
  //previous button
  if ($page > 1){ 
  $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
  }else{
  $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
  }
  //pages	
  if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
  {	
  for ($counter = 1; $counter <= $lastpage; $counter++)
  {
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  }
  elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
  {
  //close to beginning; only hide later pages
  if($page < 1 + ($adjacents * 2))		
  {
  for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  $pagination .= "<span class=\"elipses\">...</span>";
  $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
  $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
  
  }
  //in middle; hide some front and some back
  elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
  {
  $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
  $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
  $pagination .= "<span class=\"elipses\">...</span>";
  for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current active\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  $pagination .= "<span class=\"elipses\">...</span>";
  $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
  $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
  }
  //close to end; only hide early pages
  else
  {
  $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
  $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
  $pagination .= "<span class=\"elipses\">...</span>";
  for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
  {
    if ($counter == $page)
      $pagination.= "<span class=\"current\">$counter</span>";
    else
      $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
  }
  }
  }
  
  //next button
  if ($page < $counter - 1) 
  $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
  else
  $pagination.= "<span class=\"disabled\">next &raquo;</span>";
  $pagination.= "</div>\n";		
  }
  ?>
  
  <div class="text-center"><?php echo $pagination; ?></div>
  <?php
    }
}elseif($split==4){
    ?>
    <div class="row">
   <div class="col-3 offset-md-4">
     <h1>4 Split MashUps</h1>
   </div>
</div>
<div class="row">
    <?php
    if(!empty($_SESSION['id'])){
      if($age>=18){
        $result_per_page=10;
        $query=mysqli_query($con,"select * from videos where noofvideos='4' and status='public' order by views desc");
     
        $number_of_result=mysqli_num_rows($query);
          $number_of_pages=ceil($number_of_result/$result_per_page);
     
          if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
      
        $this_page_first_result=($page-1)*$result_per_page;
    
        $result=mysqli_query($con,"select * from videos where noofvideos='4' and status='public' order by views desc limit ".$this_page_first_result.','.$result_per_page);
        
       if($result){
        while($row=mysqli_fetch_array($result)){
        $thumbnail=$row['thumbnail'];
        $user_id=$row['user_id'];
        $vidID4=$row['video_id'];
        
        $thumbnail=$row['thumbnail'];
        $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
        if($namequery){
         
          $userrow=mysqli_fetch_array($namequery);
   
        }
           ?>
   
   
   
   
   <div class="col-3 round">
        <div class="card border-secondary mb-3 round" >
        <a href="videoview.php?vidID=<?php echo $vidID4 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
        <div class="card-body">
        <h4 class="card-title"><?php echo $row['title'] ?></h4>
        <h4 class="card-title"><?php //echo $vidID3 ?></h4>
        <p class="card-text"><?php echo $userrow['username']?></p>
         <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
         <?php
                 $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID4' and likes=1");
                 if($query5){
                   
                  $count=mysqli_num_rows($query5);
   
                 }
                 if(!empty($_SESSION['id'])){
                 
                 $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID4' and user_id='$userid' and likes=1");
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
   
                 
                   $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID4' and user_id='$userid' and likes=0");
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
               $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID4' and likes=0");
                 if($query5){
                   
                  $countd=mysqli_num_rows($query5);
   
                 }
               ?>
               &nbsp<?php echo $countd ?></p>
              
   
         </div>
           </div>
         </div>
             <?php
       }
   }$prev = $page - 1;
   $next = $page + 1; 
   $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
   $lpm1 = $lastpage - 1;
   $adjacents = 8;
   $targetpage = "/";
   $pagestring = "?page=";
   $pagination = "";
   if($lastpage > 1)
   {	
   $pagination .= "<div class=\"pagination\">";
   
   //previous button
   if ($page > 1){ 
   $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
   }else{
   $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
   }
   //pages	
   if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
   {	
   for ($counter = 1; $counter <= $lastpage; $counter++)
   {
   if ($counter == $page)
     $pagination.= "<span class=\"current\">$counter</span>";
   else
     $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   }
   elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
   {
   //close to beginning; only hide later pages
   if($page < 1 + ($adjacents * 2))		
   {
   for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
   {
     if ($counter == $page)
       $pagination.= "<span class=\"current\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   $pagination .= "<span class=\"elipses\">...</span>";
   $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
   $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
   
   }
   //in middle; hide some front and some back
   elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
   {
   $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
   $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
   $pagination .= "<span class=\"elipses\">...</span>";
   for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
   {
     if ($counter == $page)
       $pagination.= "<span class=\"current active\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   $pagination .= "<span class=\"elipses\">...</span>";
   $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
   $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
   }
   //close to end; only hide early pages
   else
   {
   $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
   $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
   $pagination .= "<span class=\"elipses\">...</span>";
   for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
   {
     if ($counter == $page)
       $pagination.= "<span class=\"current\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   }
   }
   
   //next button
   if ($page < $counter - 1) 
   $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
   else
   $pagination.= "<span class=\"disabled\">next &raquo;</span>";
   $pagination.= "</div>\n";		
   }
   ?>
   
   <div class="text-center"><?php echo $pagination; ?></div>
   <?php
      }else{
        $result_per_page=10;
     $query=mysqli_query($con,"select * from videos where noofvideos='4' and status='public'  and restriction='under 18' order by views desc");
  
     $number_of_result=mysqli_num_rows($query);
       $number_of_pages=ceil($number_of_result/$result_per_page);
  
       if(!isset($_GET['page'])){
         $page=1;
     }else{
         $page=$_GET['page'];
     }
   
     $this_page_first_result=($page-1)*$result_per_page;
 
     $result=mysqli_query($con,"select * from videos where noofvideos='4' and status='public'  and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
     
    if($result){
     while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID4=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID4 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID4' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID4' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID4' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID4' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
      }
    }else{
      $result_per_page=10;
     $query=mysqli_query($con,"select * from videos where noofvideos='4' and status='public'  and restriction='under 18' order by views desc");
  
     $number_of_result=mysqli_num_rows($query);
       $number_of_pages=ceil($number_of_result/$result_per_page);
  
       if(!isset($_GET['page'])){
         $page=1;
     }else{
         $page=$_GET['page'];
     }
   
     $this_page_first_result=($page-1)*$result_per_page;
 
     $result=mysqli_query($con,"select * from videos where noofvideos='4' and status='public' and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
     
    if($result){
     while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID4=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID4 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID4' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID4' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID4' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID4' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
    }
     

}elseif($split==5){
    ?>
    <div class="row">
   <div class="col-3 offset-md-4">
     <h1>5 Split MashUps</h1>
   </div>
</div>
<div class="row">
    <?php
    if(!empty($_SESSION['id'])){
      if($age>=18){
        $result_per_page=10;
        $query=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' order by views desc");
     
        $number_of_result=mysqli_num_rows($query);
          $number_of_pages=ceil($number_of_result/$result_per_page);
     
          if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
      
        $this_page_first_result=($page-1)*$result_per_page;
     
        $result=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' order by views desc limit ".$this_page_first_result.','.$result_per_page);
        
         if($result){
          while($row=mysqli_fetch_array($result)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID5=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);
     
          }
             ?>
     
     
     
     
     <div class="col-3 round">
          <div class="card border-secondary mb-3 round" >
          <a href="videoview.php?vidID=<?php echo $vidID5 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
          <div class="card-body">
          <h4 class="card-title"><?php echo $row['title'] ?></h4>
          <h4 class="card-title"><?php //echo $vidID3 ?></h4>
          <p class="card-text"><?php echo $userrow['username']?></p>
           <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
           <?php
                   $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID5' and likes=1");
                   if($query5){
                     
                    $count=mysqli_num_rows($query5);
     
                   }
                   if(!empty($_SESSION['id'])){
                   
                   $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID5' and user_id='$userid' and likes=1");
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
     
                   
                     $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID5' and user_id='$userid' and likes=0");
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
                 $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID5' and likes=0");
                   if($query5){
                     
                    $countd=mysqli_num_rows($query5);
     
                   }
                 ?>
                 &nbsp<?php echo $countd ?></p>
                
     
           </div>
             </div>
           </div>
               <?php
         }
     }$prev = $page - 1;
     $next = $page + 1; 
     $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
     $lpm1 = $lastpage - 1;
     $adjacents = 8;
     $targetpage = "/";
     $pagestring = "?page=";
     $pagination = "";
     if($lastpage > 1)
     {	
     $pagination .= "<div class=\"pagination\">";
     
     //previous button
     if ($page > 1){ 
     $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
     }else{
     $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
     }
     //pages	
     if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
     {	
     for ($counter = 1; $counter <= $lastpage; $counter++)
     {
     if ($counter == $page)
       $pagination.= "<span class=\"current\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     }
     elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
     {
     //close to beginning; only hide later pages
     if($page < 1 + ($adjacents * 2))		
     {
     for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
     {
       if ($counter == $page)
         $pagination.= "<span class=\"current\">$counter</span>";
       else
         $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     $pagination .= "<span class=\"elipses\">...</span>";
     $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
     $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
     
     }
     //in middle; hide some front and some back
     elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
     {
     $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
     $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
     $pagination .= "<span class=\"elipses\">...</span>";
     for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
     {
       if ($counter == $page)
         $pagination.= "<span class=\"current active\">$counter</span>";
       else
         $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     $pagination .= "<span class=\"elipses\">...</span>";
     $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
     $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
     }
     //close to end; only hide early pages
     else
     {
     $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
     $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
     $pagination .= "<span class=\"elipses\">...</span>";
     for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
     {
       if ($counter == $page)
         $pagination.= "<span class=\"current\">$counter</span>";
       else
         $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     }
     }
     
     //next button
     if ($page < $counter - 1) 
     $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
     else
     $pagination.= "<span class=\"disabled\">next &raquo;</span>";
     $pagination.= "</div>\n";		
     }
     ?>
     
     <div class="text-center"><?php echo $pagination; ?></div>
     <?php
      }else{
        $result_per_page=10;
        $query=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' and restriction='under 18' order by views desc");
     
        $number_of_result=mysqli_num_rows($query);
          $number_of_pages=ceil($number_of_result/$result_per_page);
     
          if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
      
        $this_page_first_result=($page-1)*$result_per_page;
     
        $result=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
        
         if($result){
          while($row=mysqli_fetch_array($result)){
          $thumbnail=$row['thumbnail'];
          $user_id=$row['user_id'];
          $vidID5=$row['video_id'];
          
          $thumbnail=$row['thumbnail'];
          $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
          if($namequery){
           
            $userrow=mysqli_fetch_array($namequery);
     
          }
             ?>
     
     
     
     
     <div class="col-3 round">
          <div class="card border-secondary mb-3 round" >
          <a href="videoview.php?vidID=<?php echo $vidID5 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
          <div class="card-body">
          <h4 class="card-title"><?php echo $row['title'] ?></h4>
          <h4 class="card-title"><?php //echo $vidID3 ?></h4>
          <p class="card-text"><?php echo $userrow['username']?></p>
           <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
           <?php
                   $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID5' and likes=1");
                   if($query5){
                     
                    $count=mysqli_num_rows($query5);
     
                   }
                   if(!empty($_SESSION['id'])){
                   
                   $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID5' and user_id='$userid' and likes=1");
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
     
                   
                     $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID5' and user_id='$userid' and likes=0");
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
                 $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID5' and likes=0");
                   if($query5){
                     
                    $countd=mysqli_num_rows($query5);
     
                   }
                 ?>
                 &nbsp<?php echo $countd ?></p>
                
     
           </div>
             </div>
           </div>
               <?php
         }
     }$prev = $page - 1;
     $next = $page + 1; 
     $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
     $lpm1 = $lastpage - 1;
     $adjacents = 8;
     $targetpage = "/";
     $pagestring = "?page=";
     $pagination = "";
     if($lastpage > 1)
     {	
     $pagination .= "<div class=\"pagination\">";
     
     //previous button
     if ($page > 1){ 
     $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
     }else{
     $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
     }
     //pages	
     if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
     {	
     for ($counter = 1; $counter <= $lastpage; $counter++)
     {
     if ($counter == $page)
       $pagination.= "<span class=\"current\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     }
     elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
     {
     //close to beginning; only hide later pages
     if($page < 1 + ($adjacents * 2))		
     {
     for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
     {
       if ($counter == $page)
         $pagination.= "<span class=\"current\">$counter</span>";
       else
         $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     $pagination .= "<span class=\"elipses\">...</span>";
     $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
     $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
     
     }
     //in middle; hide some front and some back
     elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
     {
     $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
     $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
     $pagination .= "<span class=\"elipses\">...</span>";
     for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
     {
       if ($counter == $page)
         $pagination.= "<span class=\"current active\">$counter</span>";
       else
         $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     $pagination .= "<span class=\"elipses\">...</span>";
     $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
     $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
     }
     //close to end; only hide early pages
     else
     {
     $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
     $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
     $pagination .= "<span class=\"elipses\">...</span>";
     for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
     {
       if ($counter == $page)
         $pagination.= "<span class=\"current\">$counter</span>";
       else
         $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
     }
     }
     }
     
     //next button
     if ($page < $counter - 1) 
     $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
     else
     $pagination.= "<span class=\"disabled\">next &raquo;</span>";
     $pagination.= "</div>\n";		
     }
     ?>
     
     <div class="text-center"><?php echo $pagination; ?></div>
     <?php
      }
    }else{
      $result_per_page=10;
      $query=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' and restriction='under 18' order by views desc");
   
      $number_of_result=mysqli_num_rows($query);
        $number_of_pages=ceil($number_of_result/$result_per_page);
   
        if(!isset($_GET['page'])){
          $page=1;
      }else{
          $page=$_GET['page'];
      }
    
      $this_page_first_result=($page-1)*$result_per_page;
   
      $result=mysqli_query($con,"select * from videos where noofvideos='5' and status='public' and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
      
       if($result){
        while($row=mysqli_fetch_array($result)){
        $thumbnail=$row['thumbnail'];
        $user_id=$row['user_id'];
        $vidID5=$row['video_id'];
        
        $thumbnail=$row['thumbnail'];
        $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
        if($namequery){
         
          $userrow=mysqli_fetch_array($namequery);
   
        }
           ?>
   
   
   
   
   <div class="col-3 round">
        <div class="card border-secondary mb-3 round" >
        <a href="videoview.php?vidID=<?php echo $vidID5 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
        <div class="card-body">
        <h4 class="card-title"><?php echo $row['title'] ?></h4>
        <h4 class="card-title"><?php //echo $vidID3 ?></h4>
        <p class="card-text"><?php echo $userrow['username']?></p>
         <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
         <?php
                 $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID5' and likes=1");
                 if($query5){
                   
                  $count=mysqli_num_rows($query5);
   
                 }
                 if(!empty($_SESSION['id'])){
                 
                 $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID5' and user_id='$userid' and likes=1");
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
   
                 
                   $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID5' and user_id='$userid' and likes=0");
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
               $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID5' and likes=0");
                 if($query5){
                   
                  $countd=mysqli_num_rows($query5);
   
                 }
               ?>
               &nbsp<?php echo $countd ?></p>
              
   
         </div>
           </div>
         </div>
             <?php
       }
   }$prev = $page - 1;
   $next = $page + 1; 
   $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
   $lpm1 = $lastpage - 1;
   $adjacents = 8;
   $targetpage = "/";
   $pagestring = "?page=";
   $pagination = "";
   if($lastpage > 1)
   {	
   $pagination .= "<div class=\"pagination\">";
   
   //previous button
   if ($page > 1){ 
   $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
   }else{
   $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
   }
   //pages	
   if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
   {	
   for ($counter = 1; $counter <= $lastpage; $counter++)
   {
   if ($counter == $page)
     $pagination.= "<span class=\"current\">$counter</span>";
   else
     $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   }
   elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
   {
   //close to beginning; only hide later pages
   if($page < 1 + ($adjacents * 2))		
   {
   for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
   {
     if ($counter == $page)
       $pagination.= "<span class=\"current\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   $pagination .= "<span class=\"elipses\">...</span>";
   $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
   $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
   
   }
   //in middle; hide some front and some back
   elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
   {
   $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
   $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
   $pagination .= "<span class=\"elipses\">...</span>";
   for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
   {
     if ($counter == $page)
       $pagination.= "<span class=\"current active\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   $pagination .= "<span class=\"elipses\">...</span>";
   $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
   $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
   }
   //close to end; only hide early pages
   else
   {
   $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
   $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
   $pagination .= "<span class=\"elipses\">...</span>";
   for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
   {
     if ($counter == $page)
       $pagination.= "<span class=\"current\">$counter</span>";
     else
       $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
   }
   }
   }
   
   //next button
   if ($page < $counter - 1) 
   $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
   else
   $pagination.= "<span class=\"disabled\">next &raquo;</span>";
   $pagination.= "</div>\n";		
   }
   ?>
   
   <div class="text-center"><?php echo $pagination; ?></div>
   <?php
    }
  
}elseif($split==6){
    ?>
    <div class="row">
   <div class="col-3 offset-md-4">
     <h1>6 Split MashUps</h1>
   </div>
</div>
<div class="row">
    <?php
    if(!empty($_SESSION['id'])){
      if($age>=18){
        $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='6' and status='public' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;
 
    $result=mysqli_query($con,"select * from videos where noofvideos='6' and status='public' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    
     if($result){
      while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID6=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID6 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID6' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID6' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID6' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID6' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
      }else{
        $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='6' and status='public'  and restriction='under 18' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;
 
    $result=mysqli_query($con,"select * from videos where noofvideos='6' and status='public'  and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    
     if($result){
      while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID6=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID6 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID6' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID6' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID6' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID6' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
      }
    }else{
      $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='6' and status='public'  and restriction='under 18' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;
 
    $result=mysqli_query($con,"select * from videos where noofvideos='6' and status='public'  and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    
     if($result){
      while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID6=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID6 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID6' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID6' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID6' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID6' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
    }
    
}elseif($split==7){
    ?>
    <div class="row">
   <div class="col-3 offset-md-4">
     <h1>7 Split MashUps</h1>
   </div>
</div>
<div class="row">
    <?php
  if(!empty($_SESSION['id'])){
    if($age>=18){
      $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;
 
    $result=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    
     if($result){
      while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID7=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID7 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID7' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID7' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID7' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID7' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
    }else{
      $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' and restriction='under 18' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;
 
    $result=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    
     if($result){
      while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID7=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID7 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID7' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID7' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID7' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID7' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
    }
  }else{
    $result_per_page=10;
    $query=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' and restriction='under 18' order by views desc");
 
    $number_of_result=mysqli_num_rows($query);
      $number_of_pages=ceil($number_of_result/$result_per_page);
 
      if(!isset($_GET['page'])){
        $page=1;
    }else{
        $page=$_GET['page'];
    }
  
    $this_page_first_result=($page-1)*$result_per_page;
 
    $result=mysqli_query($con,"select * from videos where noofvideos='7' and status='public' and restriction='under 18' order by views desc limit ".$this_page_first_result.','.$result_per_page);
    
     if($result){
      while($row=mysqli_fetch_array($result)){
     $thumbnail=$row['thumbnail'];
     $user_id=$row['user_id'];
     $vidID7=$row['video_id'];
     
     $thumbnail=$row['thumbnail'];
     $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
     if($namequery){
      
       $userrow=mysqli_fetch_array($namequery);

     }
        ?>




<div class="col-3 round">
     <div class="card border-secondary mb-3 round" >
     <a href="videoview.php?vidID=<?php echo $vidID7 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
     <div class="card-body">
     <h4 class="card-title"><?php echo $row['title'] ?></h4>
     <h4 class="card-title"><?php //echo $vidID3 ?></h4>
     <p class="card-text"><?php echo $userrow['username']?></p>
      <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
      <?php
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID7' and likes=1");
              if($query5){
                
               $count=mysqli_num_rows($query5);

              }
              if(!empty($_SESSION['id'])){
              
              $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID7' and user_id='$userid' and likes=1");
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

              
                $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID7' and user_id='$userid' and likes=0");
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
            $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID7' and likes=0");
              if($query5){
                
               $countd=mysqli_num_rows($query5);

              }
            ?>
            &nbsp<?php echo $countd ?></p>
           

      </div>
        </div>
      </div>
          <?php
    }
}$prev = $page - 1;
$next = $page + 1; 
$lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;
$adjacents = 8;
$targetpage = "/";
$pagestring = "?page=";
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";

//previous button
if ($page > 1){ 
$pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
}else{
$pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
}
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
  $pagination.= "<span class=\"current\">$counter</span>";
else
  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	

}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current active\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
$pagination .= "<span class=\"elipses\">...</span>";
$pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
$pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"?page=1&split=$split\">1</a>";
$pagination.= "<a href=\"?page=2&split=$split\">2</a>";
$pagination .= "<span class=\"elipses\">...</span>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
  if ($counter == $page)
    $pagination.= "<span class=\"current\">$counter</span>";
  else
    $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
else
$pagination.= "<span class=\"disabled\">next &raquo;</span>";
$pagination.= "</div>\n";		
}
?>

<div class="text-center"><?php echo $pagination; ?></div>
<?php
  }
    
    
}elseif($split==8){
    ?>
    <div class="row">
   <div class="col-3 offset-md-4">
     <h1>8 Split MashUps</h1>
   </div>
</div>
<div class="row">
    <?php
    if(!empty($_SESSION['id'])){
      if($age>=18){
        $result_per_page=10;
        $query=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' order by views desc");
     
        $number_of_result=mysqli_num_rows($query);
          $number_of_pages=ceil($number_of_result/$result_per_page);
     
          if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
      
        $this_page_first_result=($page-1)*$result_per_page;
    
    
    
        $result=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' order by views desc limit " .$this_page_first_result.','.$result_per_page);
        if($result){
         while($row=mysqli_fetch_array($result)){
         $thumbnail=$row['thumbnail'];
         $user_id=$row['user_id'];
         $vidID8=$row['video_id'];
         
         $thumbnail=$row['thumbnail'];
         $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
         if($namequery){
          
           $userrow=mysqli_fetch_array($namequery);
    
         }
            ?>
    
    
    
    
    <div class="col-3 round">
         <div class="card border-secondary mb-3 round" >
         <a href="videoview.php?vidID=<?php echo $vidID8 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
         <div class="card-body">
         <h4 class="card-title"><?php echo $row['title'] ?></h4>
         <h4 class="card-title"><?php //echo $vidID3 ?></h4>
         <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          <?php
                  $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID8' and likes=1");
                  if($query5){
                    
                   $count=mysqli_num_rows($query5);
    
                  }
                  if(!empty($_SESSION['id'])){
                  
                  $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID8' and user_id='$userid' and likes=1");
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
    
                  
                    $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID8' and user_id='$userid' and likes=0");
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
                $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID8' and likes=0");
                  if($query5){
                    
                   $countd=mysqli_num_rows($query5);
    
                  }
                ?>
                &nbsp<?php echo $countd ?></p>
               
    
          </div>
            </div>
          </div>
              <?php
        }
    }
     $prev = $page - 1;
              $next = $page + 1; 
              $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;
        $adjacents = 8;
        $targetpage = "/";
        $pagestring = "?page=";
        $pagination = "";
        if($lastpage > 1)
        {	
          $pagination .= "<div class=\"pagination\">";
        
          //previous button
          if ($page > 1){ 
            $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
          }else{
            $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
          }
          //pages	
          if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
          {	
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
              else
                $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
            }
          }
          elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
          {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))		
            {
              for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
              {
                if ($counter == $page)
                  $pagination.= "<span class=\"current\">$counter</span>";
                else
                  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
              }
              $pagination .= "<span class=\"elipses\">...</span>";
              $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
              $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
            
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
              $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
              $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
              $pagination .= "<span class=\"elipses\">...</span>";
              for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
              {
                if ($counter == $page)
                  $pagination.= "<span class=\"current active\">$counter</span>";
                else
                  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
              }
              $pagination .= "<span class=\"elipses\">...</span>";
              $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
              $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
            }
            //close to end; only hide early pages
            else
            {
              $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
              $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
              $pagination .= "<span class=\"elipses\">...</span>";
              for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
              {
                if ($counter == $page)
                  $pagination.= "<span class=\"current\">$counter</span>";
                else
                  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
              }
            }
          }
          
          //next button
          if ($page < $counter - 1) 
            $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
          else
            $pagination.= "<span class=\"disabled\">next &raquo;</span>";
          $pagination.= "</div>\n";		
        }
      ?>
     
      <div class="text-center"><?php echo $pagination; ?></div>
    <?php
      }else{
        $result_per_page=10;
        $query=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' and restriction='under 18' order by views desc");
     
        $number_of_result=mysqli_num_rows($query);
          $number_of_pages=ceil($number_of_result/$result_per_page);
     
          if(!isset($_GET['page'])){
            $page=1;
        }else{
            $page=$_GET['page'];
        }
      
        $this_page_first_result=($page-1)*$result_per_page;
    
    
    
        $result=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' and restriction='under 18' order by views desc limit " .$this_page_first_result.','.$result_per_page);
        if($result){
         while($row=mysqli_fetch_array($result)){
         $thumbnail=$row['thumbnail'];
         $user_id=$row['user_id'];
         $vidID8=$row['video_id'];
         
         $thumbnail=$row['thumbnail'];
         $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
         if($namequery){
          
           $userrow=mysqli_fetch_array($namequery);
    
         }
            ?>
    
    
    
    
    <div class="col-3 round">
         <div class="card border-secondary mb-3 round" >
         <a href="videoview.php?vidID=<?php echo $vidID8 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
         <div class="card-body">
         <h4 class="card-title"><?php echo $row['title'] ?></h4>
         <h4 class="card-title"><?php //echo $vidID3 ?></h4>
         <p class="card-text"><?php echo $userrow['username']?></p>
          <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
          <?php
                  $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID8' and likes=1");
                  if($query5){
                    
                   $count=mysqli_num_rows($query5);
    
                  }
                  if(!empty($_SESSION['id'])){
                  
                  $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID8' and user_id='$userid' and likes=1");
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
    
                  
                    $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID8' and user_id='$userid' and likes=0");
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
                $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID8' and likes=0");
                  if($query5){
                    
                   $countd=mysqli_num_rows($query5);
    
                  }
                ?>
                &nbsp<?php echo $countd ?></p>
               
    
          </div>
            </div>
          </div>
              <?php
        }
    }
     $prev = $page - 1;
              $next = $page + 1; 
              $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
        $lpm1 = $lastpage - 1;
        $adjacents = 8;
        $targetpage = "/";
        $pagestring = "?page=";
        $pagination = "";
        if($lastpage > 1)
        {	
          $pagination .= "<div class=\"pagination\">";
        
          //previous button
          if ($page > 1){ 
            $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
          }else{
            $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
          }
          //pages	
          if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
          {	
            for ($counter = 1; $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
              else
                $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
            }
          }
          elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
          {
            //close to beginning; only hide later pages
            if($page < 1 + ($adjacents * 2))		
            {
              for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
              {
                if ($counter == $page)
                  $pagination.= "<span class=\"current\">$counter</span>";
                else
                  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
              }
              $pagination .= "<span class=\"elipses\">...</span>";
              $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
              $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
            
            }
            //in middle; hide some front and some back
            elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
            {
              $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
              $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
              $pagination .= "<span class=\"elipses\">...</span>";
              for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
              {
                if ($counter == $page)
                  $pagination.= "<span class=\"current active\">$counter</span>";
                else
                  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
              }
              $pagination .= "<span class=\"elipses\">...</span>";
              $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
              $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
            }
            //close to end; only hide early pages
            else
            {
              $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
              $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
              $pagination .= "<span class=\"elipses\">...</span>";
              for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
              {
                if ($counter == $page)
                  $pagination.= "<span class=\"current\">$counter</span>";
                else
                  $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
              }
            }
          }
          
          //next button
          if ($page < $counter - 1) 
            $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
          else
            $pagination.= "<span class=\"disabled\">next &raquo;</span>";
          $pagination.= "</div>\n";		
        }
      ?>
     
      <div class="text-center"><?php echo $pagination; ?></div>
    <?php
      }
    }else{
      $result_per_page=10;
      $query=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' and restriction='under 18' order by views desc");
   
      $number_of_result=mysqli_num_rows($query);
        $number_of_pages=ceil($number_of_result/$result_per_page);
   
        if(!isset($_GET['page'])){
          $page=1;
      }else{
          $page=$_GET['page'];
      }
    
      $this_page_first_result=($page-1)*$result_per_page;
  
  
  
      $result=mysqli_query($con,"select * from videos where noofvideos='8' and status='public' and restriction='under 18' order by views desc limit " .$this_page_first_result.','.$result_per_page);
      if($result){
       while($row=mysqli_fetch_array($result)){
       $thumbnail=$row['thumbnail'];
       $user_id=$row['user_id'];
       $vidID8=$row['video_id'];
       
       $thumbnail=$row['thumbnail'];
       $namequery=mysqli_query($con,"select username from users where user_id='$user_id'");
       if($namequery){
        
         $userrow=mysqli_fetch_array($namequery);
  
       }
          ?>
  
  
  
  
  <div class="col-3 round">
       <div class="card border-secondary mb-3 round" >
       <a href="videoview.php?vidID=<?php echo $vidID8 ?>"><img style="height: 200px; width: 100%; border-radius: 12px" src="<?php echo $thumbnail ?>" alt="Card image"></a>
       <div class="card-body">
       <h4 class="card-title"><?php echo $row['title'] ?></h4>
       <h4 class="card-title"><?php //echo $vidID3 ?></h4>
       <p class="card-text"><?php echo $userrow['username']?></p>
        <p class="card-text"> <span class="time"><i class="fa fa-clock-o"></i> <?php echo time_elapsed_string($row['date']); ?></span> |  <i class="fa fa-fw fa-eye"></i> <?php echo $row['views']?></p>
        <?php
                $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID8' and likes=1");
                if($query5){
                  
                 $count=mysqli_num_rows($query5);
  
                }
                if(!empty($_SESSION['id'])){
                
                $likequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID8' and user_id='$userid' and likes=1");
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
  
                
                  $dlikequery=mysqli_query($con,"select * from likesdislikes where video_id='$vidID8' and user_id='$userid' and likes=0");
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
              $query5=mysqli_query($con,"select likes from likesdislikes where video_id='$vidID8' and likes=0");
                if($query5){
                  
                 $countd=mysqli_num_rows($query5);
  
                }
              ?>
              &nbsp<?php echo $countd ?></p>
             
  
        </div>
          </div>
        </div>
            <?php
      }
  }
   $prev = $page - 1;
            $next = $page + 1; 
            $lastpage = ceil($number_of_result/$result_per_page);	//lastpage is = total pages / items per page, rounded up.
      $lpm1 = $lastpage - 1;
      $adjacents = 8;
      $targetpage = "/";
      $pagestring = "?page=";
      $pagination = "";
      if($lastpage > 1)
      {	
        $pagination .= "<div class=\"pagination\">";
      
        //previous button
        if ($page > 1){ 
          $pagination.= "<a href=\"?page=$prev&split=$split\">&laquo; previous</a>";
        }else{
          $pagination.= "<span class=\"disabled\">&laquo; previous</span>";	
        }
        //pages	
        if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
        {	
          for ($counter = 1; $counter <= $lastpage; $counter++)
          {
            if ($counter == $page)
              $pagination.= "<span class=\"current\">$counter</span>";
            else
              $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
          }
        }
        elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
        {
          //close to beginning; only hide later pages
          if($page < 1 + ($adjacents * 2))		
          {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
            {
              if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
              else
                $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
            }
            $pagination .= "<span class=\"elipses\">...</span>";
            $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
            $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";	
          
          }
          //in middle; hide some front and some back
          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
          {
            $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
            $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
            $pagination .= "<span class=\"elipses\">...</span>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
            {
              if ($counter == $page)
                $pagination.= "<span class=\"current active\">$counter</span>";
              else
                $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
            }
            $pagination .= "<span class=\"elipses\">...</span>";
            $pagination.= "<a href=\"?page=$lpm1&split=$split\">$lpm1</a>";
            $pagination.= "<a href=\"?page=$lastpage&split=$split\">$lastpage</a>";		
          }
          //close to end; only hide early pages
          else
          {
            $pagination.= "<a href=\"?page=1&split=$split\">1</a>";
            $pagination.= "<a href=\"?page=2&split=$split\">2</a>";
            $pagination .= "<span class=\"elipses\">...</span>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
            {
              if ($counter == $page)
                $pagination.= "<span class=\"current\">$counter</span>";
              else
                $pagination.= "<a href=\"?page=$counter&split=$split\">$counter</a>";					
            }
          }
        }
        
        //next button
        if ($page < $counter - 1) 
          $pagination.= "<a href=\"?page=$next&split=$split\">next &raquo;</a>";
        else
          $pagination.= "<span class=\"disabled\">next &raquo;</span>";
        $pagination.= "</div>\n";		
      }
    ?>
   
    <div class="text-center"><?php echo $pagination; ?></div>
  <?php
      }
   
}

    
 ?>	
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



<!--Slider-->

<!-- jQuery 3 -->
<script src="Slider/bower_components/jquery/dist/jquery.min.js"></script>
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



