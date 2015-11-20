<body>
	<div 
      class="side-nav fixed teal accent-4 index m-scene">
      <div class="logo">
             <a href="#" class="brand-logo "><img alt="Brand" src="./bootstrap/img/backgrounds/Brainwave Quiz Master.png" id="logo" class="img-responsive"> </a>
      </div>
     <hr>
     
     <ul>

       <li class="z-depth-3 active1  collection-item avatar " id="active1"><a href="#!" id="list2" 
        class="waves-effect waves-light"><i class="tiny glyphicon glyphicon-book prefix"></i> CATEGORY</a></li>
        
        <li class="z-depth-3"  ><a href=".?action=view_user" id="list2" 
        class="animsition-link waves-effect waves-light"
        data-animsition-out="fade-out"
        data-animsition-out-duration="500">
        <i class="tiny glyphicon glyphicon-user circle"></i> VIEW USERS</a></li>
      </ul>
  </div> 

   <?php if (isset($_SESSION['user'])) { ?>
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
        <h5>Category List</h5>
      </nav>
    </div>
  <?php } ?>
  		
  	<div class="col s9" id="users">

  		<div class="row m-landing-layout">

      		<div class="col s9 offset-s2 grid-example">
             		<!--  <div class="card-panel teal lighten-2 white-text"><b>Category List</b></div> -->

              <div class="row">

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

            </div>



      		<div class="container">
      		
      		<?php if (empty($category)) { ?>
                              <b><p class="text-danger">Category List is Empty!!!</p></b>
              <?php }else{ ?> 

			<section id="grid" class="grid clearfix">
			  <?php  $ctr = 0;  foreach ($category as $c ) { ?>

			  	 <?php if ($c->getCategory() == 'Math') { ?> 
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" id="aw">
					<figure class="z-depth-2">
						<img src="bootstrap/img/backgrounds/1.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none">
						<path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2 class="name"><b><?= $c->getCategory();  ?></b> </h2>
									
						<ul id="Hovbut">
							<li>
								<!-- <button class=" waves-effect waves-light btn green" id="op" 
									onclick="location.href='.?cid=<?= $c->getCid();?>&action=brain_AddQuestion&dup=''">
									<i class="tiny glyphicon glyphicon-plus-sign"></i>
								</button> -->
								<a href="" class="waves-effect waves-light btn green" id="op"><i class="tiny glyphicon glyphicon-plus-sign"></i></a>
								
							</li>
							<li>
								<button class=" waves-effect waves-light btn green" id="op">
									<i class="tiny glyphicon glyphicon-eye-open"></i>
								</button>
							</li>
							
							<li>
								<button class=" waves-effect waves-light btn green" id="op"
									onclick="location.href = '?cid=<?= $c->getCid();?>&action=brain_Delete_cat;">
									<i class="tiny glyphicon glyphicon-trash"></i>
								</button>
							</li>
							<li>
								<button class=" waves-effect waves-light btn green" id="op">
									<i class="tiny glyphicon glyphicon-edit"></i>
								</button>
							</li>
						</ul>
						
						
						</figcaption>
					</figure>
				</a>
				<?php }elseif ( ($c->getCategory() == 'English')) { ?>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" id="aw">
					<figure class="z-depth-2">
						<img src="bootstrap/img/backgrounds/2.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none">
						<path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2 class="name"><b><?= $c->getCategory();  ?></b> </h2>
							
							<ul id="Hovbut">
							<li>
								<button class=" waves-effect waves-light btn red" id="op">
									<i class="tiny glyphicon glyphicon-plus-sign"></i>
								</button>
								
							</li>
							<li>
								<button class=" waves-effect waves-light btn red" id="op">
									<i class="tiny glyphicon glyphicon-eye-open"></i>
								</button>
							</li>
							
							<li>
								<button class=" waves-effect waves-light btn red" id="op">
									<i class="tiny glyphicon glyphicon-trash"></i>
								</button>
							</li>
							<li>
								<button class=" waves-effect waves-light btn red" id="op">
									<i class="tiny glyphicon glyphicon-edit"></i>
								</button>
							</li>
						</ul>
						</figcaption>
					</figure>
				</a>
				 <?php }elseif ( ($c->getCategory() == 'Filipino')) { ?>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" id="aw">
					<figure class="z-depth-2">
						<img src="bootstrap/img/backgrounds/3.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none">
						<path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2 class="name"><b><?= $c->getCategory();  ?></b> </h2>
							
							<ul id="Hovbut">
							<li>
								<button class=" waves-effect waves-light btn brown" id="op">
									<i class="tiny glyphicon glyphicon-plus-sign"></i>
								</button>
								
							</li>
							<li>
								<button class=" waves-effect waves-light btn brown" id="op">
									<i class="tiny glyphicon glyphicon-eye-open"></i>
								</button>
							</li>
							
							<li>
								<button class=" waves-effect waves-light btn brown" id="op">
									<i class="tiny glyphicon glyphicon-trash"></i>
								</button>
							</li>
							<li>
								<button class=" waves-effect waves-light btn brown" id="op">
									<i class="tiny glyphicon glyphicon-edit"></i>
								</button>
							</li>
						</ul>
						</figcaption>
					</figure>
				</a>
				<?php }elseif ( ($c->getCategory() == 'Science')) { ?>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" id="aw">
					<figure class="z-depth-2">
						<img src="bootstrap/img/backgrounds/4.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none">
						<path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2 class="name"><b><?= $c->getCategory();  ?></b> </h2>
							
							<ul id="Hovbut">
							<li>
								<button class=" waves-effect waves-light btn blue" id="op">
									<i class="tiny glyphicon glyphicon-plus-sign"></i>
								</button>
								
							</li>
							<li>
								<button class=" waves-effect waves-light btn blue" id="op">
									<i class="tiny glyphicon glyphicon-eye-open"></i>
								</button>
							</li>
							
							<li>
								<button class=" waves-effect waves-light btn blue" id="op">
									<i class="tiny glyphicon glyphicon-trash"></i>
								</button>
							</li>
							<li>
								<button class=" waves-effect waves-light btn blue" id="op">
									<i class="tiny glyphicon glyphicon-edit"></i>
								</button>
							</li>
						</ul>
						</figcaption>
					</figure>
				</a>
				 <?php }elseif ( ($c->getCategory() == 'History')) { ?>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z" id="aw">
					<figure class="z-depth-2">
						<img src="bootstrap/img/backgrounds/5.png" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none">
						<path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2 class="name"><b><?= $c->getCategory();  ?></b> </h2>
						
							<ul id="Hovbut">
							<li>
								<button class=" waves-effect waves-light btn grey" id="op">
									<i class="tiny glyphicon glyphicon-plus-sign"></i>
								</button>
								
							</li>
							<li>
								<button class=" waves-effect waves-light btn grey" id="op">
									<i class="tiny glyphicon glyphicon-eye-open"></i>
								</button>
							</li>
							
							<li>
								<button class=" waves-effect waves-light btn grey" id="op">
									<i class="tiny glyphicon glyphicon-trash"></i>
								</button>
							</li>
							<li>
								<button class=" waves-effect waves-light btn grey" id="op">
									<i class="tiny glyphicon glyphicon-edit"></i>
								</button>
							</li>
						</ul>
						</figcaption>
					</figure>
				</a>
				 <?php } ?>
			<?php } ?>
			</section>
		  <?php } ?>
		</div><!-- /container -->
		</div>
      </div>

	
		<script>
			(function() {
	
				function init() {
					var speed = 300,
						easing = mina.backout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();

			var options = {
			  valueNames: [ 'name' ]
			};

			var userList = new Grid('grid', options);
		</script>
	</body>
</html>