<body>
 <?php if (isset($_SESSION['user'])) { ?>
 <div class="side-nav fixed teal accent-4 ">
       <div class="logo" >
             <a href="#" class="brand-logo"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
      </div>
     <hr>
     
     <ul class="collapsible popout collection teal" data-collapsible="accordion">

        <li class="collection-item">
           
            <div class="collapsible-header"><i class="tiny glyphicon glyphicon-book circle" id="mn_cat"></i> <b>CATEGORY</b></div>
            <div class="collapsible-body">
                  <ul>
                    <a href="?action=admin&dup=''&user_id=<?= $brain_users->getUser_id(); ?>&quest=''" class="center waves-effect waves-light btn transparent modal-trigger" id="list2"><i class="glyphicon glyphicon-book"  id="mn_cat"></i> Category List</a>
                    <li class="divider"></li>
                    <a href="#modal_addCategory" class="center waves-effect waves-light btn transparent modal-trigger" id="list2"><i class="glyphicon glyphicon-plus-sign"  id="mn_cat"></i><i class="glyphicon glyphicon-question-sign"  id="mn_cat"></i> Add Question</a>
                    <li class="divider"></li>
                    <a href=" ?action=View_brain_Question&dup=''&quest=''" class="center waves-effect waves-light btn transparent" id="list2"><i class="glyphicon glyphicon-eye-open " id="mn_cat"></i><i class="glyphicon glyphicon-question-sign" id="mn_cat"></i> View Question</a>
                  </ul>
            </div>
        </li>

        <li class="collection-item">
            <div class="collapsible-header "><i class="tiny glyphicon glyphicon-user circle" id="mn_cat"></i> <b>USERS</b></div>
              <div class="collapsible-body">
                  <ul>
                   
                    <a href="#!" id="list2" class="center waves-effect waves-light btn transparent"><i class="icon-group " id="mn_cat"></i>  User Lists</a>
                    <li class="divider"></li>
                    <a href="#!" id="list2" class="center waves-effect waves-light btn transparent"><i class="glyphicon glyphicon-pencil" id="mn_cat"></i> User Logs</a>
                    <li class="divider"></li>
                    <a href="?user_id=<?= $brain_users->getUser_id();?>&action=brain_UpdateAccount&quest=''" id="list2" class="center waves-effect waves-light btn transparent"><i class="glyphicon glyphicon-wrench" id="mn_cat"></i> User Update</a>                 
                   
                  </ul>       
              </div>
        </li>

      </ul>
    <hr>
    
  </div> 

   
    <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
       <li><a href="#admin_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" id="list" >Logout</a></li>
    </ul>

     <div class="">
        <nav>
        <div class="nav-wrapper ">
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" href="#!" data-beloworigin="true" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?></a></li>
          </ul>
        </div>
      </nav>
    </div>
  <?php } ?>


      <div class="container"  id="view_user">

          <div class="row">
           
            <div class="col s12 offset-s1 grid-example " id="form-bottom">
             
            <div class="white-text teal col s6 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-user"></i> List of Registered Users</span></div>

                    
                    <div class="input-field col s3 offset-s8">

                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                        
                  </div>
                  <div class="input-field col s3  left">
                           <?php if ($quest == 'duplicate') { ?>          
                              <strong class="red-text">Sorry!</strong> This Question is already existed...     
                            <?php  }elseif ($quest == 'Added') { ?>
                                      <strong class="green-text">Success!</strong> New Question added...
                            <?php } ?>
                    </div>
                   

                  
                  <?php if (empty($logs)) {
                          echo '<p><div class="alert alert-error" style="text-align:center;"><h4 >User List is Empty!</h4></div></p>'; ?>
                        <?php }else{ ?>


                <table class=" centered responsive-table bordered hoverable" id="tblData">

                                      <thead>
                                          <tr class="info">
                                            <th>No.</th>
                                            <th>User ID:</th>
                                            <th>Fullname:</th>
                                            <th>Date Registered:</th>
                                            <th></th>
                                            
                                          </tr>
                                      </thead>
                                
                                <?php 
                                $ctr = 0;
                                foreach ($logs as $u) { ?>
                                      <tr>
                                        <td><?= $ctr += 1;  ?>.</td>
                                        <td><?= $u->getUser_id();  ?></td>
                                        <td><?= $u->getLname() . ', ' .$u->getFname().' ' .$u->getMname();   ?></td>
                                        <td><?= $u->getDate();  ?></td>
                                        <td>                         
                                         <a href="#view_profile<?=$u->getUser_id();?>" class="btn waves-effect waves-light modal-trigger" >View Profile</a>

                                            <div id="view_profile<?=$u->getUser_id();?>" class="modal">
                                                <div class="modal-content col s12">
                                                          <div class="row"> 
                                                    
                                                                    <div class="col s3">
                                                                        
                        
                                                                          <img alt="Brand" class="z-depth-3 img-responsive" src="<?= $u->getAcc_path(); ?>" width="180" height="280">
                                                                       
                                                                    </div>

                                                                    <div class="col s9">
                                                                             <h4>Profile Information</h4>
                                                                            <hr>
                                                                            <div class="input-field col s4">
                                                                              <input  value="<?= $u->getLname(); ?>" length="30" name="lastname" type="text" id="last_name" class="view" readonly>
                                                                              <label for="last_name">Last Name:</label>
                                                                            </div>

                                                                            <div class="input-field col s4">
                                                                              <input value="<?= $u->getFname(); ?>" length="30" name="firstname" type="text" id="first_name"  class="view" readonly>
                                                                              <label for="first_name">First Name:</label>
                                                                            </div>
                                                                         
                                                                           <div class="input-field col s4">
                                                                              <input value="<?= $u->getMname(); ?>" length="30" name="middlename" type="text" id="middle_name"  class="view" readonly>
                                                                              <label for="middle_name">Middle Name:</label>
                                                                            </div>

                                                                             <div class="input-field col s6">
                                                                              <input value="<?= $u->getAddress(); ?>" length="50" name="address" type="text" id="address"  class="view" readonly>
                                                                              <label for="address">Address:</label>
                                                                            </div>

                                                                             <div class="input-field col s3">
                                                                              <input value="<?= $u->getAge(); ?>" length="30" name="age" type="number" id="age"  class="view" readonly>
                                                                              <label for="gender">Age:</label>
                                                                            </div>

                                                                            <div class="input-field col s3">
                                                                              <input value="<?= $u->getGender(); ?>" length="30" name="gender" type="text" id="gender"  class="view" readonly>
                                                                              <label for="gender">Gender:</label>
                                                                            </div>

                                                                             <div class="input-field col s3">
                                                                              <input value="<?= $u->getDob(); ?>" length="30" name="dob" type="text" id="bday"  class="view" readonly>
                                                                              <label for="bday">Birthday:</label>
                                                                            </div>

                                                                             <div class="input-field col s3">
                                                                              <input value="<?= $u->getContact(); ?>" length="30" name="contact" type="text" id="Contact"  class="view" readonly>
                                                                              <label for="bday">Contact:</label>
                                                                            </div>
                                                                  
                                                              
                                                            
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
                                  </table>
                           <?php } ?>
         </span></div>
                </div>
          
      </div>
<!------------------------Add Category-------------------------------->
<div id="modal_addCategory" class="modal">
    <div class="modal-content">
      <div class="col s12">
          <div class="row">
              <div class="col s6">
                   <h4>Add Question:</h4>
              </div>
                      <div class="s6">
                              <div class="col s4 right"> 
                                     <label>Select Level:</label>
                                    <ul class='tabs'>
                                      <li class="tab col s6"><a class="active" href="#test1" >Easy</a></li>
                                      <li class="tab col s6"><a href="#test2">Moderate</a></li>
                                      <li class="tab col s6"><a href="#test3">Hard</a></li>
                                    </ul>
                              </div>
                              
                        </div>
             </div>
      </div>

          <div id="test1" class="col s12">
          <form action="." method="POST" enctype="multipart/form-data">
              <input type="hidden" name="level" value="Easy">
              <input type="hidden" name="action"  value="brain_add_Easy">
              <input type="hidden" name="locator" value="view_user">
              <div class="row">
                    <div class="input-field col s3">

                                    <select name="subject" required>
                                     <option value="" disabled selected>Select Subject</option>
                                      <?php foreach ($category as $c) { ?>
                                           <option value="<?= $c->getCategory();  ?>"><?= $c->getCategory();  ?></option>
                                      <?php } ?>    
           
                                    </select>
                                   <label>Select Subject:</label>
                            
                          <div class="ip">
                                <img src="./pics/question.png" id="add_quest" class="img-responsive output z-depth-2">
                          </div>

                           <script>
                              var loadFile1 = function(event) {
                              var output = document.getElementById('add_quest');
                              output.src = URL.createObjectURL(event.target.files[0]);
                             };
                            </script>

                            <div class="fileUpload col s8 offset-s1 grid-example">
                              <span class="btn btn-block btn-flat transparent"><i class=" small glyphicon glyphicon-camera"></i></span>
                              <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile1(event)">
                            </div>
                    </div>

            <div class="col s9">
                  <div class="row">
                      <div class="input-field col s12">
                                <i class="icon icon-pencil prefix"></i>
                                <textarea id="easy" name="question"  length="100" class="materialize-textarea" required autofocus ></textarea>
                                <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                      </div>

                      <div class="input-field col s3 ">
                                <input id="a" name="correct" type="text" length="20" required class="validate">
                                <label for="a" data-error="wrong" data-success="right">Input Answer:</label>
                      </div>

                      <div class="input-field col s3">
                                <input id="b" name="choiceB" type="text" length="20" required class="validate">
                                <label for="b" data-error="wrong" data-success="right" >Input Choice:</label>
                      </div>

                      <div class="input-field col s3 ">
                                <input id="c" name="choiceC" type="text" length="20" required class="validate">
                                <label for="c" data-error="wrong" data-success="right" >Input Choice:</label>
                      </div>

                      <div class="input-field col s3">
                                <input id="d" name="choiceD" type="text" length="20" required class="validate">
                                <label for="d" data-error="wrong" data-success="right" >Input Choice:</label>
                      </div>

                      <div class="input-field col s12">
                                <i class="icon icon-eye-open prefix"></i>
                                <input id="easy" type="text" name="hint" length="50" class="validate" required>
                                <label for="easy" data-error="wrong">Input hint:</label>
                      </div>

                  </div>
            </div>

                    
              </div>
              <div class="divider"></div>
               <button type="submit" class="waves-effect waves-red btn-flat right">Submit</button>
               <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left">Close</a>
        </form>
        

    </div>


          <div id="test2" class="col s12">
              <form action="." method="post" enctype="multipart/form-data">
                   <input type="hidden" name="level" value="Moderate">
                   <input type="hidden" name="action"  value="brain_add_Moderate">
                   <input type="hidden" name="locator" value="view_user">
                  <div class="row">
                       <div class="input-field col s3">
                            
                                    <select name="subject" required>
                                     <option value="" disabled selected>Select Subject</option>
                                    
                                    <?php foreach ($category as $c) { ?>
                                         <option value="<?= $c->getCategory();  ?>"><?= $c->getCategory();  ?></option>
                                    <?php } ?>    
           
                                    </select>
                                    <label>Select Subject:</label>
                          <div class="ip">
                                <img src="./pics/question.png" id="add_quest1" class="img-responsive output z-depth-2">
                          </div>

                           <script>
                              var loadFile2 = function(event) {
                              var output = document.getElementById('add_quest1');
                              output.src = URL.createObjectURL(event.target.files[0]);
                             };
                            </script>

                            <div class="fileUpload col s8 offset-s1 grid-example">
                              <span class="btn btn-block btn-flat transparent"><i class=" small glyphicon glyphicon-camera"></i></span>
                              <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile2(event)">
                            </div>
                         </div>

                          <div class="col s9">
                                <div class="row">
                                    <div class="input-field col s12">
                                              <i class="icon icon-pencil prefix"></i>
                                              <textarea id="easy" name="question" length="100" class="materialize-textarea" required autofocus ></textarea>
                                              <label for="easy" data-error="wrong" >Add Question to Moderate:</label>
                                    </div>

                                    <div class="input-field col s12 ">
                                              <i class=" glyphicon glyphicon-ok prefix"></i>
                                              <input id="a" name="answer" type="text" length="20" required class="validate">
                                              <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                    </div>


                                    <div class="input-field col s12">
                                              <i class="icon icon-eye-open prefix"></i>
                                              <input id="easy" type="text" name="hint" length="50" class="validate" required>
                                              <label for="easy" data-error="wrong">Input hint:</label>
                                    </div>
                                  

                                </div>
                          </div>

                  </div>
                    <div class="divider"></div>
                     <button type="submit" class="waves-effect waves-red btn-flat right">Submit</button>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left">Close</a>
              </form>


          </div>
          <div id="test3" class="col s12">
                  <form action="." method="post" enctype="multipart/form-data">
                  <input type="hidden" name="level" value="Hard">
                  <input type="hidden" name="action"  value="brain_add_Hard">
                  <input type="hidden" name="locator" value="view_user">
                  <div class="row">
                       <div class="input-field col s3">
                           
                                    <select name="subject" required>
                                     <option value="" disabled selected>Select Subject</option>
                                    
                                    <?php foreach ($category as $c) { ?>
                                         <option value="<?= $c->getCategory();  ?>"><?= $c->getCategory();  ?></option>
                                    <?php } ?>    
           
                                    </select>
                                     <label>Select Subject:</label>
                          <div class="ip">
                                <img src="./pics/question.png" id="add_quest2" class="img-responsive output z-depth-2">
                          </div>

                           <script>
                              var loadFile3 = function(event) {
                              var output = document.getElementById('add_quest2');
                              output.src = URL.createObjectURL(event.target.files[0]);
                             };
                            </script>

                            <div class="fileUpload col s8 offset-s1 grid-example">
                              <span class="btn btn-block btn-flat transparent"><i class=" small glyphicon glyphicon-camera"></i></span>
                              <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile3(event)">
                            </div>
                         </div>

                          <div class="col s9">
                                <div class="row">
                                    <div class="input-field col s12">
                                              <i class="icon icon-pencil prefix"></i>
                                              <textarea id="easy" name="question" length="100" class="materialize-textarea" required autofocus ></textarea>
                                              <label for="easy" data-error="wrong" >Add Question to Hard:</label>
                                    </div>

                                    <div class="input-field col s12 ">
                                              <i class=" glyphicon glyphicon-ok prefix"></i>
                                              <input id="a" name="answer" type="text" length="20" required class="validate">
                                              <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                    </div>


                                    <div class="input-field col s12">
                                              <i class="icon icon-eye-open prefix"></i>
                                              <input id="easy" type="text" name="hint" length="50" class="validate" required>
                                              <label for="easy" data-error="wrong">Input hint:</label>
                                    </div>
                                   

                                </div>
                          </div>

                  </div>
                   <div class="divider"></div>
                    <button type="submit" class="waves-effect waves-red btn-flat right">Submit</button>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat left">Close</a>
              </form>

          </div>
    </div>
    <div class="modal-footer">
     
    </div>
  </div>

<!------------------------------------------------------------------------>
     
<!-------------------View Account------------------------------------>
 <div id="admin_profile" class="modal">
        <div class="modal-content">

            <h4>Profile Information</h4>
              <hr>  
                  <div class="row">

                    <div class="col s3 ">
                         <h6><b><?= $brain_users->getUsertype();  ?></b> </h6>
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
               <hr>     
          </div>

          <div class="modal-footer">
            <button class="modal-action modal-close waves-effect waves-light btn red left" title="Close">Close</button>
            <a href="?user_id=<?= $brain_users->getUser_id();?>&action=brain_UpdateAccount" class="waves-effect waves-light btn blue right" title="Edit or Update">Edit</a>
          </div>
  </div>

   
         