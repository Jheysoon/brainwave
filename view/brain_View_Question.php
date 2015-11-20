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
                    <a href="#!" class="center waves-effect waves-light btn transparent" id="list2"><i class="glyphicon glyphicon-eye-open " id="mn_cat"></i><i class="glyphicon glyphicon-question-sign" id="mn_cat"></i> View Question</a>
                  </ul>
            </div>
        </li>

        <li class="collection-item">
            <div class="collapsible-header "><i class="tiny glyphicon glyphicon-user circle" id="mn_cat"></i> <b>USERS</b></div>
              <div class="collapsible-body">
                  <ul>
                   
                    <a href=".?action=view_user" id="list2" class="center waves-effect waves-light btn transparent"><i class="icon-group " id="mn_cat"></i>  User Lists</a>
                    <li class="divider"></li>
                    <a href="#!" id="list2" class="center waves-effect waves-light btn transparent"><i class="glyphicon glyphicon-pencil"></i> User Logs</a>
                    <li class="divider"></li>
                    <a href="#!" id="list2" class="center waves-effect waves-light btn transparent"><i class="glyphicon glyphicon-wrench"></i> User Update</a>                 
                   
                  </ul>       
              </div>
        </li>

      </ul>
    <hr>
     <!--  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a> -->
  </div> 

   
    <ul id="dropdown1" class="dropdown-content">
      <div><img src="<?= $brain_users->getAcc_path(); ?>" class="img-responsive" id="img" ></div> 
       <li><a href="#admin_profile" id="list" class="waves-effect waves-light modal-trigger">My Profile</a></li>
    
      <li class="divider"></li>
        <li><a href=".?action=logout" 
        id="list" 
          class="animsition-link"
          data-animsition-out="fade-out"
          data-animsition-out-duration="500">Logout</a></li>
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
            
               <?php  $ctr = 0;  foreach ($category as $c ) { ?>
                          
                <?php } ?>
           
      <div class="container" >
          <div class="row">
                <div class="col s12 offset-s1 grid-example" id="form-bottom">
             <?php if ($get_Category->getCategory() == 'English') { ?>
                     <div class="white-text red col s10 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-text-background"></i> Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></span></div>
                     <!-- <div class="card-panel red  white-text">Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div> -->
              <?php }elseif ($get_Category->getCategory() == 'Filipino') { ?>
                    <div class="white-text brown col s10 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-text-background"></i> Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></span></div>
                   <!--  <div class="card-panel brown white-text">Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div> -->
              <?php }elseif ($get_Category->getCategory() == 'Math') { ?>
                    <div class="white-text green col s10 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-text-background"></i> Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></span></div>
                    <!-- <div class="card-panel green white-text">Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div> -->
              <?php }elseif ($get_Category->getCategory() == 'Science') { ?>
                    <div class="white-text amber col s10 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-text-background"></i> Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></span></div>
                    <!-- <div class="card-panel amber white-text">Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div> -->
              <?php }elseif ($get_Category->getCategory() == 'History') { ?>
                    <div class="white-text grey col s10 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-text-background"></i> Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></span></div>
                    <!-- <div class="card-panel grey white-text">Viewing Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div> -->
              <?php } ?>
                <?php if ($dup == 'duplicate') { ?>
            
                    <strong>Error!</strong> Duplicate Category.
                
                   <?php }elseif ($dup == 'delete') {?>

                        <strong class="green-text">Success!</strong> Question Deleted.
                     
                  <?php }elseif ($dup == 'Updated') { ?>
                        <strong>Success!</strong> Category Updated.
                  <?php } ?>

                  <?php if ($quest == 'duplicate') { ?>          
                                  <strong class="red-text">Sorry!</strong> This Question is already existed...     
                  <?php  }elseif ($quest == 'Added') { ?>
                                      <strong class="green-text">Success!</strong> New Question added...
                   <?php } ?>
                <div class="row">
                  <div class="col s12">
                    <ul class="tabs">
                       <li class="tab col s3"><a class="active" href="#easy">EASY</a></li>
                        <li class="tab col s3"><a  href="#moderate">MODERATE</a></li>
                        <li class="tab col s3 "><a href="#hard">HARD</a></li>
                    </ul>
                  </div>
                  
                   
                  <div id="easy" class="col s12 z-depth-2 " >

                  
                  <?php if (empty($question_Easy)) {
                               echo '<b><p class="text-danger">Question List is Empty!!!</p></b>'; ?>
                  <?php }else{ ?>                
                                       <?php $ctr = 0; foreach ($question_Easy as $q) { ?>
                                                    <ul class="collection with-header">
                                                  <?php if (empty($q->getfile_path())) { ?>
                                                 
                                                    <li class="collection-header "> 
                                                            <img src="./pics/question.png" height="120" width="150" class="img-responsive z-depth-1 right">                             
                                                            <p class="left-align"><?= $ctr += 1;  ?>.  <?= $q->getQuestion();  ?>  </p>
                                                            <label class="left-align">Hint: <b><?= $q->getHint();  ?></b></label>  
                                                                                    
                                                    </li>
                                                                                       
                                                <?php  }else{ ?>
                                                 
                                                    <li class="collection-header "> 
                                                            <img src="<?= $q->getfile_path(); ?>" height="120" width="150" class="img-responsive z-depth-1 right">                             
                                                            <p class="left-align"><?= $ctr += 1;  ?>.  <?= $q->getQuestion();  ?>  </p>
                                                            <label class="left-align">Hint: <b><?= $q->getHint();  ?></b></label>                             
                                                    </li>
                                                    
                                                  <?php } ?>
                                                    <li class="col s1 left-align"><label class=" black-text"><strong>Choices</strong> </label></li>
                                                    <li class="col s2 center-align"><p><?= $q->getCorrect();  ?></p></li>
                                                    <li class=" col s2 center-align"><p><?= $q->getChoiceB();  ?></p></li>
                                                    <li class=" col s2 center-align"><p><?= $q->getChoiceC();  ?></p></li>
                                                    <li class=" col s2 center-align"><p><?= $q->getChoiceD();  ?></p></li>
                                                    <li class="col s3 right-align">
                                                          <p>
                                                           <!--  <a href="#view_question<?=$q->getQid();?>" class="btn waves-effect waves-light modal-trigger transparent"><i class="small glyphicon glyphicon-trash red-text"></a> -->
                                                            <a href="#delete_question<?= $q->getQid();?>" class="waves-effect waves-red modal-trigger transparent " title="Remove"><i class="small glyphicon glyphicon-trash red-text"></i></a>
                                                            <a href="#view_question<?=$q->getQid();?>" class="waves-effect waves-blue modal-trigger  transparent" title="Edit"><i class="small glyphicon glyphicon-edit blue-text"></i> </a>
                                                          <!--   <a href=".?qid=<?= $q->getQid();?>&action=brain_DeleteQuestion" class="waves-effect waves-red transparent " title="Remove"><i class="small glyphicon glyphicon-trash red-text"></i></a> -->
                                                            <!-- <a href=".?qid=<?= $q->getQid();?>&action=brain_UpdateQuestion&level=Easy&dup=''" class="waves-effect waves-blue  transparent" title="Edit"><i class="small glyphicon glyphicon-edit blue-text"></i> </a> -->
                                                          </p>
                                                          <!------------------Delete Question-------------------------->
                                                             <div id="delete_question<?= $q->getQid();?>" class="modal">
                                                                  <div class="modal-content">
                                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                                  
                                                                      <div class="row">
                                                                     <form class="col s12" action="." method="POST">
                                                                              <input type="hidden" name="qid" value="<?= $q->getQid(); ?>">
                                                                              <input type="hidden" name="action" value="brain_DeleteQuestion">

                                                                                <div class="row">
                                                                                    <div class="col s7">
                                                                                         <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                                    </div>
                                                                                    <div class="col s12">
                                                                                        <h5 class="del_cat">Delete this Question <b><?= $q->getQuestion(); ?></b> </h5>
                                                                                    </div>
                                                                                                                         
                                                                                </div>
                                                                           
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                                                    </form>
                                                                  </div>
                                                              
                                                           </div>


                                                          <!------------------Update Question-------------------------->
                                                            <div id="view_question<?=$q->getQid();?>" class="modal modal modal-fixed-footer">
                                                              <div class="modal-content">
                                                                <label>Edit Question: Subject <b><?= $q->getSubject(); ?></b> </label>
                                                                <div class="row">
                                                                    <form  action="." method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="bid" value="<?= $q->getQid();  ?>">
                                                                    <input type="hidden" name="level" value="<?= $q->getLevel();  ?>">
                                                                    <input type="hidden" name="subject" value="<?= $q->getSubject(); ?>">
                                                                    <input type="hidden" name="action" value="brain_update_Question">
                                                                    
                                                                      <div class="row">
                                                                     <?php if (empty($q->getfile_path())) { ?>
                                                                          <div class=" col s3">
                                                                             <div class="ip">
                                                                                <img src="./pics/question.png" id="outputQuest1" class="img-responsive output z-depth-2">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var output = document.getElementById('outputQues1');
                                                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>
                                                                    <?php }else{ ?>
                                                                          <div class="col s3">
                                                                             <div class="ip_view">
                                                                                <img src="<?= $q->getfile_path(); ?>" id="outputQuest1" class="img-responsive output z-depth-2">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var outputQuest1 = document.getElementById('outputQuest1');
                                                                                  outputQuest1.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat"><i class="small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>


                                                                    <?php } ?>
                                                                        

                                                                        <div class="col s9">
                                                                                                                                              
                                                                            <div class="input-field col s12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_prefix" type="text" name="question" value="<?= $q->getQuestion();  ?>" class="validate">
                                                                              <label for="icon_prefix">Question:</label>
                                                                            </div>

                                                                            <div class="input-field col s6">
                                          
                                                                              <input id="ans" type="text" name="correct" value="<?= $q->getCorrect();  ?>" class="validate" required>
                                                                              <label for="ans">Edit Correct Answer:</label>
                                                                            </div>

                                                                             <div class="input-field col s6">
                                                                             
                                                                              <input id="choiceB" type="text" name="choiceB" value="<?= $q->getChoiceB();  ?>" class="validate" required>
                                                                              <label for="choiceB">Edit Another Choice:</label>
                                                                            </div>

                                                                             <div class="input-field col s6">
                                                                              
                                                                              <input id="choiceC" type="text" name="choiceC" value="<?= $q->getChoiceC();  ?>" class="validate" required>
                                                                              <label for="choiceC">Edit Another Choice:</label>
                                                                            </div>

                                                                             <div class="input-field col s6">
                                                                             
                                                                              <input id="choiceD" type="text" name="choiceD" value="<?= $q->getChoiceD();  ?>" class="validate" required>
                                                                              <label for="choiceD">Edit Another Choice:</label>
                                                                            </div>

                                                                            <div class="input-field col s12">
                                                                             
                                                                              <input id="hint" type="text" name="hint" value="<?= $q->getHint();  ?>" class="validate" required>
                                                                              <label for="hint">Edit Hint:</label>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                   
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button class="waves-effect waves-green btn-flat blue right white-text" type="submit">Edit</button>
                                                                <a href="#!" type="button" class="red modal-action modal-close white-text waves-effect waves-green btn-flat left">Close</a>
                                                              </div>
                                                            </div>
                                                        </form>
                                                             <!------------------Update Question-------------------------->
                                                      </li>
                                                  </ul>
                                                 <?php } ?>
                                                                         
                                     <?php } ?>
                  </div>

                  <div id="moderate" class="col s12 z-depth-2"> 
                       <?php if (empty($question_Moderate)) {
                                                echo '<b><p class="text-danger">Question List is Empty!!!</p></b>'; ?>
                                          <?php }else{ ?>
         
                                              <?php 
                                                    $ctr = 0;
                                                    foreach ($question_Moderate as $q) { ?>
                                                     <ul class="collection with-header ">                                               
                                                        <li class="collection-header "> 
                                                  <?php if (empty($q->getfile_path())) { ?>
                                                      
                                                              <img src="./pics/question.png" height="120" width="150" class="img-responsive z-depth-1 right">                             
                                                              <p class="left-align"><?= $ctr += 1;  ?>.  <?= $q->getQuestion();  ?>  </p>
                                                              <label class="left-align">Hint: <b><?= $q->getHint();  ?></b></label>                                                                                    
                                                                                             
                                                   <?php  }else{ ?>
                                                       
                                                              <img src="<?= $q->getfile_path(); ?>" height="120" width="150" class="img-responsive z-depth-1 right">                             
                                                              <p class="left-align"><?= $ctr += 1;  ?>.  <?= $q->getQuestion();  ?>  </p>
                                                              <label class="left-align">Hint: <b><?= $q->getHint();  ?></b></label>                             
                                                                                                                                                   
                                                  <?php } ?>
                                                         </li>
                                                          <li class="col s1 left-align"><label class=" black-text"><strong>Answer</strong> </label></li>
                                                              <li class="col s2 center-align"><p><?= $q->getAnswer();  ?></p></li>  
                                                           <li class="collection-item col s9 right-align">
                                                            <p>
                                                              <a href="#delete_question<?= $q->getQid();?>" class="waves-effect waves-red modal-trigger transparent " title="Remove"><i class="small glyphicon glyphicon-trash red-text"></i></a>
                                                             <!--  <a href=".?qid=<?= $q->getQid();?>&action=brain_DeleteQuestion" class="waves-effect waves-red transparent " title="Remove"><i class="small glyphicon glyphicon-trash red-text"></i></a> -->
                                                              <a href="#view_question<?=$q->getQid();?>" class="waves-effect waves-blue modal-trigger  transparent" title="Edit"><i class="small glyphicon glyphicon-edit blue-text"></i> </a>
                                                             <!--  <a href=".?qid=<?= $q->getQid();?>&action=brain_UpdateQuestion&level=Moderate&dup=''" class="waves-effect waves-blue  transparent" title="Edit"><i class="small glyphicon glyphicon-edit blue-text"></i> </a> -->
                                                            </p>
                                                            <!------------------Delete Question-------------------------->
                                                             <div id="delete_question<?= $q->getQid();?>" class="modal">
                                                                  <div class="modal-content">
                                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                                      <div class="row">
                                                                     <form class="col s12" action="." method="POST">
                                                                              <input type="hidden" name="qid" value="<?= $q->getQid(); ?>">
                                                                              <input type="hidden" name="action" value="brain_DeleteQuestion">

                                                                                <div class="row">
                                                                                    <div class="col s7">
                                                                                         <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                                    </div>
                                                                                    <div class="col s12">
                                                                                        <h5 class="del_cat">Delete this Question <b><?= $q->getQuestion(); ?></b> </h5>
                                                                                    </div>
                                                                                   
                                                                                   
                                                                                </div>
                                                                           
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                                              
                                                                  </div>
                                                              </form>
                                                           </div>
                                      

                                                           <!------------------Update Question-------------------------->
                                                            <div id="view_question<?=$q->getQid();?>" class="modal modal modal-fixed-footer">
                                                              <div class="modal-content">
                                                                <label>Edit Question: Subject <b><?= $q->getSubject(); ?></b> </label>
                                                                <div class="row">
                                                                    <form  action="." method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="bid" value="<?= $q->getQid();  ?>">
                                                                    <input type="hidden" name="level" value="<?= $q->getLevel();  ?>">
                                                                    <input type="hidden" name="subject" value="<?= $q->getSubject(); ?>">
                                                                    <input type="hidden" name="action" value="brain_update_Question">
                                                                    
                                                                      <div class="row">
                                                                     <?php if (empty($q->getfile_path())) { ?>
                                                                          <div class=" col s3">
                                                                             <div class="ip_view">
                                                                                <img src="./pics/question.png" id="outputQuest1" class="img-responsive output z-depth-2">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var output = document.getElementById('outputQues1');
                                                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>
                                                                    <?php }else{ ?>
                                                                          <div class="col s3">
                                                                             <div class="ip_view">
                                                                                <img src="<?= $q->getfile_path(); ?>" id="outputQuest1" class="img-responsive output z-depth-2">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var outputQuest1 = document.getElementById('outputQuest1');
                                                                                  outputQuest1.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat"><i class="small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>


                                                                    <?php } ?>
                                                                        

                                                                        <div class="col s9">
                                                                                                                                              
                                                                            <div class="input-field col s12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_prefix" type="text" name="question" value="<?= $q->getQuestion();  ?>" class="validate">
                                                                              <label for="icon_prefix">Question:</label>
                                                                            </div>

                                                                             <div class="input-field col s12">
                                                                              <input id="hint" type="text" name="hint" value="<?= $q->getAnswer();  ?>" class="validate" required>
                                                                              <label for="hint">Edit Answer:</label>
                                                                            </div>

                                                                            <div class="input-field col s12">
                                                                             
                                                                              <input id="hint" type="text" name="hint" value="<?= $q->getHint();  ?>" class="validate" required>
                                                                              <label for="hint">Edit Hint:</label>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                   
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button class="waves-effect waves-green btn-flat blue right white-text" type="submit">Edit</button>
                                                                <a href="#!" type="button" class="red modal-action modal-close white-text waves-effect waves-green btn-flat left">Close</a>
                                                              </div>
                                                            </div>
                                                        </form>
                                                             <!------------------Update Question-------------------------->
                                                        </li>
                                                  </ul>
                                                 <?php } ?>
                                          <?php } ?>
                  </div>
                
                  <div id="hard" class="col s12 z-depth-2"> 
                       <?php if (empty($question_Hard)) {
                                                echo '<b><p class="text-danger">Question List is Empty!!!</p></b>'; ?>
                                          <?php }else{ ?>
                                                      
                                            <?php 
                                                    $ctr = 0;
                                                    foreach ($question_Hard as $q) { ?>
                                                     <ul class="collection with-header ">                                               
                                                        <li class="collection-header "> 
                                                  <?php if (empty($q->getfile_path())) { ?>
                                                      
                                                              <img src="./pics/question.png" height="100" width="150" class="img-responsive z-depth-1 right">                             
                                                              <p class="left-align"><?= $ctr += 1;  ?>.  <?= $q->getQuestion();  ?>  </p>
                                                              <label class="left-align">Hint: <b><?= $q->getHint();  ?></b></label>                                                                                    
                                                                                             
                                                   <?php  }else{ ?>
                                                       
                                                              <img src="<?= $q->getfile_path(); ?>" height="100" width="150" class="img-responsive z-depth-1 right">                             
                                                              <p class="left-align"><?= $ctr += 1;  ?>.  <?= $q->getQuestion();  ?>  </p>
                                                              <label class="left-align">Hint: <b><?= $q->getHint();  ?></b></label>                             
                                                                                                                                                   
                                                  <?php } ?>
                                                         <li class="col s1 left-align"><label class=" black-text"><strong>Answer</strong> </label></li>
                                                         </li>
                                                              <li class="col s2 center-align"><p><?= $q->getAnswer();  ?></p></li>  
                                                        <li class="collection-item col s9 right-align">
                                                            <p>
                                                               <a href="#delete_question<?= $q->getQid();?>" class="waves-effect waves-red modal-trigger transparent " title="Remove"><i class="small glyphicon glyphicon-trash red-text"></i></a>
                                                              <!-- <a href=".?qid=<?= $q->getQid();?>&action=brain_DeleteQuestion" class="waves-effect waves-red transparent " title="Remove"><i class="small glyphicon glyphicon-trash red-text"></i></a> -->
                                                             <!--  <a href=".?qid=<?= $q->getQid();?>&action=brain_UpdateQuestion&level=Hard&dup=''" class="waves-effect waves-blue  transparent" title="Edit"><i class="small glyphicon glyphicon-edit blue-text"></i> </a> -->
                                                               <a href="#view_question<?=$q->getQid();?>" class="waves-effect waves-blue modal-trigger  transparent" title="Edit"><i class="small glyphicon glyphicon-edit blue-text"></i> </a>
                                                            </p>
                                                            <!--------------------------Delete Question-------------------------->
                                                             <div id="delete_question<?= $q->getQid();?>" class="modal">
                                                                  <div class="modal-content">
                                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                                      <div class="row">
                                                                     <form class="col s12" action="." method="POST">
                                                                              <input type="hidden" name="qid" value="<?= $q->getQid(); ?>">
                                                                              <input type="hidden" name="action" value="brain_DeleteQuestion">

                                                                                <div class="row">
                                                                                    <div class="col s7">
                                                                                         <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                                    </div>
                                                                                    <div class="col s12">
                                                                                        <h5 class="del_cat">Delete this Question <b><?= $q->getQuestion(); ?></b> </h5>
                                                                                    </div>
                                                                                   
                                                                                   
                                                                                </div>
                                                                           
                                                                      </div>
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                                              
                                                                  </div>
                                                              </form>
                                                           </div>
                                                           <!------------------Update Question-------------------------->
                                                            <div id="view_question<?=$q->getQid();?>" class="modal modal modal-fixed-footer">
                                                              <div class="modal-content">
                                                                <label>Edit Question: Subject <b><?= $q->getSubject(); ?></b> </label>
                                                                <div class="row">
                                                                    <form  action="." method="post" enctype="multipart/form-data">
                                                                    <input type="hidden" name="bid" value="<?= $q->getQid();  ?>">
                                                                    <input type="hidden" name="level" value="<?= $q->getLevel();  ?>">
                                                                    <input type="hidden" name="subject" value="<?= $q->getSubject(); ?>">
                                                                    <input type="hidden" name="action" value="brain_update_Question">
                                                                    
                                                                      <div class="row">
                                                                     <?php if (empty($q->getfile_path())) { ?>
                                                                          <div class=" col s3">
                                                                             <div class="ip_view">
                                                                                <img src="./pics/question.png" id="outputQuest1" class="img-responsive output z-depth-2">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var output = document.getElementById('outputQues1');
                                                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>
                                                                    <?php }else{ ?>
                                                                          <div class="col s3">
                                                                             <div class="ip_view">
                                                                                <img src="<?= $q->getfile_path(); ?>" id="outputQuest1" class="img-responsive output z-depth-2">
                                                                              </div>
                                                                               <script>
                                                                                  var loadFile = function(event) {
                                                                                  var outputQuest1 = document.getElementById('outputQuest1');
                                                                                  outputQuest1.src = URL.createObjectURL(event.target.files[0]);
                                                                                };
                                                                              </script>
                                                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                                                       <span class="btn btn-primary btn-flat"><i class="small glyphicon glyphicon-camera"></i></span>
                                                                                      <input type="file" class="upload" name="quest_pic" accept="image/*" onchange="loadFile(event)">
                                                                                </div>
                                                                        </div>


                                                                    <?php } ?>
                                                                        

                                                                        <div class="col s9">
                                                                                                                                              
                                                                            <div class="input-field col s12">
                                                                              <i class="glyphicon glyphicon-pencil prefix"></i>
                                                                              <input id="icon_prefix" type="text" name="question" value="<?= $q->getQuestion();  ?>" class="validate">
                                                                              <label for="icon_prefix">Question:</label>
                                                                            </div>

                                                                             <div class="input-field col s12">
                                                                              <input id="hint" type="text" name="hint" value="<?= $q->getAnswer();  ?>" class="validate" required>
                                                                              <label for="hint">Edit Answer:</label>
                                                                            </div>

                                                                            <div class="input-field col s12">
                                                                             
                                                                              <input id="hint" type="text" name="hint" value="<?= $q->getHint();  ?>" class="validate" required>
                                                                              <label for="hint">Edit Hint:</label>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                   
                                                                  </div>
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button class="waves-effect waves-green btn-flat blue right white-text" type="submit">Edit</button>
                                                                <a href="#!" type="button" class="red modal-action modal-close white-text waves-effect waves-green btn-flat left">Close</a>
                                                              </div>
                                                            </div>
                                                        </form>
                                                             <!------------------Update Question-------------------------->
                                                        </li>
                                                  </ul>
                                                 <?php } ?>
                                          <?php } ?>

                        </div>
                </div>
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
              <input type="hidden" name="locator" value="View_brain_Question">
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
                   <input type="hidden" name="locator" value="View_brain_Question">
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
                  <input type="hidden" name="locator" value="View_brain_Question">
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
            <button class="modal-action modal-close waves-effect waves-light btn red left" title="Close">Close</button>
            <a href="?user_id=<?= $brain_users->getUser_id();?>&action=brain_UpdateAccount" class="waves-effect waves-light btn blue right" title="Edit or Update">Edit</a>
          </div>
  </div>


   
         
     
              
       