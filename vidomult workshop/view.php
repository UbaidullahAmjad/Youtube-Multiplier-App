<?php 
$con = mysqli_connect('localhost', 'root', '', 'videomulti');
if(!$con){
    die('Database connection failed.');    
} 
session_start();
$userid=$_SESSION['id'];

$vidID=$_GET['vidID'];
$a=0;
?>
<?php
 
 $query=mysqli_query($con,"select * from videos where video_id='$vidID' and user_id='$userid'");
 if($query){
    $row=mysqli_fetch_array($query);
    $title=$row['title'];
    $description=$row['description'];
    $tags=$row['tags'];
    $url=$row['video_urls'];

    $urll=explode("$",$url);
    //print_r($urll);
 }else{
     echo "no";
 }
 
?>
<?php
if(isset($_POST['updatevideos'])){
  

$title=$_POST['title'];
$description=$_POST['description'];
$tags=$_POST['tag'];
$restict="18 Plus";
$status="public";
date_default_timezone_set('Asia/karachi');
	$dateS = date('m/d/Y h:i:s', time());
 //Image Upload Code
    if(isset($_FILES['thumbanil'])){
      $errors= array();
      $file_name = $_FILES['thumbanil']['name'];
      $file_size =$_FILES['thumbanil']['size'];
      $file_tmp =$_FILES['thumbanil']['tmp_name'];
      $file_type=$_FILES['thumbanil']['type'];
      $tmp      = explode('.',$_FILES['thumbanil']['name']);
      $file_ext = strtolower(end($tmp));
      //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $imagefolder="images/".$file_name;
      $extensions= array("jpeg","jpg","png","jfif","webp","ico");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,$imagefolder);
         //echo $file_name;

         //echo "Success";
      }else{
         print_r($errors);
      }
   }
   //'$restict','$imagefolder','$status','$dateS'
   date_default_timezone_set('Asia/karachi');
   $dateS = date('m/d/Y h:i:s', time());
   $update=mysqli_query($con,"update videos set title='$title', description='$description',tags='$tags',thumbnail='$imagefolder',date='$dateS' where video_id='$vidID' ");
   if($update){
     $a=5;
   }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--Dragable------------------>	
	<link rel="stylesheet" href="jquery-ui.css">


<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  background-color: #2196F3;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}


.nav-tabs {
    margin-bottom: 15px;
}
.sign-with {
    margin-top: 25px;
    padding: 20px;
}
div#OR {
    height: 30px;
    width: 30px;
    border: 1px solid #C2C2C2;
    border-radius: 50%;
    font-weight: bold;
    line-height: 28px;
    text-align: center;
    font-size: 12px;
    float: right;
    position: absolute;
    right: -16px;
    top: 40%;
    z-index: 1;
    background: #DFDFDF;
}


</style>

	<!--Dragable------------------>	
	
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
	
		<div class="container-contact1000">
      <?php
        if($_SESSION['id']==true){
          $id=$_SESSION['id'];
          $mysqli=mysqli_query($con,"select name,image from users where user_id='$id'");
            $row=mysqli_fetch_array($mysqli);
            $name=$row['name'];
            $img=$row['image'];
          
            $image=substr("$img",3);
          ?>
      
			<div class=" row float-right">
        <div class="col">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $name ?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="examples/User-profile.php">Dashboard</a>
    <a class="dropdown-item" href="examples/user.php">View Profile</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
          <!-- <p style="font-size:20px; color:white; padding: 5px 0px 0px 0px; padding: 8px 0px 0px 0px;"><?php echo $name ?></p> -->
         </div>
         <div class="col"> 
           <img src="<?php echo $image ?>" style="width:48px; height=48px; border-radius: 100%;">
          </div>
        </div><br>
        <?php
        }

?>
			<div class="wrap-contact1000">
				
	
	
	
	
	
	<!------ Include the above in your HEAD tag ---------->

