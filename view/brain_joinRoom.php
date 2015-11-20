<body id="now_playing">
    <script type="text/javascript">
        // function loadNowPlaying(){

        // }
        // setInterval(function(){loadNowPlaying()}, 30000);
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

          <!--  <img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="65" class="brand-logo"> --><a href="#" class="brand-logo "> Brain Wave Quiz Master</a>
      </div>

      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div>
      <li><a href="#!" onclick="Materialize.toast('Exit your room before logout!, 3000, 'rounded' )" id="list">My Profile</a></li>

      <li class="divider"></li>
        <li><a href="#" onclick="Materialize.toast('Exit your room before logout!', 3000, 'rounded' )" id="list">Logout</a></li>
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
      data-animsition-in-duration="200"
      data-animsition-out="fade-out"
      data-animsition-out-duration="200">
    <div class="row container">
       <h6 class=" header  white "><b class="left green accent-5 h">ROOM ID: <?= $get_Room->getRoom_id();  ?></b> <b class="right green accent-5 h">Category Name: <?= $get_Room->getCategory();  ?></b> </h6>

       <!-- <div class="input-field col s3 offset-s2">
                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                  </div> -->
    <div class="progress red darken-1 ">
      <div class="determinate white"></div>
    </div>

      <label class="pull-right teal type z-depth-2"><b><?= $get_Room->getPlayer_type();  ?></b></label>

      <p class="grey-text text-darken-3 lighten-3">
            <div class="row">

      <div class="col s12 m4 l3">
        <h5><b>Mechanics:</b></h5>
        <!-------------------->
            <div class="slider ">
            <ul class="slides z-depth-2">
              <li class="darken-1">
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
              <li class="darken-3">
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
              <li class="darken-3">
                <img src="./bootstrap/img/backgrounds/sliver-abstract-wall-wallpaper.jpg">
                <div class="caption left-align">
                  <h3>Hard</h3>
                  <p class="light grey-text text-lighten-3 ">
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

      <div class="col s12 m8 l9" >
       <table class=" responsive-table bordered hoverable ">
          <thead>
                <tr>
                    <th>No.:</th>
                    <th>Name:</th>
                    <th></th>
                </tr>
          </thead>

          <tbody>
              <?php $ctr = 0; foreach ($join_room as $u) { ?>
                 <tr>
                    <td><?= $ctr += 1;  ?>.</td>
                    <td>
                    <?php if ($u->getPlayer_type() == 'Server') { ?>
                        <b><?= $u->getLname().', '. $u->getFname().' '.$u->getMname();  ?></b>
                     <?php }else{ ?>
                         <?= $u->getLname().', '.$u->getFname().' '.$u->getMname();  ?>
                    <?php } ?>

                    </td>
                    <td class="right">
                        <a class="waves-effect waves-light btn blue modal-trigger" href="#view_profile<?= $u->getUser_id(); ?> ">View Profile</a>
                   <div id="view_profile<?= $u->getUser_id(); ?>" class="modal modal-fixed-footer">
                    <div class="modal-content">

                    <h4>Profile Information</h4>
                      <hr>
                          <div class="row">

                            <div class="col s3 ">
                                <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $u->getAcc_path(); ?>" width="150" height="150" id="logo-container">
                            </div>

                    <div class="input-field col s3">
                      <input  value="<?= $u->getLname();  ?>" type="text" id="last_name" class="join_info" readonly>
                      <label for="last_name">Last Name:</label>
                    </div>

                      <div class="input-field col s3">
                        <input value="<?= $u->getFname(); ?>" type="text" id="first_name"  class="join_info" readonly>
                        <label for="first_name">First Name:</label>
                      </div>

                     <div class="input-field col s3">
                        <input value="<?= $u->getMname();  ?>" type="text" id="middle_name"  class="join_info" readonly>
                        <label for="middle_name">Middle Name:</label>
                      </div>

                       <div class="input-field col s6">
                        <input value="<?= $u->getAddress();  ?>" type="text" id="address"  class="join_info" readonly>
                        <label for="address">Address:</label>
                      </div>

                       <div class="input-field col s3">
                        <input value="<?= $u->getAge();  ?>" type="text" id="gender"  class="join_info" readonly>
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

                                    <td><b>Recent Remarks:</b></td>
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

                    </td>

                </tr>
               <?php } ?>
          </tbody>
        </table>

      </div>

    </div>
     <div class="progress red darken-1 ">
      <div class="determinate white"></div>
    </div>
    <div id="container">
           <?php
        // $player_type = $get_Room->getPlayer_type();

       if ($get_Room->getPlayer_type() == "Server" AND $ctr == $get_Room->getPlayers()) { ?>
        <input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id();  ?>" id="room_id">
        <a href="#!"
         class="animsition-link waves-effect waves-light  btn green accent-5"
          data-animsition-out="fade-out"
          data-animsition-out-duration="200" id="Start" >Start</a>

        <?php  }elseif ($get_Room->getPlayer_type() == "Client" AND $ctr == $get_Room->getPlayers()) { ?>
                 <input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id();  ?>" id="room_id">
                  <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&rid=<?= $get_Room->getRid(); ?>&action=brain_StartGame"
                    class="animsition-link waves-effect waves-light  btn green accent-5"
                    data-animsition-out="fade-out"
                    data-animsition-out-duration="200" id="Start_user" style="display:none;">Start</a>
         <?php } ?>
    </div>


     <!--  <div id="container">
        <button id="button-1">Button 1</button>
        <button id="button-2">Button 2</button>
      </div> -->

      <!--  <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&action=brain_StartGame" class="animsition-link waves-effect waves-light  btn green accent-5" id="Start" >Start1</a>  -->
     <?php if (isset($_SESSION['user'])) {  ?>
        <!--  <a href=".?room_id=<?= $get_Room->getRoom_id(); ?>&user_id=<?= $brain_users->getUser_id(); ?>&action=brain_exitRoom"
          class="animsition-link waves-effect waves-light btn right red"
          data-animsition-out="fade-out"
          data-animsition-out-duration="200">Exit</a> -->

             <a href="#exit_room" class=" waves-effect waves-light btn right red  modal-trigger" >Exit</a>

                          <!--  <a href="#exit_room<?= $brain_users->getUser_id();?>" class="waves-effect waves-red modal-trigger transparent " >Exit</a> -->
                          <!------------------Delete Question-------------------------->
                        <div id="exit_room" class="modal">
                            <form class="col s12" action="." method="POST">
                            <div class="modal-content">
                                <div class="row">
                                    <input type="hidden" name="room_id" value="<?= $get_Room->getRoom_id(); ?>">
                                    <input type="hidden" name="user_id" value="<?= $brain_users->getUser_id();?> ">
                                    <input type="hidden" name="action" value="brain_exitRoom">

                                    <div class="row">
                                        <div class="col s3 offset-s5 grid-example">
                                             <i class="large glyphicon glyphicon-exclamation-sign red-text"></i>
                                        </div>
                                        <div class="col s12">
                                            <h5 class="del_cat">Are you sure?</b> </h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="waves-effect waves-green btn blue right">Exit</button>
                                <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Cancel</button>
                            </div>
                          </form>
                        </div>
        </div>
     <?php  } ?>
  </div>

 <!--  <div class="parallax-container">
    <div class="parallax"><img src="./bootstrap/img/backgrounds/mosaic-abstract-wallpaper.jpg"></div> -->
  <!--  <div class="parallax"><img src=" ./bootstrap/img/backgrounds/Brainwave Quiz Master.png"></div> -->

  <!-- </div> -->

<div class="footer-copyright teal">
   <div class="container center">
        <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b> 2015 BRAINWAVE QUIZ MASTER</b></label>
   </div>
</div>
