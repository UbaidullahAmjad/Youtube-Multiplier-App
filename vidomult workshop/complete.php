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

  padding: 10px;
}
.grid-item {

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
			
			<div class="wrap-contact1000">
				
	
	
	
	
	
	<!------ Include the above in your HEAD tag ---------->

<!-- Large modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                
               
					
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
							<li> &nbsp /  &nbsp </li>
                            <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal">
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
                            <div class="tab-pane" id="Registration">
                                <form role="form" class="form-horizontal">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                    <option>Mr.</option>
                                                    <option>Ms.</option>
                                                    <option>Mrs.</option>
                                                </select>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="mobile" placeholder="Mobile" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Save & Continue</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">
                                        Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
	
	
  <?php
  
  $con = mysqli_connect('localhost', 'root', '', 'videomulti');
  if(!$con){
      die('Database connection failed.');
  }  

  $query=mysqli_query($con,"select * from urls where id='1'");
  if($query){
   $row=mysqli_fetch_array($query);
   $url1=$row['url1'];
   $url2=$row['url2'];
   $url3=$row['url3'];
   $url4=$row['url4'];
   $url5=$row['url5'];
   $url6=$row['url6'];
   $url7=$row['url7'];
   $url8=$row['url8'];
   
  }
  
  ?>
	






<div class="card border-primary " >
  <div class="card-header"><div class="float-right"><a href="index.html"><img src="cross.ico"></a></div><center><a href="javascript:void(0);" id="play-pause-button"><img src="play.png" width="64px" height="64px"></a></center><br><div style=" height: 22px; background-color: #b28ed3; border-radius:10px;" class="row"><div class="col-12"><input type="range" class="custom-range" value="0" id="customRange1"></div></div></div>
  <div class="card-body">



<div id="sortable" class="grid-container row">

  <div class="grid-item item1 col-3">
  <iframe id="video" width="100%" id="1" height="100%"  frameborder="0" style="display: none"
    allowfullscreen></iframe>
<iframe src="<?php echo $url1; ?>">
</iframe>


  </div>
  <div class="grid-item item2 col-3">
  
    <video width="100%" x-webkit-airplay="allow" 
       data-youtube-id="N9oxmRT2YWw" id="2" loop height="100%" >
  <source src="https://www.youtube.com/embed/tgbNymZ7vqY>" type="video/mp4">
</video>

  </div>
  <div class="grid-item item3 col-3">
  
    <video id="3" width="100%" height="100%" poster="1.jpg">
  <source src="<?php echo $url3; ?>" type="video/mp4">
</video>

  </div>
  
    <div class="grid-item item3 col-3">
	
    <video id="4" width="100%" height="100%" poster="1.jpg">
  <source src="<?php echo $url4; ?>" type="video/mp4">
</video>

  </div>

  <div class="grid-item item1 col-3">
  
  <video id="5" width="100%" height="100%" poster="1.jpg">
  <source src="<?php echo $url5; ?>" type="video/mp4">
</video>
  
  </div>
  
  <div class="grid-item item2 col-3">
  
    <video id="6" width="100%" height="100%" poster="1.jpg">
  <source src="<?php echo $url6; ?>" type="video/mp4">
</video>

  </div>

  <div class="grid-item item3 col-3">
  
  <video id="7" width="100%" height="100%" poster="1.jpg">
  <source src="<?php echo $url7; ?>" type="video/mp4">
</video>

  </div>

    <div class="grid-item item3 col-3">

    <video id="8" width="100%" height="100%" poster="1.jpg">
  <source src="<?php echo $url8; ?>" type="video/mp4">
</video>

  </div>



  </div>


  </div>
    <div class="card-header"><button type="button" height="24px" width="24px" class="float-left"><img src="layout.png" height="34px" width="34px"></button><button type="button" class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#myModal">Save Video</button></div>
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
  var mediaVideo = $("#1, #2, #3, #4, #5, #6, #7, #8");
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
  </script>
<script type="text/javascript">
    $(document).ready(function() {
        
        $("#video")[0].src = "https://www.youtube.com/embed/" + url;
        $("#video").show();
    });
</script>
</body>
</html>

