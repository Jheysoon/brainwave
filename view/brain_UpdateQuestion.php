<body>
 <?php if (isset($_SESSION['user'])) { ?>  
 <div 
      class="side-nav fixed teal accent-4 index m-scene" >
      <div class="logo">
             <a href="#" class="brand-logo "><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
      </div>
     <hr>
      <ul>
       
       <li class="z-depth-3 active1 collection-item avatar " id="active1"><a href=".?action=category&dup=''&user_id=<?= $brain_users->getUser_id(); ?>" id="list2" 
        class="animsition-link waves-effect waves-light"
        data-animsition-out="fade-out"
        data-animsition-out-duration="500"><i class="tiny glyphicon glyphicon-book circle"></i> CATEGORY</a></li>
        

        <li class="z-depth-3" ><a href=".?action=view_user" id="list2" 
        class="animsition-link waves-effect waves-light"
        data-animsition-out="fade-out"
        data-animsition-out-duration="500"><i class="tiny glyphicon glyphicon-user circle"></i> VIEW USERS</a></li>
     
      </ul>
     <!--  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a> -->
  </div> 

   
  <div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
      <li><a href="#admin_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li>
        <a href=".?action=logout" 
          id="list"
          class="animsition-link"
          data-animsition-out="fade-out"
          data-animsition-out-duration="500">Logout</a></li>
    </ul>
        <nav>
        <div class="nav-wrapper">          
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" href="#!" data-activates="dropdown1" data-beloworigin="true"> <?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><i class="material-icons right"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
  <?php } ?>


      <div  
      class="animsition container" 
      data-animsition-in="fade-in-up-lg"
      data-animsition-in-duration="500"
      data-animsition-out="fade-out-down-sm"
      data-animsition-out-duration="500">>
          <div class="row">
             
            <div class="col s12 offset-s1 grid-example " id="form-bottom"><span class="flow-text">
              <div class="card-panel teal lighten-2 white-text">Category List</div>
          
              <div class="row">
              <form action="." method="POST">
              <input type="hidden" name="action" value="add_category">
                  <div class="input-field col s3 pull-right">
                      <input id="category" type="text" name="category" length="10" class="validate" required>
                    <label for="category" data-error="invalid">Add Category:</label>
                    </div>
                    <div class="input-field col s3">
                      <button class="waves-effect waves-light btn">Add</button>
                    </div>
                     <div class="input-field col s3 offset-s2">
                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                  </div>
              </div>
               </form> 
               <?php if ($dup == 'duplicate') { ?>            
                      <strong class="red-text">Error!</strong> Duplicate Category.              
                 <?php }elseif ($dup == 'delete') {?>
                      <strong class="blue-text">Success!</strong> Category Deleted.         
                <?php }elseif ($dup == 'Updated') { ?>
                      <strong class="blue-text">Success!</strong> Category Updated.                 
                <?php }elseif ($dup == 'Added') { ?>
                      <strong class="blue-text">Success!</strong> New Category Added.
                 <?php }elseif ($dup == 'Remain') { ?>
                      <strong class="red-text">Cannot Be Delete!</strong> There are remaining questions in this Subject.
                <?php }elseif ($dup == 'Only') { ?>
                      <strong class="red-text">Invalid!</strong> Only Highschool Subjects are allowed to insert or update.
                <?php } ?>
                 <?php if (empty($category)) { ?>
                              <b><p class="text-danger">Category List is Empty!!!</p></b>
            <?php }else{ ?>
                <table class="centered responsive-table hoverable " id="tblData">
             
            <tbody>
           <!--  <frameset cols="25%,75%">
              <frame src="menu.htm" name="menu">
              <frame src="chapter1.htm" name="content">
           </frameset> -->
               <?php  $ctr = 0;  foreach ($category as $c ) { ?>
                           <?php if ($c->getCategory() == 'Math') { ?>                     
                               <tr class="green z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                        <td><a href=".?cid=<?= $c->getCid();?>&action=brain_AddQuestion&dup=''" 
                                            type="button"                                            
                                            class="animsition-link waves-effect btn-flat tooltipped waves-light "
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="Add Question"
                                            data-animsition-out-duration="300"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                        <td ><a href="?cid=<?= $c->getCid();?>&action=View_brain_Question&dup=''"   
                                            type="button"                                            
                                            class="animsition-link btn-flat tooltipped waves-light"
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="View Question"
                                            data-animsition-out-duration="300">
                                            <i class="glyphicon glyphicon-eye-open white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                         
                                         <td>
                                            

                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu1'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu1' class='dropdown-content'>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Delete_cat" class="red-text"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Update_form" class="blue-text"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>
                                        </td>


                                   
                            </tr>
                          <?php }elseif ( ($c->getCategory() == 'English')) { ?>
                                <tr class="red z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                        <td><a href=".?cid=<?= $c->getCid();?>&action=brain_AddQuestion&dup=''" 
                                            type="button"                              
                                            class="animsition-link waves-effect btn-flat tooltipped waves-light "
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="Add Question"
                                            data-animsition-out-duration="300"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                        <td ><a href="?cid=<?= $c->getCid();?>&action=View_brain_Question&dup=''"   
                                            type="button"                                           
                                            class="animsition-link btn-flat tooltipped waves-light"
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="View Question"
                                            data-animsition-out-duration="300">
                                            <i class="glyphicon glyphicon-eye-open white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                         
                                          <td>
                                              
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu2'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu2' class='dropdown-content'>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Delete_cat" class="red-text"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Update_form" class="blue-text"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>
                                          </td>


                            </tr>
                             <?php }elseif ( ($c->getCategory() == 'Filipino')) { ?>
                                <tr class="brown z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                       <td><a href=".?cid=<?= $c->getCid();?>&action=brain_AddQuestion&dup=''" 
                                            type="button"  
                                           
                                            class="animsition-link waves-effect btn-flat tooltipped waves-light "
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="Add Question"
                                            data-animsition-out-duration="300"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a></td>
                                            <td ><a href="?cid=<?= $c->getCid();?>&action=View_brain_Question&dup=''"   
                                            type="button"  
                                           
                                            class="animsition-link btn-flat tooltipped waves-light"
                                            data-animsition-out="fade-out"
                                             data-position="bottom" data-delay="50" data-tooltip="View Question"
                                            data-animsition-out-duration="300">
                                            <i class="glyphicon glyphicon-eye-open white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                         
                                          <td>
                                            
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu3'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu3' class='dropdown-content'>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Delete_cat" class="red-text"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Update_form" class="blue-text"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>
                                          </td>


                                      
                            </tr>
                             <?php }elseif ( ($c->getCategory() == 'Science')) { ?>
                                <tr class="amber z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                       <td><a href=".?cid=<?= $c->getCid();?>&action=brain_AddQuestion&dup=''" 
                                            type="button"  
                                           
                                            class="animsition-link waves-effect btn-flat tooltipped waves-light "
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="Add Question"
                                            data-animsition-out-duration="300"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a></td>
                                            <td ><a href="?cid=<?= $c->getCid();?>&action=View_brain_Question&dup=''"   
                                            type="button"  
                                           
                                            class="animsition-link btn-flat tooltipped waves-light"
                                            data-animsition-out="fade-out"
                                             data-position="bottom" data-delay="50" data-tooltip="View Question"
                                            data-animsition-out-duration="300">
                                            <i class="glyphicon glyphicon-eye-open white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                         
                                         <td>
                                          
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu4'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu4' class='dropdown-content'>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Delete_cat" class="red-text"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Update_form" class="blue-text"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>
                                          </td>


                            </tr>
                             <?php }elseif ( ($c->getCategory() == 'History')) { ?>
                                <tr class="grey z-depth-3 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                        <td><a href=".?cid=<?= $c->getCid();?>&action=brain_AddQuestion&dup=''" 
                                            type="button"  
                                           
                                            class="animsition-link waves-effect btn-flat tooltipped waves-light "
                                            data-animsition-out="fade-out"
                                            data-position="bottom" data-delay="50" data-tooltip="Add Question"
                                            data-animsition-out-duration="300"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a></td>
                                            <td ><a href="?cid=<?= $c->getCid();?>&action=View_brain_Question&dup=''"   
                                            type="button"  
                                           
                                            class="animsition-link btn-flat tooltipped waves-light"
                                            data-animsition-out="fade-out"
                                             data-position="bottom" data-delay="50" data-tooltip="View Question"
                                            data-animsition-out-duration="300">
                                            <i class="glyphicon glyphicon-eye-open white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                        </td>
                                         
                                          <td>
                    
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu5'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu5' class='dropdown-content'>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Delete_cat" class="red-text"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="?cid=<?= $c->getCid();?>&action=brain_Update_form" class="blue-text"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>
                                          </td>


                            </tr>
                          <?php } ?>
                   <?php } ?>
            </tbody>
          </table>
     <?php } ?>
              </div>
         </div>
          
      </div>
