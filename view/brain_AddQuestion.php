<body>
<?php if (isset($_SESSION['user'])) { ?>
 <div class="side-nav fixed teal accent-4 ">
        <div class="logo" >
             <a href="#" class="brand-logo"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
      </div>
      <hr>
      <ul>
       
       <li class="z-depth-3 active1 collection-item avatar " id="active1"><a href=".?action=admin&dup=''&user_id=<?= $brain_users->getUser_id(); ?>" id="list2" 
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
            <li><a class="dropdown-button white-text text-darken-2 waves-effect waves-light" data-beloworigin="true" href="#!" data-activates="dropdown1"><?= $brain_users->getLname() . ' , ' . $brain_users->getFname() . '  ' . $brain_users->getMname(); ?><!-- <i class="icon icon-sort"></i> --></a></li>
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
      data-animsition-out-duration="500">

          <div class="row ">
                <div class="col s12 offset-s1 grid-example z-depth-2" id="form-bottom"><span class="flow-text">
              <?php if ($get_Category->getCategory() == 'English') { ?>
                     <div class="card-panel red lighten-2 white-text">Adding Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div>
              <?php }elseif ($get_Category->getCategory() == 'Filipino') { ?>
                    <div class="card-panel brown  white-text">Adding Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div>
              <?php }elseif ($get_Category->getCategory() == 'Math') { ?>
                    <div class="card-panel green  white-text">Adding Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div>
              <?php }elseif ($get_Category->getCategory() == 'Science') { ?>
                    <div class="card-panel amber white-text">Adding Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div>
              <?php }elseif ($get_Category->getCategory() == 'History') { ?>
                    <div class="card-panel grey  white-text">Adding Questions to Subject <b> <?= $get_Category->getCategory(); ?></b></div>
              <?php } ?>
             
                           <?php if ($dup == 'duplicate') { ?>
                                  <!--  <a href="#" load="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )"></a>             -->      
                                  <strong class="red-text">Sorry!</strong> This Question is already existed...
                                
                            <?php  }elseif ($dup == 'Added') { ?>
                                  <strong class="green-text">Success!</strong> New Question added...
                             <?php } ?>
                <div class="row ">
                  <div class="col s12">
                    <ul class="tabs">
                       <li class="tab col s3"><a class="active" href="#easy">EASY</a></li>
                        <li class="tab col s3"><a  href="#moderate">MODERATE</a></li>
                        <li class="tab col s3 "><a href="#hard">HARD</a></li>
                    </ul>
                  </div>
                   
                  <div id="easy" class="col s12">
                  
                  <form class="col s12" action="." method="POST" enctype="multipart/form-data">

                          <input type="hidden" name="action" value="brain_add_Easy">
                          <input type="hidden" name="subject" value="<?= $get_Category->getCategory(); ?>">

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

                             <div class="input-field col s12">
                                <i class="icon icon-pencil prefix"></i>
                                <textarea id="easy" name="question" length="100" class="materialize-textarea" required autofocus ></textarea>
                                <label for="easy" data-error="wrong" >Add Question to Easy:</label>
                              </div>

                              <div class="input-field col s3  grid-example">
                                <input id="a" name="correct" type="text" length="20" required class="validate">
                                <label for="a" data-error="wrong" data-success="right">Input correct Answer:</label>
                              </div>

                               <div class="input-field col s3 o grid-example">
                                <input id="b" name="choiceB" type="text" length="20" required class="validate">
                                <label for="b" data-error="wrong" data-success="right" >Input another Answer</label>
                              </div>

                               <div class="input-field col s3  grid-example">
                                <input id="c" name="choiceC" type="text" length="20" required class="validate">
                                <label for="c" data-error="wrong" data-success="right" >Input another Answer</label>
                              </div>

                               <div class="input-field col s3  grid-example">
                                <input id="d" name="choiceD" type="text" length="20" required class="validate">
                                <label for="d" data-error="wrong" data-success="right" >Input another Answer</label>
                              </div>

                              <div class="input-field col s12">
                                <i class="icon icon-eye-open prefix"></i>
                                <textarea id="easy" name="hint" length="50" class="materialize-textarea" required></textarea>
                                <label for="easy" data-error="wrong" >Input hint:</label>
                              </div>

                               <div class="input-field col s6 offset-s4 grid-example">
                                  <button class="waves-effect waves-light btn" type="submit">Submit Question</button>
                              </div>

                        </form>



                  </div>



                  <div id="moderate" class="col s12"> 
                      <form class="col s12" action="." method="POST" enctype="multipart/form-data">
                          
                            <input type="hidden" name="action" value="brain_add_Moderate">
                            <input type="hidden" name="subject" value="<?= $get_Category->getCategory(); ?>">

                             <div class="input-field col s3 offset-s4 grid-example">
                                             <div class="ip">
                                                <img src="./pics/question.png" id="output2" class="img-responsive output z-depth-2">
                                              </div>
                                               <script>
                                                  var loadFile2 = function(event) {
                                                  var output = document.getElementById('output2');
                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                              </script>
                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                      <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                      <input type="file" class="upload" name="quest_pic"  accept="image/*" onchange="loadFile2(event)">
                                                </div>
                              </div>

                             <div class="input-field col s12">
                                <i class="icon icon-pencil prefix"></i>
                               <textarea id="mod1" name="question" data-error="wrong" length="100" class="materialize-textarea" required></textarea>
                                <label for="mod1">Add Question to Moderate:</label>
                              </div>

                              <div class="input-field col s12">
                                <i class="icon icon-eye-open prefix"></i>
                                <textarea id="easy" name="hint" length="30" class="materialize-textarea" required></textarea>
                                <label for="easy" data-error="wrong" >Input hint:</label>
                              </div>

                              <div class="input-field col s3 offset-s4 grid-example">
                                <input id="answer" name="answer" type="text" length="50" class="validate" required>
                                <label for="answer" data-error="wrong" data-success="right">Input Answer:</label>
                              </div>

                              <div class="input-field col s4 offset-s4 grid-example">
                                  <button class="waves-effect waves-light btn">Submit Question</button>
                              </div>

                        </form>
                  </div>



                
                  <div id="hard" class="col s12 "> 
                       <form class="col s12" action="." method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="action" value="brain_add_Hard">
                              <input type="hidden" name="subject" value="<?= $get_Category->getCategory(); ?>">

                               <div class="input-field col s3 offset-s4 grid-example">
                                             <div class="ip">
                                                <img src="./pics/question.png" id="output3" class="img-responsive output z-depth-2">
                                              </div>
                                               <script>
                                                  var loadFile3 = function(event) {
                                                  var output = document.getElementById('output3');
                                                  output.src = URL.createObjectURL(event.target.files[0]);
                                                };
                                              </script>
                                                <div class="fileUpload col s6 offset-s3 grid-example">
                                                      <span class="btn btn-primary btn-flat "><i class=" small glyphicon glyphicon-camera"></i></span>
                                                      <input type="file" class="upload" name="quest_pic"  accept="image/*" onchange="loadFile3(event)">
                                                </div>
                              </div>
 
                             <div class="input-field col s12">
                                <i class="icon icon-pencil prefix"></i>
                               <textarea id="hard" name="question" data-error="wrong" length="100" class="materialize-textarea" required></textarea>
                                <label for="hard">Add Question to Hard:</label>
                              </div>

                               <div class="input-field col s12">
                                <i class="icon icon-eye-open prefix"></i>
                                <textarea id="easy" name="hint" length="30" class="materialize-textarea" required></textarea>
                                <label for="easy" data-error="wrong" >Input hint:</label>
                              </div>
                              
                              <div class="input-field col s3 offset-s4 grid-example">
                                <input id="answer" name="answer" type="text" length="50" class="validate" required>
                                <label for="answer" data-error="wrong" data-success="right">Input Answer:</label>
                              </div>

                              <div class="input-field col s4 offset-s4 grid-example">
                                  <button class="waves-effect waves-light btn">Submit Question</button>
                              </div>

                        </form> 

                </div>
                </div>
          </div>

      </div>



