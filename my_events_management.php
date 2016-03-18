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
        <script src="scripts/event_script.js"></script>
        <script src="scripts/general.js"></script>
        <script>
        $(document).ready(function(){
          $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
      });
        </script>

        <title>My Events</title>
    </head>
    <body onload="checkEdits()"  onresize="resizeInput()">
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
                <form class="formbutton" id="login" action="#modal">
                <a id="modal_trigger" href="#modal"><span class="login_button">Log In</span></a>
            </form>
        </div>
        <div class="col6">
          <form  class="formbutton" id="signup" action="#">
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
  $sql = "select name,location,date, description from events where EID='0001'";
  $result1 = mysql_query($sql,$link);
  $event1 = mysql_fetch_array($result1);

  $sql = "select name,location,date, description from events where EID='0002'";
  $result2 = mysql_query($sql,$link);
  $event2 = mysql_fetch_array($result2);

  //while($event1 = mysql_fetch_array($result)){
    echo<<<end
<div class="container">
  <br>
  <div class="row subtitle">
    <div class="col12">
      <h1 id="event_text">My Events</h1>
  </div>
</div><br>

<div class="row sec">
    <div class="col4">
      <h2>$event1[0]</h2><br><br>
      <div class="row">
        <div class="col2"></div>
        <div class="col8" id="changepic1" style="display: none;margin-left:auto;margin-right:auto;">
            <input type="file" onchange="previewFile1()"><br><br>
        </div>
        <div class="col2"></div>
    </div>
    <img class="img-responsive event_img" src="images/content/outdoor3.png" alt="event1" width="310">
</div><br><br><br>
<div class="col8">
  <div class="row">
    <div class="col10"></div>
    <div class="col2"><span class="pay_type">Split</span></div>
</div><hr>
<div class="row"><h5>Location: <span class="edit_text edit_text1 edit_span" contenteditable="false">$event1[1]</span></h5> <h5>Time: <span class="edit_text1 edit_text edit_span" contenteditable="false">$event1[2]</span></h5><h5>Description:</h5><p class="edit_text1 edit_text" contenteditable="false">$event1[3]</p></div>
<div class="row">
    <div class="col10"></div>
    <div class="col2">
      <input class="save save_button1" type="button" value="save" />
      <input class="edit edit_button1" type="button" value="edit" />
  </div>
</div>
<br>
</div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <h2>Participants</h2>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec" id="my_event_people_1">
    <div class="col1"></div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile6.png" alt="profile1" width="100"></a><input class="delete" type="button" value="X" />
    </div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile2.png" alt="profile2" width="100"></a><input class="delete" type="button" value="X" />
    </div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile5.png" alt="profile3" width="100"></a><input class="delete" type="button" value="X" />
    </div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile17.png" alt="profile4" width="100"></a><input class="delete" type="button" value="X" />
    </div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile9.png" alt="profile5" width="100"></a><input class="delete" type="button" value="X" />
    </div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <h2>Applicants</h2>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <div class="row application">
          <div class="col1"></div>
          <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile35.png" alt="applicant" width="100"></a></div>
          <div class="col3"><input class="accept_app_1" type="button" value="Let me in" /><input class="delete_app" type="button" value="Next Time" /></div>
          <div class="col7"><p>I am really interested in your activities! Please let me in!!</p></div>
      </div>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <div class="row">
          <div class="col1"></div>
          <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile28.png" alt="applicant" width="100"></a></div>
          <div class="col3"><input class="accept_app_1" type="button" value="Let me in" /><input class="delete_app" type="button" value="Next Time" /></div>
          <div class="col7"><p>I am really interested in your activities! Please let me in!!</p></div>
      </div>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <div class="row application">
          <div class="col1"></div>
          <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile44.png" alt="applicant" width="100"></a></div>
          <div class="col3"><input class="accept_app_1" type="button" value="Let me in" /><input class="delete_app" type="button" value="Next Time" /></div>
          <div class="col7"><p>I am really interested in your activities! Please let me in!!</p></div>
      </div>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <div class="row">
          <div class="col1"></div>
          <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile40.png" alt="applicant" width="100"></a></div>
          <div class="col3"><input class="accept_app_1" type="button" value="Let me in" /><input class="delete_app" type="button" value="Next Time" /></div>
          <div class="col7"><p>I am really interested in your activities! Please let me in!!</p></div>
      </div>
  </div>
  <div class="col1"></div>
</div>

<br>

<div class="row sec">
    <div class="col4">
      <h2>$event2[0]</h2><br><br>
      <div class="row">
        <div class="col2"></div>
        <div class="col8" id="changepic2" style="display: none;margin-left:auto;margin-right:auto;">
            <input type="file" onchange="previewFile2()"><br><br>
        </div>
        <div class="col2"></div>
    </div>
    <img class="img-responsive event_img" src="images/content/food2.png" alt="event2" width="310">
</div><br><br><br>
<div class="col8">
  <div class="row">
    <div class="col10"></div>
    <div class="col2"><span class="pay_type">My Treat</span></div>
</div><hr>
<div class="row"><h5>Location: <span class="edit_text2 edit_text edit_span" contenteditable="false">$event2[1]</span></h5> <h5>Time: <span class="edit_text2 edit_text" contenteditable="false" >$event2[2]</span></h5><h5>Description:</h5><p class="edit_text2 edit_text edit_span" contenteditable="false">$event2[3]</p></div><br><br>
  <div class="row">
    <div class="col10"></div>
    <div class="col2">
      <input class="save save_button2" type="button" value="save" />
      <input class="edit edit_button2" type="button" value="edit" />
  </div>
</div>
<br>
</div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <h2>Participants</h2>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec" id="my_event_people_2">
    <div class="col1"></div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile22.png" alt="profile1" width="150"></a><input class="delete" type="button" value="X" /></div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile20.png" alt="profile4" width="150"></a><input class="delete" type="button" value="X" />
    </div>
    <div class="col1 profile_img_div"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile24.png" alt="profile5" width="150"></a><input class="delete" type="button" value="X" />
    </div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <h2>Applicants</h2>
  </div>
  <div class="col1"></div>
</div>

<div class="row sec">
  <div class="col1"></div>
  <div class="col10">
      <div class="row application">
          <div class="col1"></div>
          <div class="col1"><a href="profile_page.html"><img class="img-responsive profile_img" src="images/profile_pics/profile21.png" alt="applicant" width="100"></a></div>
          <div class="col3"><input class="accept_app_2" type="button" value="Let me in" /><input class="delete_app" type="button" value="Next Time" /></div>
          <div class="col7"><p>I am really interested in your activities! Please let me in!!</p></div>
      </div>
  </div>
  <div class="col1"></div>
</div>

</div>

end;

  //}
?>  




<br>
      <!-- <div class="row">
        <h2>Cities I've lived in</h2>
        <div></div>
    </div> -->












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


<div class="col1"></div>
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