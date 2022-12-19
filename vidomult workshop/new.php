<?php
$con = mysqli_connect('localhost', 'root', '', 'videomulti');
if(!$con){
    die('Database connection failed.');
  
}  

session_start();
if(!$_SESSION['id']){
    header('location:index.php');
}
$id=$_SESSION['id'];

$query=mysqli_query($con,"select video_urls from videos where user_id='$id'");
if($query){
  while($row=mysqli_fetch_array($query)){
    $urls=$row['video_urls'];

   
  }
}





?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<button id="pause">Play</button>
<!--<button id="add">Add One Flocka</button>
<button id="remove">Remove One Flocka</button>-->
<p>
<div id="flockas"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script>
var flockas = [];

var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

function onPlayerReady(event) {
  event.target.playVideo();
}

function add() {
  

  var start = Math.random() * 60;

  $("#flockas").append('<div id="flocka' + flockas.length + '" class="flocka" style="width:250px;height:250px;"></div>');

  flockas.push(new YT.Player('flocka' + flockas.length, {
    height: '105',
    width: '140',
    videoId: 'xqSeCczFgeQ',
    playerVars: {
      autoplay: 1,
      loop: 1,
      playlist: 'xqSeCczFgeQ',
      start: start
    },
    events: {
      'onReady': onPlayerReady
    }
  }));
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
 $urll=array("https://www.youtube.com/watch?v=dFgaRiY9_iA","https://www.youtube.com/watch?v=xx-zOkBh7Ag","https://www.youtube.com/watch?v=rcd3gQz6UIU",
"https://www.youtube.com/watch?v=xqSeCczFgeQ");
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