<!-- Large modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              
              <form>
                <h4 class="modal-title" id="myModalLabel">
                    Save Video</h4>
              </form>
              
					&nbsp
					  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                    
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane " id="Login">
                                <form role="form" class="form-horizontal" >
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email1" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                       <a href="complete_login.html"> <button type="submit" class="btn btn-primary btn-sm">
                                            Submit</button></a>
                                        <a href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane active" id="Registration">
                                <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data">
                               <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="<?php echo $title ?>" required class="form-control" id="email" placeholder="Title" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="email" name="description" value="" required class="form-control"  ><?php echo $description ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Tags</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tag" value="<?php echo $tags ?>" required class="form-control" id="mobile" placeholder="Tags" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Restriction</label>
                                    <div class="col-sm-10">
                                        <label class="checkbox-inline">
      <input type="checkbox" value="">  18+
    </label>
	&nbsp &nbsp &nbsp &nbsp
    <label class="checkbox-inline">
      <input type="checkbox" value="">  Under 18
    </label>
                                    </div>
                                    
                                </div>
								
								
								                    <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Thumbnail</label>
                                    <div class="col-sm-10">
     
	  <label for="myfile">Select a picture:</label>
  <input type="file" id="myfile" name="thumbanil">
	 
                                    </div>
                                </div>
								
								             <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Status</label>
                                    <div class="col-sm-10">
                                        <label class="checkbox-inline">
      <input type="checkbox" value="">  Private
    </label>
	&nbsp &nbsp &nbsp &nbsp
    <label class="checkbox-inline">
      <input type="checkbox" value="">  Public
    </label>
                                    </div>
                                </div>
								
								
								
								
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="submit" name="updatevideos" class="btn btn-primary btn-sm"
                                            value="Update & Continue">
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                         
						 
						 
						 <img src="6.jpg" style="width:230px; height:230px; flex-wrap: wrap;  border-radius:15px;">
						 
						 
						 
						 
						 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
	






<div class="card border-primary " >
  <div class="card-header"><div class="float-right"><a href="examples/User-profile.php"><img src="cross.ico"></a></div>
  <center><!--<a href="javascript:void(0);" id="pause" id="play-pause-button"><img src="play.png" width="64px" height="64px">
  </a>-->
  <button  id="pause"><img src="play.png" width="64px" height="64px"></button>
  </center><br><div style=" height: 22px; background-color: #b28ed3; border-radius:10px;" class="row">
  <div class="col-12"><input type="range" class="custom-range" value="0" id="customRange1"></div>
  </div>
  </div>
  <div class="card-body">



<div id="sortable" class="grid-container row">

  <div class="grid-item item1 col-12">
  
  <div id="flockas_1"></div>
  
  </div>
  



  </div>


  </div>
    <div class="card-header"><button type="button" height="24px" width="24px" class="float-left"><img src="layout.png" height="34px" width="34px"></button>
    <?php
           // if(isset($_POST['save'])){

            
                if($_SESSION['id']){
                  if($a==0){
              ?>
              <form method="POST">
    <button type="button"  class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#myModal">update Video</button>
                </form>
  <?php
                  }else{
                    ?>
                    <form method="POST">
    <button type="button"  class="btn btn-primary btn-lg float-right" >DONE</button>
                </form>
                    <?php
                  }
  }else{
                  ?>
                  <form method="POST">
                  <button type="submit" name="save" class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#exampleModal">Save </button>
                  <form>
                  <?php
                }
             // }
              ?></div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                
      </div>
      <form method="POST">
      <div class="modal-body">
      
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" required>
              </div>
              <div class="form-group">
              <label for="">Password</label>
                    <input type="password" name="password" class="form-control" required>
              </div>
             
      </div>
      
      <div class="modal-footer">
        <input type="submit" name="Login" value="LOGIN" class="btn btn-primary">
              </div>
      </form>
    </div>
  </div>
</div>





		

	

				
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

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


  <script src="jquery-1.12.4.js"></script>
  <script src="jquery-ui.js"></script>
	  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  
  
  $('#play-pause-button').click(function() {
  var mediaVideo = $("#flockas_1, #flockas_2, #flockas_3, #flockas_4");
  mediaVideo.each(function (k, v) {
    if (v.paused) {
      v.play();
    } else {
      v.pause();
    }
  })
});


$('#myModal').modal('show');
// www.jquery2dotnet.com
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>
  
<script>
var flockas = [];

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onPlayerReady(event) {
  event.target.playVideo();
}

