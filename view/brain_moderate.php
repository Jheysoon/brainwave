<body>

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
      <li><a href="#!" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" id="list">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" id="list">Logout</a></li>
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

  <div class="section white">
    <div class="row container">

   

  <!--   <button data-type="time-remaining">Time Remaining</button>
    <button data-type="time-elapsed">Time Elapsed</button> -->


    <h5 class=" header  white "><a href=".?action=brain_hard">English(Moderate Mode)</a>  </h5>
    <h6>2 Points</h6>
    <div class="progress yellow">
      <div class="indeterminate" ></div>
    </div>
    
     <label>Question: 1/5</label> 
   
          <p class="grey-text text-darken-3 lighten-3">
               <div class="row">
                  
                <div 
                  id="quest"
                  class="animsition section white col s9 z-depth-3 amber lighten-4" 
                  data-animsition-in="fade-in"
                  data-animsition-in-duration="1300"
                  data-animsition-out="fade-out"
                  data-animsition-out-duration="800">
                 <label><div id="countdown"></div></label>
                        <div class="row">
                              <div class="col s12 ">

                                  <h2>He who invented copy and paste? </h2>

                              </div>
                              <div class="col s6 ">

                                 <!--  <a class="waves-effect waves-green btn-flat white-text">
                                      William Shakespeare
                                  </a> -->
                               
                                        <div class="input-field col s9 offset-s8 center">
                                    <input id="answer" type="text" class="validate">
                                      <label for="answer">Input Answer</label>
                                       <button class="waves-effect waves-light blue btn">Submit</button>
                                    </div>
  

                              </div>
                              
                              
                              
                            </div>
                        <a class="btn-floating btn-large waves-effect waves-light dark-text amber darken-4  z-depth-2">HINT</a>
                          <div>
                            <ul class="pagination">                            
                                <li class="waves-effect " id="dark-text light-blue lighten-5"><a href="#!">1</a></li>
                                <li class="waves-effect " id="light-blue lighten-4"><a href="#!">2</a></li>
                                <li class="active waves-effect" id=" light-blue lighten-3"><a href="#!">3</a></li>
                                <li class="waves-effect " id="light-blue lighten-2"><a href="#!">4</a></li>
                                <li class="waves-effect " id="light-blue lighten-1"><a href="#!">5</a></li>           
                            </ul>
                          </div>
                </div>

                <div class="col s3  z-depth-3 ">
                <label>Rankings</label>
                        <ul class="collection ">
                              <li class="collection-item avatar ">
                                <i class="icon-user circle green">insert_chart</i>
                                <span class="title">Maria</span>
                                
                                <a href="#!" class="secondary-content "><i class="material-icons">6</i></a>
                              </li>

                             
                              <li class="collection-item avatar  ">
                                <i class="icon-user circle orange">folder</i>
                                <span class="title">Pedro</span>
                                
                                <a href="#!" class="secondary-content"><i class="material-icons">4</i></a>
                              </li>
                               <li class="collection-item avatar  ">
                               <i class="icon-user circle">folder</i>
                                <span class="title">Juan</span>
                                
                                <a href="#!" class="secondary-content"><i class="material-icons">4</i></a>
                              </li>

                              <li class="collection-item avatar  ">
                                <i class="icon-user circle indigo">play_arrow</i>
                                <span class="title">Berto</span>
                                   <p>Elminated </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">2</i></a>
                              </li>


                              <li class="collection-item avatar">
                                <i class="icon-user circle red">play_arrow</i>
                                <span class="title">Carlos</span>
                                <p>Elminated </p>
                                <a href="#!" class="secondary-content"><i class="material-icons">2</i></a>
                              </li>

                              
                      </ul>



                </div>
              </div>
          </p>
    </div>
  </div>

  <div class="parallax-container">
  
   <!--  <div class="parallax"><img src="./bootstrap/img/backgrounds/mosaic-abstract-wallpaper.jpg"></div> -->
   <div class="parallax"><img src=" ./bootstrap/img/backgrounds/Brainwave Quiz Master.png"></div>

  </div>

  
  <!-- <footer class="page-footer teal">
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

  <!-- <div id="modal2" class="modal modal-fixed-footer">

    <div class="modal-content ">
      <h4>Create Room</h4>
      <div class="row">
    <form class="col s12" action="." method="post">
       <input type="hidden" name="action" value="add_room">
      <div class="row">
        <div class="input-field col s12">
          <input  id="num" value="<?= rand(10000,99999)?>" name="rid" type="number" class="validate" readonly required>
          <label for="num"> Room Number:</label>
        </div>
       
      </div>
       <div class="row">
           <div class="input-field col s12">
            <select name="category" required>
            <option disabled >Choose your Subject:</option>
             <?php foreach ($category as $row) { ?>
              <option value="<?= $row->getCategory(); ?>" >
                    <?= $row->getCategory(); ?>
              </option>
              <?php } ?>
            </select>
            <label>Select Subject:</label>
          </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="players" type="number" length="20" class="validate" required>
          <label for="players" name="players" data-error="Overlaps">Number of Players:</label>
        </div>
      </div>
     
    
   
    </div>

    </div>


    <div class="modal-footer">
    
      <button class="modal-action waves-effect waves-green btn-flat" type="Submit">Submit</button>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
 </form>
  </div> -->


