<body>

 <div id="main"
      class="side-nav fixed teal accent-4" >
       <div class="logo" >
             <a href="#" class="brand-logo "><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
      </div>
      <hr>
      <ul>
       
       <li class="z-depth-3 active1 collection-item avatar " ><a href=".?action=category" id="list2" 
        class="animsition-link waves-effect waves-light"
        data-animsition-out="fade-out"
        data-animsition-out-duration="2000"><i class="tiny glyphicon glyphicon-book circle"></i> CATEGORY</a></li>
        

        <li class="z-depth-3" id="active1" ><a href=".?action=view_user" id="list2" 
        class="animsition-link waves-effect waves-light"
        data-animsition-out="fade-out"
        data-animsition-out-duration="2000" ><i class="tiny glyphicon glyphicon-user circle"></i> VIEW USERS</a></li>
      </ul>
    
  </div> 

   <?php if (isset($_SESSION['user'])) { ?>
    <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#admin_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" 
        id="list" 
          class="animsition-link"
          data-animsition-out="fade-out"
          data-animsition-out-duration="2000">Logout</a></li>
    </ul>

     <div class="">
        <nav>
        <div class="nav-wrapper ">
          
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button black-text text-darken-2 waves-effect waves-light" href="#!" data-activates="dropdown1" data-beloworigin="true"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
  <?php } ?>


      <div 
      class="animsition container" 
      data-animsition-in="fade-in"
      data-animsition-in-duration="1000"
      data-animsition-out="fade-out"
      data-animsition-out-duration="800">
          <div class="row">
             
            <div class="col s12 offset-s1 grid-example " id="form-bottom">
              <div class="card-panel teal lighten-2 white-text" id="prof"><b><?= $profile->getFname();  ?></b>: Profile Information</div>
                      <div class="col s4">
                        <img src="<?= $profile->getAcc_path();  ?>">
                    </div>
                    <div class="col s8">
                   
                    <div class="input-field col s6">
                      <input  value="<?= $profile->getLname(); ?>" type="text" id="last_name" class="validate_p" readonly>
                      <label for="last_name">Last Name:</label>
                    </div>

                      <div class="input-field col s3">
                        <input value="<?= $profile->getFname(); ?>" type="text" id="first_name"  class="validate_p" readonly>
                        <label for="first_name">First Name:</label>
                      </div>
                   
                     <div class="input-field col s3">
                        <input value="<?= $profile->getMname(); ?>" type="text" id="middle_name"  class="validate_p" readonly>
                        <label for="middle_name">Middle Name:</label>
                      </div>

                       <div class="input-field col s6">
                        <input value="<?= $profile->getAddress(); ?>" type="text" id="address"  class="validate_p" readonly>
                        <label for="address">Address:</label>
                      </div>

                       <div class="input-field col s3">
                        <input value="<?= $profile->getAge(); ?>" type="text" id="gender"  class="validate_p" readonly>
                        <label for="gender">Age:</label>
                      </div>

                      <div class="input-field col s3">
                        <input value="<?= $profile->getGender(); ?>" type="text" id="gender"  class="validate_p" readonly>
                        <label for="gender">Gender:</label>
                      </div>

                       <div class="input-field col s3">
                        <input value="<?= $profile->getDob(); ?>" type="text" id="bday"  class="validate_p" readonly>
                        <label for="bday">Birthday:</label>
                      </div>

                       <div class="input-field col s3">
                        <input value="<?= $profile->getContact(); ?>" type="text" id="Contact"  class="validate_p" readonly>
                        <label for="bday">Contact:</label>
                      </div>
                       <div class="input-field col s3">
                        <input value="<?= $profile->getContact(); ?>" type="text" id="Contact"  class="validate_p" readonly>
                        <label for="bday">Date Register:</label>
                      </div>
                    </div>
                   
                
         </span></div>
                </div>
          
      </div>
      <!--  <div class="container">
          <div class="row">
             
          <div class="col s12 offset-s1 grid-example " id="form-bottom"><span class="flow-text">
              <div class="card-panel teal lighten-2">Category List</div>
                   <div class="row">
                    <div class="col s12">
                      <ul class="tabs">
                        <li class="tab col s3"><a href="#test1">Test 1</a></li>
                        <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
                        <li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
                        <li class="tab col s3"><a href="#test4">Test 4</a></li>
                      </ul>
                    </div>
                    <div id="test1" class="col s12">Test 1</div>
                    <div id="test2" class="col s12">Test 2</div>
                    <div id="test3" class="col s12">Test 3</div>
                    <div id="test4" class="col s12">Test 4</div>
                  </div>
              
              </div>
        </div> -->
             <div id="admin_profile" class="modal modal-fixed-footer">
        <div class="modal-content">

            <h4>Profile Information</h4>
              <hr>  
                  <div class="row">

                    <div class="col s3 ">
                         <h6><?= $brain_users->getUsertype();  ?></h6>
                        <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $brain_users->getAcc_path(); ?>" width="150" height="180" id="logo-container">
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
                    
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Close</a>
          </div>
  </div>
            
      
     
              
       