function add(x) {
  var b=x;
var i=1;
var f="#flockas_";
var res=f.concat(i);
console.log(res);
  var start = Math.random() * 60;

  $(res).append('<div id="flocka' + flockas.length + '" class="flocka" style="width:250px;height:250px; margin-left:5px;"></div>');

  flockas.push(new YT.Player('flocka' + flockas.length, {
    height: '105',
    width: '140',
    videoId: b,
    playerVars: {
      autoplay: 1,
      loop: 1,
      playlist: b,
      start: start
    },
    events: {
      'onReady': onPlayerReady
    }
  
  }));
  i++;
}

function pause() {
  var pauseEl = $("#pause");
  if (pauseEl.html() === "Pause") {
    for (var i = 0; i < flockas.length; i++) {
      flockas[i].pauseVideo();
    }
    pauseEl.html("Play");
  } else {
    for (var i = 0; i < flockas.length; i++) {
      flockas[i].playVideo();
    }
    pauseEl.html("Pause");
  }
}

function onYouTubeIframeAPIReady() {
  <?php
  // if(!empty($_SESSION['url1']) and empty($_SESSION['url2']) and empty($_SESSION['url3']) and empty($_SESSION['url4']) and empty($_SESSION['url5']) and empty($_SESSION['url6']) and empty($_SESSION['url7']) and empty($_SESSION['url8']) ){
  //   $urll=array(($_SESSION['url1']));
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and empty($_SESSION['url3']) and empty($_SESSION['url4']) and empty($_SESSION['url5']) and empty($_SESSION['url6']) and empty($_SESSION['url7']) and empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2']);
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and !empty($_SESSION['url3']) and empty($_SESSION['url4']) and empty($_SESSION['url5']) and empty($_SESSION['url6']) and empty($_SESSION['url7']) and empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3']);
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and !empty($_SESSION['url3']) and !empty($_SESSION['url4']) and empty($_SESSION['url5']) and empty($_SESSION['url6']) and empty($_SESSION['url7']) and empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3'],$_SESSION['url4']);
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and !empty($_SESSION['url3']) and !empty($_SESSION['url4']) and !empty($_SESSION['url5']) and empty($_SESSION['url6']) and empty($_SESSION['url7']) and empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3'],$_SESSION['url4'],$_SESSION['url5']);
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and !empty($_SESSION['url3']) and !empty($_SESSION['url4']) and !empty($_SESSION['url5']) and !empty($_SESSION['url6']) and empty($_SESSION['url7']) and empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3'],$_SESSION['url4'],$_SESSION['url5'],$_SESSION['url6'],);
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and !empty($_SESSION['url3']) and !empty($_SESSION['url4']) and !empty($_SESSION['url5']) and !empty($_SESSION['url6']) and !empty($_SESSION['url7']) and empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3'],$_SESSION['url4'],$_SESSION['url5'],$_SESSION['url6'],$_SESSION['url7'],);
  // }elseif(!empty($_SESSION['url1']) and !empty($_SESSION['url2']) and !empty($_SESSION['url3']) and !empty($_SESSION['url4']) and !empty($_SESSION['url5']) and !empty($_SESSION['url6']) and !empty($_SESSION['url7']) and !empty($_SESSION['url8'])){
  //   $urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3'],$_SESSION['url4'],$_SESSION['url5'],$_SESSION['url6'],$_SESSION['url7'],$_SESSION['url8'],);
  // }
  //$urll=array($_SESSION['url1'],$_SESSION['url2'],$_SESSION['url3'],$_SESSION['url4'],$_SESSION['url5'],$_SESSION['url6'],$_SESSION['url7'],$_SESSION['url8']);
 //$urll=array("https://www.youtube.com/watch?v=dFgaRiY9_iA","https://www.youtube.com/watch?v=xx-zOkBh7Ag","https://www.youtube.com/watch?v=rcd3gQz6UIU",
//"https://www.youtube.com/watch?v=xqSeCczFgeQ");
$length = count($urll);
for ($i = 0; $i < $length; $i++) {
  
  $abc=substr("$urll[$i]",32);
  
  //echo "<script>alert('$abc');</script>";
  //echo "<script>add();</script>";


 ?>
add("<?php echo $abc; ?>");
<?php }?>

}

$("#pause").click(pause);
</script>

</body>
</html>

