<body id="login">

 <div class="navbar-fixed">
    <nav>
    <div class="nav-wrapper light-blue darken-2">
        <div class="container">
           <a href="#" class="brand-logo "><!-- <img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="65" class="brand-logo"> --> Brain Wave Quiz Master</a>
        </div>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="active"><a href="#" title="home"><i class="glyphicon glyphicon-home"></i>  </a></li>
        <li><a href="#" title="About"><i class="glyphicon glyphicon-info-sign"></i> </a></li>
        <li><a href="#" title="feedbacks"><i class="glyphicon glyphicon-comment"></i></a></li>
      </ul>
    </div>
  </nav>
</div>

    
      <div id="log" class=" container">
	      <div class="row" id="center">
	    				<div class="col s6 offset-s3 grid-example " >

                        	<div class="form-top">
                            <div class="form-top-left">
                              <h3>Sign In</h3>
                                <p>Enter your username and password to log on:</p>
                            </div>
                                  <div class="form-top-right">
                                      <h3> <img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" height="85" class="img-responsive"></h3>
                                 
                                  </div>
                           
                            </div>

                            <div class="form-bottom">
                             <form role="form"  action="." method="POST" >
                            <input type="hidden" name="action" value="brain_login">
                             <div class="row">
                             
                               <div class="input-field col s12">
                                <i class="glyphicon glyphicon-user prefix"></i>
                                <input id="icon_prefix" type="text"  name="user" required autofocus>
                                <label for="icon_prefix">Username:</label>
                              </div>
                            </div>
                             <div class="row">
                                
                               <div class="input-field col s12">
                                 <i class="glyphicon glyphicon-lock prefix"></i>
                                 <input id="icon_prefix1" type="password" name="pass" required >
                                <label for="icon_prefix1">Password:</label>
                              </div>
                            </div>
                                  <button class="waves-effect waves-light btn" id="myButton" type="Submit">LOGIN</button>
                          </form>
                        </div>
                  </div>

            			 <div class="row" id="mno">
                      <div class="col s6 offset-s3 grid-example ">
                        
                          <?php if ($error  == 'invalid') { ?>
                            <div class="alert alert-danger" id="error">  
                                <i class="tiny glyphicon glyphicon-exclamation-sign flow-text"></i>                   
                                <b>Error!</b> Invalid Input...
                            </div>
                         <?php }elseif ($error == 'duplicate') { ?>
                            <div class="alert alert-danger" id="error">  
                                <i class="tiny glyphicon glyphicon-exclamation-sign flow-text"></i>                
                                <b>Sorry!</b> This account is already exited...
                            </div>
                         <?php }elseif ($error == 'Success') { ?>
                             <div class="alert alert-danger" id="error">  
                                <i class="tiny glyphicon glyphicon-ok-sign flow-text"></i>   
                                <b>Success!</b> New Account Created...
                            </div>
                         <?php } ?>
                                 
                                	<div class="social-login-buttons">
                                      <button data-target="modal1" class="btn modal-trigger">Create Account</button>	
            	                        <a href="#" class="btn btn-link-2">Forgot Password</a>
        	                        </div>
                          </div>
                    </div>
                </div>


              <!-----------------------Modal-------------------------------->
              <div id="modal1" class="modal modal-fixed-footer">
                            <div class="modal-content">
                              <h4>Registry Form</h4>
                                <form action="." method="post" role="form"  class="login-form" enctype="multipart/form-data">
                                <input type="hidden" name="action" value="add_user">
                             
                                <div class="col s6">
                                      <div class="row">
                                         <input type="hidden" class="form-control in" name="user_id" value="<?= date('Y').'-'.rand(10000,99999)?>" id ="user_id" readonly></br>
                                          <div class="input-field col s3">
                                            <div>
                                                <img src="./pics/unk.png" id="outputs" class="img-responsive">
                                              </div>
                                               <script>
                                                  var loadFile = function(event) {
                                                  var output = document.getElementById('outputs');
                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                              </script>
                                                  <div class="fileUpload col s7 offset-s1 grid-example">
                                                          <span class="btn btn-block btn-flat transparent"><i class="glyphicon glyphicon-camera"></i></span>
                                                          <input type="file" class="upload" name="acc_name"  accept="image/*" onchange="loadFile(event)" required>
                                                </div>
                                          </div>

                                          <div class="input-field col s3">
                                            <input id="last" type="text" name="lastname" length="10" class="validate" required>
                                            <label for="last" data-error="invalid">Last Name:</label>
                                          </div>
                                          <div class="input-field col s3">
                                            <input id="first_name" type="text" name="firstname" length="10" class="validate"required>
                                            <label for="first" data-error="invalid">First Name</label>
                                          </div>
                                           <div class="input-field col s3">
                                            <input id="middle_name" type="text" name="middlename" length="10" class="validate"required>
                                            <label for="middle_name" data-error="invalid">Middle Name:</label>
                                          </div>
                                           <div class="input-field col s2">
                                            <input id="age" type="number" length="3" name="age" class="validate" required>
                                            <label for="age" data-error="invalid">Age:</label>
                                          </div>
                                          
                                          <div class="input-field col s6">
                                            <input id="address" type="text" length="50"  name="address" class="validate"required>
                                            <label for="address">Address:</label>
                                          </div>
                                          <div class="input-field col s4">
                                            
                                                <input name="gender" value="male" type="radio" id="test1" class="validate" checked />
                                                <label for="test1">Male</label>
                                              
                                                <input name="gender" value="female" type="radio" id="test2" class="validate"/>
                                                <label for="test2">FEMALE</label>

                                             
                                          </div>
                                          <div class="input-field col s4">
                                              <input type="date" name="dob" class="datepicker"required>
                                               <label for="date" class="center">Birthday:</label>
                                          </div>

                                          <div class="input-field col s3">
                                           
                                            <input id="username" name="username" length="10" type="text" class="validate"required>
                                            <label for="username">Username:</label>
                                          </div>

                                           <div class="input-field col s3">
                                           
                                          <!--   <input id="pass" onkeyup="passwordStrength(this.value)" name="pass" length="10" type="password" class="validate"required> -->
                                          <input type="password" name="password" id="pass" onkeyup="passwordStrength(this.value)"/>
                                            <label for="pass">New Password:</label>
                                          </div>

                                           <div class="input-field col s3">
                                            <input id="contact" name="contact" class="center" type="text" required>
                                            <label for="contact">Contact Number:</label>
                                          </div>
                                             <script type="text/javascript">
                                                jQuery(function($){               
                                                   $("#contact").mask("9999-999-9999");            
                                                });
                                             </script>   

                                          <div class="input-field col s3">
                                                                                                                          
                                                <?php if (empty($registers)) { ?>

                                                      <select name="usertype" required>
                                                        <option>Admin</option>
                                                        <option>User</option>                                                      
                                                     </select>
                                                      <label>Usertype Select:</label>

                                                 <?php }else{ ?>
                                                      <input id="usertype" length="11" name="usertype" type="text" value="User" class="validate" readonly>
                                                      <label for="usertype">Usertype:</label>
                                                  <?php } ?>
                                                
                                            
                                           
                                             
                                            </div>

                                            <div class="input-field col s12">
                                                <div class="row">
                                                  
                                                  <div class="container">
                                                     
                                                        <div class="col s8">
                        
                                                            <label for="passwordStrength">Password strength</label>
                                                                <div class="strength0" id="passwordStrength"></div>
                                                            
                                                        </div> 

                                                         <div class="col s4" id="passwordDescription"></div>                        
                                                        
                                                  </div>
                                                </div>
                                               
                                                  
                                                 
                                          </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button class="modal-action modal-close waves-effect waves-red btn red accent-2 left" type="button">Close</button>
                              <button class="modal-action waves-effect waves-green btn light-blue accent-2 right" id="submit" type="submit" disabled>Submit</button>
                            </div>
                          </div>
                        </form>

                </div>
                 <!-----------------------Modal-------------------------------->


 <!-- <footer class="page-footer" id="pooter">
         
          <div class="footer-copyright">
            <div class="container">
           &copy; BrainWave Quiz Master 2015

            </div>
          </div>
</footer> -->
           

              
                   
                          
                 



              
 
 


    

 