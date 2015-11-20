<body>
<label id="load_tweets"> </label>
 <?php if (isset($_SESSION['user'])) { ?>
   <script type="text/javascript">
        // function loadNowPlaying(){
        //   $("#load_tweets").load(".?user_id=<?=$brain_users->getUser_id();?>&action=brain_player_ref");
        // }
        // setInterval(function(){loadNowPlaying()}, 10000);

    //     setInterval(function() {
    //     $.get('.?action=brain_Player', function (data) {
    //         $('#now_playing').html(data);
    //     });
    // }, 50000); 

        // var auto_refresh = setInterval(
        //   function ()
        //   {
        //   $('#load_tweets').load('.?user_id=<?=$brain_users->getUser_id();?>&action=brain_player_ref').fadeIn("slow");
        //   }, 10000); // refresh every 10000 milliseconds
    </script>

  <div class="fixed-action-btn" style="top: 55px; left: 15px;">
    <a class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus">
      <i class="large glyphicon glyphicon-align-justify"></i>
    </a>
    <ul>
      <li><a href="#modal2"  class="btn-floating modal-trigger purple waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Create Room" ><i class="glyphicon glyphicon-edit"></i></a></li>
      <li><a href="#help"  class="btn-floating blue waves-effect btn modal-trigger waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Help"><i class="glyphicon glyphicon-info-sign"></i></a></li>
      <li><a href="#"  class="btn-floating yellow darken-3 waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Achievements"><i class=" glyphicon glyphicon-star"></i></a></li>
      <li><a href="#modal3" class="btn-floating gray darken-3 waves-effect waves-light btn modal-trigger  btn tooltipped" data-position="right" data-delay="50" data-tooltip="Options"><i class=" glyphicon glyphicon-cog"></i></a></li>
    </ul>
  </div>

 
  <div class="navbar-fixed">
    
  <nav class="fixed cyan darken-2" role="navigation">
    <div class="nav-wrapper "> 
      <div class="container">
            <a href="#" class="brand-logo "><!-- <img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="65" class="brand-logo"> --> Brain Wave Quiz Master</a>          
      </div>
     
      
      <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#my_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" 
          id="list"
          class="animsition-link"
          data-animsition-out="fade-out"
          data-animsition-out-duration="500">Logout</a></li>
      </ul>

       
          
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
           <input type="hidden" id="name" name="name" value="<?= $brain_users->getFname();  ?>">
    </div>
  </nav> 
   </div>
 <?php } ?>
  <!-- <div class="parallax-container">
    <div class="parallax"><img src="./bootstrap/img/backgrounds/circles-abstract_.jpg"></div>
  </div> -->
  

  <div class="section white" >
    <div class="row container">
        <div class="input-field col s3 right grid-example">
                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                  </div>
       <h5 class=" header  white ">Room List</h5>
   
     
      <p class="grey-text text-darken-3 lighten-3">
      <?php if (empty($brain_rooms_play)) {
                         echo '<b><p class="text-danger">Room List is Empty!!!</p></b>'; ?>
            <?php }else{ ?>

            <table class="centered responsive-table bordered hoverable">
          <thead>
                <tr>
                    <th>No.</th>
                    <th>Room ID:</th>
                    <th>Subject:</th>
                    <th>Number of Players:</th>
                    <th>Status:</th>
                    <th>Action:</th>
                </tr>
          </thead>

          <tbody>
           <?php $ctr = 0;  foreach ($brain_rooms_play as $r ) { ?>
              <tr>
                    <td><?= $ctr += 1;  ?>.</td>
                    <td><?= $r->getRoom_id(); ?></td>
                    <td><?= $r->getCategory();  ?></td>
                    <td><?= $r->getNum_of_players() . '/ ' . $r->getPlayers();  ?></td>
                    <td>Waiting</td>
                    <?php if ($r->getNum_of_players() == $r->getPlayers()) {?> 
                    <td><a href="#" onclick="Materialize.toast('Sorry! Full Room Not Allowed', 3000, 'rounded' )" class="waves-effect waves-red btn red ">Full</a></td>   
                   <?php }else{ ?>
                        <td><a href=".?rid=<?= $r->getRid();?>&action=brain_joinRoom"  
                        class="animsition-link waves-effect waves-light btn"
                        data-animsition-out="fade-out"
                        data-animsition-out-duration="500">Join</a></td>
                        </tr>
                  <?php } ?>
                  
            <?php } ?>
             
          </tbody>
        </table>
        <?php } ?>

       

      </p>
    </div>
  </div>


  <div class="parallax-container">

 
   <!--  <div class="parallax"><img src="./bootstrap/img/backgrounds/mosaic-abstract-wallpaper.jpg"></div> -->
  <!--  <div class="parallax"><img src=" ./bootstrap/img/backgrounds/Brainwave Quiz Master.png"></div> -->
    <!------------Chat Area-------------->
      <!--  <div class="container">
           <div class="row">
            
             <div class="offset-s9 grid-example">
                 <div class=" lighten-2 center z-depth-2">
                    <h4>Brainwave CHATBOX:</h4>
                 </div>
                  
                  <form id="send-message-area">
                    
                      
                        <div class="input-field col s6 z-depth-2">
                          <i class="glyphicon glyphicon-envelope prefix tranparent" id="i"></i>
                          <textarea id="sendie" class="materialize-textarea white" placeholder="Message Here..." maxlength = '100'></textarea>
                         
                        </div>

                     
                  </form>

                      <div id="chat-wrap"><div id="chat-area" class="z-depth-2"></div></div>
              </div>
           </div>
      </div> -->
      <!-------------------------->
  </div>




  <div id="modal2" class="modal modal-fixed-footer">

    <div class="modal-content ">
      <h4>Create Room</h4>
      <div class="row">
    <form class="col s12" action="." method="post">
       <input type="hidden" name="action" value="brain_addRoom">
       <input type="hidden" name="user_id" value="<?= $brain_users->getUser_id();  ?>">
      <div class="row">
        <div class="input-field col s12">
          <input  id="num" value="<?= rand(10000,99999)?>" name="room_num" type="number" class="center-text" readonly >
          <label for="num"> Room Number:</label>
        </div>
       
      </div>

       <div class="row">
           <div class="input-field col s12">
            <select name="category" required>
            <option disabled >Choose your Subject:</option>
               <?php foreach ($category as $c) { ?>
              <option>
                    <?= $c->getCategory(); ?>
              </option>
              <?php } ?>
            </select>
            <label>Select Subject:</label> 
          </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="players" name="players" type="number" length="3" class="validate" required>
          <label for="players"  data-error="Overlaps">Number of Players:</label>
        </div>
      </div>
     
    
   
    </div>

    </div>


    <div class="modal-footer">
      <button class="modal-action waves-effect waves-green btn-flat" type="Submit">Submit</button>
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
    </div>
 </form>
  </div>

