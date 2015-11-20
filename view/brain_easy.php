<body>
   
   <div class="fixed-action-btn" style="top: 55px; left: 15px;">
    <a class="btn-floating btn-large red waves-effect waves-light red btn tooltipped" data-position="right" data-delay="60" data-tooltip="Menus">
      <i class="large glyphicon glyphicon-align-justify"></i>
    </a>
    <ul>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating purple waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Create Room" ><i class=" glyphicon glyphicon-edit"></i></a></li>
      <li><a href="#" onclick="Materialize.toast('You are in game! Not Allowed', 3000, 'rounded' )" class="btn-floating blue waves-effect waves-light btn tooltipped" data-position="right" data-delay="50" data-tooltip="Help"><i class="glyphicon glyphicon-info-sign"></i></a></li>
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
  
  <div class="animsition section white">
    <div class="row container">

    <h5 class=" header white "><a href="# ">English(Easy Mode)</a></h5>

    <div class="progress blue">
      <div class="determinate"></div>
    </div>
    <!--  <div class="col s3 left">
            <a href="#" id="pagination" class="pagination"></a>
    </div> -->



    <!------------------------------------------------------------>
     <div class="input-field col s1 right blue accent-3 z-depth-1 center">
              <!-- <i class="tiny glyphicon glyphicon-time prefix"></i> -->
             <!--  <h5 id="timer" class="right"><h5> -->
             <a href="#!" id="timer"></a>
    </div>

    <?php
        
          // $number_question = 1;
          // $stmt = mysqli_query( $con, "SELECT * from brain_question ");
          // $pdo = Database::getDB();
          // $room_id = $_SESSION['room_id'];
          // echo $room_id ;
          // $stmt = $pdo->prepare("SELECT * FROM reserve_question WHERE room_num = ? AND difficulty = 'EASY' ORDER BY question_num ASC ");
          // $stmt->execute(array($room_id));
          // $result = $stmt->fetchAll();

          // foreach ($result as $b) {
          //     echo $b['question_id'];
          //     $stmt1 = mysqli_query($con, "SELECT * FROM brain_question, easy_choice WHERE  brain_question.bid AND easy_choice.qid = '".$b['question_id']."'");
             
          // }

            // $rowcount = mysqli_num_rows($stmt1);
            // $remainder = $rowcount/$number_question;
            // $i = 0;
            // $j = 1; $k = 1;

         
         // $rowcount = mysqli_num_rows( $row );
         

          // echo $result1;
          // $rowcount->fetchAll();
         

          // echo $rowcount;

         
          // $result = $stmt->fetchAll();
  ?>



   <!--  <?php //while ( $row = mysqli_fetch_assoc($stmt1) )   {
             //if ( $i == 0) echo "<div class='cont' id='question_splitter_$j'>";?>
            <div id='question<?php //echo $k;?>' >
               <h5 class='questions' id="qname<?php //echo $j;?>"> <?php //echo $k?>.<?php //echo $row['question'];?></h5>
              <div id="shuffle">

                  <input type="radio" value="1" id='radio1_<?php// echo $row['qid'];?> ' name='<?php// echo $row['qid'];?>'/><?php echo $row['correct'];?>
                  
                  <input type="radio" value="2" id='radio1_<?php //echo $row['qid'];?> ' name='<?php // echo $row['qid'];?>'/><?php echo $row['choiceB'];?>
                 
                  <input type="radio" value="3" id='radio1_<?php //echo $row['qid'];?> ' name='<?php //echo $row['qid'];?>'/><?php echo $row['choiceC'];?>
                
                  <input type="radio" value="4" id='radio1_<?php //echo $row['qid'];?> ' name='<?php //echo $row['qid'];?>'/><?php echo $row['choiceD'];?>
                  
                  <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php //echo $row['qid'];?>' name='<?php echo $row['qid'];?>'/>                                                                      
              
              </div>
                                
            </div>
            <?php
               // $i++; 
               // if ( ( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 ) ) {
               //  echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
               //  echo "</div>";
               // }  elseif ( $rowcount > $number_question  ) {
                
                // if ( $j == 1 && $i == $number_question ) {
                //   echo "<button id='".$j."' class='next btn btn-success' type='button'>Next</button>";
                //   echo "</div>";
                //   $i = 0;
                //   $j++;           
                // } elseif ( $k == $rowcount ) { 
                //   echo " <button id='".$j."' class='previous btn btn-success' type='button'>Previous</button>
                //         <button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
                //   echo "</div>";
                //   $i = 0;
                //   $j++;
                // } elseif ( $j > 1 && $i == $number_question ) {
                //   echo "<button id='".$j."' class='previous btn btn-success' type='button'>Previous</button>
                //                   <button id='".$j."' class='next btn btn-success' type='button' >Next</button>";
                //   echo "</div>";
                //   $i = 0;
                //   $j++;
                //}
                
               //}
                // $k++;
               //} ?> 
        </form>
      </div>
    </div> -->

     <!---------------------------------------------------------------------->

    <!--  <?php $ctr = 0; foreach ($reserveQuestions as $rq) { ?>
     <table class="responsive-table z-depth-2 bordered" id="data"> 
          <tr>
            <td>
                     <p class="grey-text text-darken-3 lighten-3">
               <div id="nav">
             
                            <div id="quest"
                                class="section white col s9  blue" 
                                data-animsition-in="fade-in"
                                data-animsition-in-duration="200"
                                data-animsition-out="fade-out">
                                <label class="left score">My Score: 0</label>

                       
                            
                                  <div class="row " id="pad">
                                          <div class="container">


                                          <div class="col s10 offset-s1 grid-example">
                                                <h5><?= $ctr += 1;  ?>. <?= $rq->getQuestion(); ?> </h5>

                                            </div>

                                            <div class="col s6 right">

                                                    <img src="<?= $rq->getfile_path();  ?>" class="img-responsive z-depth-2" height="250" width="300">
                                             
                                            </div>
                                                                    
                    
                                                      <div id="shuffle">
                                                      
                                                      <div class="col s6  z-depth-1 choice" id="choice1">
                                                         
                                                          <p>
                                                               <i class="tiny glyphicon glyphicon-ok" id="icon1"></i>
                                                              <input class="rad" name="group1" style="visibility:hidden" value="correct" type="radio" id="correct"/>
                                                              <label for="correct" class="ngek"><?= $rq->getCorrect();  ?></label>
                                                            </p>

                                                      </div> -->

                                                       
                                                      <!-- <div class=" col s6 z-depth-1 choice" id="choice2">
                                                         
                                                            <p>
                                                              <i class="tiny glyphicon glyphicon-remove " id="icon2"></i>
                                                              <input class="rad" name="group1" style="visibility:hidden"  value="wrong"  type="radio" id="test2" />
                                                              <label for="test2" class="ngek"> <?= $rq->getChoiceB();  ?></label>
                                                            </p>

                                                      </div>

                                                      
                                                      <div class="col s6 z-depth-1 choice" id="choice3">
                                                           
                                                           <p>
                                                               <i class="tiny glyphicon glyphicon-remove " id="icon3"></i>
                                                              <input class="rad" name="group1" style="visibility:hidden" value="wrong" type="radio" id="test3" />
                                                              <label for="test3" class="ngek"> <?= $rq->getChoiceC();  ?></label>
                                                            </p>
                                                      </div>

                                                      
                                                      <div class="col s6 z-depth-1 choice" id="choice4">
                                                         
                                                           <p>
                                                              <i class="tiny glyphicon glyphicon-remove " id="icon4"></i>
                                                              <input class="rad" name="group1" style="visibility:hidden" value="wrong"  type="radio" id="test4" />
                                                              <label for="test4" class="ngek">  <?= $rq->getChoiceD();  ?></label>
                                                            </p>
                                                      </div>
                                                     </div>
                                              </div>
                                          </div>
                                          <div class="input-field center">
                                               <button class="waves-effect waves-light blue btn" id="sub">Submit</button>
                                            </div><br>

                                          <div id="response_form" class="hint" style="display:none">
                                                     
                                                  <h4><?= $rq->getHint();  ?></h4>

                                            </div>

                                       <a class="btn-floating btn-large waves-effect waves-light dark-text amber darken-4  z-depth-2" onmousedown="javascript:toggleArticleForm('response_form')">HINT</a>

                                      <div>
                                   
                                      </div>
                                    
                                </div> -->
                         
                   <!-- <div class="col s3  z-depth-1 ">
                    <label>Rankings</label>
                        <ul class="collection ">
                        <?php foreach ($get_users as $k) { ?>
                          
                       
                              <li class="collection-item avatar ">
                            
                               <img src="<?= $k->getAcc_path();  ?>" alt="" class="circle">

                                <span class="title"><?= $k->getFname();  ?></span>
                                
                                <a href="#!" class="secondary-content "><i class="material-icons"><p id="score"></p></i></a>
                              </li>
                        <?php } ?>
                           
                      </ul>
                </div>
              </div>
            </td>
          </tr>
          <?php } ?>
     </table>
              
    </div>
  </div> -->

      <form class="form-horizontal" role="form" id='login' method="post" action="result.php">
         <!--  <?php
          $category_id = $_POST[''];
          $number_question = 1;
          $row = mysqli_query( $con, "select * from questions where category_id=$category ORDER BY RAND()");
          $rowcount = mysqli_num_rows( $row );
          $remainder = $rowcount/$number_question;
          $i = 0;
          $j = 1; $k = 1;
          ?> -->
         <!--  $ctr = 0; foreach ($reserveQuestions as $rq) -->

          <?php 
            $i = 0;
            $j = 1; $k = 1; 
            while ( $reserveQuestions = mysqli_fetch_assoc($row) ) {
             if ( $i == 0) echo "<div class='cont' id='question_splitter_$j'>";?>
            <div id='question<?= $k;?>' >
            <p class='questions' id="qname<?= $j;?>"> <?= $k?>.<?= $result->getQuestion();?></p>
            <input type="radio" value="1" id='radio1_<?= $result->getQid();?>' name='<?= $result->getQid();?>'/><?=  $result->getCorrect();?>
            <br/>
            <input type="radio" value="2" id='radio1_<?= $result->getQid();?>' name='<?= $result->getQid();?>'/><?=  $result->getChoiceB();?>
            <br/>
            <input type="radio" value="3" id='radio1_<?= $result->getQid();?>' name='<?= $result->getQid();?>'/><?=  $result->getChoiceC();?>
            <br/>
            <input type="radio" value="4" id='radio1_<?= $result->getQid();?>' name='<?= $result->getQid();?>'/><?=  $result->getChoiceD;?>
            <br/>
            <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?= $result->getQid();?>' name='<?= $result->getQid();?>'/>                                                                      
            <br/>
            </div>
            <?php
               $i++; 
               if ( ( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 ) ) {
                echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
                echo "</div>";
               }  elseif ( $rowcount > $number_question  ) {
                if ( $j == 1 && $i == $number_question ) {
                  echo "<button id='".$j."' class='next btn btn-success' type='button'>Next</button>";
                  echo "</div>";
                  $i = 0;
                  $j++;           
                } elseif ( $k == $rowcount ) { 
                  echo " <button id='".$j."' class='previous btn btn-success' type='button'>Previous</button>
                        <button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
                  echo "</div>";
                  $i = 0;
                  $j++;
                } elseif ( $j > 1 && $i == $number_question ) {
                  echo "<button id='".$j."' class='previous btn btn-success' type='button'>Previous</button>
                                  <button id='".$j."' class='next btn btn-success' type='button' >Next</button>";
                  echo "</div>";
                  $i = 0;
                  $j++;
                }
                
               }
                $k++;
               } ?> 
        </form>
      </div>
    </div>
  <!---------------------------------------------------------------------->
  
    <script>
    $('.cont').addClass('hide');

    $('#question_splitter_1').removeClass('hide');
     
    $(document).on('click','.next',function(){
        last=parseInt($(this).attr('id'));  console.log( last );   
        nex=last+1;
        $('#question_splitter_'+last).addClass('hide');
        
        $('#question_splitter_'+nex).removeClass('hide');
    });
    
    $(document).on('click','.previous',function(){
        last=parseInt($(this).attr('id'));     
        pre=last-1;
        $('#question_splitter_'+last).addClass('hide');
        
        $('#question_splitter_'+pre).removeClass('hide');
    });
            
         // setTimeout(function() {
         //     $("form").submit();
         //  }, 60000);
    </script>  

  <div class="footer-copyright teal">
           <div class="container center">
                  <label class="white-text"><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo-container" height="10" class="brand-logo"><b> 2015 BRAINWAVE QUIZ MASTER</b></label>
           </div>
</div>
  
 