<!---------------------------------------------->
  
  <div  
      class="animsition container" 
      data-animsition-in="fade-in-up-lg"
      data-animsition-in-duration="500"
      data-animsition-out="fade-out-down-sm"
      data-animsition-out-duration="500">

          <div class="row">
                <div class="col s12 offset-s1 grid-example" id="form-bottom"><span class="flow-text">
              <?php if ($update_Question->getSubject() == 'English') { ?>
                     <div class="card-panel red  white-text">Update Question to Subject <b> <?= $update_Question->getSubject(); ?></b></div>
              <?php }elseif ($update_Question->getSubject() == 'Filipino') { ?>
                    <div class="card-panel brown white-text">Update Question to Subject <b> <?= $update_Question->getSubject(); ?></b></div>
              <?php }elseif ($update_Question->getSubject() == 'Math') { ?>
                    <div class="card-panel green white-text">Update Question to Subject <b> <?= $update_Question->getSubject(); ?></b></div>
              <?php }elseif ($update_Question->getSubject() == 'Science') { ?>
                    <div class="card-panel amber white-text">Update Question to Subject <b> <?= $update_Question->getSubject(); ?></b></div>
              <?php }elseif ($update_Question->getSubject() == 'History') { ?>
                    <div class="card-panel grey white-text">Update Question to Subject <b> <?= $update_Question->getSubject(); ?></b></div>
              <?php } ?>


                           <?php if ($dup == 'No') { ?>                                               
                                  <strong class="green-text">OK!</strong> No Question has been changed...                                
                            <?php  }elseif ($dup == 'Updated') { ?>
                                  <strong class="blue-text">Success!</strong> New Question Updated...
                             <?php } ?>
            

              <div class="row z-depth-2">
                      <form class="col s12" action="." method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="brain_update_Question">
                            <input type="hidden" name="bid" value="<?= $update_Question->getQid();  ?>">
                            <input type="hidden" name="level" value="<?= $update_Question->getLevel();  ?>">
                            <input type="hidden" name="subject" value="<?= $update_Question->getSubject(); ?>">
                            
                            <?php if ($level == 'Easy') { ?>
                             
                                <?php if (empty($update_Question->getfile_path())) { ?>

                                         <div class="input-field col s3 offset-s4 grid-example">
                                             <div class="ip">
                                                <img src="./pics/question.png" id="output1" class="img-responsive output z-depth-2">
                                              </div>
                                               <script>
                                                  var loadFile1 = function(event) {
                                                  var output = document.getElementById('output1');
                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                              </script>
                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                       <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile1(event)">
                                                </div>
                                        </div>

                                        

                                 <?php }else{ ?>
                                        <div class="input-field col s3 offset-s4 grid-example">
                                              <div class="ip">
                                                <img src="<?= $update_Question->getfile_path();  ?>" id="output2" class="img-responsive output z-depth-2">
                                              </div>
                                               <script>
                                                  var loadFile2 = function(event) {
                                                  var output = document.getElementById('output2');
                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                              </script>

                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                      <span class="btn btn-primary btn-flat "><i class="small glyphicon glyphicon-camera"></i></span>
                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile2(event)">
                                                </div>
                                         </div>
                                         
                                 <?php  } ?>

                                        <div class="input-field col s12">
                                          <i class="icon icon-pencil prefix"></i>
                                          <textarea id="easy textarea1" name="question" length="50" class="materialize-textarea" required autofocus><?= $update_Question->getQuestion();  ?></textarea>
                                          <label for="easy" data-error="wrong" >Update Question in Easy:</label>
                                        </div>

                                        <div class="input-field col s3  grid-example">
                                          <input id="a" name="correct" type="text" value ="<?= $update_Question->getCorrect();  ?>" length="10" required class="validate">
                                          <label for="a" data-error="wrong" data-success="right" >Update Correct Answer:</label>
                                        </div>

                                         <div class="input-field col s3 o grid-example">
                                          <input id="b" name="choiceB" type="text" length="10" value="<?= $update_Question->getChoiceB();  ?>" required class="validate">
                                          <label for="b" data-error="wrong" data-success="right" >Update Another Choice:</label>
                                        </div>

                                         <div class="input-field col s3  grid-example">
                                          <input id="c" name="choiceC" type="text" length="10" value="<?= $update_Question->getChoiceC();  ?>" required class="validate">
                                          <label for="c" data-error="wrong" data-success="right" >Update Another Choice:</label>
                                        </div>

                                         <div class="input-field col s3  grid-example">
                                          <input id="d" name="choiceD" type="text" length="10" value="<?= $update_Question->getChoiceD();  ?>" required class="validate">
                                          <label for="d" data-error="wrong" data-success="right" >Update Another Choice:</label>
                                        </div>

                                         <div class="input-field col s12">
                                          <i class="icon icon-eye-open prefix"></i>
                                          <textarea id="easy" name="hint" length="30" class="materialize-textarea" required><?= $update_Question->getHint(); ?></textarea>
                                          <label for="easy" data-error="wrong">Update hint:</label>
                                        </div>

                              <?php }elseif ($level == 'Moderate' || $level == 'Hard') { ?>

                                          <?php if (empty($update_Question->getfile_path())) { ?>

                                                 <div class="input-field col s3 offset-s4 grid-example">
                                                     <div class="ip">
                                                        <img src="./pics/question.png" id="output1" class="img-responsive output z-depth-2">
                                                      </div>
                                                       <script>
                                                          var loadFile1 = function(event) {
                                                          var output = document.getElementById('output1');
                                                          output.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                      </script>
                                                        <div class="fileUpload col s6 offset-s3 grid-example">
                                                               <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                              <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile1(event)">
                                                        </div>
                                                </div>

                                                

                                          <?php }else{ ?>
                                                <div class="input-field col s3 offset-s4 grid-example">
                                                      <div class="ip">
                                                        <img src="<?= $update_Question->getfile_path();  ?>" id="output2" class="img-responsive output z-depth-2">
                                                      </div>
                                                       <script>
                                                          var loadFile2 = function(event) {
                                                          var output = document.getElementById('output2');
                                                          output.src = URL.createObjectURL(event.target.files[0]);
                                                        };
                                                      </script>

                                                        <div class="fileUpload col s6 offset-s3 grid-example">
                                                              <span class="btn btn-primary btn-flat "><i class="small glyphicon glyphicon-camera"></i></span>
                                                              <input type="file" class="upload" name="quest_pic" value="$update_Question->getfile_path();"  accept="image/*" onchange="loadFile2(event)">
                                                        </div>
                                                 </div>
                                                 
                                         <?php  } ?>

                                        <div class="input-field col s12">
                                          <i class="icon icon-pencil prefix"></i>
                                          <textarea id="easy textarea1" name="question" length="50" class="materialize-textarea" required autofocus><?= $update_Question->getQuestion();  ?></textarea>
                                          <label for="easy" data-error="wrong" >Update Question in Easy:</label>
                                        </div>

                                        <div class="input-field col s6 grid-example">
                                        <i class="glyphicon glyphicon-ok prefix"></i>
                                          <input id="a" name="answer" type="text" value ="<?= $update_Question->getAnswer();  ?>" length="50" required class="validate">
                                          <label for="a" data-error="wrong" data-success="right" >Update Correct Answer:</label>
                                        </div>

                                         <div class="input-field col s6 grid-example">
                                          <i class="icon icon-eye-open prefix"></i>
                                          <input id="easy" name="hint" type="text" value="<?= $update_Question->getHint(); ?>" length="50" required class="validate">
                                          <label for="easy" data-error="wrong">Update hint:</label>
                                        </div>

                                      
                              <?php } ?>

                            <div class="input-field col s6 offset-s4 grid-example">
                                  <button class="waves-effect waves-light btn" type="submit">Update Question</button>
                              </div>
                     </form>
              </div>  

              