<!------------------------------------>

<div id="my_profile" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h4>Profile Information</h4>
        <hr>  
      <div class="row">

        <div class="col s3 ">
            <!--  <h6><?= $brain_users->getUsertype();  ?></h6> -->
            <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $brain_users->getAcc_path(); ?>" width="150" height="150" id="logo-container">
        </div>

        <div class="input-field col s3">
          <input  value="<?= $brain_users->getLname(); ?>" type="text" id="last_name" class="validate" readonly>
          <label for="last_name">Last Name:</label>
        </div>

          <div class="input-field col s3">
            <input value="<?= $brain_users->getFname(); ?>" type="text" id="first_name"  class="validate" readonly>
            <label for="first_name">First Name:</label>
          </div>
       
         <div class="input-field col s3">
            <input value="<?= $brain_users->getMname(); ?>" type="text" id="middle_name"  class="validate" readonly>
            <label for="middle_name">Middle Name:</label>
          </div>

           <div class="input-field col s6">
            <input value="<?= $brain_users->getAddress(); ?>" type="text" id="address"  class="validate" readonly>
            <label for="address">Address:</label>
          </div>

           <div class="input-field col s3">
            <input value="<?= $brain_users->getAge(); ?>" type="text" id="gender"  class="validate" readonly>
            <label for="gender">Age:</label>
          </div>

          <div class="input-field col s3">
            <input value="<?= $brain_users->getGender(); ?>" type="text" id="gender"  class="validate" readonly>
            <label for="gender">Gender:</label>
          </div>

           <div class="input-field col s3">
            <input value="<?= $brain_users->getDob(); ?>" type="text" id="bday"  class="validate" readonly>
            <label for="bday">Birthday:</label>
          </div>

           <div class="input-field col s3">
            <input value="<?= $brain_users->getContact(); ?>" type="text" id="Contact"  class="validate" readonly>
            <label for="bday">Contact:</label>
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


  <div id="help" class="modal">
    <div class="modal-content">
      <h4>Help</h4>
       <div class="divider"></div>
      <div class="row">
        
                 <div class="col s12"> 
                      <div class="container">
                      <p class="ins">“If I have ever made any valuable discoveries, 
                            it has been due more to patient attention, 
                            than to any other talent”<br>
                             
                      </p>  
                          <p class="right">---Isaac Newton</p>
                       </div>
                </div>

                <div class="col s12"> 
                      <p class="ins">An interactive gameplay where the players can easily answer the corresponding question.There are 3 levels per categories and 15 questions per levels.Also it has a time limit exceeding 1 minute per question and specifically there are eliminations in every levels requires the exact points to proceed to the next level. In <b>Easy mode</b> there are choices to be chosen of where the players can select one of the choices. In <b>Moderate Mode</b> there are no choices but accepts player's answer input. In <b>Hard Mode</b> the fast answering method with 30 seconds time limit, with buzzer button determines whom first to answer.</p>
                      <b>Note:</b><p>Every players have hints but only once who can used this.</p>
                </div>
       
         
      </div>
       
    
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>

  

 <div class="footer-copyright teal">
           <div class="container center">
                  <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b> 2015 BRAINWAVE QUIZ MASTER</b></label>
           </div>
</div>



