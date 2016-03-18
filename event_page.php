<!DOCTYPE html>
<html>
<head>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="stylesheets/general_style.css">
        <link rel="stylesheet" href="stylesheets/event_style.css">
        <link rel="shortcut icon" href="images/general/favicon.ico" />
        <script src="scripts/jQuery.js"></script>
        <script src="scripts/modal.js"></script>
        <script src="scripts/general.js"></script>
        <script>
        $(document).ready(function(){
          $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
      });
        </script>


        <title>Event Page</title>
    </head>
    <body  onresize="resizeInput()">
        <div class="row" id = "heading" style = "padding:0px;margin:0px;">
          <div class="col8" id="title_row">
              <a href = "home_page.html">
                <h1 style = "color:white;text-align:center;font-size:10vmin;margin:10px">MyTreat.com</h1>
            </a>
        </div>
        <div class="col4">
          <br>
          <div class="row">
            <div class="col6">
              <form id="login" action="#modal">
                <a id="modal_trigger" href="#modal"><span class="login_button">Log In</span></a>
            </form>
        </div>
        <div class="col6">
          <form  id="signup" action="#">
            <a href="signup_page.html"><span class="login_button">Sign Up</span></a>
        </form>
    </div>
</div>
<div class="row">
    <div id="tfheader">
      <form id="tfnewsearch" method="get" action="search_result_page.html">
        <input id="search1" type="text" class="tftextinput" name="q" size="21" maxlength="120"><input type="submit" value="search" class="tfbutton">
    </form>
    <div class="tfclear"></div>
</div>
</div>
</div>
</div>



<?php
  $event_id = $_POST['event_id'];
  //database login info
  $_servername = "localhost";
  $_dbusr = "root";
  $_dbpsw = "zq627128";
  //establish connection
  //echo "the earlier part is working";
  $link = mysql_connect($_servername,$_dbusr,$_dbpsw);
  
  //echo "the latter part is working";
  if(!$link){
    die('Could not connect: ' .mysql_error());
  }
  //echo 'Connected Successfully<br>';
  //choose database 
  $db = mysql_select_db("mysql",$link);
  if(!$db){
    die("Database not found".mysql_error());
  } 
  $sql = "select name,location,date, description from events";
  //$sql = "select name,location,date, description from events where id = \"$event_id\"";
  $result = mysql_query($sql,$link);
  $event = mysql_fetch_array($result);

  //while($event1 = mysql_fetch_array($result)){
    echo<<<end

<div class="container">
  <br>
  <br>
  <div class="row sec">
    <div class="col12">
      <h2 id="event_text">$event[0]</h2><hr>
  </div>
</div>

<div class="row sec">
    <div class="col1"></div>
    <div class="col5">
      <br><br>
      <img class="img-responsive event_img" src="images/content/outdoor3.png" alt="event1" style="margin:0px;" width="410">
  </div>
  <div class="col5">
      <div class="row">
        <div class="row">
          <div class="col2"></div>
          <div class="col8">
            <h5>Location: <span class="edit_text" contenteditable="false">$event[1]</span></h5> <h5>Time: <span class="edit_text" contenteditable="false">$event[2]</span></h5><h5>Pay Type: <span class="edit_text" contenteditable="false">Split</span></h5>
        </div>
        <div class="col2"></div>
    </div>
    <div class="row">
      <div class="col2"></div>
      <div class="col10">
        <iframe width="425" height="285" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=$event[1]&output=embed"></iframe>
      </div>
    <div class="col2"></div>
</div>
</div>
<br>
</div>
<div class="col1"></div>
<br><br><br>
</div>
<div class="row sec">
    <div class="col1"></div>
    <div class="col10">
        <p class="event_destext">$event[3]</p>
    </div>
    <div class="col1"></div>
</div>

<div class="row sec">
    <div class="col1"></div>
    <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile23.png" alt="profile1" width="100"></a>
    </div>
    <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile6.png" alt="profile1" width="100"></a>
    </div>
    <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile2.png" alt="profile2" width="100"></a>
    </div>
    <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile5.png" alt="profile3" width="100"></a>
    </div>
    <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile17.png" alt="profile4" width="100"></a>
    </div>
    <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile28.png" alt="profile5" width="100"></a>
    </div>
    <div class="col1"></div>
</div><br>
      <!-- <div class="row">
        <h2>Cities I've lived in</h2>
        <div></div>
    </div> -->











</div>
      
end;

  //}
?>  

<div class="row footer">
    <div class="row">
        <div class="col1 footer">
            <a class="iconlink" href="https://www.instagram.com" >
              <img src="images/general/inst.png" width="30" alt="Image Not Found">
          </a>
      </div>
      <div class="col1 footer">
        <a class="iconlink" href="https://www.facebook.com">
          <img src="images/general/facebook.png" width="30" alt="Image Not Found">
      </a>
  </div>
  <div class="col1 footer">
    <a class="iconlink" href="https://github.com/COEN276Group/MyTreat/tree/dev">
      <img src="images/general/github.png" width="30" alt="Image Not Found">
  </a>
</div>
<div class ="col6" id="connect">
    <p id="footer_title">MyTreat.com</p>
</div>


</div>
</div>


<!--modal stuff-->

<div id="modal" class="popupContainer" style="display:none;">
    <header class="popupHeader">
      <span class="header_title">Login</span>
      <span class="modal_close"><i class="fa fa-times"></i></span>
  </header>

  <section class="popupBody">
      <!-- Username & Password Login form -->
      <div class="user_login">
        <form>
          <label>Email / Username</label>
          <input type="text" />
          <br>
          <label>Password</label>
          <input type="password" />
          <br>
          <div class="action_btns">
            <div class=""><a href="myprofile_page.html" class="btn btn_theme">Login</a></div>
        </div>
    </form>
    <br>
    <a href="signup_page.html" class = "new_user">New User? Click Here to Register</a>
</div>
</section>
</div>

</body>
</html>