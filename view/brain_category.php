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
                      <a href="#!" class="center waves-effect waves-light btn transparent modal-trigger" id="list2"><i class="glyphicon glyphicon-book"  id="mn_cat"></i> Category List</a>
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
                   
                    <a href=".?action=view_user&user_id=<?= $brain_users->getUser_id(); ?>&quest=''" id="list2" class="center waves-effect waves-light btn transparent"><i class="icon-group " id="mn_cat"></i>  User Lists</a>
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



      <div id="main" class=" container">
          <div class="row m-landing-layout">
             
            <div class="col s12 offset-s1 grid-example" id="form-bottom">
            <div class="row">

              <div class="white-text teal col s6 grid-example center z-depth-2" id="list_users"><span class="flow-text" id="h_list"><i class="glyphicon glyphicon-book"></i> Category List</span></div>
            <div class="col s12"></div>
              <form action="" method="POST" name="form">
                  <input type="hidden" name="action" value="add_category">
                  <div class="input-field col s3 left">
                      <input id="category" type="text" name="category" autofocus length="10" class="validate" required>
                    <label for="category" data-error="invalid">Add Category:</label>
                    </div>
                    <div class="input-field col s3">
                      <button class="waves-effect waves-light btn" id="submit" type="Submit">Add</button>
                    </div>
               </form> 

                    <div class="input-field col s3 offset-s2">
                        <i class=" icon-search circle prefix"></i>
                        <input id="search"  type="search" class="validate">
                        <label for="search">Search Here...</label>
                  </div>
              </div>  


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

                <?php if ($quest == 'duplicate') { ?>          
                                  <strong class="red-text">Sorry!</strong> This Question is already existed...     
                <?php  }elseif ($quest == 'Added') { ?>
                                    <strong class="green-text">Success!</strong> New Question added...
                 <?php } ?>

             <?php if (empty($category)) { ?>
                              <b><p class="text-danger">Category List is Empty!!!</p></b>
              <?php }else{ ?> 
                <table class="centered responsive-table hoverable" id="tblData">
             <tbody>
               <?php  $ctr = 0;  foreach ($category as $c ) { ?>
                           <?php if ($c->getCategory() == 'Math') { ?>                     
                             <tr class="green z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                        <td><a href="#modal_addCategory<?= $c->getCid();?>"                                         
                                            class="waves-effect modal-trigger btn-flat tooltipped waves-light "
                                            data-tooltip="Add Question"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i>
                                          </a>

                                            <!------------------------Add Category-------------------------------->
                                          <div id="modal_addCategory<?= $c->getCid();?>" class="modal">
                                              <div class="modal-content">
                                                <div class="col s12">
                                                    <div class="row">
                                                        <div class="col s6">
                                                             <h4 class="black-text">Add Question:</h4>
                                                        </div>
                                                                <div class="s6">
                                                                        <div class="col s4 right"> 
                                                                               <label>Select Level:</label>
                                                                              <ul class='tabs'>
                                                                                <li class="tab col s6"><a class="active" href="#test_D1" >Easy</a></li>
                                                                                <li class="tab col s6"><a href="#test_D2">Moderate</a></li>
                                                                                <li class="tab col s6"><a href="#test_D3">Hard</a></li>
                                                                              </ul>
                                                                        </div>
                                                                        
                                                                  </div>
                                                       </div>
                                                </div>

                                                    <div id="test_D1" class="col s12">
                                                    <form action="." method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="level" value="Easy">
                                                        <input type="hidden" name="action"  value="brain_add_Easy">
                                                        <input type="hidden" name="locator" value="admin">
                                                        <div class="row">
                                                              <div class="input-field col s3">

                                                                            <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
                                                                      
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
                                                                          <textarea id="easy" name="question"  length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                          <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="a" name="correct" type="text" class="black-text validate" length="20" required>
                                                                          <label for="a" data-error="wrong" data-success="right">Input Answer:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="b" name="choiceB" type="text" class="black-text validate" length="20" required>
                                                                          <label for="b" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="c" name="choiceC" type="text" class="black-text validate" length="20" required>
                                                                          <label for="c" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="d" name="choiceD" type="text" class="black-text validate" length="20" required>
                                                                          <label for="d" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                          <i class="icon icon-eye-open prefix"></i>
                                                                          <input id="easy" type="text" name="hint" class="black-text validate" length="50" required>
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


                                                    <div id="test_D2" class="col s12">
                                                        <form action="." method="post" enctype="multipart/form-data">
                                                             <input type="hidden" name="level" value="Moderate">
                                                             <input type="hidden" name="action"  value="brain_add_Moderate">
                                                             <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                      
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Moderate:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                                    <div id="test_D3" class="col s12">
                                                            <form action="." method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="level" value="Hard">
                                                            <input type="hidden" name="action"  value="brain_add_Hard">
                                                            <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                     
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Hard:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                        </td>
                                       
                                         
                                         <td>
                                            
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu1'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu1' class='dropdown-content examples'>
                                            <!--   <li><a href="?cid=<?= $c->getCid();?>&action=brain_Delete_cat" class="red-text"><i class="glyphicon glyphicon-trash"></i> Delete </a></li> -->
                                            <li><a href="#modal_delete1" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="red-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                            <li><a href="#modal_edit1" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="blue-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                              <!-- <li class="warning confirm"><div class="ui"><button>Try me!</button></div></li> -->
                                            </ul>

                                            <!------Delete---------------->
                                            <div id="modal_delete1" class="modal ">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                     <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid(); ?>">
                                                              <input type="hidden" name="action" value="brain_Delete_cat">

                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                    <h5 class="del_cat">Delete this Subject <b><?= $c->getCategory(); ?></b> </h5>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------Update---------------->
                                              <div id="modal_edit1" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Edit Category</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                            <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid; ?>">
                                                              <input type="hidden" name="action" value="brain_update_Category">
                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-edit circle blue-text"></i>
                                                                    <div class="input-field col s12">
                                                                      <input id="edit" type="text" class="ed_cat" value="<?= $c->getCategory(); ?>" autofocus required>
                                                                      <label for="edit">Update Category:</label>
                                                                    </div>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Edit</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------------------------>


                                        </td>

                                      
                            </tr>
                          <?php }elseif ( ($c->getCategory() == 'English')) { ?>
                                <tr class="red z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                        <td><a href="#modal_addCategory<?= $c->getCid();?>"                                         
                                            class="waves-effect modal-trigger btn-flat tooltipped waves-light "
                                            data-tooltip="Add Question"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                              <!------------------------Add Category-------------------------------->
                                          <div id="modal_addCategory<?= $c->getCid();?>" class="modal">
                                              <div class="modal-content">
                                                <div class="col s12">
                                                    <div class="row">
                                                        <div class="col s6">
                                                             <h4 class="black-text">Add Question:</h4>
                                                        </div>
                                                                <div class="s6">
                                                                        <div class="col s4 right"> 
                                                                               <label>Select Level:</label>
                                                                              <ul class='tabs'>
                                                                                <li class="tab col s6"><a class="active" href="#test_A1" >Easy</a></li>
                                                                                <li class="tab col s6"><a href="#test_A2">Moderate</a></li>
                                                                                <li class="tab col s6"><a href="#test_A3">Hard</a></li>
                                                                              </ul>
                                                                        </div>
                                                                        
                                                                  </div>
                                                       </div>
                                                </div>

                                                    <div id="test_A1" class="col s12">
                                                    <form action="." method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="level" value="Easy">
                                                        <input type="hidden" name="action"  value="brain_add_Easy">
                                                        <input type="hidden" name="locator" value="admin">
                                                        <div class="row">
                                                              <div class="input-field col s3">

                                                                            <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
                                                                      
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
                                                                          <textarea id="easy" name="question"  length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                          <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="a" name="correct" type="text" class="black-text validate" length="20" required>
                                                                          <label for="a" data-error="wrong" data-success="right">Input Answer:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="b" name="choiceB" type="text" class="black-text validate" length="20" required>
                                                                          <label for="b" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="c" name="choiceC" type="text" class="black-text validate" length="20" required>
                                                                          <label for="c" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="d" name="choiceD" type="text" class="black-text validate" length="20" required>
                                                                          <label for="d" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                          <i class="icon icon-eye-open prefix"></i>
                                                                          <input id="easy" type="text" name="hint" class="black-text validate" length="50" required>
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


                                                    <div id="test_A2" class="col s12">
                                                        <form action="." method="post" enctype="multipart/form-data">
                                                             <input type="hidden" name="level" value="Moderate">
                                                             <input type="hidden" name="action"  value="brain_add_Moderate">
                                                             <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                      
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Moderate:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                                    <div id="test_A3" class="col s12">
                                                            <form action="." method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="level" value="Hard">
                                                            <input type="hidden" name="action"  value="brain_add_Hard">
                                                            <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                     
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Hard:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                        </td>
                                       
                                         
                                          <td>
                                              
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu2'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu2' class='dropdown-content'>
                                              <li><a href="#modal_delete2" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="red-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="#modal_edit2" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="blue-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>

                                              <!------Delete---------------->
                                            <div id="modal_delete2" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                     <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid(); ?>">
                                                              <input type="hidden" name="action" value="brain_Delete_cat">

                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                    <h5 class="del_cat">Delete this Subject <b><?= $c->getCategory(); ?></b> </h5>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------Update---------------->
                                              <div id="modal_edit2" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Edit Category</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                            <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid; ?>">
                                                              <input type="hidden" name="action" value="brain_update_Category">
                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-edit circle blue-text"></i>
                                                                    <div class="input-field col s12">
                                                                      <input id="edit" type="text" class="ed_cat" value="<?= $c->getCategory(); ?>" autofocus required>
                                                                      <label for="edit">Update Category:</label>
                                                                    </div>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Edit</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------------------------>
                                          </td>


                            </tr>
                             <?php }elseif ( ($c->getCategory() == 'Filipino')) { ?>
                                <tr class="brown z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                       <td><a href="#modal_addCategory<?= $c->getCid();?>"                                         
                                            class="waves-effect modal-trigger btn-flat tooltipped waves-light "
                                            data-tooltip="Add Question"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                             <!------------------------Add Category-------------------------------->
                                          <div id="modal_addCategory<?= $c->getCid();?>" class="modal">
                                              <div class="modal-content">
                                                <div class="col s12">
                                                    <div class="row">
                                                        <div class="col s6">
                                                             <h4 class="black-text">Add Question:</h4>
                                                        </div>
                                                                <div class="s6">
                                                                        <div class="col s4 right"> 
                                                                               <label>Select Level:</label>
                                                                              <ul class='tabs'>
                                                                                <li class="tab col s6"><a class="active" href="#test_F1" >Easy</a></li>
                                                                                <li class="tab col s6"><a href="#test_F2">Moderate</a></li>
                                                                                <li class="tab col s6"><a href="#test_F3">Hard</a></li>
                                                                              </ul>
                                                                        </div>
                                                                        
                                                                  </div>
                                                       </div>
                                                </div>

                                                    <div id="test_F1" class="col s12">
                                                    <form action="." method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="level" value="Easy">
                                                        <input type="hidden" name="action"  value="brain_add_Easy">
                                                        <input type="hidden" name="locator" value="admin">
                                                        <div class="row">
                                                              <div class="input-field col s3">

                                                                            <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
                                                                      
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
                                                                          <textarea id="easy" name="question"  length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                          <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="a" name="correct" type="text" class="black-text validate" length="20" required>
                                                                          <label for="a" data-error="wrong" data-success="right">Input Answer:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="b" name="choiceB" type="text" class="black-text validate" length="20" required>
                                                                          <label for="b" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="c" name="choiceC" type="text" class="black-text validate" length="20" required>
                                                                          <label for="c" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="d" name="choiceD" type="text" class="black-text validate" length="20" required>
                                                                          <label for="d" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                          <i class="icon icon-eye-open prefix"></i>
                                                                          <input id="easy" type="text" name="hint" class="black-text validate" length="50" required>
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


                                                    <div id="test_F2" class="col s12">
                                                        <form action="." method="post" enctype="multipart/form-data">
                                                             <input type="hidden" name="level" value="Moderate">
                                                             <input type="hidden" name="action"  value="brain_add_Moderate">
                                                             <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                      
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Moderate:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                                    <div id="test_F3" class="col s12">
                                                            <form action="." method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="level" value="Hard">
                                                            <input type="hidden" name="action"  value="brain_add_Hard">
                                                            <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                     
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Hard:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                        </td>
                                        
                                         
                                          <td>
                                            
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu3'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu3' class='dropdown-content'>
                                              <li><a href="#modal_delete3" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="red-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="#modal_edit3" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="blue-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>

                                              <!------Delete---------------->
                                            <div id="modal_delete3" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                     <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid(); ?>">
                                                              <input type="hidden" name="action" value="brain_Delete_cat">

                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                    <h5 class="del_cat">Delete this Subject <b><?= $c->getCategory(); ?></b> </h5>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                                  </div>
                                              </div>
                                               </form>

                                                <!------Update---------------->
                                              <div id="modal_edit3" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Edit Category</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                            <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid; ?>">
                                                              <input type="hidden" name="action" value="brain_update_Category">
                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-edit circle blue-text"></i>
                                                                    <div class="input-field col s12">
                                                                      <input id="edit" type="text" class="ed_cat" value="<?= $c->getCategory(); ?>" autofocus required>
                                                                      <label for="edit">Update Category:</label>
                                                                    </div>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Edit</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------------------------>
                                          </td>


                                      
                            </tr>
                             <?php }elseif ( ($c->getCategory() == 'Science')) { ?>
                                <tr class="amber z-depth-2 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                       <td><a href="#modal_addCategory<?= $c->getCid();?>"                                         
                                            class="waves-effect modal-trigger btn-flat tooltipped waves-light "
                                            data-tooltip="Add Question"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                              <!------------------------Add Category-------------------------------->
                                          <div id="modal_addCategory<?= $c->getCid();?>" class="modal">
                                              <div class="modal-content">
                                                <div class="col s12">
                                                    <div class="row">
                                                        <div class="col s6">
                                                             <h4 class="black-text">Add Question:</h4>
                                                        </div>
                                                                <div class="s6">
                                                                        <div class="col s4 right"> 
                                                                               <label>Select Level:</label>
                                                                              <ul class='tabs'>
                                                                                <li class="tab col s6"><a class="active" href="#test_B1" >Easy</a></li>
                                                                                <li class="tab col s6"><a href="#test_B2">Moderate</a></li>
                                                                                <li class="tab col s6"><a href="#test_B3">Hard</a></li>
                                                                              </ul>
                                                                        </div>
                                                                        
                                                                  </div>
                                                       </div>
                                                </div>

                                                    <div id="test_B1" class="col s12">
                                                    <form action="." method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="level" value="Easy">
                                                        <input type="hidden" name="action"  value="brain_add_Easy">
                                                        <input type="hidden" name="locator" value="admin">
                                                        <div class="row">
                                                              <div class="input-field col s3">

                                                                            <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
                                                                      
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
                                                                          <textarea id="easy" name="question"  length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                          <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="a" name="correct" type="text" class="black-text validate" length="20" required>
                                                                          <label for="a" data-error="wrong" data-success="right">Input Answer:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="b" name="choiceB" type="text" class="black-text validate" length="20" required>
                                                                          <label for="b" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="c" name="choiceC" type="text" class="black-text validate" length="20" required>
                                                                          <label for="c" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="d" name="choiceD" type="text" class="black-text validate" length="20" required>
                                                                          <label for="d" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                          <i class="icon icon-eye-open prefix"></i>
                                                                          <input id="easy" type="text" name="hint" class="black-text validate" length="50" required>
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


                                                    <div id="test_B2" class="col s12">
                                                        <form action="." method="post" enctype="multipart/form-data">
                                                             <input type="hidden" name="level" value="Moderate">
                                                             <input type="hidden" name="action"  value="brain_add_Moderate">
                                                             <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                      
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Moderate:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                                    <div id="test_B3" class="col s12">
                                                            <form action="." method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="level" value="Hard">
                                                            <input type="hidden" name="action"  value="brain_add_Hard">
                                                            <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                     
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Hard:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                        </td>
                                           
                                         
                                         <td>
                                          
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu4'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu4' class='dropdown-content'>
                                              <li><a href="#modal_delete4" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="red-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                              <li><a href="#modal_edit4" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="blue-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>

                                             <!------Delete---------------->
                                            <div id="modal_delete4" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                     <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid(); ?>">
                                                              <input type="hidden" name="action" value="brain_Delete_cat">

                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                    <h5 class="del_cat">Delete this Subject <b><?= $c->getCategory(); ?></b> </h5>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------Update---------------->
                                              <div id="modal_edit4" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Edit Category</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                            <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid; ?>">
                                                              <input type="hidden" name="action" value="brain_update_Category">
                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-edit circle blue-text"></i>
                                                                    <div class="input-field col s12">
                                                                      <input id="edit" type="text" class="ed_cat" value="<?= $c->getCategory(); ?>" autofocus required>
                                                                      <label for="edit">Update Category:</label>
                                                                    </div>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Edit</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------------------------>
                                          </td>


                            </tr>
                             <?php }elseif ( ($c->getCategory() == 'History')) { ?>
                                <tr class="grey z-depth-3 white-text" id="sub">
                                        <td ><?= $ctr += 1;  ?>.</td>
                                        <td ><?= $c->getCategory();  ?></td>
                                        <td>
                                           <a href="#modal_addCategory<?= $c->getCid();?>"                                         
                                            class="waves-effect modal-trigger btn-flat tooltipped waves-light "
                                            data-tooltip="Add Question"><i class="glyphicon glyphicon-plus-sign white-text"></i><i class="glyphicon glyphicon-question-sign white-text"></i></a>
                                             <!------------------------Add Category-------------------------------->
                                          <div id="modal_addCategory<?= $c->getCid();?>" class="modal">
                                              <div class="modal-content">
                                                <div class="col s12">
                                                    <div class="row">
                                                        <div class="col s6">
                                                             <h4 class="black-text">Add Question:</h4>
                                                        </div>
                                                                <div class="s6">
                                                                        <div class="col s4 right"> 
                                                                               <label>Select Level:</label>
                                                                              <ul class='tabs'>
                                                                                <li class="tab col s6"><a class="active" href="#test_C1" >Easy</a></li>
                                                                                <li class="tab col s6"><a href="#test_C2">Moderate</a></li>
                                                                                <li class="tab col s6"><a href="#test_C3">Hard</a></li>
                                                                              </ul>
                                                                        </div>
                                                                        
                                                                  </div>
                                                       </div>
                                                </div>

                                                    <div id="test_C1" class="col s12">
                                                    <form action="." method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="level" value="Easy">
                                                        <input type="hidden" name="action"  value="brain_add_Easy">
                                                        <input type="hidden" name="locator" value="admin">
                                                        <div class="row">
                                                              <div class="input-field col s3">

                                                                            <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
                                                                      
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
                                                                          <textarea id="easy" name="question"  length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                          <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="a" name="correct" type="text" class="black-text validate" length="20" required>
                                                                          <label for="a" data-error="wrong" data-success="right">Input Answer:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="b" name="choiceB" type="text" class="black-text validate" length="20" required>
                                                                          <label for="b" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3 ">
                                                                          <input id="c" name="choiceC" type="text" class="black-text validate" length="20" required>
                                                                          <label for="c" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s3">
                                                                          <input id="d" name="choiceD" type="text" class="black-text validate" length="20" required>
                                                                          <label for="d" data-error="wrong" data-success="right" >Input Choice:</label>
                                                                </div>

                                                                <div class="input-field col s12">
                                                                          <i class="icon icon-eye-open prefix"></i>
                                                                          <input id="easy" type="text" name="hint" class="black-text validate" length="50" required>
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


                                                    <div id="test_C2" class="col s12">
                                                        <form action="." method="post" enctype="multipart/form-data">
                                                             <input type="hidden" name="level" value="Moderate">
                                                             <input type="hidden" name="action"  value="brain_add_Moderate">
                                                             <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                      
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Moderate:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                                    <div id="test_C3" class="col s12">
                                                            <form action="." method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="level" value="Hard">
                                                            <input type="hidden" name="action"  value="brain_add_Hard">
                                                            <input type="hidden" name="locator" value="admin">
                                                            <div class="row">
                                                                 <div class="input-field col s3">
                                                                     
                                                                              <input type="text" class="black-text center" name="subject" value="<?= $c->getCategory();  ?>" readonly>
                                                                             <label>Subject:</label>
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
                                                                                        <textarea id="easy" name="question" length="100" class="materialize-textarea black-text" required autofocus ></textarea>
                                                                                        <label for="easy" data-error="wrong" >Add Question to Hard:</label>
                                                                              </div>

                                                                              <div class="input-field col s12 ">
                                                                                        <i class=" glyphicon glyphicon-ok prefix"></i>
                                                                                        <input id="a" name="answer" type="text" length="20" required class="validate black-text">
                                                                                        <label for="a" data-error="wrong" data-success="right">Answer:</label>
                                                                              </div>


                                                                              <div class="input-field col s12">
                                                                                        <i class="icon icon-eye-open prefix"></i>
                                                                                        <input id="easy" type="text" name="hint" length="50" class="validate black-text" required>
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
                                        </td>
                                          
                                          <td>
                    
                                             <a class='dropdown-button btn-flat' href='#' data-activates='dropdown_menu5'><i class="glyphicon glyphicon-cog"></i></a>
                                             <ul id='dropdown_menu5' class='dropdown-content'>
                                             <li><a href="#modal_delete5" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="red-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-trash"></i> Delete </a></li>
                                             <li><a href="#modal_edit5" data-toggle="modal" data-target="#modal_edit<?= $c->getCid(); ?>" class="blue-text waves-effect waves-light modal-trigger"><i class="glyphicon glyphicon-edit"></i> Update</a></li>
                                            </ul>

                                              <!------Delete---------------->
                                            <div id="modal_delete5" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Are you Sure?</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                     <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid(); ?>">
                                                              <input type="hidden" name="action" value="brain_Delete_cat">

                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-trash circle red-text"></i>
                                                                    <h5 class="del_cat">Delete this Subject <b><?= $c->getCategory(); ?></b> </h5>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Delete</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------Update---------------->
                                              <div id="modal_edit5" class="modal">
                                                  <div class="modal-content">
                                                    <h4 class="head_ed">Edit Category</h4>
                                                   <!--  <p class="head2"><?= $c->getCategory(); ?></p> -->
                                                      <div class="row">
                                                            <form class="col s12" action="." method="POST">
                                                              <input type="hidden" name="cid" value="<?= $c->getCid; ?>">
                                                              <input type="hidden" name="action" value="brain_update_Category">
                                                                <div class="row">
                                                                    <i class="large glyphicon glyphicon-edit circle blue-text"></i>
                                                                    <div class="input-field col s12">
                                                                      <input id="edit" type="text" class="ed_cat" value="<?= $c->getCategory(); ?>" autofocus required>
                                                                      <label for="edit">Update Category:</label>
                                                                    </div>
                                                                </div>
                                                           
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="submit" class="waves-effect waves-green btn blue right">Edit</button>
                                                    <button type="button" class="modal-action modal-close waves-effect waves-green btn red left">Close</button>
                                              
                                                  </div>
                                              </div>
                                               </form>

                                                <!------------------------>
                                          </td>


                            </tr>
                          <?php } ?>
                   <?php } ?>
            </tbody>
          </table>
     <?php } ?>


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
              <input type="hidden" name="locator" value="admin">
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
                   <input type="hidden" name="locator" value="admin">
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
                  <input type="hidden" name="locator" value="admin">
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

   
         
    
  





