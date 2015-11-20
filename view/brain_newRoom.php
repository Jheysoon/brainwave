<body onload="f1()">
    <script type="text/javascript">
        // function loadNowPlaying(){
        //   $("#now_playing").load("brain_joinRoom.php");
        // }
        // setInterval(function(){loadNowPlaying()}, 5000);
    </script>
   <div class="fixed-action-btn" style="top: 55px; left: 15px;">
    <a class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus">
      <i class="large glyphicon glyphicon-align-justify"></i>
    </a>
    <ul>
      <li  ><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating purple waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Create Room" ><i class=" glyphicon glyphicon-edit"></i></a></li>
      <li  ><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating blue waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Help"><i class="glyphicon glyphicon-info-sign"></i></a></li>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating yellow darken-3 waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Achievements"><i class=" glyphicon glyphicon-star"></i></a></li>
       <li><a href="#modal3" class="btn-floating gray darken-3 waves-effect waves-light btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Options"><i class=" glyphicon glyphicon-cog"></i></a></li>
    </ul>
  </div>

  <?php if (isset($_SESSION['user'])) { ?>
 <div class="navbar-fixed">
    <nav class="fixed cyan darken-2 "role="navigation">
    <div class="nav-wrapper "> 
      <div class="container">
           <a href="#" class="brand-logo "><!-- <img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="65" class="brand-logo"> --> Brain Wave Quiz Master</a>
      </div>
     
      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#!" onclick="Materialize.toast('Exit your room before logout!, 3000, 'rounded' )" id="list">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href="#" onclick="Materialize.toast('Exit your room before logout! Not Allowed', 3000, 'rounded' )" id="list">Logout</a></li>
      </ul>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
           
    </div>
  </nav> 
</div>
 <?php } ?>
  <!-- <div class="parallax-container">
    <div class="parallax"><img src="./bootstrap/img/backgrounds/circles-abstract_.jpg"></div>
  </div> -->

  <div  
      class="animsition section white z-depth-2" 
      data-animsition-in="fade-in"
      data-animsition-in-duration="500"
      data-animsition-out="fade-out"
      data-animsition-out-duration="500">
    <div class="row container">
       <h5 class=" header  white ">Room ID: <?= $get_Room->getRoom_id();  ?></h5>
       <!-- <div class="input-field col s3 offset-s2">
                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                  </div> -->
    <div class="progress red darken-1 ">
      <div class="indeterminate" ></div>
    </div>

     <h5 class="z-depth-2 center">Category Name: <?= $get_Room->getCategory();  ?></h5> 

      <label class="pull-right"><?= $get_Room->getPlayer_type();  ?></label>

      <p class="grey-text text-darken-3 lighten-3">
            <div class="row">

      <div class="col s12 m4 l3"> 
        <h5><b>Mechanics:</b></h5>
        <!-------------------->
            <div class="slider ">
            <ul class="slides z-depth-2">
              <li class="blue darken-1">
                 <img src="./bootstrap/img/backgrounds/2.jpg"><!-- random image -->

                <div class="caption right-align">
                  <h3>Easy</h3>
                  <p class="light grey-text text-lighten-3"> 
                        Reach the required score to proceed the next level. 
                        <br>
                        <b>Note</b>: Only once use of hint.
                        <!-- A 4 choices level that the player can choose and identify the possible answer. 
                        Has time of 30 sec per each questions displayed also it has elimination. 
                        The score determines to players if the it is answered correctly the question at the same time then they have all same points.   
                        Each player must reach the required score inorder not to eliminate the game and to go through to the next level. -->

                  </p>
                </div>
              </li>
              <li class="yellow darken-3">
                <img src="./bootstrap/img/backgrounds/circles-abstract_.jpg">
               <div class="caption center-align">
                  <h4>Moderate</h4>
                  <p class="light grey-text text-lighten-3"> 
                        Input the correct answer to proceed the next level. 
                        <br>
                        <b>Note</b>: Only once use of hint.
                        <!-- A 4 choices level that the player can choose and identify the possible answer. 
                        Has time of 30 sec per each questions displayed also it has elimination. 
                        The score determines to players if the it is answered correctly the question at the same time then they have all same points.   
                        Each player must reach the required score inorder not to eliminate the game and to go through to the next level. -->

                  </p>
                </div>
              </li>
              <li class="red darken-3">
                <img src="./bootstrap/img/backgrounds/sliver-abstract-wall-wallpaper.jpg">
                <div class="caption left-align">
                  <h3>Hard</h3>
                  <p class="light grey-text text-lighten-3"> 
                        Buzz the button to answer first then input the correct answer win this game. 
                        <br>
                        
                        <!-- A 4 choices level that the player can choose and identify the possible answer. 
                        Has time of 30 sec per each questions displayed also it has elimination. 
                        The score determines to players if the it is answered correctly the question at the same time then they have all same points.   
                        Each player must reach the required score inorder not to eliminate the game and to go through to the next level. -->

                  </p>
                </div>
             
            </ul>
          </div>
        <!-------------------->
      </div>

      <div class="col s12 m8 l9" id="now_playing">
       <table class="centered responsive-table bordered hoverable ">
          <thead>
                <tr>
                    <th>No.:</th>
                    <th>Name:</th>
                    <th class="right center"></th>
                </tr>
          </thead>

          <tbody>
              <?php $ctr = 0; foreach ($join_room as $u) { ?>
                 <tr>
                    <td><?= $ctr += 1;  ?>.</td>              
                    <td><!-- <i class=" glyphicon glyphicon-king"> --></i> <?= $u->getFname();  ?></td>
                    <td class="right"><a class="waves-effect waves-light btn modal-trigger" href="#view_profile">View Profile</a></td>
                </tr>
               <?php } ?>  
          </tbody>
        </table>
       
      </div>

      <?php
        // $player_type = $get_Room->getPlayer_type();
       if ($get_Room->getPlayer_type() == "Server" AND $ctr == $get_Room->getPlayers()) { ?>
        <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&action=brain_StartGame" 
         class="animsition-link waves-effect waves-light  btn green accent-5" 
         title="Start Game" 
          data-animsition-out="fade-out"
          data-animsition-out-duration="500" id="Start">Start</a>

        <?php  } ?>
          
          <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&action=brain_StartGame" id="button1"></a>
    
         <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&user_id=<?= $brain_users->getUser_id(); ?>&action=brain_exitRoom"
          title="Exit Room"
          class="animsition-link waves-effect waves-light btn right red darken-3" 
          data-animsition-out="fade-out" 
          data-animsition-out-duration="500">Go Out</a>
          
        </div>
              
    </div>
  </div>

  <div class="parallax-container">
   <!--  <div class="parallax"><img src="./bootstrap/img/backgrounds/mosaic-abstract-wallpaper.jpg"></div> -->
   <div class="parallax"><img src=" ./bootstrap/img/backgrounds/Brainwave Quiz Master.png"></div>

  </div>


 <!--  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer> -->

 <div id="view_profile" class="modal modal-fixed-footer">
        <div class="modal-content">

            <h4>Profile Information</h4>
              <hr>  
                  <div class="row">

                    <div class="col s3 ">
                        <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $brain_users->getAcc_path(); ?>" width="150" height="150" id="logo-container">
                    </div>

                    <div class="input-field col s3">
                      <input  value="Bacate" type="text" id="last_name" class="validate" readonly>
                      <label for="last_name">Last Name:</label>
                    </div>

                      <div class="input-field col s3">
                        <input value="DP" type="text" id="first_name"  class="validate" readonly>
                        <label for="first_name">First Name:</label>
                      </div>
                   
                     <div class="input-field col s3">
                        <input value="U" type="text" id="middle_name"  class="validate" readonly>
                        <label for="middle_name">Middle Name:</label>
                      </div>

                       <div class="input-field col s6">
                        <input value="Tacloban" type="text" id="address"  class="validate" readonly>
                        <label for="address">Address:</label>
                      </div>

                       <div class="input-field col s3">
                        <input value="21" type="text" id="gender"  class="validate" readonly>
                        <label for="gender">Age:</label>
                      </div>

                     

                  </div>
    <h5>Records:</h5>
     <hr>
      <div class="row">
          <div class="col s6">
            <table class="responsive-table bordered striped">

            <tbody>
              <tr>
               
                <td><b>Games Played</b></td>
                <td>5</td>
              </tr>
              <tr>

                <td><b>Number of Wins:</b></td>
                <td>3</td>
              </tr>
            
            </tbody>
          </table>
             
          </div>

           <div class="col s6">
            <table class="responsive-table bordered striped">

            <tbody>
              <tr>
               
                <td><b>Category Best:</b></td>
                <td>English</td>
              </tr>
              <tr>

                <td><b>Recent Remarks</b></td>
                <td>Execellent</td>
              </tr>
            
            </tbody>
          </table>
              </div> 
          </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
    </div>
  </div>
                    
         