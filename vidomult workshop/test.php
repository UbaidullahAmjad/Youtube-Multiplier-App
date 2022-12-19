<?php
$serverName = "sg1-wsq1.a2hosting.com
"; //serverName\instanceName
//$connectionInfo = array( "Database"=>"bayshore_db_jpn", "UID"=>"bayshore_tempuser", "PWD"=>"TempUser964$$#%*");
$conn = mysqli_connect( $serverName, "bayshore_tempuser","TempUser964$$#%*","bayshore_db_jpn");

?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<div id="video-placeholder"></div>
<script src="https://www.youtube.com/iframe_api"></script>

<div id="controls">

<ul>

    <li>

        <h2>Player Initialization</h2>

        <pre><code class="js">
        </code></pre>
        </li>

        <li>

            <h2>Duration</h2>

            <p><span id="current-time">0:00</span> / <span id="duration">0:00</span></p>

            <pre><code class="js"></code></pre>

</li>

<li>

    <h2>Progress Bar</h2>

    <input type="range" id="progress-bar" value="0">

    <pre><code class="js"></code></pre>
        <script>
        var player;

function onYouTubeIframeAPIReady() {
player = new YT.Player('video-placeholder', {
    width: 600,
    height: 400,
    videoId: 'Xa0Q0J5tOP0',
    playerVars: {
        color: 'white',
        playlist: 'taJ60kskkns,FG0fTKAqZ5g'
    },
    events: {
        onReady: initialize
    }
});
}

function initialize(){

// Update the controls on load
updateTimerDisplay();
updateProgressBar();

// Clear any old interval.
clearInterval(time_update_interval);

// Start interval to update elapsed time display and
// the elapsed part of the progress bar every second.
time_update_interval = setInterval(function () {
    updateTimerDisplay();
    updateProgressBar();
}, 1000)

}
function updateTimerDisplay(){
    // Update current time text display.
    $('#current-time').text(formatTime( player.getCurrentTime() ));
    $('#duration').text(formatTime( player.getDuration() ));
}

function formatTime(time){
    time = Math.round(time);

    var minutes = Math.floor(time / 60),
    seconds = time - minutes * 60;

    seconds = seconds < 10 ? '0' + seconds : seconds;

    return minutes + ":" + seconds;
}
$('#progress-bar').on('mouseup touchend', function (e) {

// Calculate the new time for the video.
// new time in seconds = total duration in seconds * ( value of range input / 100 )
var newTime = player.getDuration() * (e.target.value / 100);

// Skip video to new time.
player.seekTo(newTime);

});

// This function is called by initialize()
function updateProgressBar(){
// Update the value of our progress bar accordingly.
$('#progress-bar').val((player.getCurrentTime() / player.getDuration()) * 100);
}
</script>
</body>
</html> -->


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
  
}
?>
<?php

if($length==3){

  
?>
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" value="<?php echo $urll[0] ?>" id="input_example" required name="url" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
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
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" value="<?php echo $urll[1] ?>" id="input_example" required name="url2" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
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
<div class="card-body">

<center>
<div class="form-group has-success col-8">
<label class="form-control-label" for="inputSuccess1">Enter Video Url</label>
<input type="text" value="<?php echo $urll[2] ?>" id="input_example" required name="url3" onload="$autoViewerYoutube.bind(this);" data-container-id="container_view_id"  placeholder="Please Enter Video Url Here" class="form-control is-valid" >
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
<?php
  }elseif($length==2){
    ?>